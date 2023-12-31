<?php
// Check if the ID and name parameters are set
if (isset($_GET['id']) && isset($_GET['breed_name'])) {
    $breedId = $_GET['id'];
    $breedName = $_GET['breed_name'];
} else {
    // Handle the case where the parameters are not set
    header("Location: ../index.php"); // Redirect back to the list of users
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Delete Breed Confirmation</title>
    <?php
       $path = __DIR__;
       require_once("../includes/external_file_links.php");
    ?>
</head>
<body style="background-color: rgb(26, 255, 26)">
    <!-- Validate Input -->
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            require('process_delete_apple_breed.php');
        } // End of the main Submit conditional.
     ?>

    <div class="container" style="background-color: rgb(4, 38, 84); margin-top: 80px; margin-bottom: 80px; max-width: 400px; padding: 20px;">
        <h2 class="text-white">Delete Confirmation</h2>
        <p class="text-white">Do you want to delete breed: <?php echo $breedName; ?>?</p>
        <form action=<?php echo "delete_apple_breed.php?id=" . $breedId ."&breed_name=" . $breedName?> method="post">
            <input type="hidden" name="id" value="<?php echo $breedId; ?>">
            <div class="text-center">
                <button type="submit" class="btn btn-danger">Delete</button>
                <a href="view_apple_breeds.php" class="btn btn-secondary">Cancel</a>
            </div>

        </form>
    </div>


</body>
</html>
