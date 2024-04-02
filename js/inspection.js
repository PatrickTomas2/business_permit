function inputValidation(inputId) {
    var inputValue = $(inputId).val();

    if (inputValue == "") {
        $(inputId).css('border', '1px solid red');
        $(inputId).attr('placeholder', '*required');
    } else {
        $(inputId).css('border', '1px solid #FAD602');
        $(inputId).attr('placeholder', '');
    }
}

$(document).ready(function (){
    $('#representative').on('focusout', function () {
        inputValidation('#representative');
    });
    
    $('#business_nature').on('focusout', function () {
        inputValidation('#business_nature');
    });

    $('#total_floor').on('focusout', function () {
        inputValidation('#total_floor');
    });

    $('#storey').on('focusout', function () {
        inputValidation('#storey');
    });

    $('#sanitary_representative').on('focusout', function () {
        inputValidation('#sanitary_representative');
    });

    $('#sanitary_facility').on('focusout', function () {
        inputValidation('#sanitary_facility');
    });

    $('#isServeFood').on('focusout', function () {
        inputValidation('#isServeFood');
    });

    $('#food_service').on('focusout', function () {
        inputValidation('#food_service');
    });

    $('#sanitary_total_floor').on('focusout', function () {
        inputValidation('#sanitary_total_floor');
    });

    $('#sanitary_storey').on('focusout', function () {
        inputValidation('#sanitary_storey');
    });
})

function showFireRequestForm(){
    $('.content-holder-inspection').load('content-owner/inspection-request-form/fire_request_form.php');
}

function showSanitaryRequestForm(){
    $('.content-holder-inspection').load('content-owner/inspection-request-form/sanitary_request_form.php');
}

function insertFireRequest(){
    var representative = $('#representative').val();
    var business_nature = $('#business_nature').val();
    var total_floor = $('#total_floor').val();
    var storey = $('#storey').val();

    // console.log(representative + business_nature + total_floor + storey);

    if (representative == "" || business_nature == "" || total_floor == "" || storey == "") {
        return false;
    }

    $.post('insert_fire_request.php', {
        representative : representative,
        business_nature : business_nature,
        total_floor : total_floor,
        storey : storey,
    }, function (data, status){
        Swal.fire({
            title: 'Success',
            text: data,
            icon: 'success',
            showConfirmButton: true,
        });
        // $('#representative').val('');
        // $('#business_nature').val('');
        // $('#total_floor').val('');
        // $('#storey').val('');

        setTimeout(function() {
            window.location.href = 'owner_home.php';
        }, 2000);
    })
}


//SANITARY PART DITOOO

function insertSanitaryRequest(){
    // alert('this is sanitary');
    var sanitary_representative = $('#sanitary_representative').val();
    var sanitary_facility = $('#sanitary_facility').val();
    var isServeFood = $('#isServeFood').val();
    var food_service = $('#food_service').val();
    var sanitary_total_floor = $('#sanitary_total_floor').val();
    var sanitary_storey = $('#sanitary_storey').val();

    
    if (sanitary_representative == "" || sanitary_facility == "" || isServeFood == "" || food_service == "" || sanitary_total_floor == "" || sanitary_storey == "") {
        return false;
    }

    if (sanitary_total_floor <= 0) {
        $('#sanitary_total_floor').css('border', '1px solid red');
        $('#sanitary_total_floor').attr('placeholder', '*input valid value');
        return false;
    }

    if(sanitary_storey <= 0){
        $('#sanitary_storey').css('border', '1px solid red');
        $('#sanitary_storey').attr('placeholder', '*input valid value');
        return false;
    }

    
    $.post('insert_sanitary_request.php', {
        sanitary_representative : sanitary_representative,
        sanitary_facility : sanitary_facility,
        isServeFood : isServeFood,
        food_service : food_service,
        sanitary_total_floor : sanitary_total_floor,
        sanitary_storey : sanitary_storey,
    }, function (data, status){
        Swal.fire({
            title: 'Success',
            text: data,
            icon: 'success',
            showConfirmButton: true,
        });
        // $('#representative').val('');
        // $('#business_nature').val('');
        // $('#total_floor').val('');
        // $('#storey').val('');

        setTimeout(function() {
            window.location.href = 'owner_home.php';
        }, 2000);
    })


// console.log(sanitary_representative + ' ' + sanitary_facility + ' ' + isServeFood + ' ' + food_service + ' ' + sanitary_total_floor + ' ' + sanitary_storey);



}