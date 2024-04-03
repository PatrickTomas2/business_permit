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

    $select_user_info = mysqli_query($conn, "SELECT * FROM owner_information WHERE owner_id='$user_id'");
    if (mysqli_num_rows($select_user_info) > 0) {
        while ($row = mysqli_fetch_assoc($select_user_info)) {
            $fname = $row['owner_fname'];
            $mname = $row['owner_mname'];
            $lname = $row['owner_lname'];
            $address = $row['owner_address'];
            $contactNumber = $row['owner_contactNumber'];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../sidemenu.css?ver=007">
    <script src="js/jquery-3.3.1.js?ver=001"></script>
    <script src="js/profile.js?ver=007"></script>
    <title>Profile</title>
</head>
<body>
    <div class="container rounded mt-5 mb-5">
        <div class="row">
            <div class="col-md-8 border-right">
                <div class="p-3 py-5">
                    <div class="row mt-2">
                        <div class="col-md-6"><h4>Profile</h4></div>
                        <div class="col-md-6"><a href="#" class="edit-link fs-5" onclick="showEditBtn()"><i class="fas fa-edit mr-3"></i><span class="edit-text-icon-gap"></span>Edit</a></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <label class="labels">First name</label>
                            <input type="text" class="form-control" id="fname" placeholder="First name" value="<?=$fname?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="labels">Middle name</label>
                            <input type="text" class="form-control" id="mname" placeholder="Middle name" value="<?=$mname?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="labels">Last name</label>
                            <input type="text" class="form-control" id="lname" value="<?=$lname?>" placeholder="Surname" readonly>
                        </div>
                    </div>
                    
                    <div>
                        <div class="col-md-12">
                            <label class="labels">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="Enter Address" value="<?=$address?>" readonly>
                        </div> 
                        <div class="col-md-12">
                            <label class="labels">Mobile Number</label>
                            <input type="text" class="form-control" id="contactNumber" placeholder="Enter phone number" value="<?=$contactNumber?>" readonly>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <a href="logout.php"><button class="btn logout-btn"><i class="fas fa-sign-out-alt"></i>Log out </button></a>

                        </div>
                    </div>
                    <div class="mt-5 text-center edit-button-holder"><button class="btn profile-button" type="button" onclick="updateUserProfile('<?=$user_id?>')">Save Profile</button></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span class="fs-5 fw-bold">Your business</span><span class="border px-3 p-1 add-experience"><a href="#" id="businessModalLink" data-bs-toggle="modal" data-bs-target="#businessModal" class="add-business-link"><i class="fa fa-plus"></i>&nbsp;Add Business</span></a></div><br>
                    <div class="col-md-12 business-holder">
                    </div>
                    <br>
                    <!-- <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div> -->
                    
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


    <div class="modal fade" id="businessModal" tabindex="-1" aria-labelledby="businessModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-error-title-holder modal-title fw-bold" id="businessModalLabel">Business Registration</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="businessRegistrationForm" >
                        <div class="mb-3">
                            <label for="businessName" class="form-label">Business name</label>
                            <input type="text" class="form-control" id="businessName" onfocusout="inputValidation('#businessName')">
                        </div>
                        <div class="mb-3">
                            <label for="businessHouseNumber" class="form-label">Lot number</label>
                            <input type="text" class="form-control" id="businessHouseNumber" onfocusout="inputValidation('#businessHouseNumber')">
                        </div>
                        <div class="mb-3">
                            <label for="businessBarangay">Barangay</label>
                            <select class="form-control" id="businessBarangay" onfocusout="inputValidation('#businessBarangay')">
                                <option value="">---select barangay---</option>
                                <option value="La Luna">La Luna</option>
                                <option value="Poblacion East">Poblacion East</option>
                                <option value="Poblacion West">Poblacion West</option>
                                <option value="Salvacion">Salvacion</option>
                                <option value="San Agustin">San Agustin</option>
                                <option value="San Antonio">San Antonio</option>
                                <option value="San Jose">San Jose</option>
                                <option value="San Marcos">San Marcos</option>
                                <option value="Santo Domingo">Santo Domingo</option>
                                <option value="Santo Niño">Santo Niño</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="businessZone">Zone</label>
                            <select class="form-control" id="businessZone" onfocusout="inputValidation('#businessZone')">
                                <option value="">---select zone---</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="businessType">Business Type</label>
                            <select class="form-control" id="businessType" onfocusout="inputValidation('#businessType')">
                                <option value="">---select type---</option>
                                <option value="Single">Single</option>
                                <option value="Partnership">Partnership</option>
                                <option value="Corporation">Corporation</option>
                                <option value="Cooperative">Cooperative</option>
                                
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="businessEmail" class="form-label">Business email</label>
                            <input type="text" class="form-control" id="businessEmail" onfocusout="inputValidation('#businessEmail')">
                        </div>
                        <div class="mb-3">
                            <label for="businessNumber" class="form-label">Business contact number</label>
                            <input type="text" class="form-control" id="businessNumber" onfocusout="inputValidation('#businessNumber')">
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn register-business-btn-custom" onclick="registerBusiness()">Register Business</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>