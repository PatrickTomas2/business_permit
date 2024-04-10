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
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css'>
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
    <div class="text-center mb-5">
      <h3>Business Permit Applicants</h3>
    </div>
<?php
    $business_applicant = mysqli_query($conn, "SELECT * FROM business_registration INNER JOIN business_permit_request ON business_registration.business_id = business_permit_request.business_id INNER JOIN owner_information ON business_permit_request.owner_id = owner_information.owner_id WHERE business_permit_request.isDone_permit = 0;");

    if (mysqli_num_rows($business_applicant) > 0) {
        while ($row = mysqli_fetch_assoc($business_applicant)) {
        
?>
    <div class="card mb-3">
      <div class="card-body">
        <div class="d-flex flex-column flex-lg-row">
          <span class="avatar avatar-text rounded-3 me-4 mb-2">
            <?php
               if($row['business_type'] == 'Partnership'){
                echo "PS";
               }else if($row['business_type'] == 'Single'){
                echo "S";
               }else if($row['business_type'] == 'Corporation'){
                echo "CORP";
               }else if($row['business_type'] == 'Cooperative'){
                echo "COOP";
               };
            ?>
           </span>
          <div class="row flex-fill">
            <div class="col-sm-5">
              <h4 class="h5"><?php echo $row['business_name'];?></h4>
              <span class="badge bg-secondary">
                 <?php echo $row['owner_fname'] . ' ' . $row['owner_mname'] . ' ' . $row['owner_lname']; ?>
              </span> <br>
              <span class="badge bg-info">
                 <?php echo "#". $row['business_houseNumber'] . ' Zone ' . $row['business_zone'] . ' ' . $row['business_barangay']; ?>
              </span>
            </div>
            <div class="col-sm-4 py-2">
              <span class="badge bg-success"><?php echo $row['owner_contactNumber'];?></span>
              <span class="badge bg-success"><?php echo $row['business_phone'];?></span>
              <span class="badge bg-primary"><?php echo $row['business_email'];?></span>
              <span class="badge bg-primary"><?php echo $row['business_permit_request_date'];?></span>
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