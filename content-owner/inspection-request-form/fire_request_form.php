<?php
    session_start();
    include '../../config.php';

    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }


    $user_business = $_SESSION['user_business'];
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];

    $query = "SELECT business_registration.business_id, owner_information.owner_fname, owner_information.owner_lname, business_registration.business_name, business_registration.business_houseNumber, business_registration.business_barangay, business_registration.business_zone, business_registration.business_phone, business_registration.business_email FROM owner_information INNER JOIN business_registration ON owner_information.owner_id = business_registration.owner_id WHERE business_registration.business_name = '$user_business' AND owner_information.owner_id = '$user_id'";
    $select_information = mysqli_query($conn, $query);
    if (mysqli_num_rows($select_information) > 0) {
        $row = mysqli_fetch_assoc($select_information);

        $business_id = $row['business_id'];
        $owner_name = $row['owner_fname'] . " " . $row['owner_lname'];
        $business_name = $row['business_name'];
        $addresss = $row['business_houseNumber'] . " Zone " . $row['business_zone'] . " " . $row['business_barangay'] . ", Santo Tomas, Pangasinan";
        $phone = $row['business_phone'];
        $email = $row['business_email'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-3.3.1.js?ver=001"></script>
    <script src="js/inspection.js?ver=003"></script>
    <style>
        :root{
            --main-color: #FAD602;
        }

        .custom-btn-request{
            width: 100%;
            background-color: var(--main-color);
            color: white;
        }

        .custom-btn-request:hover{
            width: 100%;
            background-color: yellow;
            color: black;
        }

        .text-color-title{
            color: var(--main-color);
        }

        .note{
            font-weight: bold;
        }

        .disclaimer{
            font-style: italic;
        }
    </style>
</head>
<body>

<?php
    $query_two = "SELECT COUNT(business_registration.business_name) AS count, fire_inspection_request.isAccepted, fire_inspection_request.isDone, fire_inspection_request.inspection_schedule FROM business_registration INNER JOIN fire_inspection_request ON business_registration.business_id = fire_inspection_request.business_id WHERE business_registration.business_name = '$business_name'";
    $status = mysqli_query($conn, $query_two);
    if (mysqli_num_rows($status) > 0) {
      $row = mysqli_fetch_assoc($status);

      $count = $row['count'];
      $isAccepted = $row['isAccepted'];
      $isDone = $row['isDone'];
      $schedule = $row['inspection_schedule'];


      $timestamp = strtotime($schedule);
      $humanReadableDate = date("F j, Y", $timestamp);

      if ($count == 0 && $isAccepted == null) {
?>
<div class="container border p-4">
<h3>Request Form: <span class="text-color-title">Fire Safety Inspection Certificate</span></h3><br><br>
  <div class="row mb-4">
    <div class="col">
      <div data-mdb-input-init class="form-outline">
        <label class="form-label">Owner name</label>
        <input type="text" class="form-control" value="<?=$owner_name?>" readonly/>
      </div>
    </div>
    <div class="col">
      <div data-mdb-input-init class="form-outline">
        <label class="form-label">Establishment name</label>
        <input type="text" class="form-control" value="<?=$business_name?>" readonly/>
      </div>
    </div>
  </div>


  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label">Address</label>
    <input type="text" class="form-control" value="<?=$addresss?>" readonly/>
  </div>


  <div class="row mb-4">
    <div class="col">
      <div data-mdb-input-init class="form-outline">
        <label class="form-label">Contact number</label>
        <input type="text" class="form-control" value="<?=$phone?>" readonly/>
      </div>
    </div>
    <div class="col">
      <div data-mdb-input-init class="form-outline">
        <label class="form-label">Email address</label>
        <input type="text" class="form-control" value="<?=$email?>" readonly/>
      </div>
    </div>
  </div>
<br>
  <hr>
<br>
  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" for="representative">Authorized representative (If owner not available during inspection)</label>
    <input type="text" class="form-control" id="representative" placeholder="Enter name of authorized representative" onfocusout="inputValidation('#representative')" />
  </div>


  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" for="business_nature">Type of occupancy/business nature</label>
    <input type="text" class="form-control" id="business_nature" placeholder="Enter type of occupancy/tusiness nature" onfocusout="inputValidation('#business_nature')"/>
  </div>


  <div class="row mb-4">
    <div class="col">
      <div data-mdb-input-init class="form-outline">
        <label class="form-label" for="total_floor">Total floor area (M²)</label>
        <input type="text" class="form-control" id="total_floor" placeholder="Enter total floor area" onfocusout="inputValidation('#total_floor')"/>
      </div>
    </div>
    <div class="col">
      <div data-mdb-input-init class="form-outline">
        <label class="form-label" for="storey">Number of storey</label>
        <input type="text" class="form-control" id="storey" placeholder="Enter number of storey" onfocusout="inputValidation('#storey')"/>
      </div>
    </div>
  </div>
    <br>
  <p class="disclaimer"><span class="note">Note:</span> Please await our update regarding your inspection schedule. Inspections are scheduled based on availability and prioritization. Your patience and understanding are greatly appreciated. Thank you.</p>
<br>
  <button data-mdb-ripple-init type="button" class="btn btn-block mb-4 custom-btn-request" onclick="insertFireRequest()">Submit</button>
</div>
<?php
      }else if($count == 1 && $isAccepted == 0 && $isDone == 0){
        echo "<p>Wait for the approval and your schedule.</p>";
      }else if($count == 1 && $isAccepted == 1 && $isDone == 0){
?>
<div class="card">
  <div class="card-body">
    <p>Your request for Fire Safety Inspection Certificate is <span class="fw-bold text-danger">APPROVED</span>.</p>
    <p>Your schedule is <span class="fw-bold text-primary"><?=$humanReadableDate?></span>. Please be available for the inspector at any time on that date.</p>
  </div>
</div>

<?php
      }else{
        echo "<p>Your inspection is DONE. Get your Fire Safety Inspection Certificate tommorow on our office. Please bring additional documents and payment.</p>";
      }
    }
?>

</body>
</html>