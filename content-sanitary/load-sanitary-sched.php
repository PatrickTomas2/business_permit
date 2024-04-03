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
<h4>Your scheduled inspection today: </h4><br>
<?php

    $query = "SELECT business_registration.business_name, sanitary_inspection_request.isAccepted, sanitary_inspection_request.inspection_schedule FROM business_registration INNER JOIN sanitary_inspection_request ON business_registration.business_id = sanitary_inspection_request.business_id WHERE sanitary_inspection_request.isAccepted = '1' AND sanitary_inspection_request.isDone = '0' AND DATE(sanitary_inspection_request.inspection_schedule) = CURDATE();";
    $select_request_info = mysqli_query($conn, $query);
    if (mysqli_num_rows($select_request_info) > 0) {
        while ($row = mysqli_fetch_assoc($select_request_info)) {
            $business_name = $row['business_name'];
            $isAccepted = $row['isAccepted'];
            $inspection_schedule = $row['inspection_schedule'];

            $formatted_date = date('F j, Y', strtotime($inspection_schedule));
?> 
        <div class="card border-0 shadow m-3 card-custom-style">
        <div class="card-body">
            <a href="#" style="text-decoration: none; color: black;" onclick="infoHolderSched('<?=$business_name?>')">
            <p class="fw-bold fs-4 ms-5 d-flex justify-content-between align-items-center"><?=$business_name?>
            <span><button class="btn btn-info m-3" style="height: 40px; width: 100px; color: white;" onclick="showInspectChecklist('<?=$business_name?>')">Inspect</button></span></p></a>
            <div class="m-5" id="<?= str_replace(' ', '-', $business_name) ?>-info-holder-sched"></div>
        </div>
        </div>
<?php              
        }
    }else {
        echo "<p>No scheduled inspection today.</p>";
    }

?>
</body>
</html>