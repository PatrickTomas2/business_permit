<?php
    session_start();
    include '../../config.php';

    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }

    $message = '';
    $user_business;
    if (!isset($_SESSION['user_business'])) {
        $message = 'No active business';
    }else {
        $user_business = $_SESSION['user_business'];
        $message = $user_business;
    }

    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/active_business.js"></script>
    <style>
        :root{
            --main-color: #5BBCFF;
        }
        .custom-button-color{
            background-color: var(--main-color);
        }
        .active-text {
            color: green;
            text-align: center;
        }
        .text-center {
             text-align: center;
        }

    </style>
</head>
<body>
<?php
    if ($message == "No active business") {
        echo '<p style="color: red;">Register your business</p>';
    }

    $query = "SELECT business_registration.business_name FROM business_registration INNER JOIN owner_information ON business_registration.owner_id = owner_information.owner_id WHERE owner_information.owner_id = '$user_id'";
    $select_owner_business = mysqli_query($conn, $query);
    if (mysqli_num_rows($select_owner_business) > 0) {
        while ($row = mysqli_fetch_assoc($select_owner_business)) {
            $business_name = $row['business_name'];

            if ($user_business == $business_name) {
?>
            <div class="card">
                <div class="card-body custom-button-color text-center">
                    <button class="btn fw-bold fs-5  active-text" onclick="switchActiveBusiness('<?=$business_name?>')"><?=$business_name?> </button>
                </div>
            </div>
            <br>
<?php
            }else {
?>
            <div class="card">
                <div class="card-body">
                    <button class="btn" onclick="switchActiveBusiness('<?=$business_name?>')"><?=$business_name?></button>
                </div>
            </div>
            <br>
<?php
            }
        }
    }
?>
</body>
</html>