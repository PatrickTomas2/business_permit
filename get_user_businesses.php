<?php
session_start();
include('config.php');

if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    
    // Query to retrieve user's businesses
    $query = "SELECT * FROM business_registration WHERE owner_id = '$user_id'";
    $result = mysqli_query($conn, $query);

    $businesses = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $businesses[] = $row;
        
    }

    // Output businesses as JSON
    echo json_encode($businesses);
} else {
    echo "User session not set.";
}
?>
