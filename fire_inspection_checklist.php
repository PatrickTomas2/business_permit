<?php

$business_name = $_GET['business_name'];
$checklistItems = [
  "general_exterior" => [
    "title" => "General Building - Exterior",
    "items" => [
      "Is the building address clearly visible from the road with contrasting colors?",
      "Are fire lanes clearly marked and unobstructed by parked vehicles or debris?",
      "Is there at least one meter of clearance around fire hydrants?",
    ],
  ],
  "general_interior" => [
    "title" => "General Building - Interior",
    "items" => [
      "Are all exits clearly marked and easily identifiable with proper signage?",
      "Are exit doors unlocked during business hours and free from obstructions (curtains, furniture)?",
      "Electrical panels free from storage",
      "Gas cylinders properly secured",
      "Is there a designated smoking area away from flammable materials?",
    ],
  ],
  "fire_alarm_systems" => [
    "title" => "Fire Alarm Systems",
    "items" => [
      "Is the fire alarm system in working order and tested monthly?",
      "Has the fire alarm system been inspected and serviced by a qualified professional within the last year?",
      "Are there documented records of all maintenance and inspections for the fire alarm system?",
    ],
  ],
  "fire_extinguishers" => [
    "title" => "Fire Extinguishers",
    "items" => [
      "Does the business have a sufficient number and type of fire extinguishers for the potential hazards present? (A minimum of a 2A10BC extinguisher is recommended)",
      "Are all fire extinguishers fully charged and inspected monthly?",
      "Have all fire extinguishers been serviced annually and tagged by a qualified professional?",
      "Are fire extinguishers located within 75 feet (25 meters) of any point in the business?",
      "Are fire extinguishers mounted at an accessible height (no higher than 1.5 meters)?",
    ],
  ],
  "emergency_preparedness" => [
    "title" => "Emergency Preparedness",
    "items" => [
      "Does the business have a written fire safety plan outlining evacuation procedures and designated assembly points?",
      "Have all employees been trained on the fire safety plan and evacuation procedures?",
      "Are fire drills conducted regularly to ensure employee familiarity with the plan?",
      "Are there clear procedures for reporting fires and contacting emergency services?",
    ],
  ],
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="js/jquery-3.3.1.js?ver=001"></script>
  <script src="js/fire_checklist.js?ver=002"></script>
  <title>Inspection Checklist</title>
  <style>
    :root{
    --main-color: #FAD602;
    }

    .container {
      margin: 0 auto;
      max-width: 1500px;
      padding: 30px;
      background-color: white;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
      border-radius: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      border: solid #ddd 1px;
    }
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: var(--main-color);
    }
    textarea{
      width: 100%;
    }
    .button-custom {
      width: 50%;
      height: 40px;
      background-color: var(--main-color);
      margin-left: auto;
      margin-right: auto;
      display: block;
      margin-top: 30px;
    }

  </style>
  <!-- <script>
    function toggleCheckbox(checkboxId) {
      var otherCheckboxId = checkboxId.includes('yes') ? checkboxId.replace('yes', 'no') : checkboxId.replace('no', 'yes');
      var otherCheckbox = document.getElementById(otherCheckboxId);
      if (document.getElementById(checkboxId).checked) {
        otherCheckbox.disabled = true;
      } else {
        otherCheckbox.disabled = false;
      }
    }
  </script> -->
</head>
<header class="bg-white shadow d-flex align-items-center px-3 py-2">
  <div>
    <img src="assets/images/santo_tomas_logo.png" alt="Logo" class="img-fluid m-1" style="max-height: 80px;">
  </div>
  <h3 class="m-2">Santo Tomas Business Permit System</h3>
  <div>
    <!-- Any additional content on the right side of the header -->
  </div>
</header>

<body>
  <br><br>
<div class="container">
  <form method="post">
    <h3><label for="business_name">Business Name:</label></h3>

    <input type="text" value="<?=$business_name?>" class="form-control" readonly><br>

    <table>
      <tr>
        <th>Item</th>
        <th>YES</th>
        <th>NO</th>
      </tr>
      <?php foreach ($checklistItems as $section => $data): ?>
        <tr>
          <td colspan="3"><strong><?php echo $data['title']; ?></strong></td>
        </tr>
        <?php foreach ($data['items'] as $item): ?>
          <tr>
            <td><?php echo $item; ?></td>
            <td><input class="form-check-input checkbox fs-4" type="checkbox" name="yes _<?php echo $item; ?>" id="yes _<?php echo $item; ?>" onclick="toggleCheckbox('yes _<?php echo $item; ?>')"></td>
            <td><input class="form-check-input checkbox fs-4" type="checkbox" name="no _<?php echo $item; ?>" id="no _<?php echo $item; ?>" onclick="toggleCheckbox('no _<?php echo $item; ?>')"></td>
          </tr>
        <?php endforeach; ?>
      <?php endforeach; ?>
    </table>
    <br>

    <div class="row justify-content-end">
    <div class="col-auto">
        <label for="checklist" class="fs-4 fw-bold">Check All: </label>
        <input type="checkbox" id="check-all" class="form-check-input checkbox fs-4" onclick="checkAll()">
    </div>
</div>


    <h5>Recommendations: </h5>
    <textarea name="recomendation" id="recommendation" cols="30" rows="10"></textarea>
  </form>

  <button class="btn btn-primary border-0 button-custom" onclick="saveToggledIds('<?=$business_name?>')">Save</button>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
