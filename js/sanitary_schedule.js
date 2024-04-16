$(document).ready(function (){
    loadSchedToday();
    loadSchedRemaining();
})

function loadSchedToday(){
    $('.content-schedule-today').load('content-sanitary/load-sanitary-sched.php');
}

function loadSchedRemaining(){
    $('.content-remaining-schedule').load('content-sanitary/load-sanitary-remaining-sched.php');
}

function infoHolderSched(business_name){
    var formatted_business_name = business_name.replace(/\s+/g, '-');

    $('#'+formatted_business_name+'-info-holder-sched').show();
    $('#'+formatted_business_name+'-info-holder-sched').load('content-sanitary/info-holder-sched.php?business_name='+formatted_business_name);
}

function closeInfoSched(business_name){
    $('#'+business_name+'-info-holder-sched').hide();
}

function showInspectChecklist(business_name){
    // alert(business_name);

    window.location.href = 'sanitary_inspection_checklist.php?business_name='+business_name;
}