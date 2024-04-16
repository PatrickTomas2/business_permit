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
    <script src="js/fire_request.js?ver=005"></script>
    
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
    <div class="row">
    <div class="col">
            <label for="">Search by name: </label>
            <input id="search_business_name" type="text" class="form-control" placeholder="Enter business name" onkeyup="searchRequest()">
        </div>
        <div class="col">
            <label for="">Start date: </label>
            <input type="date" id="request_start_date" class="form-control" oninput="searchRequest()">
        </div>
        <div class="col">
            <label for="">End date: </label>
            <input type="date" id="request_end_date" class="form-control" oninput="searchRequest()">
        </div>
    </div><br>
        <div class="content-holder-fire-request"></div>
    </div>
</body>
</html>