
$(document).ready(function() {

    // Swal.fire({
    //     icon: 'info',
    //     title: 'Apply Business Permit Page',
    //     text: "On the apply business permit page, you can apply for your business permit by entering the required information from the checklist and reviewing the essential details of the owner and the business.",
    //     confirmButtonText: 'Apply Now!',
    // });
    $('.owner-info').hide();
    $('.button-next-one').hide();
    $('.button-back-zero').hide();

    $('.business-info').hide();
    $('.button-next-two').hide();
    $('.button-back-one').hide();
    $('.lesser-info').hide();
    $('.terms-info').hide();
    $('.button-submit').hide();
   
});
function displayFileName(input, name) {
    var label = input.previousElementSibling; // Using previousElementSibling to target the label
    var fileName = input.files[0].name;
    label.innerHTML = fileName;

    updateButtonTextColor(name);
}
function btnNextZero(){
    if(validateForm() == true){
        $('.owner-info').show();
    $('.button-next-one').show();
    $('.button-back-zero').show();

    $('.get-info').hide();
    $('.button-next-zero').hide();
    }
    
    
}

function btnBackZero(){
    $('.get-info').show();
    $('.button-next-zero').show();

    $('.owner-info').hide();
    $('.button-next-one').hide();
    $('.button-back-zero').hide();

    
}

function btnNextOne(){
    $('.business-info').show();
    $('.button-next-two').show();
    $('.button-back-one').show();

    $('.owner-info').hide();
    $('.button-next-one').hide();
    $('.button-back-zero').hide();
}

function btnBackOne(){
    $('.business-info').hide();
    $('.button-next-two').hide();
    $('.button-back-one').hide();

    $('.owner-info').show();
    $('.button-next-one').show();
    $('.button-back-zero').show();
}

function btnNextTwo(){
    $('.terms-info').show();
    $('.button-submit').show();
   // $('.button-back-two').hide();

    $('.business-info').hide();
    $('.button-next-two').hide();
    $('.button-back-one').hide();
}

function validateForm() {
    var fields = ["req1", "req2", "req3", "req4", "req5", "req6", "req7"];
    var errorMessages = ["req1_error", "req2_error", "req3_error", "req4_error", "req5_error", "req6_error", "req7_error"];
    var error = false;

    for (var i = 0; i < fields.length; i++) {
        var fieldValue = document.getElementById(fields[i]).value.trim();
        var errorMessageElement = document.getElementById(errorMessages[i]);

        if (fieldValue === "") {
            errorMessageElement.innerHTML = "* <i>Required</i>";
            error = true;
        } else {
            errorMessageElement.innerHTML = "";
        }
    }

    if (error) {
        //alert("Please fill out the input field.");
        return false; // Prevent form submission
    }
    return true;
}

function checkTermsAndSubmit(business_id) {
    var termsCheckbox = document.getElementById('recordTrue');
    var termsCheckbox2 = document.getElementById('terms');

    if (termsCheckbox.checked && termsCheckbox2.checked) {
        SubmitRequirement(business_id); // Proceed with form submission
    } else {
        document.getElementById('error_recordTrue').innerHTML ="*";
        document.getElementById('error_terms').innerHTML ="*";
        alert('Please accept the terms and conditions.');
    }
}

function SubmitRequirement(business_id){

    var file_data = $('#req1').prop('files')[0];
    var file_data2 = $('#req2').prop('files')[0];
    var file_data3 = $('#req3').prop('files')[0];
    var file_data4 = $('#req4').prop('files')[0];
    var file_data5 = $('#req5').prop('files')[0];
    var file_data6 = $('#req6').prop('files')[0];
    var file_data7 = $('#req7').prop('files')[0];
    var form_data = new FormData();
    form_data.append('req1', file_data);
    form_data.append('req2', file_data2);
    form_data.append('req3', file_data3);
    form_data.append('req4', file_data4);
    form_data.append('req5', file_data5);
    form_data.append('req6', file_data6);
    form_data.append('req7', file_data7);


        // var formData = new FormData('#postForm');
        // console.log(formData);
        $.ajax({
            url: 'create.php?business_id='+business_id,
            method: 'POST',
            data: form_data,
            contentType: false,
            processData: false,
            success: function(response){
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: response,
                    confirmButtonText: 'OK',
                }).then((result) => {
                    // Redirect to another page
                    if (result.isConfirmed) {
                        window.location.href = 'owner_home.php';
                    }
                });
                
            }
        });
    }


function ChooseNewRenew(business) {
    var businessForDisplay = business;
    $('#content-placeholder').load('content-owner/apply-permit/display_info.php?businessForDisplay=' + businessForDisplay);
}

function showApplicationForm(business) {
    console.log(business);
    var businessForDisplay = business;
    $.ajax({
        url: 'business_status.php',
        method: 'GET', // Change method to GET
        data: { businessForDisplay: businessForDisplay },
        success: function(response) {
            console.log(response); // Log the response for debugging
            // Check if response contains 'VERIFYING' or 'Business Approved'
            if (response.includes('Waiting for business') || response.includes('Business Approved')) {
                $('.content-holder-application').load('content-owner/apply-permit/display_status.php?response=' + encodeURIComponent(response));
            } else {
                $('#content-placeholder').load('content-owner/apply-permit/for_application.php?businessForDisplay=' + encodeURIComponent(businessForDisplay));
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText); // Log any errors
        }
    });
}






function updateButtonTextColor(inputId) {
    var fileInput = document.getElementById(inputId);
    var button = document.getElementById(inputId + "_btn"); // Assuming button IDs are suffixed with _btn

    // Check if file input has a file selected
    if (fileInput.files.length > 0) {
        button.classList.remove("text-danger"); // Remove text-danger class
        button.classList.add("text-success"); // Add text-success class
    } else {
        button.classList.add("text-danger"); // Add text-danger class if no file selected
        button.classList.remove("text-success"); // Remove text-success class
    }
}



