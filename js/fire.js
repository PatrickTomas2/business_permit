$(document).ready(function() {
    showHome();
});

function showHome(){
    $('#content-placeholder').load('content-fire/fire_dashboard.php');
}

function showFireRequirements(){
    $('#content-placeholder').load('content-fire/checklist.php');
}

function showRequest(){
    $('#content-placeholder').load('content-fire/request.php');
}

function showInspection(){
    $('#content-placeholder').load('content-fire/schedule.php');
}

function showInspected(){
    $('#content-placeholder').load('content-fire/inspected.php');
}