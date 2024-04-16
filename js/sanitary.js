$(document).ready(function() {
    showHome();
});

function showHome(){
    $('#content-placeholder').load('content-sanitary/sanitary_dashboard.php');
}

function showRequest(){
    $('#content-placeholder').load('content-sanitary/request.php');
}

function showInspection(){
    $('#content-placeholder').load('content-sanitary/schedule.php');
}

function showInspected(){
    $('#content-placeholder').load('content-sanitary/inspected.php');
}