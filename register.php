<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="register_page_style.css?ver=001">
    <script src="js/jquery-3.3.1.js?ver=001"></script>
    <script src="js/register_page.js?ver=003"></script>
    <title>Register</title>
</head>
<body>

<body>
  <div class="wrapper">
    <div class="container main">
        <div class="row">
        <div class="col-md-6 right">
                <div class="input-box">
                   <header id="title-error-holder">Register account</header>

                   <!-- user info dito -->
                   <div class="owner-info">
                        <div class="input-field">
                            <input type="text" class="input" id="fname" onfocusout="inputValidation('#fname')" required autocomplete="off">
                            <label for="fname">First name</label> 
                        </div> 
                        <div class="input-field">
                            <input type="text" class="input" id="mname" onfocusout="inputValidation('#mname')" required autocomplete="off">
                            <label for="lname">Middle name</label> 
                        </div>
                        <div class="input-field">
                            <input type="text" class="input" id="lname" onfocusout="inputValidation('#lname')" required autocomplete="off">
                            <label for="lname">Last name</label> 
                        </div> 
                        <div class="input-field">
                            <input type="text" class="input" id="address" onfocusout="inputValidation('#address')" required autocomplete="off">
                            <label for="address">Address</label> 
                        </div>
                        <div class="input-field">
                            <input type="text" class="input" id="contactNumber" onfocusout="inputValidation('#contactNumber')" required autocomplete="off">
                            <label for="contactNumber">Contact number</label> 
                        </div>
                   </div>
                   
                    <div class="button-next-one">
                        <div class="input-field">
                            <button type="button" class="submit" onclick="btnNextOne()">Next</button>
                        </div>
                    </div>

                   <!-- address ni owner-->
                    <!-- <div class="address-info">
                        <div class="input-field">
                            <input type="text" class="input" id="houseNumber" required onfocusout="inputValidation('#houseNumber')">
                            <label for="houseNumber">House Number</label>
                        </div> 
                    <div class="form-group">
                        <label for="barangay"></label>
                        <select class="form-control select-custom" name="barangay" id="barangay" onfocusout="inputValidation('#barangay')">
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
                        <div class="form-group">
                            <label for="zone"></label>
                            <select class="form-control select-custom" name="zone" id="zone" onfocusout="inputValidation('#zone')">
                                <option value="">---Select Zone---</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>

                    <div class="button-next-two">
                        <div class="input-field">
                            <button type="button" class="submit" onclick="btnNextTwo()">Next</button>
                        </div>
                    </div> -->

                    <!-- log in credential ni owner  -->
                    <div class="login-credentials">
                        <div class="input-field">
                            <input type="text" class="input" id="username" onfocusout="inputValidation('#username')" required autocomplete="off">
                            <label for="username">Username</label> 
                        </div> 
                        <div class="input-field">
                            <input type="password" class="input" id="password" required onfocusout="inputValidation('#password')">
                            <label for="password">Password</label>
                        </div>
                    </div>
                   
                    <div class="register-button-final">
                        <div class="input-field">
                            <button type="button" class="submit" onclick="btnRegisterOwner()">Register</button>
                        </div>
                    </div>
                    

                    <div class="signin">
                        <span>Already have an account? <a href="login.php">Log in here</a></span>
                    </div>
                    </div>  
                </div>
            <div class="col-md-6 side-image">
                
                <img src="assets/images/santo_tomas_logo.png" alt="">
                <div class="text">
                    <p>Register a account to get your business permit now. <i>- Santo Tomas</i></p>
                </div>
                
            </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>