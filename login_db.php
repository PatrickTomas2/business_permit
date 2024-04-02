<?php
    session_start();

    include 'config.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Retrieve user from the database
        $query = "SELECT account_designation_id, user_type FROM accounts WHERE username='$username' AND password='$password'";
        $select_user = mysqli_query($conn, $query);
        if (mysqli_num_rows($select_user) > 0) {
            $row = mysqli_fetch_assoc($select_user);

            //kinukuha yung user_id and type
            $user_id = $row['account_designation_id'];
            $user_type = $row['user_type'];


            //dito naman kukunin kung may registered business na siya
            $query_two = "SELECT business_registration.business_name FROM business_registration INNER JOIN owner_information ON business_registration.owner_id = owner_information.owner_id WHERE owner_information.owner_id = '$user_id'";
            $select_user_business = mysqli_query($conn, $query_two);
            if (mysqli_num_rows($select_user_business) > 0) {
                $rows = mysqli_fetch_assoc($select_user_business);
                $user_business_name = $rows['business_name'];

                //dagdag ko tong user business para alam kung ano yung active business.
                $_SESSION['user_business'] = $user_business_name;
            }

            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;

            echo 'success ' . $user_type;
        }else {
            echo 'error';
        }

    }
