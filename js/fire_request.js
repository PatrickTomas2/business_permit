$(document).ready(function (){
    showRequestList();
})

function showRequestList(){
    $('.content-holder-fire-request').load('content-fire/fire_request_content_load.php');
}

function infoHolder(business_name){
    var formatted_business_name = business_name.replace(/\s+/g, '-');

    $('#'+formatted_business_name+'-info-holder').show();
    $('#'+formatted_business_name+'-info-holder').load('content-fire/info-holder.php?business_name='+formatted_business_name);
}


function closeInfo(business_name){
    $('#'+business_name+'-info-holder').hide();
}

function acceptRequest(business_name){
    var request_date = $('#request_date').val();

    if (request_date == "") {
        $('.modal-error-title').text('Set schedule.').css('color', 'red');
        return false;
    }
    // alert(request_date + ' ' + business_name);

    $.post('accept_fire_request.php', {
        request_date : request_date,
        business_name : business_name,
    }, function (data, status){
        // alert(data);
        window.location.href = 'fire_home.php';
        showRequestList();
    })
}