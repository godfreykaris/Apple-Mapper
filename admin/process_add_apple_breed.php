<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
if(!isset($_SESSION['user_id']))
{
    header("Location: ../index.php");
    exit();
}
?>

<?php
//This script is a query that INSERTs a record in the users table.
//Check that form has been submitted:
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        require('../mysqli_connect.php'); //Connect to the db
    }

    $errors = array(); //Initialize an error array.

    $breed_nametrim = trim(htmlspecialchars($_POST['breed_name'], ENT_QUOTES));
    
    if(empty($breed_nametrim) || (strlen($breed_nametrim) > 60))
    {
        $errors[] = 'Please enter a valid breed_name.';
    }


    if(empty($errors)) //If everything is OK.
    {
        try
        {
            $query = "SELECT id FROM apple_breeds WHERE (breed_name=?)";
            $q = mysqli_stmt_init($dbcon);
            mysqli_stmt_prepare($q, $query);
            //use prepared statement to ensure that only text is inserted
            //bind fields to SQL Statement
            mysqli_stmt_bind_param($q, 's',$breed_nametrim);
            // execute query
            mysqli_stmt_execute($q);
            $result = mysqli_stmt_get_result($q);
            
            if(mysqli_num_rows($result) == 0 )
            {       

            
               //Make the query:
               $query = "INSERT INTO apple_breeds (id, breed_name)";                
               $query .= "VALUES(' ', ?)";
               $q = mysqli_stmt_init($dbcon);
               mysqli_stmt_prepare($q, $query);
               //use prepared statement to ensure that only text is inserted
               //bind fields to SQL Statement
               
               mysqli_stmt_bind_param($q, 's', $breed_nametrim);
               // execute query
               mysqli_stmt_execute($q);

               if(mysqli_stmt_affected_rows($q) == 0) //No record inserted
               {

                    //Debugging message below do not use in production
                   //echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $query . '</p>';

                   //Public message:
                   $internal_error = "The system is busy please try later.";

                   mysqli_close($dbcon); // Close the database connection.
                   //exit();
               }    
               else
               {
                     //Public message:
                    $success = "Breed registered successfully.";                                    

                    mysqli_close($dbcon); // Close the database connection.
               }           
                
            }
            else
            {
                //Public message:
                $success = "Breed already registered.";
                                
                                
                mysqli_close($dbcon); // Close the database connection.
                
                //exit();
            }
            
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
    }// End of if(empty($errors)) IF.
?>