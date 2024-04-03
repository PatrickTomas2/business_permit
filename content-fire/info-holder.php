<?php
    session_start();
    include '../config.php';

    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];

    $business_name = $_GET['business_name'];
    $business = str_replace('-', ' ', $business_name);

    $query = "SELECT fire_inspection_request.request_date_time, business_registration.business_houseNumber, business_registration.business_barangay, business_registration.business_zone, fire_inspection_request.business_nature, fire_inspection_request.total_floor_area, fire_inspection_request.number_storey FROM business_registration INNER JOIN fire_inspection_request ON business_registration.business_id = fire_inspection_request.business_id WHERE business_registration.business_name = '$business'";
    $select_info = mysqli_query($conn, $query);
    if (mysqli_num_rows($select_info) > 0) {
        $row = mysqli_fetch_assoc($select_info);

        $address = '#' . $row['business_houseNumber'] . ' zone '. $row['business_zone'] . ' ' . $row['business_barangay']. 'Santo Tomas Pangasinan';
        $business_nature = $row['business_nature'];
        $total_floor = $row['total_floor_area'];
        $storey = $row['number_storey'];
        $request_date = $row['request_date_time'];

        $human_readable_date_time = date("F j, Y, g:i a", strtotime($request_date));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <hr>
<div class="card border-0">
  <div class="card-body">
    <div class="row">
        <div class="col">
            <label for="">Address</label>
            <input type="text" class="form-control" value="<?=$address?>" readonly>
        </div>
        <div class="col">
        <label for="">Facility Type</label>
            <input type="text" class="form-control" value="<?=$business_nature?>" readonly>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <label for="">Building Total Floor Area</label>
            <input type="text" class="form-control" value="<?=$total_floor?>" readonly>
        </div>
        <div class="col">
            <label for="">Building Storey Number</label>
            <input type="text" class="form-control" value="<?=$storey?>" readonly>
        </div>
    </div>
    <br>
    <p class="fw-bold">Request date: <span class="fw-normal"><?=$human_readable_date_time?></span></p>
    <br>
    <button class="btn btn-danger" onclick="closeInfo('<?=$business_name?>')">Close</button>
  </div>
</div>
</body>
</html>