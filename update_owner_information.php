<?php
    session_start();
    include 'config.php';

    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }

    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $contactNumber = $_POST['contactNumber'];


    $query = "UPDATE owner_information SET owner_fname`='$fname',owner_mname`='$mname',`owner_lname`='$lname',`owner_address`='$address',`owner_contactNumber`='$contactNumber' WHERE owner_id='$user_id'";
    $update_user_info = mysqli_query($conn, $query);

    if ($update_user_info) {
        echo "Information Updated successfully.";
    }else {
        echo "Error in updating.";
    }
?>