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

    $select_user_info = mysqli_query($conn, "SELECT * FROM owner_information INNER JOIN business_registration ON owner_information.owner_id = business_registration.owner_id WHERE owner_information.owner_id='$user_id' AND business_registration.business_name ='$user_business'");
    if (mysqli_num_rows($select_user_info) > 0) {
        while ($row = mysqli_fetch_assoc($select_user_info)) {
            $business_id = $row['business_id'];
        }
    }
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/jquery-3.3.1.js?ver=001"></script>
    <script src="js/apply_permit.js?ver=003"></script>
</head>
<body>
<div class="container">
    <h2>Business Permit Application or Renewal: <?=$user_business?></h2>
    <p>Applying for a business permit is essential to legally operate your business, ensuring compliance with local regulations and protecting your operations from potential fines or closures.</p><br><br>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card" style="width: 18rem;">
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
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="assets/images/renewal.webp" alt="Card  cap">
                <div class="card-body">
                    <h5 class="card-title">Business Permit Renewal</h5>
                    <p class="card-text">Renew your business permit to maintain legal compliance and ensure uninterrupted operations, safeguarding against any penalties.</p>
                    <center>
                    <button class="btn btn-primary" onclick="showSanitaryRequestForm()">Renewal</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="content-holder-application">
    </div>
</body>
</html>