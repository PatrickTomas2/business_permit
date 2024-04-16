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

    $query_two = "SELECT * FROM sanitary_checklist INNER JOIN business_registration ON sanitary_checklist.business_id = business_registration.business_id WHERE business_registration.business_id = '$business_id'";
    $select_inspection_result = mysqli_query($conn, $query_two);
    if (mysqli_num_rows($select_inspection_result) > 0) {
        $result = mysqli_fetch_assoc($select_inspection_result);

        $apremises_clean = $result['premises_clean'];
        $bwaste_disposal = $result['waste_disposal'];
        $cproper_storage = $result['proper_storage'];
        $dpest_infestation = $result['pest_infestation'];
        $esealed_openings = $result['sealed_openings'];
        $fsealed_food_storage = $result['sealed_food_storage'];
        $ghygiene_practices	 = $result['hygiene_practices'];
        $hfood_storage = $result['food_storage'];
        $ifood_preparation = $result['food_preparation'];
        $jhandwashing_facilities = $result['handwashing_facilities'];
        $ksufficient_toilets = $result['sufficient_toilets'];
        $lsanitary_facilities_storage = $result['sanitary_facilities_storage'];
        $msafe_water_supply = $result['safe_water_supply'];
        $nbackflow_prevention = $result['backflow_prevention'];
        $oclean_water_tanks = $result['clean_water_tanks'];

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
    "Are all areas of the premises clean and free from dirt, dust, and debris?" => $apremises_clean,
    "Are garbage and waste properly stored and disposed of?" => $bwaste_disposal,
    "Are cleaning supplies stored properly and away from food and food preparation areas?" => $cproper_storage,
    "Is there evidence of pest infestation (e.g., droppings, nests) in the premises?" => $dpest_infestation,
    "Are all openings to the outside (e.g., doors, windows) properly sealed to prevent pests from entering?" => $esealed_openings,
    "Is food stored in sealed containers to prevent contamination by pests?" => $fsealed_food_storage,
    "Are food handlers practicing proper hygiene (e.g., washing hands, wearing gloves)?" => $ghygiene_practices,
    "Is food stored at the correct temperature to prevent spoilage and contamination?" => $hfood_storage,
    "Are food preparation areas clean and sanitized?" => $ifood_preparation,
    "Are there adequate handwashing facilities with soap, water, and paper towels?" => $jhandwashing_facilities,
    "Are there sufficient toilets for employees and customers, kept clean and in working order?" => $ksufficient_toilets,
    "Are there proper facilities for storing and disposing of sanitary napkins and diapers?" => $lsanitary_facilities_storage,
    "Is the water supply safe and free from contamination?" => $msafe_water_supply,
    "Are there backflow prevention devices installed on all water lines connected to the public water supply?" => $nbackflow_prevention,
    "Are water tanks and reservoirs clean and properly maintained?" => $oclean_water_tanks
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