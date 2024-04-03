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

    $query = "SELECT owner_information.owner_fname, owner_information.owner_mname, owner_information.owner_lname, business_registration.business_houseNumber, business_registration.business_barangay, business_registration.business_zone, fire_inspection_request.authorized_representative, owner_information.owner_contactNumber, business_registration.business_phone FROM owner_information INNER JOIN business_registration ON owner_information.owner_id = business_registration.owner_id INNER JOIN fire_inspection_request ON business_registration.business_id = fire_inspection_request.business_id WHERE business_registration.business_name = '$business';";
    $select_info = mysqli_query($conn, $query);
    if (mysqli_num_rows($select_info) > 0) {
        $row = mysqli_fetch_assoc($select_info);

        $owner_name = $row['owner_fname'] . ' ' . $row['owner_mname'] . ' ' . $row['owner_lname'];
        $address = '#' . $row['business_houseNumber'] . ' zone '. $row['business_zone'] . ' ' . $row['business_barangay']. ' Santo Tomas Pangasinan';
        $representative = $row['authorized_representative'];
        $owner_phone = $row['owner_contactNumber'];
        $business_phone = $row['business_phone'];
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
            <label for="">Owner name</label>
            <input type="text" class="form-control" value="<?=$owner_name?>">
        </div>
        <div class="col">
        <label for="">Authorized representative</label>
            <input type="text" class="form-control" value="<?=$representative?>">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <label for="">Business address</label>
            <input type="text" class="form-control" value="<?=$address?>">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <label for="">Owner contact number</label>
            <input type="text" class="form-control" value="<?=$owner_phone?>">
        </div>
        <div class="col">
        <label for="">Business contact number</label>
            <input type="text" class="form-control" value="<?=$business_phone?>">
        </div>
    </div>
    <br>
    <button class="btn btn-danger" onclick="closeInfoSched('<?=$business_name?>')">Close</button>
  </div>
</div>
</body>
</html>