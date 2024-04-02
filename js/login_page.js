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
    $('#username').on('focusout', function () {
        inputValidation('#username');
    });
    $('#password').on('focusout', function () {
        inputValidation('#password');
    });
});

function loginUser() {
    var username = $("#username").val();
    var password = $("#password").val();

    if (username == "" || password == "") {
        $("#title-error-handler").text("All fields is required").css("color", "red");
        return;
    }

    $.post("login_db.php", {
        username: username,
        password: password,
    }, function(data, status) {
        // alert(data);

        //depende sa user type kung saang page siya pupunta
        switch(data) {
            case 'success owner':
                window.location.href = 'owner_home.php';
                break;
            case 'success permit':
                window.location.href = 'permit_home.php';
                break;
            case 'success fire':
                window.location.href = 'fire_home.php';
                break;
            case 'success sanitary':
                window.location.href = 'sanitary_home.php';
                break;
            default:
                $('#title-error-handler').text('Invalid user or password.').css("color", "red");
        }

    });
}
