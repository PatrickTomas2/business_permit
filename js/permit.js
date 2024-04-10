$(document).ready(function() {
    showApplicants();
});

function showApplicants(){
    $('#content-placeholder').load('content-permit/trypermit.php');
}
