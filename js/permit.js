$(document).ready(function() {
    showPermitHome();
});

function showApplicants(){
    $('#content-placeholder').load('content-permit/show_applicants.php');
}
function showRenewalApplicants(){
    $('#content-placeholder').load('content-permit/show_renewal_applicants.php');
}

function showRenewalApplicantsDetails(business){
    console.log('natatawag');
    var business_id = business;
    $('#content-placeholder').load('show_renewal_applicants_details.php?business_id=' + business_id);
}

function showApprovedApplicants(business){
    var business_id = business;
    $('#content-placeholder').load('content-permit/approved_applicants.php?business_id=' + business_id);
}

function showApprovedBusiness(business){
    var business_id = business;
    $('#content-placeholder').load('content-permit/approved_business.php?business_id=' + business_id);
}

function showPermitHome(){
    $('#content-placeholder').load('content-permit/show_dashboard.php');
}

function showApplicantsDetails(business){
    var business_id = business;
    $('#content-placeholder').load('show_applicants_details.php?business_id=' + business_id);
}

function showApplicantsOwner(business_id){
    $('#content-placeholder').load('content-permit/show_owner&business.php?permit_id=' + business_id);
}

function approveApplicant(permit_id){
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: 'Are you sure you want to approve?',
        showCancelButton: true,
        confirmButtonText: 'YES',
        cancelButtonText: 'NO',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'approve_permit.php',
                method: 'POST', // Change method to GET
                data: { permit_id: permit_id },
                success: function(response) {
                    Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response,
                            confirmButtonText: 'DONE',
                        }).then((result) => {
                            // Redirect to another page
                            if (result.isConfirmed) {
                                window.location.href = 'permit_home.php';
                            }
                        });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); 
                }
            });
        }
    });

    
}
