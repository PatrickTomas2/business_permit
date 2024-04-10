<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        input[type="file"] {
            display: none;
        }
        .file_input {
            height: 100px;
            width: auto;
            border-radius: 6px;
            border: 1px dashed #999;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer; /* Add cursor pointer to indicate it's clickable */
        }
        .file_input:hover {
            color: #de0611;
            border: 1px dashed #de0611;
        }
    </style>
</head>
<body>
<div class="container">
    <form id="postForm" enctype="multipart/form-data" method="post" onsubmit="return validateForm()">
        <section class="bg-light py-3 py-md-5" id="faq">
            <div class="accordion accordion-flush" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button id="req1_btn" class="accordion-button custom-btn text-danger fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            1 <span id="req1_error" class="error"></span>
                            <i class="bi bi-chevron-down ml-auto"></i> <!-- Bootstrap icon for toggling -->
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="mb-3">
                                <label for="req1" class="file_input">Upload 2x2 picture</label>
                                <input type="file" id="req1" name="req1" onchange="displayFileName(this)" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button id="req2_btn" class="accordion-button custom-btn text-danger fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            2
                            <i class="bi bi-chevron-down ml-auto"></i> <!-- Bootstrap icon for toggling -->
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="mb-3">
                                <label for="req2" class="file_input">Upload 2x2 picture <span id="req2_error" class="error"></span></label>
                                <input type="file" id="req2" name="req2" onchange="displayFileName(this)" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button id="req3_btn" class="accordion-button custom-btn text-danger fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            3
                            <i class="bi bi-chevron-down ml-auto"></i> <!-- Bootstrap icon for toggling -->
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="mb-3">
                                <label for="req3" class="file_input">Upload 2x2 picture <span id="req3_error" class="error"></span></label>
                                <input type="file" id="req3" name="req3" onchange="displayFileName(this)" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button id="req4_btn" class="accordion-button custom-btn text-danger fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            4<span id="req4_error" class="error"></span>
                            <i class="bi bi-chevron-down ml-auto"></i> <!-- Bootstrap icon for toggling -->
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="mb-3">
                                <label for="req4" class="file_input">Upload 2x2 picture </label>
                                <input type="file" id="req4" name="req4" onchange="displayFileName(this)" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button id="req5_btn" class="accordion-button custom-btn text-danger fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            5<span id="req5_error" class="error"></span>
                            <i class="bi bi-chevron-down ml-auto"></i> <!-- Bootstrap icon for toggling -->
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="mb-3">
                                <label for="req5" class="file_input">Upload 2x2 picture </label>
                                <input type="file" id="req5" name="req5" onchange="displayFileName(this)" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSix">
                        <button id="req6_btn" class="accordion-button custom-btn text-danger fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            6<span id="req6_error" class="error"></span>
                            <i class="bi bi-chevron-down ml-auto"></i> <!-- Bootstrap icon for toggling -->
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="mb-3">
                                <label for="req6" class="file_input">Upload 2x2 picture </label>
                                <input type="file" id="req6" name="req6" onchange="displayFileName(this)" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSeven">
                        <button id="req7_btn" class="accordion-button custom-btn text-danger fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            7<span id="req7_error" class="error"></span>
                            <i class="bi bi-chevron-down ml-auto"></i> <!-- Bootstrap icon for toggling -->
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="mb-3">
                                <label for="req7" class="file_input">Upload 2x2 picture </label>
                                <input type="file" id="req7" name="req7" onchange="displayFileName(this)" required>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Other accordion items -->
            </div>
        </section>  
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Loop through req1 to req7
        for (let i = 1; i <= 7; i++) {
            let reqId = "req" + i;
            document.getElementById(reqId).addEventListener("change", function() {
                updateButtonTextColor(reqId);
            });
        }
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

    function displayFileName(input) {
        var label = input.previousElementSibling; // Using previousElementSibling to target the label
        var fileName = input.files[0].name;
        label.innerHTML = fileName;
    }

    function validateForm() {
        var req1 = document.getElementById("req1").value;
        var error = false;

        if (req1.trim() == "") {
            document.getElementById("req1_error").innerHTML = "Please select a file.";
            error = true;
        } else {
            document.getElementById("req1_error").innerHTML = "";
        }

        if (error) {
            return false; // Prevent form submission
        }
        return true; // Allow form submission
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
