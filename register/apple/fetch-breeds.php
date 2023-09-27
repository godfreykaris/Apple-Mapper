

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        require('../../mysqli_connect.php'); //Connect to the db
    }

    // Query to fetch breed options from the database
    $query = "SELECT breed FROM apple_breeds";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Database query failed.");
    }

    $breeds = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $breeds[] = $row['breed_name'];
    }

    // Return the breed options as JSON
    echo json_encode($breeds);

    // Close the database connection
    mysqli_close($connection);
?>
