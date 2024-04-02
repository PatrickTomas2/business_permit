<?php
    session_start();
    include 'config.php';

    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];

    $business_name = $_POST['business_name'];
    $request_date = $_POST['request_date'];

    $query = "UPDATE fire_inspection_request INNER JOIN business_registration ON fire_inspection_request.business_id = business_registration.business_id SET fire_inspection_request.isAccepted = '1', fire_inspection_request.inspection_schedule = '$request_date' WHERE business_registration.business_name = '$business_name'";
    $accept_request = mysqli_query($conn, $query);
    if ($accept_request) {
        echo "Request accepted";
    }else {
        echo "Error in processing request";
    }
    

?>