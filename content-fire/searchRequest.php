<?php
    session_start();
    include '../config.php';

    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];

    $filter = "";

    if (isset($_GET['search_business_name'])) {
        $search_business_name = $_GET['search_business_name'];
        $filter .= "AND business_registration.business_name LIKE '%$search_business_name%'";
    }

    if (isset($_GET['request_start_date']) && isset($_GET['request_end_date'])) {
        $request_start_date = $_GET['request_start_date'];
        $request_end_date = $_GET['request_end_date'];

        $filter .= "AND (fire_inspection_request.request_date_time BETWEEN '$request_start_date' AND '$request_end_date')";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .card-custom-style {
            width: 100%;
        }
    </style>
</head>
<body>
<?php
    $query = "SELECT business_registration.business_name FROM business_registration INNER JOIN fire_inspection_request ON business_registration.business_id = fire_inspection_request.business_id WHERE fire_inspection_request.isAccepted = '0' $filter ORDER BY fire_inspection_request.request_date_time DESC";
    $select_request = mysqli_query($conn, $query);
    if (mysqli_num_rows($select_request) > 0) {
        while ($row = mysqli_fetch_assoc($select_request)) {
            $business_name = $row['business_name'];

?>
    <div class="card border-0 shadow m-3 card-custom-style">
        <div class="card-body">
            <a href="#" style="text-decoration: none; color: black;" onclick="infoHolder('<?=$business_name?>')">
            <p class="fw-bold fs-4 ms-5 d-flex justify-content-between align-items-center"><?=$business_name?>
            <span><button class="btn btn-info m-3" style="height: 50px; width: 100px;" id="businessModalLink" data-bs-toggle="modal" data-bs-target="#businessModal" onclick="setBusiness('<?=$business_name?>')">Accept</button>
            </span></p></a>
            <div class="m-5" id="<?= str_replace(' ', '-', $business_name) ?>-info-holder"></div>
        </div>
    </div>
    <!-- <a href="#" id="businessModalLink" data-bs-toggle="modal" data-bs-target="#businessModal" class="add-business-link"><i class="fa fa-plus"></i>&nbsp;Add Business</span></a> -->
    <div class="modal fade" id="businessModal" tabindex="-1" aria-labelledby="businessModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-error-title modal-title fw-bold" id="businessModalLabel">Select schedule for inspection</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="businessRegistrationForm" >
                        <div class="mb-3">
                            <label for="request_date">Date: </label>
                            <input type="date" id="request_date" name="request_date" class="form-control" required>
                        </div>
                        <br>
                        <div class="text-center">
                            <button class="btn btn-info" onclick="acceptRequest()">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
        }
    }else {
        echo "<p>No available request.</p>";
    }
?>

<script>
  const currentDate = new Date().toISOString().split('T')[0];

  document.getElementById('request_date').min = currentDate;
</script>

</body>
</html>