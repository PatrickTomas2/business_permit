$(document).ready(function() {
    showFireRequirements();
});

function showFireRequirements(){
    $('#content-placeholder').load('content-fire/checklist.php');
}

function showRequest(){
    $('#content-placeholder').load('content-fire/request.php');
}