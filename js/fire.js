$(document).ready(function() {
    showInspection();
});

function showFireRequirements(){
    $('#content-placeholder').load('content-fire/checklist.php');
}

function showRequest(){
    $('#content-placeholder').load('content-fire/request.php');
}

function showInspection(){
    $('#content-placeholder').load('content-fire/schedule.php');
}