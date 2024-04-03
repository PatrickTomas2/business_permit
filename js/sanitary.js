$(document).ready(function() {
    showSanitaryRequirements();
});

function showSanitaryRequirements(){
    $('#content-placeholder').load('content-sanitary/checklist.php');
}

function showRequest(){
    $('#content-placeholder').load('content-sanitary/request.php');
}

function showInspection(){
    $('#content-placeholder').load('content-sanitary/schedule.php');
}