<?php
session_start();
include ('config.php');

if (!isset($_SESSION['user_id'])) {
    exit('Unauthorized access'); // Stop script execution if user is not logged in
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $permit = $_POST['permit_id'];

    $update_query = "UPDATE `business_permit_request` 
    SET `isDone_permit` = '1', `approved_date` = CURDATE() 
    WHERE `business_permit_request`.`permit_id` = '$permit';
    ";
    $result = mysqli_query($conn, $update_query);

    if ($result) {
        echo 'Business is approved';
    } else {
        echo 'update failed';
    }
} else {
    echo 'Invalid request method';
}
?>
    