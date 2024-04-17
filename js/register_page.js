function inputValidation(inputId) {
    var inputValue = $(inputId).val();

    if (inputValue == "") {
        $(inputId).css('border-bottom', '1px solid red');
        // $(inputId).attr('placeholder', '*required');
    } else {
        $(inputId).css('border-bottom', '1px solid #FAD602');
        // $(inputId).attr('placeholder', '');
    }
}

$(document).ready(function() {
    $('#fname').on('focusout', function () {
        inputValidation('#fname');
    });
    $('#mname').on('focusout', function () {
        inputValidation('#mname');
    });

    $('#lname').on('focusout', function () {
        inputValidation('#lname');
    });
    $('#address').on('focusout', function () {
        inputValidation('#address');
    });

    $('#contactNumber').on('focusout', function () {
        inputValidation('#contactNumber');
    });

    $('#username').on('focusout', function () {
        inputValidation('#username');
    });

    $('#password').on('focusout', function () {
        inputValidation('#password');
    });

    $('#houseNumber').on('focusout', function () {
        inputValidation('#houseNumber');
    });

    $('#barangay').on('focusout', function () {
        inputValidation('#barangay');
    });

    $('#zone').on('focusout', function () {
        inputValidation('#zone');
    });

    $('.address-info').hide();
    $('.login-credentials').hide();
    $('.register-button-final').hide();
    $('.button-next-two').hide();
});

function btnNextOne(){
    var fname = $('#fname').val();
    var mname = $('#mname').val();
    var lname = $('#lname').val();
    var address = $('#address').val();
    var contactNumber = $('#contactNumber').val();

    if (fname == "" || mname == "" || lname == ""  || address == "" || contactNumber == "") {
        $("#title-error-holder").text("All fields is required").css("color", "red");
        return false;
    }

    $('.owner-info').hide();
    $('.button-next-one').hide();
    $('.login-credentials').show();
    $('.register-button-final').show();

    $("#title-error-holder").text("Register account").css("color", "#rgb(6, 29, 66)");
}

// function btnNextTwo(){
//     var houseNumber = $("#houseNumber").val();
//     var barangay = $("#barangay").val();
//     var zone = $("#zone").val();

//     if (houseNumber == "" || barangay == "" || zone == "") {
//         $("#title-error-holder").text("All fields is required").css("color", "red");
//         return false;
//     }

//     $('.address-info').hide();
//     $('.button-next-two').hide();
//     $('.login-credentials').show();
//     $('.register-button-final').show();

//     $("#title-error-holder").text("Register account").css("color", "#FAD602");
// }


function btnRegisterOwner(){
    var fname = $('#fname').val();
    var mname = $('#mname').val();
    var lname = $('#lname').val();
    var address = $('#address').val();
    var contactNumber = $('#contactNumber').val();
    var username = $("#username").val();
    var password = $("#password").val();
    // var houseNumber = $("#houseNumber").val();
    // var barangay = $("#barangay").val();
    // var zone = $("#zone").val();

    if (fname == "" || lname == ""|| mname == "" || address == "" || contactNumber == "" || username == "" || password == "") {
        $("#title-error-holder").text("All fields is required").css("color", "red");
        return false;
    }
    
    $.post("register_db.php", {
        fname : fname,
        lname : lname,
        mname : mname,
        address : address,
        contactNumber : contactNumber,
        username : username,
        password : password,
        
    }, function(data, status){
        // alert("Data: " + data + "\nStatus: " + status);
        Swal.fire({
            title: 'Success',
            text: data,
            icon: 'success',
            showConfirmButton: false
        });
    
        // Redirect to the login page after 2 seconds
        setTimeout(function() {
            window.location.href = 'login.php';
        }, 2000); // 2000 milliseconds = 2 seconds
    });
    

}