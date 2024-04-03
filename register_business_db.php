<?php
    session_start();
    include('config.php');

    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }

    $businessName = $_POST['businessName'];
    $businessHouseNumber = $_POST['businessHouseNumber'];
    $businessBarangay = $_POST['businessBarangay'];
    $businessZone = $_POST['businessZone'];
    $businessType = $_POST['businessType'];
    $businessEmail = $_POST['businessEmail'];
    $businessNumber = $_POST['businessNumber'];

    
    $businessID = uniqid();
    $user_id = $_SESSION['user_id'];


    $query = "INSERT INTO business_registration VALUES('$businessID', '$user_id', '$businessName', '$businessHouseNumber', '$businessBarangay', '$businessZone',  '$businessType', '$businessNumber', '$businessEmail', NOW())";
    
    $insert_owner = mysqli_query($conn, $query);
    
    $_SESSION['user_business'] = $businessName;

    

    if ($insert_owner) {
        echo "You have registered.";
    }else {
        echo "Error in inserting";
    }

    //TODO: FOR CHECKLIST NG BUSINESS
    $queryChecklist = "INSERT INTO owner_checklist VALUES('$user_id','$businessName', 0, 0, 0, 0, 0, 0, 0, 0)";
    $insert_checklist = mysqli_query($conn, $queryChecklist);


?>