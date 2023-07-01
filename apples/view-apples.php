<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
if(!isset($_SESSION['user_id']))
{
    header("Location: ../index.php");
    exit();
}
?>

<?php
    require('../mysqli_connect.php'); //Connect to the db

    $errors = array(); //Initialize an error array.

      

    if(empty($errors)) //If everything is OK.
    {?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
                <title>View Apples</title>

                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                <link rel="icon" href="../images/apple.jpg" type="image/jpg">

                <?php
                   $path = __DIR__;
                   require_once("../includes/external_file_links.php");
                ?>
        </head>

        <body id="body" style="position: relative; min-height: 100%; top: 0px; background-color:rgb(26, 255, 26);">

                <!-- Navigation -->
             <div class="container-fluid sticky-top" style="background-color:rgb(4,38,84);">

                <nav class="navbar navbar-expand-md text-light " role="navigation" id="main_navbar">

                        <button class="navbar-toggler" type="button" style="color:rgb(236,132,17)" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            Menu
                            <span class="navbar-toggler-icon">
                                <i class="fa fa-bars" style="color:#fff; font-size:28px;"></i>
                            </span>
                       </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">                                                
                                                        
                            <li class="nav-item">
                                <a class="nav-link" style="color:rgb(236,132,17);" href="../logout.php">Logout</a>
                            </li>                        
                        </ul>
                    </div>
                </nav>
            </div>
                
                <div class="container-fluid">
                    <div class="row" style="padding-left: 0px;">
                    <h2 class="text-center">These are the available apples</h2>
                    <!--Center Column Section-->
                    <div class="col-12 table-responsive">
                        
                        <p>
                            <?php
                            try
                            {                                      
                                $query = "SELECT * FROM apples";
                                $q = mysqli_stmt_init($dbcon);
                                mysqli_stmt_prepare($q, $query);
                                
                                // execute query
                                mysqli_stmt_execute($q);
                                $result = mysqli_stmt_get_result($q);

                                if(mysqli_num_rows($result) >= 1)
                                {
                                                                            //Table header.
                                        echo '<table class="table " style="font-size:20px; font-weight: 600;">
                                        <tr>
                                            <th scope="col">Apple ID</th>
                                            <th scope="col">YOP</th>
                                            <th scope="col">Breed</th>
                                            <th scope="col">Row</th>
                                            <th scope="col">Column</th>
                                            <th scope="col">Longitude</th>
                                            <th scope="col">Latitude</th>
                                        </tr>';
                                        //Fetch and print all the records:
                                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                                        {
                                            
                                            //Remove special characters that might already be i table
                                            //reduce the chance of XSS exploits                           
                                            $apple_id = htmlspecialchars($row['apple_id'], ENT_QUOTES);
                                            $yop = htmlspecialchars($row['yop'], ENT_QUOTES);
                                            $breed = htmlspecialchars($row['breed'], ENT_QUOTES);
                                            $m_row = htmlspecialchars($row['apple_row'], ENT_QUOTES);
                                            $column = htmlspecialchars($row['apple_column'], ENT_QUOTES);
                                            $longitude = htmlspecialchars($row['longitude'], ENT_QUOTES);
                                            $latitude = htmlspecialchars($row['latitude'], ENT_QUOTES);
                                            
                                            echo '<tr>'.
                                                   '<td>'. $apple_id . '</td>' .
                                                   '<td>' . $yop . '</td>
                                                    <td>' . $breed . '</td>
                                                    <td>' . $m_row . '</td>
                                                    <td>' .$column . '</td>                                                      
                                                    <td>' . $longitude . '</td>
                                                    <td>' . $latitude . '</td>  
                                                  </tr>';
                                        }
                                        echo '</table>'; //Close the table so that it is ready for displaying.
                                        mysqli_free_result($result); //Free up the resources.
                                                                  

                                    
                                } 
                                else
                                {
                                    echo htmlspecialchars('No apples available.', ENT_QUOTES);
                                }                    
                             
                             
                        }//end of try block
                        catch(Exception $e) // We finally handle any problems here
                        {
                            print "An Exception occured. Message: " . $e->getMessage();
                            echo htmlspecialchars('An error occurred! Please contact the administrator.', ENT_QUOTES);
                        }
                        catch(Error $e)
                        {
                            print "An Error occured. Message: " . $e->getMessage();
                            echo htmlspecialchars('An error occurred! Please contact the administrator.', ENT_QUOTES);
                        }
                            ?>
                        </p>
                    </div>
                </div>
                </div> 

        </body>

        </html>
    <?php
    }
    else
    {
        $errorstring = "Error! The following error(s) occured:<br>";
        foreach($errors as $msg) //Print each error
        {
            $errorstring .= " - $msg<br>\n";
        }
        $errorstring .= "Please try again.<br>";
        $internal_error = $errorstring . "</p>";
        
    }
       
?>

