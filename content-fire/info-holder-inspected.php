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

    $query_one = "SELECT business_id FROM business_registration WHERE business_name = '$business'";
    $select_business_id = mysqli_query($conn, $query_one);
    if (mysqli_num_rows($select_business_id) > 0) {
        $row = mysqli_fetch_assoc($select_business_id);
        $business_id = $row['business_id'];
    }

    $query_two = "SELECT * FROM fire_safety_checklist INNER JOIN business_registration ON fire_safety_checklist.business_id = business_registration.business_id WHERE business_registration.business_id = '$business_id'";
    $select_inspection_result = mysqli_query($conn, $query_two);
    if (mysqli_num_rows($select_inspection_result) > 0) {
        $result = mysqli_fetch_assoc($select_inspection_result);

        $abuilding_address_visible = $result['building_address_visible'];
        $bfire_lanes_clear = $result['fire_lanes_clear'];
        $cfire_hydrant_clearance = $result['fire_hydrant_clearance'];
        $dexits_marked = $result['exits_marked'];
        $eexits_unlocked = $result['exits_unlocked'];
        $felectrical_panels_clear = $result['electrical_panels_clear'];
        $ggas_cylinders_secured	 = $result['gas_cylinders_secured'];
        $hsmoking_area_designated = $result['smoking_area_designated'];
        $ifire_alarm_working = $result['fire_alarm_working'];
        $jfire_alarm_tested = $result['fire_alarm_tested'];
        $kfire_alarm_inspected = $result['fire_alarm_inspected'];
        $lfire_extinguishers_sufficient = $result['fire_extinguishers_sufficient'];
        $mfire_extinguishers_charged_inspected = $result['fire_extinguishers_charged_inspected'];
        $nfire_extinguishers_serviced = $result['fire_extinguishers_serviced'];
        $ofire_extinguishers_location = $result['fire_extinguishers_location'];
        $pfire_extinguishers_mounted = $result['fire_extinguishers_mounted'];
        $qfire_safety_plan = $result['fire_safety_plan'];
        $remployees_trained = $result['employees_trained'];
        $sfire_drills_conducted = $result['fire_drills_conducted'];
        $treporting_procedures = $result['reporting_procedures'];

        $recommendation = $result['recommendation'];



        $inspection_date = $result['inspection_date'];
        $human_readable_date_time = date("F j, Y, g:i a", strtotime($inspection_date));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .fixed-height-table tbody {
        display: block;
        height: auto;
    }

    .fixed-height-table thead,
    .fixed-height-table tbody tr {
        display: table;
        width: 100%;
        table-layout: fixed;
    }

    #textarea-recommendation{
      width: 100%;
      height: auto;
      min-height: 50px;
      resize: vertical;
    }
</style>
</head>
<body>
<?php
  $checklist = [
    "Is the building address clearly visible from the road with contrasting colors?" => $abuilding_address_visible,
    "Are fire lanes clearly marked and unobstructed by parked vehicles or debris?" => $bfire_lanes_clear,
    "Is there at least one meter of clearance around fire hydrants?" => $cfire_hydrant_clearance,
    "Are all exits clearly marked and easily identifiable with proper signage?" => $dexits_marked,
    "Are exit doors unlocked during business hours and free from obstructions (curtains, furniture)?" => $eexits_unlocked,
    "Electrical panels free from storage" => $felectrical_panels_clear,
    "Gas cylinders properly secured" => $ggas_cylinders_secured,
    "Is there a designated smoking area away from flammable materials?" => $hsmoking_area_designated,
    "Is the fire alarm system in working order and tested monthly?" => $ifire_alarm_working,
    "Has the fire alarm system been inspected and serviced by a qualified professional within the last year?" => $jfire_alarm_tested,
    "Are there documented records of all maintenance and inspections for the fire alarm system?" => $kfire_alarm_inspected,
    "Does the business have a sufficient number and type of fire extinguishers for the potential hazards present? (A minimum of a 2A10BC extinguisher is recommended)" => $lfire_extinguishers_sufficient,
    "Are all fire extinguishers fully charged and inspected monthly?" => $mfire_extinguishers_charged_inspected,
    "Have all fire extinguishers been serviced annually and tagged by a qualified professional?" => $nfire_extinguishers_serviced,
    "Are fire extinguishers located within 75 feet (25 meters) of any point in the business?" => $ofire_extinguishers_location,
    "Are fire extinguishers mounted at an accessible height (no higher than 1.5 meters)?" => $pfire_extinguishers_mounted,
    "Does the business have a written fire safety plan outlining evacuation procedures and designated assembly points?" => $qfire_safety_plan,
    "Have all employees been trained on the fire safety plan and evacuation procedures?" => $remployees_trained,
    "Are fire drills conducted regularly to ensure employee familiarity with the plan?" => $sfire_drills_conducted,
    "Are there clear procedures for reporting fires and contacting emergency services?" => $treporting_procedures
];


?>
    <hr>
<div class="card border-0">
  <div class="card-body">
  <table class="table table-striped fixed-height-table">
  <thead>
    <tr>
    <th style="width: 80%;"><h4>Checklist</h4></th>
    <th style="width: 20%;"><h4>Status</h4></th>
    </tr>
  </thead>
  <tbody>
<?php
    foreach ($checklist as $question => $status) {
?>
  <tr>
      <td style="width: 80%;"><?=$question?></td>
      <td style="width: 20%;"><img src="<?php echo $status == 1 ? 'assets/images/check-icon.png' : 'assets/images/cross-icon.png';?>" alt="status" height="30" width="30"></td>
  </tr>
<?php
    }
?>
  </tbody>
</table>
<br>
<textarea id="textarea-recommendation" cols="20" rows="5" readonly>
  <?php echo $recommendation != "" ? $recommendation : "No comment/recommendation."?>
</textarea>

    <br>
    <p class="fw-bold">Request date: <span class="fw-normal"><?=$human_readable_date_time?></span></p>
    <br>
    <button class="btn btn-danger" onclick="closeInfo('<?=$business_name?>')">Close</button>
  </div>
</div>
</body>
</html>