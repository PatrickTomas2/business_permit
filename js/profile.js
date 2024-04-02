function inputValidation(inputId) {
    var inputValue = $(inputId).val();

    if (inputValue == "") {
        $(inputId).css('border', '1px solid red');
        $(inputId).attr('placeholder', '*required');
    } else {
        $(inputId).css('border', '1px solid #FAD602');
        // $(inputId).attr('placeholder', '');
    }
}

$(document).ready(function () {
    $('#businessName').on('focusout', function () {
        inputValidation('#businessName');
    });

    $('#businessHouseNumber').on('focusout', function () {
        inputValidation('#businessHouseNumber');
    });

    $('#businessBarangay').on('focusout', function () {
        inputValidation('#businessBarangay');
    });

    $('#businessZone').on('focusout', function () {
        inputValidation('#businessZone');
    });

    $('#businessType').on('focusout', function () {
        inputValidation('#businessType');
    });

    $('#businessEmail').on('focusout', function () {
        inputValidation('#businessEmail');
    });

    $('#businessNumber').on('focusout', function () {
        inputValidation('#businessNumber');
    });

    $('.edit-button-holder').hide();
    showBusinessOfUser();
});

function showEditBtn() {
    $('.edit-button-holder').show();

    $('#fname').removeAttr('readonly');
    $('#mname').removeAttr('readonly');
    $('#lname').removeAttr('readonly');
    $('#address').removeAttr('readonly');
    $('#contactNumber').removeAttr('readonly');
    
    $('.logout-btn').hide();
}

function showBusinessOfUser(){

    //show mo yung mga business nang user
    $('.business-holder').load('content-owner/business-folder/show-business.php');
}


function registerBusiness(){
    var businessName = $('#businessName').val();
    var businessHouseNumber = $('#businessHouseNumber').val();
    var businessBarangay = $('#businessBarangay').val();
    var businessZone = $('#businessZone').val();
    var businessType = $("#businessType").val();
    var businessEmail = $("#businessEmail").val();
    var businessNumber = $("#businessNumber").val();
    var businessNumber = $("#businessTin").val();


    if (businessName == "" || businessHouseNumber == "" || businessBarangay == "" || businessZone == "" || businessType == ""|| businessEmail == "" || businessNumber == "" || businessTin == "") {
        $(".modal-error-title-holder").text("All fields is required").css("color", "red");
        return false;
    }

    $('#businessRegistrationForm').submit(function (event) {
        event.preventDefault(); // Prevent the default form submission
    
        // Retrieve form data
        var businessName = $('#businessName').val();
        var businessHouseNumber = $('#businessHouseNumber').val();
        var businessBarangay = $('#businessBarangay').val();
        var businessZone = $('#businessZone').val();
        var businessType = $('#businessType').val();
        var businessEmail = $('#businessEmail').val();
        var businessNumber = $('#businessNumber').val();
        var businessTin = $('#businessTin').val();
    
        $.post('register_business_db.php', {
            businessName: businessName,
            businessHouseNumber: businessHouseNumber,
            businessBarangay: businessBarangay,
            businessZone: businessZone,
            businessType: businessType,
            businessEmail: businessEmail,
            businessNumber: businessNumber,
            businessTin: businessTin,
        }, function (data, status) {
            // alert(data + " " + status);
            Swal.fire({
                title: 'Success',
                text: data,
                icon: 'success',
                showConfirmButton: true,
            });
    
            // $('#businessModal').hide(); // Close the Bootstrap modal
            // $('.modal-backdrop').remove(); // Remove the modal backdrop to restore brightness

            // $('#businessName').val('');
            // $('#businessHouseNumber').val('');
            // $('#businessBarangay').val('');
            // $('#businessZone').val('');
            // $('#businessType').val('');
            // $('#businessEmail').val('');
            // $('#businessNumber').val('');

            setTimeout(function() {
                window.location.href = 'owner_home.php';
            }, 2000); // 2000 milliseconds = 2 seconds
    
            // Handle redirection or other actions here
            showBusinessOfUser(); // For example, show the business of the user
        });
    });
}

function updateUserProfile(user_id){
    var fname = $('#fname').val();
    var mname = $('#mname').val();
    var lname = $('#lname').val();
    var address = $('#address').val();
    var contactNumber = $('#contactNumber').val();

    // console.log(fname);
    $.post("update_owner_information.php", {
        user_id : user_id,
        fname : fname,
        mname : mname,
        lname : lname,
        address : address,
        contactNumber : contactNumber,
    }, function (data, status){
        //alert(data + " " + status);
        Swal.fire({
            title: 'Success',
            text: data,
            icon: 'success',
            showConfirmButton: true,
        });
        $('.edit-button-holder').hide();
        $('.logout-btn').show();
        
        $('#fname').attr('readonly', 'readonly');
        $('#mname').attr('readonly', 'readonly');
        $('#lname').attr('readonly', 'readonly');
        $('#address').attr('readonly', 'readonly');
        $('#contactNumber').attr('readonly', 'readonly');
    })
}