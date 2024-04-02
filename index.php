<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Business Permit System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="landing_page_style.css">
    <script src="js/jquery-3.3.1.js?ver=001"></script>
    <script src="js/landing_page.js?ver=001"></script>
  </head>
  <body>
    
  <section class="header">
    <div class="container">

      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="assets/images/santo_tomas_logo.png" alt="Logo" height="110">
                <span class="ms-3 fs-2 fw-bold">Santo Tomas</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                          <a class="nav-link act" aria-current="page" href="#">Home</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#about-permit">About business permit</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#faq">FAQ</a>
                      </li>
                      <li class="nav-item">
                        <button type="button" class="btn custom-btn-register ms-3" onclick="navigateToRegister()">Register</button>
                      </li>
                      <li class="nav-item">
                        <button type="button" class="btn custom-btn-login ms-3" onclick="navigateToLogin()">Login</button>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>

        <div class="middle">
            <h1 class="text-white fw-bold">Get your <span class="theme-text">business permit today</span>.</h1>
        </div>
    </div>
  </section>
<br>
<br>

  <section id="about-permit" class="about-permit">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-justify">
                <h2>About Business Permit</h2>
                <p>A business permit in <span class="theme-text fw-bold">Santo Tomas</span> is more than just a certification; it's a testament to your <span class="theme-text fw-bold">business's legitimacy and authorization</span> to operate in the town. Often referred to as the mayor's permit, this official document is processed by the local government unit (LGU) of Santo Tomas.</p>
                <p>Beyond its regulatory nature, a business permit signifies your commitment to fiscal responsibility and adherence to local regulations concerning safety, security, health, and sanitation. It also opens doors to various support services provided by LGUs to businesses within their jurisdiction.</p>
            </div>
            <div class="col-md-6">
                <img src="assets/images/business_permit_img.webp" alt="Business Permit Image" class="img-fluid">
            </div>
        </div>
    </div>
  </section>
  
<br><br>

<section class="bg-light py-3 py-md-5" id="faq">
  <div class="container">
    <div class="row gy-5 gy-lg-0 align-items-lg-center">
      <div class="col-12 col-lg-6">
        <img class="img-fluid rounded" loading="lazy" src="/assets/images/faq-img-1.png" alt="How can we help you?">
      </div>
      <div class="col-12 col-lg-6">
        <div class="row justify-content-xl-end">
          <div class="col-12 col-xl-11">
            <h2 class="h1 mb-3">How can we help you?</h2>
            <p class="lead fs-4 text-secondary mb-5">Here are some FAQ about business permit.</p>
            <div class="accordion accordion-flush" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button custom-btn text-light fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    How much does a business permit cost in Santo Tomas?
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <p>Here are some fees you should pay when processing your business permit application. </p>
                    <ul>
                      <li>Business permit processing fee: ₱500 </li>
                      <li>Mayor’s permit fee: ₱100</li>
                      <li>Sanitary fee: ₱150 </li>
                      <li>Fire safety inspection fee: ₱300</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button custom-btn collapsed text-light fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Can I operate immediately after I receive my business permit?
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <p>Yes, you can start your business operation once your permit application is approved.</p>
                    <p>But don't forget to secure the following documents as well:</p>
                    <ul>
                      <li>Business TIN and Certificate of Registration from the BIR</li>
                      <li>Business SSS Number</li>
                      <li>Pag-IBIG Employer-Member Registration</li>
                      <li>PhilHealth Employer-Member Registration</li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button custom-btn collapsed text-light fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Is a business permit required to open a sari-sari store?
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <p>Owners of sari-sari stores and karinderyas still need to operate legally and must secure a business permit. Santo Tomas don’t require Public Liability Insurance for these types of businesses. </p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                  <button class="accordion-button custom-btn collapsed text-light fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    When is the deadline for business permit application renewal?
                  </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <p>Business owners are required to renew their business permits on or before January 20 of each year. </p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                  <button class="accordion-button custom-btn collapsed text-light fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    I registered my business last October 2022. Should I renew my business permit this October 2023?
                  </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <p>No. All businesses, regardless of the date of registration, should be renewed before January 20 of each year. This means you don't need to renew your business permit exactly a year after your registration date.</p>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingSix">
                  <button class="accordion-button custom-btn collapsed text-light fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                    What happens if I fail to renew my business permit?
                  </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <p>Failure to renew your business permit may result in payment of a 25% surcharge on top of the tax assessed, and an additional 2% for each month that the business permit was not renewed.</p>
                    <p>You may also be asked by the BIR to pay a fine of ₱5,000 up to ₱25,000. Delinquencies may also lead to the closure of the business and the seizure of business assets.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>