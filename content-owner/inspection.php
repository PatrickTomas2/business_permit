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
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/inspection.js"></script>
    <title>Document</title>
</head>
<body>
<?php
    if ($message == "No active business") {
        echo "<p>Register your business first.</p>";
    }else {
?>
<div class="container">
    <h3>Request for inspection here: <?=$user_business?></h3>
    <p>Request now to get <strong>Fire Safety Inspection Certificate</strong> and <strong>Sanitary Inspection Certificate</strong>.</p><br><br>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="assets/images/fire-inspection.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Fire Safety Inspection</h5>
                    <p class="card-text">Ensure your property's safety with a professional fire safety inspection today.</p>
                    <button class="btn btn-primary" onclick="showFireRequestForm()">Request for inspection</button>
                    <!-- <a href="#" class="btn btn-primary"></a> -->
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="assets/images/sanitary-inspection.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Sanitary Inspection</h5>
                    <p class="card-text">Maintain a clean and healthy environment with a professional sanitary inspection.</p>
                    <button class="btn btn-primary" onclick="showSanitaryRequestForm()">Request for inspection</button>
                </div>
            </div>
        </div>
        <!-- <div class="col">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="assets/images/building-inspection.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Building Inspection</h5>
                    <p class="card-text">Ensure your building's safety and compliance with a professional building inspection.</p>
                    <a href="#" class="btn btn-primary">Request for inspection</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="assets/images/electrical-inspection.jpeg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Electrical Inspection</h5>
                    <p class="card-text">Ensure the safety of your property with a thorough electrical inspection.</p>
                    <a href="#" class="btn btn-primary">Request for inspection</a>
                </div>
            </div>
        </div> -->
    </div>
    <br><br>
    <div class="content-holder-inspection">
    </div>
<?php
    }
?>



</body>
</html>