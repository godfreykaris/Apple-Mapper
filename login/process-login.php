<?php
//This section processes submissions from the login form
//Check that form has been submitted:
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        try
        {
            require('mysqli_connect.php'); //Connect to the db
            
            $errors = array(); //Initialize an error array.
           
            //Check for a an email address:
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            if(!empty($email))
            {
                if((!filter_var($email, FILTER_VALIDATE_EMAIL)) || (strlen($email) > 60))
                    $errors[] = 'The e-mail is invalid. Max 60';
                else
                    $emailtrim = trim($email);        
            }
            else
            {
                $errors[] = 'Please enter valid email address.';
            }

            //Validate the password
            $password = trim(htmlspecialchars($_POST['password'], ENT_QUOTES));
            if(empty($password))
            {
                $errors[] = 'Please enter a valid password.';
            }
                       

            if(empty($errors)) //If everything is OK.
            {
                //Retrieve the user_id, email, password for that
                //email/password combination
                $query = "SELECT user_id, email, password, role FROM users_register WHERE  email=?";
                $q = mysqli_stmt_init($dbcon);
                mysqli_stmt_prepare($q, $query);
                //use prepared statement to ensure that only text is inserted
                //bind fields to SQL Statement
                mysqli_stmt_bind_param($q, 's', $emailtrim);
                // execute query
                mysqli_stmt_execute($q);
                $result = mysqli_stmt_get_result($q);
                $row = mysqli_fetch_array($result, MYSQLI_NUM);
                if(mysqli_num_rows($result) == 1)
                {
                    //if one database row (record) matches the input:-
                    //Start the session, fetch the record and insert the
                    //values in an array
                    if(password_verify($password, $row[2]))
                    {
                        if(session_status() != PHP_SESSION_ACTIVE) 
                            session_start();
                        //Ensure that the user id is an integer
                        $_SESSION['user_id'] = (int)$row[0];
                        $_SESSION['role'] = (int)$row[3];

                        if($_SESSION['role'] === 1)                        
                            header('Location:admin/admin-dashboard.php');
                        elseif($_SESSION['role'] === 2)                        
                            header('Location: register/apple/register-apple.php');
                        //Make the browser load either the members or the admin page
                    }
                    else //no password match was made
                    {
                        $errors[] = 'Incorrect Password!';
                        $incorrect_password = 'Incorrect Password!';
                    }
                }
                else
                {
                    $invalid_email = "Invalid Email";
                }

                mysqli_stmt_free_result($q);
                mysqli_stmt_close($q);

            }
            else //Report the  errors
            {
                $errorstring = "Error! The following error(s) occured:<br>";
                foreach($errors as $msg) //Print each error
                {
                    $errorstring .= " - $msg<br>\n";
                }
                $errorstring .= "Please try again.<br>";
                $internal_error = $errorstring . "</p>";
            }// End of if(!empty($errors)) IF
        }
        catch(Exception $e) // We finally handle any problems here
        {
            //print "An Exception occurred. Message: " . $e->getMessage();
            $internal_error = "The system is busy please try later";
        }
        catch(Error $e)
        {
            //print "An Error occurred. Message: " . $e->getMessage();
            $internal_error = "The system is busy please try later";
        }
    }// no else to allow user to enter values   
?>