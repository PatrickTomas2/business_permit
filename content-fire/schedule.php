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
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/fire_schedule.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="content-schedule-today"></div><br>
    <hr>
    <br><div class="content-remaining-schedule"></div>
</div>
</body>
</html>