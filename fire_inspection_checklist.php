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
  <script src="js/jquery-3.3.1.js?ver=001"></script>
  <script src="js/fire_checklist.js?ver=001"></script>
  <title>Fire Safety Inspection Checklist</title>
  <style>
    :root{
    --main-color: #FAD602;
    }

    .container {
      margin: 0 auto;
      max-width: 900px;
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
    button {
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
<body>
<div class="container">
<h1>Fire Safety Inspection Checklist</h1>
  <form method="post">
    <label for="business_name">Business Name:</label>
    <input type="text" value="<?=$business_name?>" readonly><br><br>

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
            <td><input type="checkbox" name="yes _<?php echo $item; ?>" id="yes _<?php echo $item; ?>" onclick="toggleCheckbox('yes _<?php echo $item; ?>')"></td>
            <td><input type="checkbox" name="no _<?php echo $item; ?>" id="no _<?php echo $item; ?>" onclick="toggleCheckbox('no _<?php echo $item; ?>')"></td>
          </tr>
        <?php endforeach; ?>
      <?php endforeach; ?>
    </table>
    <br>
    <h5>Recommendations: </h5>
    <textarea name="recomendation" id="recommendation" cols="30" rows="10"></textarea>
  </form>

  <button onclick="saveToggledIds('<?=$business_name?>')">Save</button>
</div>
</body>
</html>
