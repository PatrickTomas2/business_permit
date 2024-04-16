<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $business_name = $_POST['business_name'];
    $select_business_id = mysqli_query($conn, "SELECT business_id FROM business_registration WHERE business_name = '$business_name'");
    if (mysqli_num_rows($select_business_id) > 0) {
        $row = mysqli_fetch_assoc($select_business_id);

        $business_id = $row['business_id'];
    }


    $recommendation = $_POST['recommendation'];

    $toggledIds = json_decode($_POST['toggledIds'], true);

    for ($i = 0; $i < 15; $i++) {
        ${"value" . ($i + 1)} = explode(' ', $toggledIds[$i])[0];
        

            if (${"value" . ($i + 1)} == 'yes') {
                ${"value" . ($i + 1)} = 1;
            } else if (${"value" . ($i + 1)} == 'no') {
                ${"value" . ($i + 1)} = 0;
            }
    }

    $values = "'" . $business_id . "'";
    for ($i = 1; $i <= 15; $i++) {
        $values .= ", '" . ${"value" . $i} . "'";
    }

    $sql = "INSERT INTO sanitary_checklist VALUES ('', $values, '$recommendation', NOW())";
    $insert_sanitary_inspection = mysqli_query($conn, $sql);

    if ($insert_sanitary_inspection) {
        $sql_two = "UPDATE sanitary_inspection_request INNER JOIN business_registration ON sanitary_inspection_request.business_id = business_registration.business_id SET sanitary_inspection_request.isDone = '1' WHERE business_registration.business_name = '$business_name'";
        $update_fire_request = mysqli_query($conn, $sql_two);
        if ($update_fire_request) {
            echo "Inspected successfully";
        }
    }else {
        echo "Error in inserting";
    }


} else {
    // Request is not a POST request
    echo "This script expects a POST request";
}
?>
