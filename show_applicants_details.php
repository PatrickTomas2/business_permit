<?php
    session_start();
    include 'config.php';

    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
    $business_id = $_GET['business_id'];

    $business_applicant = mysqli_query($conn, "SELECT * FROM business_registration INNER JOIN business_permit_request ON business_registration.business_id = business_permit_request.business_id INNER JOIN owner_information ON business_permit_request.owner_id = owner_information.owner_id WHERE business_permit_request.business_id = '$business_id';");

    if (mysqli_num_rows($business_applicant) > 0) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9c6f27a8d7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
    <style>
     .fixed-size-btn {
        width: 200px !important;
        height: 50px !important;
    }
    </style>
</head>
<body>
    <div class="d-style btn btn-brc-tp border-2 bgc-white btn-outline-blue btn-h-outline-blue btn-a-outline-blue w-100 my-2 py-3 shadow-sm align-items-center justify-content-center">
<?php
        while ($row = mysqli_fetch_assoc($business_applicant)) {
            $req1 = $row['requirement1'];
            $req2 = $row['requirement2'];
            $req3 = $row['requirement3'];
            $req4 = $row['requirement4'];
            $req5 = $row['requirement5'];
            $req6 = $row['requirement6'];
            $req7 = $row['requirement7'];
?>
       <div class="row align-items-center justify-content-center">
            <div class="col-12 col-md-4 text-center">
                <h4 class="pt-3 text-170 text-600 text-primary-d1 letter-spacing">
                    2x2 picture
                </h4>
                <div class="d-flex justify-content-center"> <!-- Center the image horizontally -->
                    <img src="<?php echo $req1; ?>" alt="Business Image "style="width: 400px; height: 400px;">
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <a href="download.php?file=<?php echo urlencode($req1); ?>" class="f-n-hover btn btn-info btn-raised px-4 py-25 w-75 text-600 fixed-size-btn">DOWNLOAD</a>
                </div>
            </div>
        </div>
        <hr>


        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-md-4 text-center">
                <h4 class="pt-3 text-170 text-600 text-primary-d1 letter-spacing">
                    BRGY CLEARANCE FROM RESIDENCE
                </h4>
                <div class="d-flex justify-content-center"> <!-- Center the image horizontally -->
                    <img src="<?php echo $req2; ?>" alt="Business Image" style="width: 300px; height: 400px;">
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <a href="download.php?file=<?php echo urlencode($req2); ?>" class="f-n-hover btn btn-info btn-raised px-4 py-25 w-75 text-600 fixed-size-btn">DOWNLOAD</a>
                </div>
            </div>
        </div>
        <hr>

        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-md-4 text-center">
                <h4 class="pt-3 text-170 text-600 text-primary-d1 letter-spacing">
                    BRGY RECOMMENDATION
                </h4>
                <div class="d-flex justify-content-center"> <!-- Center the image horizontally -->
                    <img src="<?php echo $req3; ?>" alt="Business Image" style="width: 300px; height: 400px;">
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <a href="download.php?file=<?php echo urlencode($req3); ?>" class="f-n-hover btn btn-info btn-raised px-4 py-25 w-75 text-600 fixed-size-btn">DOWNLOAD</a>
                </div>
            </div>
        </div>
        <hr>

        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-md-4 text-center">
                <h4 class="pt-3 text-170 text-600 text-primary-d1 letter-spacing">
                    ZONING CERTIFICATE
                </h4>
                <div class="d-flex justify-content-center"> <!-- Center the image horizontally -->
                    <img src="<?php echo $req; ?>" alt="Business Image" style="width: 300px; height: 400px;">
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <a href="download.php?file=<?php echo urlencode($req4); ?>" class="f-n-hover btn btn-info btn-raised px-4 py-25 w-75 text-600 fixed-size-btn">DOWNLOAD</a>
                </div>
            </div>
        </div>
        <hr>

        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-md-4 text-center">
                <h4 class="pt-3 text-170 text-600 text-primary-d1 letter-spacing">
                    SANITARY PERMIT
                </h4>
                <div class="d-flex justify-content-center"> <!-- Center the image horizontally -->
                    <img src="<?php echo $req5; ?>" alt="Business Image" style="width: 300px; height: 400px;">
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <a href="download.php?file=<?php echo urlencode($req5); ?>" class="f-n-hover btn btn-info btn-raised px-4 py-25 w-75 text-600 fixed-size-btn">DOWNLOAD</a>
                </div>
            </div>
        </div>
        <hr>

        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-md-4 text-center">
                <h4 class="pt-3 text-170 text-600 text-primary-d1 letter-spacing">
                    FIRE PERMIT
                </h4>
                <div class="d-flex justify-content-center"> <!-- Center the image horizontally -->
                    <img src="<?php echo $req6; ?>" alt="Business Image" style="width: 300px; height: 400px;">
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <a href="download.php?file=<?php echo urlencode($req6); ?>" class="f-n-hover btn btn-info btn-raised px-4 py-25 w-75 text-600 fixed-size-btn">DOWNLOAD</a>
                </div>
            </div>
        </div>
        <hr>

        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-md-4 text-center">
                <h4 class="pt-3 text-170 text-600 text-primary-d1 letter-spacing">
                    CEDULA
                </h4>
                <div class="d-flex justify-content-center"> <!-- Center the image horizontally -->
                    <img src="<?php echo $req7; ?>" alt="Business Image" style="width: 300px; height: 400px;">
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <a href="download.php?file=<?php echo urlencode($req7); ?>" class="f-n-hover btn btn-info btn-raised px-4 py-25 w-75 text-600 fixed-size-btn">DOWNLOAD</a>
                </div>
            </div>
        </div>
        <hr>
        <hr>

        
        
<?php
        }
?>
            <div class="row align-items-center justify-content-center mt-4">
                <div class="col-12 col-md-4 text-center">
                    <button type="button" class="f-n-hover btn btn-success btn-raised px-4 py-25 w-75 text-600" onclick="showApplicantsOwner('<?php echo $business_id;?>')">NEXT</button>
                </div>
            </div>
    </div>
</body>
</html>
<?php
    }
?>
