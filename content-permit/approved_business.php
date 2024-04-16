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
    $business_id = $_GET['business_id'];
    
    

    $select_user_info = mysqli_query($conn, "SELECT owner_information.owner_fname, owner_information.owner_mname, owner_information.owner_lname, owner_information.owner_address, owner_information.owner_contactNumber, business_registration.business_name, business_registration.business_houseNumber, business_registration.business_barangay, business_registration.business_zone, business_registration.business_type, business_registration.business_phone, business_registration.business_email, business_permit_request.permit_id,  business_permit_request.approved_date FROM business_permit_request INNER JOIN business_registration ON business_permit_request.business_id = business_registration.business_id 
    INNER JOIN owner_information ON business_registration.owner_id = owner_information.owner_id WHERE business_permit_request.business_id = '$business_id';");

    if (mysqli_num_rows($select_user_info) > 0) {
        while ($row = mysqli_fetch_assoc($select_user_info)) {
            $fname = $row['owner_fname'];
            $mname = $row['owner_mname'];   
            $lname = $row['owner_lname'];
            $address = $row['owner_address'];
            $contactNumber = $row['owner_contactNumber'];
            $businessName = $row['business_name'];
            $businessType = $row['business_type'];
            $businessHouseNum = $row['business_houseNumber'];
            $businessZone = $row['business_zone'];
            $businessBrgy = $row['business_barangay'];
            $businessPhone = $row['business_phone'];
            $businessEmail = $row['business_email'];
            $permit_id = $row['permit_id'];
            $approved_date = $row['approved_date'];
            echo $approved_date;
           
        }
    }
    
   
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
.form-control{
    font-weight: bold;
}
</style>
<body>
<div class="container-fluid">
  <div class="container">
   
    <div class="d-flex justify-content-center align-items-lg-center py-3 flex-column flex-lg-row">
      <h2 class="h5 mb-3 mb-lg-0">INFORMATION</h2>
    </div>
    
    <div class="row justify-content-center"> 
      
      <div class="col-lg-8">
        
        <div class="card mb-4">
          <div class="card-body">
            <h3 class="h6 mb-4">Owner information</h3>
            <div class="row">
              <div class="col-lg-4">
                <div class="mb-3">
                  <label class="form-label">First name</label>
                  <input type="text" class="form-control" value="<?php echo $fname?>" readonly>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="mb-3">
                  <label class="form-label">Middle name</label>
                  <input type="text" class="form-control" value="<?php echo $mname?>" readonly>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="mb-3">
                  <label class="form-label">Last name</label>
                  <input type="text" class="form-control" value="<?php echo $lname?>" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Address</label>
                  <input type="email" class="form-control" value="<?php echo $address?>" readonly>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Phone number</label>
                  <input type="text" class="form-control" value="<?php echo $contactNumber?>" readonly>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="card mb-4">
          <div class="card-body">
            <h3 class="h6 mb-4">Business information</h3>
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label">Business Name</label>
                        <input type="text" class="form-control" value="<?php echo $businessName?>" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label">Business Type</label>
                        <input type="text" class="form-control" value="<?php echo $businessType?>" readonly>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-3">
                    <div class="mb-3">
                        <label class="form-label">House No.</label>
                        <input type="text" class="form-control" value="<?php echo $businessHouseNum?>" readonly>
                    </div>
                </div>
                <div class="col-3">
                    <div class="mb-3">
                        <label class="form-label">Zone</label>
                        <input type="text" class="form-control" value="<?php echo $businessZone?>" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label">Barangay</label>
                        <input type="text" class="form-control" value="<?php echo $businessBrgy?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" value="<?php echo $businessEmail?>" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" class="form-control" value="<?php echo $businessPhone?>" readonly>
                    </div>
                </div>
            </div>
          </div>
        </div>

        <div class="card mb-4">
          <div class="card-body">
            <h3 class="h6 mb-4">Business Permit Approved Date: <?php echo $approved_date?> </h3>
        </div>

      </div>
    </div>
            <div class="row align-items-center justify-content-center mt-4">
                <div class="col-12 col-md-4 text-center">
                    <button type="button" class="f-n-hover btn btn-success btn-raised px-4 py-25 w-75 text-600" onclick="showPermitHome()">DONE</button>
                </div>
            </div>
  </div>
</div>
</body>
</html>