<?php
    session_start();
    include '../config.php';

    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];

    $query = "SELECT COUNT(request_id) AS count FROM sanitary_inspection_request WHERE MONTH(request_date_time) = 4";
    $select_count_april = mysqli_query($conn, $query);
    if (mysqli_num_rows($select_count_april) > 0) {
        $row = mysqli_fetch_assoc($select_count_april);

        $april = $row['count'];
    }

    $query_two = "SELECT COUNT(request_id) AS count FROM sanitary_inspection_request WHERE MONTH(request_date_time) = 3";
    $select_count_march = mysqli_query($conn, $query_two);
    if (mysqli_num_rows($select_count_march) > 0) {
        $row = mysqli_fetch_assoc($select_count_march);

        $march = $row['count'];
    }

    $query_three = "SELECT COUNT(request_id) AS count FROM sanitary_inspection_request WHERE MONTH(request_date_time) = 2";
    $select_count_feb = mysqli_query($conn, $query_three);
    if (mysqli_num_rows($select_count_feb) > 0) {
        $row = mysqli_fetch_assoc($select_count_feb);

        $february = $row['count'];
    }

    $count_today_sched = mysqli_query($conn, "SELECT COUNT(request_id) AS sched_today FROM sanitary_inspection_request WHERE isAccepted = '1' AND isDone = '0' AND DATE(inspection_schedule) = CURDATE();");
    if (mysqli_num_rows($count_today_sched) > 0) {
      $row = mysqli_fetch_assoc($count_today_sched);
      
      $sched_today_count = $row['sched_today'];
    }

    $count_completed = mysqli_query($conn, "SELECT COUNT(request_id) AS completed FROM sanitary_inspection_request WHERE isAccepted = '1' AND isDone = '1'");
    if (mysqli_num_rows($count_completed) > 0) {
      $row = mysqli_fetch_assoc($count_completed);
      
      $completed = $row['completed'];
    }

    $count_pending = mysqli_query($conn, "SELECT COUNT(request_id) AS pending FROM sanitary_inspection_request WHERE isAccepted = '0' AND isDone = '0'");
    if (mysqli_num_rows($count_pending) > 0) {
      $row = mysqli_fetch_assoc($count_pending);
      
      $pending = $row['pending'];
    }

    $count_upcoming_sched = mysqli_query($conn, "SELECT COUNT(request_id) AS upcoming_schedules FROM sanitary_inspection_request WHERE isAccepted = '1' AND isDone = '0' AND DATE(inspection_schedule) > CURDATE()");
    if (mysqli_num_rows($count_upcoming_sched) > 0) {
      $row = mysqli_fetch_assoc($count_upcoming_sched);
      
      $upcoming_sched = $row['upcoming_schedules'];
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-3.3.1.js?ver001"></script>
    <script src="js/fire_dashboard.js?ver=002"></script>
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
            <h3 class="card-title text-center">Today's Inspections</h3>
            <h1 class="text-center"><?=$sched_today_count?></h1>
          </div>
        </div>
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
            data: [5, 7, 2, 4, 5, april],
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

    const completed = <?php echo $completed; ?>;
    const pending = <?php echo $pending; ?>;
    const upcoming = <?php echo $upcoming_sched; ?>;

    var ctx = $("#chartjs-pie");
        var myLineChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Completed", "Pending", "Upcoming inspection"],
                datasets: [{
                    data: [completed, pending, upcoming],
                    backgroundColor: ["rgba(200, 50, 255, 0.5)", "rgba(0, 100, 255, 0.5)", "rgba(255, 0, 0, 0.5)"]
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