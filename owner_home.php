<?php
    session_start();
    include 'config.php';

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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9c6f27a8d7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./sidemenu.css?ver=006">
    <script src="js/jquery-3.3.1.js?ver=001"></script>
    <script src="js/owner_home_page.js?ver=002"></script>
    <title>Home page</title>
</head>
<body>

    <div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="sidebar-main col-auto col-md-4 col-lg-3 min-vh-100 d-flex flex-column justify-content-between">
            <div class="sidebar p-2">
                <a class="d-flex justify-content-center text-decoration-none mt-1 align-items-center text-white">
                    <span><img src="assets/images/santo_tomas_logo.png" alt="Santo Tomas Logo" width="150" height="150"></span>
                </a>
                <br><br>
                <ul class="nav nav-pills flex-column mt-4">
                    <li class="nav-item py-2 py-sm-0">
                        <a href="#" class="nav-link text-black" onclick="showChecklist()">
                            <i class="fs-5 fa fa-list-check"></i><span class="fs-4 ms-3 d-none d-sm-inline">Checklist</span>
                        </a>
                    </li>
                    <li class="nav-item py-2 py-sm-0">
                        <a href="#" class="nav-link text-black" onclick="showInspection()">
                            <i class="fs-5 fa fa-magnifying-glass"></i><span class="fs-4 ms-3 d-none d-sm-inline">Request for inspection</span>
                        </a>
                    </li>
                    <li class="nav-item py-2 py-sm-0">
                        <a href="#" class="nav-link text-black" onclick="showPermit()">
                            <i class="fs-5 fa fa-file"></i><span class="fs-4 ms-3 d-none d-sm-inline">Apply for business permit</span>
                        </a>
                    </li>
                    <!-- <li class="nav-item py-2 py-sm-0">
                        <a href="#" class="nav-link text-white" onclick="showNotification()">
                            <i class="fs-5 fa fa-bell"></i><span class="fs-4 ms-3 d-none d-sm-inline">Notification</span>
                        </a>
                    </li>
                    <li class="nav-item py-2 py-sm-0">
                        <a href="#" class="nav-link text-white" onclick="showRenewal()">
                            <i class="fs-5 fa fa-rotate-right"></i><span class="fs-4 ms-3 d-none d-sm-inline">Renewal</span>
                        </a>
                    </li> -->
                    
                </ul>
                
            </div>
            <div>
                <ul class="nav nav-pills flex-column mt-auto p-2">
                    <li class="nav-item py-2 py-sm-0">
                        <a href="#" class="nav-link text-black mb-5" onclick="showProfile()">
                            <i class="fs-5 fa fa-user-circle"></i><span class="fs-4 ms-3 d-none d-sm-inline">Profile</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Contents Placeholder -->
        <div class="col-md-8 col-lg-9 d-flex justify-content-center">
                <div class="container">
                    <div class="text-right">
                        <h1 class="text-black p-3">Santo Tomas Business Permit System</h1>
                    </div>
                    
                    <br><br>
                <div id="content-placeholder" class="fixed-size-container p-3 text-left bg-white">
                </div>
            </div>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
