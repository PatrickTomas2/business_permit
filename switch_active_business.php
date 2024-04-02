<?php
session_start();

if (isset($_POST['business_name'])) {

    $_SESSION['user_business'] = $_POST['business_name'];
    
    echo json_encode(array('success' => true));
} else {
    echo json_encode(array('error' => 'Business name not provided'));
}
?>
