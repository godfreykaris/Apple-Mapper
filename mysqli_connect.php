<?php
//This file provides the information for accessing the database and connecting to MySQL.
//First, we defien the constants:
Define ('DB_USER', 'root'); //or whatever userid you created
Define ('DB_PASSWORD', ''); //or whatever password you created
Define ('DB_HOST', '');
Define ('DB_NAME', 'applemapper');

$dbcon = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//Next we assign the database connection to a variable that we will call $dbcon:
try
{   
    mysqli_set_charset($dbcon, 'utf8');
    
    // more code will go here later
}
catch(Exception $e) // We finally handle any problems here
{
    // print "An Exception occurred. Message: " . $e->getMessage();
    print "The system is busy please try later";
}
catch(Error $e)
{
    // print "An Error occurred. Message: " . $e->getMessage();
    print "The system is busy please try later";
}
?>