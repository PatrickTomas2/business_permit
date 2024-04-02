<?php
session_start();
include('config.php');

if (!isset($_SESSION['user_id'])) {
    exit('Unauthorized access'); // Stop script execution if user is not logged in
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user ID from session
    $user_id = $_SESSION['user_id'];
    $business_name = $_SESSION['user_business'];

    // Get the new checkbox status from the AJAX request
    $isChecked = $_POST['isChecked'];

    // Update the database with unchecked values for all checkboxes
    $update_query = "UPDATE owner_checklist SET requirement1 = '$isChecked', requirement2 = '$isChecked', requirement3 = '$isChecked', requirement4 = '$isChecked', requirement5 = '$isChecked', requirement6 = '$isChecked', requirement7 = '$isChecked', requirement8 = '$isChecked', requirement9 = '$isChecked', requirement10 = '$isChecked', requirement11 = '$isChecked', requirement12 = '$isChecked' WHERE owner_id = '$user_id' AND business_name = '$business_name'";
    $result = mysqli_query($conn, $update_query);

    if ($result) {
        echo 'All checkboxes updated successfully';
    } else {
        echo 'Failed to update checkboxes';
    }
} else {
    echo 'Invalid request method';
}
?>
