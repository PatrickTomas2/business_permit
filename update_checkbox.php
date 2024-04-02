<?php
session_start();
include ('config.php');

if (!isset($_SESSION['user_id'])) {
    exit('Unauthorized access'); // Stop script execution if user is not logged in
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user ID from session
    $user_id = $_SESSION['user_id'];
    $business_name = $_SESSION['user_business'];

    // Get the checkbox ID and its new checked status from the AJAX request
    $checkboxId = $_POST['checkboxId'];
    $isChecked = $_POST['isChecked'];

    // Update the database with the new checkbox status
    $update_query = "UPDATE owner_checklist SET $checkboxId = '$isChecked' WHERE owner_id = '$user_id' AND business_name = '$business_name'";
    $result = mysqli_query($conn, $update_query);

    if ($result) {
        echo 'Checkbox status updated successfully';
    } else {
        echo 'Failed to update checkbox status';
    }
} else {
    echo 'Invalid request method';
}
?>
