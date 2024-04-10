<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $response = $_GET['response'];
    if ($response == 'Waiting for business') {
    ?>
    <div class="card">
        <div class="card-body">
            <p>Your request for Business Permit is <span class="fw-bold text-danger">VERIFYING</span>.</p>
            <p>Please exercise patience as you will be provided with the date to fulfill the requirement and obtain your business permit.</p>
        </div>
    </div>
    <?php
    }
    else if($response == 'Business Approved'){
    ?>
    <div class="card">
        <div class="card-body">
        <p>Your business permit is <span class="fw-bold text-success">DONE</span>. Get your business permit tommorow on our office. Please bring all the documents and payment(₱1000).</p>
        </div>
    </div>
    <?php
    }
    ?>

</body>
</html>
