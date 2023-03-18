<?php
require_once('./config.php');
session_start();
if (empty($_SESSION["id"])) {
  header("Location: login.php");
}
$name = $_SESSION['username'];

$_SESSION['username'] = $name;

$uid = $_SESSION['id'];

if(!isset($_GET['cart'])){
  if(empty($_SESSION['cart'])){
    $_SESSION['cart']=array();
  }
}

if(!isset($_GET['dbp'])){
  if(empty($_SESSION['dbp'])){
    $_SESSION['dbp'] = array();
  }
}


$sql = "SELECT * FROM test";
if ($result = mysqli_query($link, $sql)) {
  
    while ($row = mysqli_fetch_array($result)) {
        $country[] = $row['city'];
        $currency[] = $row['population'];
        
    }
    // mysqli_free_result($result);
  } else {
    echo '<p class="my-5"><b>No Books</b> </p>';
  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php include "./includes/header-scripts.php"; ?>
  <?php include "./includes/navbar.php"; ?>
</head>
<body>
   <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <canvas id="chart"></canvas>
        </div>
        <div class="col-sm-12 col-md-6">
            <h2>Total Number of Request : 1000</h2>
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <table class="table table-primary">
                  <tr>
                    <th>Bengin : 2000</th>
                  </tr>
                  <tr>
                    <td>This is the total benign request</td>
                  </tr>
                </table>
              </div>
              <div class="col-sm-12 col-md-6">
                <table class="table table-primary">
                  <tr>
                    <th>Robots : 500</th>
                  </tr>
                  <tr>
                    <td>
                      This is the total number of attack by robot <br> <a href="">Click here to view the Robot Report</a>
                    </td>
                  </tr>
                </table>
              </div>
              <div class="col-sm-12 col-md-6">
                <table class="table table-primary">
                  <tr>
                    <th>
                      Sqli Attack : 200
                    </th>
                  </tr>
                  <tr>
                    <td>This is the total number of sqli attack <br> <a href="">Click here to view sqli attack</a></td>
                  </tr>
                </table>
              </div>
              <div class="col-sm-12 col-md-6">
                <table class="table table-primary">
                  <tr>
                    <th>XSS Attack : 2000</th>
                  </tr>
                  <tr>
                    <td>This is the total number of XSS Attack <br> <a href="">Click here to view the XSS Attacks</a></td>
                  </tr>
                </table>
              </div>
            </div>
        </div>
    </div>
   </div>



   <?php include "./includes/footer-scripts.php"; ?>
   <script>
  const ctx = document.getElementById('chart');

new Chart(ctx, {
  type: 'pie',
  data: {
    labels: <?php echo json_encode($country);?>,
    datasets: [{
      label: 'in Thousand',
      data: <?php echo json_encode($currency);?>,
      borderWidth: 1
    }]
  },
  options: {
   
  }
});
    </script>
</body>
</html>