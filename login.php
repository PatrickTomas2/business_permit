<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="login_page_style.css">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/login_page.js"></script>
    <title>Login</title>
</head>
<body>

<body>
  <div class="wrapper">
    <div class="container main">
        <div class="row">
            <div class="col-md-6 side-image">
                
                <img src="assets/images/santo_tomas_logo.png" alt="">
                <div class="text">
                    <p>Login your account to get your business permit now. <i>- Santo Tomas</i></p>
                </div>
                
            </div>
            <div class="col-md-6 right">
                
                <div class="input-box">
                   
                   <header id="title-error-handler">Login account</header>
                   <form action="login.php" method="post" >
                        <div class="input-field">
                            <input type="text" class="input" id="username" name="username" onfocusout="inputValidation('#username')" required autocomplete="off">
                            <label for="username">Username</label> 
                        </div> 
                        <div class="input-field">
                            <!-- <input type="text" class="input" name="password" required> -->
                            <input type="password" class="input" id="password" name="password" required onfocusout="inputValidation('#password')">
                            <label for="password">Password</label>
                        </div> 
                        <div class="input-field">
                            <button type="button" class="submit" name="login" onclick="loginUser()">Login</button>
                        </div> 
                    </form>
                        <div class="signin">
                            <span>Don't have an account? <a href="register.php">Register here</a></span>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// if (isset($_POST['signup'])) {
//     require 'config.php';
//     session_start();
    
//     $username = mysqli_real_escape_string($conn, $_POST['username']);
//     $password = mysqli_real_escape_string($conn, $_POST['password']);

//     if (!empty($username) && !empty($password)) {
//         $sql = "SELECT * FROM owner_information WHERE username = ? AND password = ?";
//         $stmt = mysqli_prepare($conn, $sql);
//         mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
//         mysqli_stmt_execute($stmt);
//         $result = mysqli_stmt_get_result($stmt);

//         if (mysqli_num_rows($result) == 1) {
//             $row = mysqli_fetch_assoc($result);

//             $_SESSION['username'] = $row['username'];
//             $_SESSION['password'] = $row['password'];

//             header("Location: home.php");
//             exit();
//         } else {
//             echo "<script>alert('Invalid Credentials');</script>";
//         }
//     } else {
//         echo "<script>alert('Username and password cannot be empty');</script>";
//     }
// }
?>
