<?php
    session_start();
    include '../config.php';

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
    <title>Document</title>
    <script src="js/jquery-3.3.1.js?ver=001"></script>
    <script src="js/apply_permit.js?ver=005"></script>
</head>
<body>
<?php
    if ($message == "No active business") {
        echo "<p>Register your business first.</p>";
    }else {
        $select_user_info = mysqli_query($conn, "SELECT * FROM owner_information INNER JOIN business_registration ON owner_information.owner_id = business_registration.owner_id WHERE owner_information.owner_id='$user_id' AND business_registration.business_name ='$user_business'");
        if (mysqli_num_rows($select_user_info) > 0) {
            while ($row = mysqli_fetch_assoc($select_user_info)) {
                $business_id = $row['business_id'];
            }
        }
?>
<div class="container">
    <h2>Business Permit Application</h2>
    <h3>Active Business: <?=$user_business?> </h3>
    <p>"Attention Business Owners: Secure Your Legitimacy with a Business Permit! Ensure Legal Compliance and Safeguard Your Operations. Apply Today!"</p><br><br>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card" style="width: 20rem;">
                <img class="card-img-top" src="assets/images/application.webp" alt="Car cap">
                <div class="card-body">
                    <h5 class="card-title">Business Permit Application</h5>
                    <p class="card-text">Get a business permit to ensure legal compliance and protect your business from potential penalties or closures.</p>
                    <center>
                    <button class="btn btn-primary" onclick="showApplicationForm('<?=$business_id?>')">Application</button>
                    </center>
                    <!-- <a href="#" class="btn btn-primary"></a> -->
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="content-holder-application">
    </div>
    <?php
    }
?>
</body>
</html>