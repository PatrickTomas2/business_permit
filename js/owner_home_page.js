$(document).ready(function() {
    showChecklist();
});

function showPermit(){
    $('#content-placeholder').load('content-owner/permit.php');
}

function showChecklist(){
    $('#content-placeholder').load('content-owner/checklist.php');
}

function showProfile(){
    $('#content-placeholder').load('content-owner/profile.php');
}

function showInspection(){
    $('#content-placeholder').load('content-owner/inspection.php');
}