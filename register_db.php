<?php
    include('config.php');

    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $contactNumber = $_POST['contactNumber'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $userID = uniqid();

    $query = "INSERT INTO owner_information VALUES('$userID', '$fname','$mname', '$lname', '$address','$contactNumber', NOW())";
    $insert_owner = mysqli_query($conn, $query);

    $query_two = "INSERT INTO accounts VALUES ('', '$userID', '$username', '$password', 'owner')";
    $insert_account = mysqli_query($conn, $query_two);
    
    if ($insert_owner) {
        echo "You have registered.";
    }else {
        echo "Error in inserting";
    }

?>