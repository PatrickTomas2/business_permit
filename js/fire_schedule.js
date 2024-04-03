$(document).ready(function (){
    loadSchedToday();
    loadSchedRemaining();
})

function loadSchedToday(){
    $('.content-schedule-today').load('content-fire/load-fire-sched.php');
}

function loadSchedRemaining(){
    $('.content-remaining-schedule').load('content-fire/load-fire-remaining-sched.php');
}

function infoHolderSched(business_name){
    var formatted_business_name = business_name.replace(/\s+/g, '-');

    $('#'+formatted_business_name+'-info-holder-sched').show();
    $('#'+formatted_business_name+'-info-holder-sched').load('content-fire/info-holder-sched.php?business_name='+formatted_business_name);
}

function closeInfoSched(business_name){
    $('#'+business_name+'-info-holder-sched').hide();
}

function showInspectChecklist(business_name){
    // alert(business_name);

    window.location.href = 'fire_inspection_checklist.php?business_name='+business_name;
}