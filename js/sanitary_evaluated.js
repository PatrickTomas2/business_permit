$(document).ready(function (){
    showInspectedList();
})

function showInspectedList(){
    $('.content-holder-fire-inspected').load('content-sanitary/sanitary_inspected_content_load.php');
}

function infoHolder(business_name){
    var formatted_business_name = business_name.replace(/\s+/g, '-');

    $('#'+formatted_business_name+'-info-holder').show();
    $('#'+formatted_business_name+'-info-holder').load('content-sanitary/info-holder-inspected.php?business_name='+formatted_business_name);
}

function closeInfo(business_name){
    $('#'+business_name+'-info-holder').hide();
}