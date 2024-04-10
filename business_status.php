<?php 
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$business_id = $_GET['businessForDisplay'];
$query_business_status = "SELECT isDone_permit FROM business_permit_request WHERE business_permit_request.business_id = '$business_id';";
$status_business = mysqli_query($conn, $query_business_status);

if ($status_business) {
    $row_status = mysqli_fetch_assoc($status_business); // Fetch the row
    if ($row_status) {
        $isDone = $row_status['isDone_permit'];
        if($isDone == 0) {
            echo "Waiting for business";
        }
        else if($isDone == 1) {
            echo "Business Approved";
        }
    } else {
        echo "No records found for the given business ID.";
    }
} else {
    echo "Error executing the query: " . mysqli_error($conn);
}
?>
