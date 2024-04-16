$(document).ready(function (){
    showRequestList();
})

var global_business = "";

function showRequestList(){
    $('.content-holder-sanitary-request').load('content-sanitary/sanitary_request_content_load.php');
}

function infoHolder(business_name){
    var formatted_business_name = business_name.replace(/\s+/g, '-');

    $('#'+formatted_business_name+'-info-holder').show();
    $('#'+formatted_business_name+'-info-holder').load('content-sanitary/info-holder.php?business_name='+formatted_business_name);
}

function setBusiness(business_name){
    global_business = business_name;
    //alert(global_business);
}

function closeInfo(business_name){
    $('#'+business_name+'-info-holder').hide();
}

function acceptRequest(){
    var request_date = $('#request_date').val();

    if (request_date == "") {
        $('.modal-error-title').text('Set schedule.').css('color', 'red');
        return false;
    }
    // alert(request_date + ' ' + business_name);

    $.post('accept_sanitary_request.php', {
        request_date : request_date,
        business_name : global_business,
    }, function (data, status){
        // window.location.href = 'sanitary_home.php';
        showRequestList();
    })
}

function searchRequest(){
    var search_business_name = $('#search_business_name').val();
    var request_start_date = $('#request_start_date').val();
    var request_end_date = $('#request_end_date').val();

    var query = 'content-sanitary/searchRequest.php?search_business_name='+search_business_name;

    if (request_start_date !== '' && request_end_date !== '') {
        query += '&request_start_date='+request_start_date+'&request_end_date='+request_end_date;
    }

    $('.content-holder-sanitary-request').load(query);
}