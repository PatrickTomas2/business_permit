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
</head>
<body>
<?php
    $query = "SELECT business_registration.business_name FROM business_registration INNER JOIN fire_inspection_request ON business_registration.business_id = fire_inspection_request.business_id WHERE fire_inspection_request.isDone = '1'";
    $select_request = mysqli_query($conn, $query);
    if (mysqli_num_rows($select_request) > 0) {
        while ($row = mysqli_fetch_assoc($select_request)) {
            $business_name = $row['business_name'];
?>
    <div class="card border-0 shadow m-3 card-custom-style">
        <div class="card-body">
            <a href="#" style="text-decoration: none; color: black;" onclick="infoHolder('<?=$business_name?>')">
            <p class="fw-bold fs-4 ms-5 d-flex justify-content-between align-items-center"><?=$business_name?>
            <span><button class="btn btn-info m-3" style="height: 50px; width: 100px;" id="businessModalLink" data-bs-toggle="modal" data-bs-target="#businessModal">Accept</button>
            </span></p></a>
            <div class="m-5" id="<?= str_replace(' ', '-', $business_name) ?>-info-holder"></div>
        </div>
    </div>
<?php
        }
    }else {
        echo "<p>No available request.</p>";
    }

?>
    
</body>
</html>