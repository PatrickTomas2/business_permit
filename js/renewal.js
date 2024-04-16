$(document).ready(function() {
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

function displayFileName(input, name) {
    var label = input.previousElementSibling; // Using previousElementSibling to target the label
    var fileName = input.files[0].name;
    label.innerHTML = fileName;

    updateButtonTextColor(name);
}

function validateForm() {
    var fields = ["req1", "req2", "req3", "req4", "req5"];
    var errorMessages = ["req1_error", "req2_error", "req3_error", "req4_error", "req5_error"];
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
    var form_data = new FormData();
    form_data.append('req1', file_data);
    form_data.append('req2', file_data2);
    form_data.append('req3', file_data3);
    form_data.append('req4', file_data4);
    form_data.append('req5', file_data5);


        // var formData = new FormData('#postForm');
        // console.log(formData);
        $.ajax({
            url: 'add_renewal.php?business_id='+business_id,
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