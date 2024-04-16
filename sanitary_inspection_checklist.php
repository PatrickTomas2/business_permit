<?php

$business_name = $_GET['business_name'];
$checklistItems = [
    "general_cleanliness" => [
        "title" => "General Cleanliness",
        "items" => [
            "Are all areas of the premises clean and free from dirt, dust, and debris?",
            "Are garbage and waste properly stored and disposed of?",
            "Are cleaning supplies stored properly and away from food and food preparation areas?",
        ],
    ],
    "pest_control" => [
        "title" => "Pest Control",
        "items" => [
            "Is there evidence of pest infestation (e.g., droppings, nests) in the premises?",
            "Are all openings to the outside (e.g., doors, windows) properly sealed to prevent pests from entering?",
            "Is food stored in sealed containers to prevent contamination by pests?",
        ],
    ],
    "food_handling" => [
        "title" => "Food Handling",
        "items" => [
            "Are food handlers practicing proper hygiene (e.g., washing hands, wearing gloves)?",
            "Is food stored at the correct temperature to prevent spoilage and contamination?",
            "Are food preparation areas clean and sanitized?",
        ],
    ],
    "sanitary_facilities" => [
        "title" => "Sanitary Facilities",
        "items" => [
            "Are there adequate handwashing facilities with soap, water, and paper towels?",
            "Are there sufficient toilets for employees and customers, kept clean and in working order?",
            "Are there proper facilities for storing and disposing of sanitary napkins and diapers?",
        ],
    ],
    "water_supply" => [
        "title" => "Water Supply",
        "items" => [
            "Is the water supply safe and free from contamination?",
            "Are there backflow prevention devices installed on all water lines connected to the public water supply?",
            "Are water tanks and reservoirs clean and properly maintained?",
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
  <script src="js/sanitary_checklist.js?ver=003"></script>
  <title>Sanitary Inspection</title>
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
    .button-custom{
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
