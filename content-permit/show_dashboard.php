<?php
    session_start();
    include '../config.php';

    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];

    $query = "SELECT COUNT(permit_id) AS count FROM business_permit_request WHERE MONTH(business_permit_request_date) = 4";
    $select_count_april = mysqli_query($conn, $query);
    if (mysqli_num_rows($select_count_april) > 0) {
        $row = mysqli_fetch_assoc($select_count_april);

        $april = $row['count'];
    }

    $query_two = "SELECT COUNT(permit_id) AS count FROM business_permit_request WHERE MONTH(business_permit_request_date) = 3";
    $select_count_march = mysqli_query($conn, $query_two);
    if (mysqli_num_rows($select_count_march) > 0) {
        $row = mysqli_fetch_assoc($select_count_march);

        $march = $row['count'];
    }

    $query_three = "SELECT COUNT(permit_id) AS count FROM business_permit_request WHERE MONTH(business_permit_request_date) = 2";
    $select_count_feb = mysqli_query($conn, $query_three);
    if (mysqli_num_rows($select_count_feb) > 0) {
        $row = mysqli_fetch_assoc($select_count_feb);

        $february = $row['count'];
    }


    $approved_business = mysqli_query($conn, "SELECT COUNT(permit_id) AS approved FROM business_permit_request WHERE isDone_permit = '1'");
    if (mysqli_num_rows($approved_business) > 0) {
      $row = mysqli_fetch_assoc($approved_business);
      
      $approved = $row['approved'];
    }

    $pending_business = mysqli_query($conn, "SELECT COUNT(permit_id) AS pending FROM business_permit_request WHERE isDone_permit = '0'");
    if (mysqli_num_rows($pending_business) > 0) {
      $row = mysqli_fetch_assoc($pending_business);
      
      $pending = $row['pending'];
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      .card {
        height: 100%;
      }

      .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
      }
    </style>
</head>
<body>
<div class="row">
  <div class="col-sm-8">
    <div class="card border-0">
      <div class="card-body">
        <h3 class="card-title text-center">Inspection request</h3>
        <canvas id="line-chart"></canvas>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card border-0">
      <div class="card-body">
        <div class="card w-100 border-0">
          <div class="card-body">
            <canvas width="150" height="150" id="chartjs-pie"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
    const april = <?php echo $april; ?>;
    const march = <?php echo $march; ?>;
    const february = <?php echo $february; ?>;
    const dataLine = {
      type: 'line',
      data: {
        labels: ["November", "December", "January", "February", "March", "April"],
        datasets: [{
            label: "Monhty Request",
            data: [5, 10, 2, february, march, april],
            backgroundColor: [
              'rgba(105, 0, 132, .2)',
            ],
            fill: true,
            borderColor: [
              'rgba(255, 99, 132, 0.8)',
            ],
            borderWidth: 2,
            tension: 0.4
          }
        ]
      },
      options: {
        responsive: true
      }
    };

    new Chart(document.getElementById('line-chart'), dataLine);

    const completed = <?php echo $approved; ?>;
    const pending = <?php echo $pending; ?>;

    var ctx = $("#chartjs-pie");
        var myLineChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Approved", "Pending"],
                datasets: [{
                    data: [completed, pending],
                    backgroundColor: ["rgba(200, 50, 255, 0.5)", "rgba(0, 100, 255, 0.5)"]
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Weather'
                }
            }
        });
});
</script>
</body>
</html>