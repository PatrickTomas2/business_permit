<?php
    session_start();
    include '../config.php';

    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-3.3.1.js?ver=001"></script>
    <script src="js/fire_request.js?ver=003"></script>
    
    <style>
    .content-holder-fire-request {
        display: block;
        justify-content: center;
        align-items: center;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="content-holder-fire-request"></div>
    </div>
</body>
</html>