<?php
    session_start();
    include 'config.php';

    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];

    $select_user_info = mysqli_query($conn, "SELECT * FROM sanitary_inspection_admin WHERE admin_id='$user_id'");
    if (mysqli_num_rows($select_user_info) > 0) {
        while ($row = mysqli_fetch_assoc($select_user_info)) {
            $name = $row['admin_name'];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9c6f27a8d7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./sidemenu.css?ver=0002">
    <script src="js/jquery-3.3.1.js?ver=001"></script>
    <script src="js/sanitary.js?ver=004"></script>

    <title>This is sanitary home</title>
</head>
<body>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="sidebar-main col-auto col-md-4 col-lg-3 min-vh-100 d-flex flex-column justify-content-between">
            <div class="sidebar p-2">
                <a class="d-flex justify-content-center text-decoration-none mt-1 align-items-center text-white">
                    <span class="fs-2 d-none d-sm-inline fw-bold">SANITARY INSPECTION OWNER</span>
                </a>
                <ul class="nav nav-pills flex-column mt-4">
                    <li class="nav-item py-2 py-sm-0">
                        <a href="#" class="nav-link text-white" onclick="showsSanitaryChecklist()">
                            <i class="fs-5 fa fa-list-check"></i><span class="fs-4 ms-3 d-none d-sm-inline">Checklist</span>
                        </a>
                    </li>
                    <li class="nav-item py-2 py-sm-0">
                        <a href="#" class="nav-link text-white" onclick="showInspection()">
                            <i class="fs-5 fa fa-magnifying-glass"></i><span class="fs-4 ms-3 d-none d-sm-inline">Request for inspection</span>
                        </a>
                    </li>
                    <li class="nav-item py-2 py-sm-0">
                        <a href="#" class="nav-link text-white" onclick="showRequest()">
                            <i class="fs-5 fa fa-magnifying-glass"></i><span class="fs-4 ms-3 d-none d-sm-inline">Requests</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <ul class="nav nav-pills flex-column mt-auto p-2">
                    <li class="nav-item py-2 py-sm-0">
                        <a href="logout.php" class="nav-link text-white mb-5">
                            <i class="fs-5 fa fa-sign-out-alt"></i><span class="fs-4 ms-3 d-none d-sm-inline">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Contents Placeholder -->
        <div class="col-md-8 col-lg-9 d-flex justify-content-center align-items-center">
            <div id="content-placeholder" class="fixed-size-container p-3 text-left bg-white">
            </div>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
