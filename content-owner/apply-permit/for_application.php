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
    

    $select_user_info = mysqli_query($conn, "SELECT * FROM owner_information INNER JOIN business_registration ON owner_information.owner_id = business_registration.owner_id WHERE owner_information.owner_id='$user_id' AND business_registration.business_name ='$user_business'");
    if (mysqli_num_rows($select_user_info) > 0) {
        while ($row = mysqli_fetch_assoc($select_user_info)) {
            $business_id = $row['business_id'];
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
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="js/jquery-3.3.1.js?ver=001"></script>
    <script src="js/apply_permit.js?ver=006"></script>
    <title>Register</title>
    <style>
        .back-button{
            background-color: red;
        }
    </style>
</head>
<body>

<body>
    
  <div class="wrapper">
    <div class="container main">

    <div class="terms-info">
                        <center>
                        <h3>TERMS AND CONDITIONS</h3>
                        </center>
                        <br>    
                        <div class="row justify-content-center">
                        
                            <div class="col-2" style="text-align: right;">
                                <input class="form-check-input" type="checkbox" id="recordTrue">
                            </div>
                            <div class="col-6">
                                <label class="form-check-label" for="recordTrue">
                                    
                                    I declare under penalty of perjury that the information provided herein is true to the best of my knowledge and based on authentic records. Furthermore, I agree to adhere to any regulatory requirements and address any deficiencies within 30 days from the issuance of the business permit.
                                </label>
                            </div>
                            <div class="col-2"></div>
                        </div>
                        <br>

                        <div class="row justify-content-center">
                        
                            <div class="col-2" style="text-align: right;">
                                <input class="form-check-input" type="checkbox" id="terms">
                            </div>
                            <div class="col-6">
                                <label class="form-check-label" for="terms">
                                By accepting these terms and conditions, you agree that [Your Business Name] will adhere to the provisions outlined in Republic Act No. 10173, also known as the Data Privacy Act. This Act is designed to safeguard all types of information, whether private, personal, or sensitive, and applies to both individuals and entities involved in the processing of personal data.
                                </label>
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </div>

                    <div class="get-info">
                        <h3>ADD THE REQUIREMENTS <?=$user_business?></h3>

                        
                        <p><i>
                        *Please fill in the necessary information below so we can assist you better. Your input is important for us to provide the right support. Thank you!
                        </i></p>
                    <form id="postForm" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="req1" class="form-label fw-bold">Select 2x2 picture</label>
                            <input type="file" class="form-control" id="req1" name="req1">
                        </div>

                        <div class="mb-3">
                            <label for="req2" class="form-label fw-bold">Cedula</label>
                            <input type="file" class="form-control" id="req2" name="req2">
                        </div>

                        <div class="mb-3">
                            <label for="req3" class="form-label fw-bold">Select barangay clearance</label>
                            <input type="file" class="form-control" id="req3" name="req3">
                        </div>

                        <div class="mb-3">
                            <label for="req4" class="form-label fw-bold">Select barangay recommendation</label>
                            <input type="file" class="form-control" id="req4" name="req4">
                        </div>

                        <div class="mb-3">
                            <label for="req5" class="form-label fw-bold">Select zoning certificate</label>
                            <input type="file" class="form-control" id="req5" name="req5">
                        </div>

                        <div class="mb-3">
                            <label for="req6" class="form-label fw-bold">Select Sanitary Safety Inspection Permit</label>
                            <input type="file" class="form-control" id="req6" name="req6">
                        </div>

                        <div class="mb-3">
                            <label for="req7" class="form-label fw-bold">Select Fire Safety Inspection Permit</label>
                            <input type="file" class="form-control" id="req7" name="req7">
                        </div>
                    </div> <!-- end ng get-requirements -->
                    <div class="button-submit" style="text-align: center;">
                            <div class="input-field">
                                <button type="button" class="submit" onclick="SubmitRequirement('<?=$business_id?>')">Submit</button>
                            </div>
                    </div>
                    </form>

                    <div class="button-next-zero" style="text-align: right;">
                            <div class="input-field">
                                <button type="submit" class="submit" onclick="btnNextZero()">Next</button>
                            </div>
                    </div>

                   <div class="owner-info">
                    <h3>PERSONAL DETAILS</h3>
                        
                        <p><i>
                        *Please review your personal details below and make any necessary corrections if there are any mistakes. Your accuracy ensures the correctness of your information. If you spot any errors, kindly edit them accordingly. Thank you!
                        </i></p>

                        <div class="row">
                            <div class="col-4">
                                <div class="input-field">
                                    <label for="fname">First name</label> 
                                    <input type="text" class="input" id="fname" value="<?=$fname?>" readonly >
                                </div> 
                            </div>

                            <div class="col-4">
                                <div class="input-field">
                                    <label for="mname">Middle name</label> 
                                    <input type="text" class="input" id="mname" value="<?=$mname?>" readonly>
                                </div> 
                            </div>

                            <div class="col-4">
                                <div class="input-field">
                                    <label for="lname">Last name</label> 
                                    <input type="text" class="input" id="lname" value="<?=$lname?>" readonly>
                                </div> 
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="input-field">
                                    <label for="address">Address</label> 
                                    <input type="text" class="input" id="address" value="<?=$address?>" readonly>
                                </div> 
                            </div>
                            <div class="col-6">
                                <div class="input-field">
                                    <label for="phone">Contact Number</label> 
                                    <input type="text" class="input" id="phone" value="<?=$contactNumber?>" readonly>
                                </div> 
                            </div>
                        </div>


                        

                    </div> <!-- end ng owner-info -->

                        <div class="row">
                        <div class="col-6">
                            <div class="button-back-zero " style="text-align: left;">
                                <div class="input-field">
                                    <button type="button" class="submit back-button" onclick="btnBackZero()">Back</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="button-next-one " style="text-align: right;">
                                <div class="input-field">
                                    <button type="button" class="submit" onclick="btnNextOne()">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    <!-- business ni owner-->
                    <div class="business-info">
                        <h3>BUSINESS INFORMATION</h3>
                        
                        <p><i>
                        *Please review the business information provided below and make any necessary corrections to ensure accuracy. Your attention to detail guarantees the integrity of your data. If you identify any errors, please edit them accordingly. Thank you!
                        </i></p>
                        <div class="row">
                            <div class="col-4">
                                <div class="input-field">
                                    <label for="bName">Business name</label> 
                                    <input type="text" class="input" id="bName" value="<?=$businessName?>" readonly >
                                </div> 
                            </div>

                            <div class="col-4">
                                <div class="input-field">
                                    <label for="type">Business Type</label> 
                                    <input type="text" class="input" id="type" value="<?=$businessType?>" readonly>
                                </div> 
                            </div>

                        </div>
                        <!-- business address -->
                        <div class="row">
                            <div class="col-2">
                                <div class="input-field">
                                    <label for="houseNumber">House Number</label> 
                                    <input type="text" class="input" id="houseNumber" value="<?=$businessHouseNum?>" readonly>
                                </div> 
                            </div>
                            <div class="col-4">
                                <div class="input-field">
                                    <label for="zone">Zone</label    > 
                                    <input type="text" class="input" id="zone" value="<?=$businessZone?>" readonly>
                                </div> 
                            </div>
                            <div class="col-6">
                                <div class="input-field">
                                    <label for="barangay">Barangay</label> 
                                    <input type="text" class="input" id="barangay" value="<?=$businessBrgy?>" readonly>
                                </div> 
                            </div>
                        </div>

                        <!-- business contact -->
                        <div class="row">
                            <div class="col-6">
                                <div class="input-field">
                                    <label for="phone">Business Phone Number</label> 
                                    <input type="text" class="input" id="phone" value="<?=$businessPhone?>" readonly>
                                </div> 
                            </div>

                            <div class="col-6">
                                <div class="input-field">
                                    <label for="email">Email Address</label> 
                                    <input type="text" class="input" id="email" value="<?=$businessEmail?>" readonly>
                                </div> 
                            </div>
                        </div>

                    </div> <!-- end ng business-info -->

                    <div class="row">
                        <div class="col-6">
                            <div class="button-back-one " style="text-align: left;">
                                <div class="input-field">
                                    <button type="button" class="submit back-button" onclick="btnBackOne()"  id="back">Back</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="button-next-two" style="text-align: right;">
                                <div class="input-field">
                                    <button type="button" class="submit" onclick="btnNextTwo()">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                   


                    
                    <br><br>

                    
        </div>                   
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>