<?php
    session_start();
    include '../config.php';

    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="content-owner/permit.css">
    <title>Permit</title>
</head>
<body>
    <h1>This is for permit</h1>
    <div class="container">
    <div class="row">
        <?php
        $query = "SELECT business_registration.business_name FROM business_registration INNER JOIN owner_information ON business_registration.owner_id = owner_information.owner_id WHERE owner_information.owner_id = '$user_id'";
        $select_owner_business = mysqli_query($conn, $query);
        $count = 0;
        if (mysqli_num_rows($select_owner_business) > 0) {
            while ($row = mysqli_fetch_assoc($select_owner_business)) {
                $business_name = $row['business_name'];
                ?>
                    <div class="cube">
                        <div class="card">
                            <div class="card-body">
                                <?=$business_name?>
                            </div>
                        </div>
                    </div>
                <?php
                $count++;
            }
        } else {
            ?>
            <div class="col-md-6">
                <p>Add your business</p>
            </div>
            <?php
        }
        ?>
    </div>
</div>
        
</body>
</html>