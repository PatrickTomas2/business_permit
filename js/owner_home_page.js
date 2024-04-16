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
    // Swal.fire({
    //     icon: 'info',
    //     title: 'Apply Inspection Page',
    //     text: "On the apply inspection page, you can apply for your fire and sanitary inspection certificate by entering the required information and reviewing the essential details of the owner and the business.",
    //     confirmButtonText: 'Apply Now!',
    // });
    $('#content-placeholder').load('content-owner/inspection.php');
}

function renewPermit(){
    $('#content-placeholder').load('content-owner/renewal_business.php');
}