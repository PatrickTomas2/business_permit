<?php
    session_start();
    include 'config.php';

    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }

    $user_business = $_SESSION['user_business'];
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];

    //4
    $representative = $_POST['representative'];
    //5
    $business_nature = $_POST['business_nature'];
    //6
    $total_floor = $_POST['total_floor'];
    //7
    $storey = $_POST['storey'];

    //1
    $request_id = uniqid();

    $query_one = "SELECT business_registration.business_id FROM business_registration INNER JOIN owner_information ON business_registration.owner_id = owner_information.owner_id WHERE business_registration.business_name = '$user_business' AND owner_information.owner_id = '$user_id'";
    $select_business_id = mysqli_query($conn, $query_one);
    if (mysqli_num_rows($select_business_id) > 0) {
        $row = mysqli_fetch_assoc($select_business_id);
        //2
        $business_id = $row['business_id'];
    }

    $query_two = "INSERT INTO fire_inspection_request VALUES ('$request_id','$business_id','$user_id','$representative','$business_nature', $total_floor, $storey, '0', NOW(), NOW())";
    $insert_request = mysqli_query($conn, $query_two);
    if ($insert_request) {
        echo "Request submitted successfully";
    }else {
        echo "Error in submitting the request";
    }

?>