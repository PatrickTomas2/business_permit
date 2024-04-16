<?php
    $localhost = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'business_permit_sample_new';

    $conn = mysqli_connect($localhost, $username, $password, $database) or die ('db error in connecting: '.mysqli_connect_error());
    $conn->set_charset('utf8');

?>