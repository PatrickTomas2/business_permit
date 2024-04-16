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
    
    
    <title>Document</title>
</head>
<style>
body{
    background:#eee;
}

.card {
    box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: 1rem;
}

.card-body {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.5rem 1.5rem;
}
.avatar-text {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    background: #000;
    color: #fff;
    font-weight: 700;
}

.avatar {
    width: 3rem;
    height: 3rem;
}
.rounded-3 {
    border-radius: 0.5rem!important;
}
.mb-2 {
    margin-bottom: 0.5rem!important;
}
.me-4 {
    margin-right: 1.5rem!important;
}
</style>
<body>
<div class="container mt-3">
    
<?php
    $business_applicant = mysqli_query($conn, "SELECT * FROM business_registration INNER JOIN business_permit_request ON business_registration.business_id = business_permit_request.business_id INNER JOIN owner_information ON business_permit_request.owner_id = owner_information.owner_id WHERE business_permit_request.isDone_permit = 1;");

    if (mysqli_num_rows($business_applicant) > 0) {
?>
    <div class="text-center mb-5">
      <h3>Business Permit Approved Applicants</h3>
    </div>  
<?php

        while ($row = mysqli_fetch_assoc($business_applicant)) {
        $business_id = $row['business_id'];
        $permit_id = $row['permit_id'];
?>
 <div class="card mb-3">
    <div class="card-body">
        <div class="row align-items-center ps-5 pe-5">
            <div class="col-sm-9">
                <h4 class="h4 text-center text-sm-start"><?php echo $row['business_name']; ?></h4>
            </div>
            <div class="col-sm-3 text-lg-end">
                <div class="d-grid gap-2">
                <button type="button" class="btn btn-primary" onclick="showRenewalApplicantsDetails('<?php echo $business_id;?>')">SEE DETAILS</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }
  }else {
    echo "No applicants found.";
}
?>
    <!-- end -->
  </div>
  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'></script>
</body>
</html>