<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css'>
    <title>Document</title>
</head>
<style>
    body{
    background:#eee;
}

.card {
    box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: 1rem;
}

.card-body {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.5rem 1.5rem;
}
.avatar-text {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    background: #000;
    color: #fff;
    font-weight: 700;
}

.avatar {
    width: 3rem;
    height: 3rem;
}
.rounded-3 {
    border-radius: 0.5rem!important;
}
.mb-2 {
    margin-bottom: 0.5rem!important;
}
.me-4 {
    margin-right: 1.5rem!important;
}
</style>
<body>
<div class="container mt-3">
    <div class="text-center mb-5">
      <h3>Business Permit Applicants</h3>
    </div>
    <div class="card mb-3">
      <div class="card-body">
        <div class="d-flex flex-column flex-lg-row">
          <span class="avatar avatar-text rounded-3 me-4 mb-2">FD</span>
          <div class="row flex-fill">
            <div class="col-sm-5">
              <h4 class="h5">Junior Frontend Developer</h4>
              <span class="badge bg-secondary">WORLDWIDE</span> <span class="badge bg-success">$60K - $100K</span>
            </div>
            <div class="col-sm-4 py-2">
              <span class="badge bg-secondary">REACT</span>
              <span class="badge bg-secondary">NODE</span>
              <span class="badge bg-secondary">TYPESCRIPT</span>
            </div>
            <div class="col-sm-3 text-lg-end">
              <a href="#" class="btn btn-primary stretched-link">Apply</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card mb-3">
      <div class="card-body">
        <div class="d-flex flex-column flex-lg-row">
          <span class="avatar avatar-text rounded-3 me-4 bg-warning mb-2">BE</span>
          <div class="row flex-fill">
            <div class="col-sm-5">
              <h4 class="h5">Senior Backend Engineer</h4>
              <span class="badge bg-secondary">US</span> <span class="badge bg-success">$90K - $180K</span>
            </div>
            <div class="col-sm-4 py-2">
              <span class="badge bg-secondary">GOLANG</span>
              <span class="badge bg-secondary">SENIOR</span>
              <span class="badge bg-secondary">ENGINEER</span>
              <span class="badge bg-secondary">BACKEND</span>
            </div>
            <div class="col-sm-3 text-lg-end">
              <a href="#" class="btn btn-primary stretched-link">Apply</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card mb-3">
      <div class="card-body">
        <div class="d-flex flex-column flex-lg-row">
          <span class="avatar avatar-text rounded-3 me-4 bg-info mb-2">PM</span>
          <div class="row flex-fill">
            <div class="col-sm-5">
              <h4 class="h5">Director of Product Marketing</h4>
              <span class="badge bg-secondary">WORLDWIDE</span> <span class="badge bg-success">$150K - $210K</span>
            </div>
            <div class="col-sm-4 py-2">
              <span class="badge bg-secondary">PRODUCT MARKETING</span>
              <span class="badge bg-secondary">MARKETING</span>
              <span class="badge bg-secondary">EXECUTIVE</span>
              <span class="badge bg-secondary">ECOMMERCE</span>
            </div>
            <div class="col-sm-3 text-lg-end">
              <a href="#" class="btn btn-primary stretched-link">Apply</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'></script>
</body>
</html>