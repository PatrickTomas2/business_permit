<?php 
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

$permit_id = uniqid();

$business_id = $_GET['business_id'];

// Check if file uploads are set and not empty
if (!empty($_FILES['req1']['name'])) {
    $file_name_req1 = $_FILES['req1']['name'];
    $file_temp_req1 = $_FILES['req1']['tmp_name'];
    $destination1 = 'uploads/' . $file_name_req1;
    move_uploaded_file($file_temp_req1, $destination1);
} else {
    // Handle case where file upload for req1 is not set or empty
}

if (!empty($_FILES['req2']['name'])) {
    $file_name_req2 = $_FILES['req2']['name'];
    $file_temp_req2 = $_FILES['req2']['tmp_name'];
    $destination2 = 'uploads/' . $file_name_req2;
    move_uploaded_file($file_temp_req2, $destination2);
} else {
    // Handle case where file upload for req2 is not set or empty
}

if (!empty($_FILES['req3']['name'])) {
    $file_name_req3 = $_FILES['req3']['name'];
    $file_temp_req3 = $_FILES['req3']['tmp_name'];
    $destination3 = 'uploads/' . $file_name_req3;
    move_uploaded_file($file_temp_req3, $destination3);
} else {
    // Handle case where file upload for req3 is not set or empty
}

if (!empty($_FILES['req4']['name'])) {
    $file_name_req4 = $_FILES['req4']['name'];
    $file_temp_req4 = $_FILES['req4']['tmp_name'];
    $destination4 = 'uploads/' . $file_name_req4;
    move_uploaded_file($file_temp_req4, $destination4);
} else {
    // Handle case where file upload for req4 is not set or empty
}

if (!empty($_FILES['req5']['name'])) {
    $file_name_req5 = $_FILES['req5']['name'];
    $file_temp_req5 = $_FILES['req5']['tmp_name'];
    $destination5 = 'uploads/' . $file_name_req5;
    move_uploaded_file($file_temp_req5, $destination5);
} else {
    // Handle case where file upload for req5 is not set or empty
}

if (!empty($_FILES['req6']['name'])) {
    $file_name_req6 = $_FILES['req6']['name'];
    $file_temp_req6 = $_FILES['req6']['tmp_name'];
    $destination6 = 'uploads/' . $file_name_req6;
    move_uploaded_file($file_temp_req6, $destination6);
} else {
    // Handle case where file upload for req6 is not set or empty
}

if (!empty($_FILES['req7']['name'])) {
    $file_name_req7 = $_FILES['req7']['name'];
    $file_temp_req7 = $_FILES['req7']['tmp_name'];
    $destination7 = 'uploads/' . $file_name_req7;
    move_uploaded_file($file_temp_req7, $destination7);
} else {
    // Handle case where file upload for req7 is not set or empty
}


// Output destination paths for debugging
// echo $destination1 . " " . $destination2 . " " . $destination3 . " " . $destination4 . " " . $destination5 . " " . $destination6 . " " . $destination7;

$queryChecklist = "INSERT INTO business_permit_request VALUES('$permit_id', '$user_id', '$business_id', '$destination1', '$destination2', '$destination3', '$destination4', '$destination5', '$destination6', '$destination7', '0', NOW())";

$insert_checklist = mysqli_query($conn, $queryChecklist);

if ($insert_checklist) {
    echo "Submitted successfully";
}else {
    echo "Error in submitting the request";
}
?>
