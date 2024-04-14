<?php
session_start();
include '../config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

$message = "";
$business_name;
if (!isset($_SESSION['user_business'])) {
    $message = "Register a business now.";
}else {
    $business_name = $_SESSION['user_business'];
    $select_owner_checklist = mysqli_query($conn, "SELECT * FROM owner_checklist WHERE owner_id = '$user_id' AND business_name = '$business_name'");
    $checkbox_states = mysqli_fetch_assoc($select_owner_checklist);

if ($checkbox_states) {
    $requirement1_checked = $checkbox_states['requirement1'] ? 'checked' : '';
    $requirement2_checked = $checkbox_states['requirement2'] ? 'checked' : '';
    $requirement3_checked = $checkbox_states['requirement3'] ? 'checked' : '';
    $requirement4_checked = $checkbox_states['requirement4'] ? 'checked' : '';
    $requirement5_checked = $checkbox_states['requirement5'] ? 'checked' : '';
    $requirement6_checked = $checkbox_states['requirement6'] ? 'checked' : '';
    $requirement7_checked = $checkbox_states['requirement7'] ? 'checked' : '';
    $requirement8_checked = $checkbox_states['requirement8'] ? 'checked' : '';
} else {
    $requirement1_checked = '';
    $requirement2_checked = '';
    $requirement3_checked = '';
    $requirement4_checked = '';
    $requirement5_checked = '';
    $requirement6_checked = '';
    $requirement7_checked = '';
    $requirement8_checked = '';
}

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Business Requirements Checklist</title>
    <link rel="stylesheet" href="content-owner/checklist.css?ver=004">
    
</head>
<body>

<?php
    if ($message == "Register a business now.") {
?>
<div class="container">
        <h3>Business Requirements Checklist</h3><br>
        <p><span class="fw-bold">Note:</span> <em><?= $message ?></em></p>

        
    <ul>
        <li><input type="checkbox"><label for="">2x2 PICTURE</label></li>
        <li><input type="checkbox"><label for="">BRGY CLEARANCE FROM RESIDENCE</label></li>
        <li><input type="checkbox"><label for="">BRGY RECOMMENDATION (PLACE OF BUSINESS)</label></li>
        <li><input type="checkbox"><label for="">ZONING CERTIFICATE</label></li>
        <li><input type="checkbox"><label for="">SANITARY PERMIT</label></li>
        <li><input type="checkbox"><label for="">FIRE PERMIT</label></li>
        <li><input type="checkbox"><label for="">CEDULA</label></li>
        <li><input type="checkbox"><label for="">APPLICATION FORM FOR BUSINESS UNIFIED PERMIT</label></li>
    </ul>

    <br> 
</div>
<?php
    }else {
?>
<div class="container">
        <h3>Business Requirements Checklist</h3><br>
        
    <ul>
        <li><input type="checkbox" id="requirement1" <?php echo $requirement1_checked; ?>><label for="requirement1">2x2 PICTURE</label></li>
        <li><input type="checkbox" id="requirement2" <?php echo $requirement2_checked; ?>><label for="requirement2">BRGY CLEARANCE FROM RESIDENCE</label></li>
        <li><input type="checkbox" id="requirement3" <?php echo $requirement3_checked; ?>><label for="requirement3">BRGY RECOMMENDATION (PLACE OF BUSINESS)</label></li>
        <li><input type="checkbox" id="requirement4" <?php echo $requirement4_checked; ?>><label for="requirement4">ZONING CERTIFICATE</label></li>
        <li><input type="checkbox" id="requirement5" <?php echo $requirement5_checked; ?>><label for="requirement5">SANITARY PERMIT</label></li>
        <li><input type="checkbox" id="requirement6" <?php echo $requirement6_checked; ?>><label for="requirement6">FIRE PERMIT</label></li>
        <li><input type="checkbox" id="requirement7" <?php echo $requirement7_checked; ?>><label for="requirement7">CEDULA</label></li>
        <li><input type="checkbox" id="requirement8" <?php echo $requirement8_checked; ?>><label for="requirement8">APPLICATION FORM FOR BUSINESS UNIFIED PERMIT</label></li>
    </ul>

    <br> 

    <div class="row col-6">
        <button id="clearButton">Clear All</button>
    </div>
</div>
<?php
    }

?>

<script>
    $(document).ready(function() {

        $('input[type="checkbox"]').change(function() {
            var checkboxId = $(this).attr('id'); // Get the ID of the changed checkbox
            var isChecked = $(this).is(':checked') ? 1 : 0; // Determine if it's checked or not
            
            // Send an AJAX request to update the database
            $.ajax({
                url: 'update_checkbox.php', // Path to the PHP script that updates the database
                method: 'POST',
                data: {
                    checkboxId: checkboxId,
                    isChecked: isChecked
                },
                success: function(response) {
                    console.log(response); // Log the response from the server (for debugging)
                },
                error: function(xhr, status, error) {
                    console.error(error); // Log any errors (for debugging)
                }
            });
        });

        // Function to handle clear button click event
        $('#clearButton').click(function() {
            // Uncheck all checkboxes
            $('input[type="checkbox"]').prop('checked', false);
            // Send an AJAX request to update the database with unchecked values
            $.ajax({
                url: 'update_all_checkboxes.php', // Path to the PHP script that updates all checkboxes
                method: 'POST',
                data: {
                    isChecked: 0 // Setting all checkboxes to unchecked (false)
                },
                success: function(response) {
                    console.log(response); // Log the response from the server (for debugging)
                },
                error: function(xhr, status, error) {
                    console.error(error); // Log any errors (for debugging)
                }
            });
        });
    });


</script>

</body>
</html>

