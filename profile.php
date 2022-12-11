<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">

    <title>Profile</title>
  </head>
  <body>
    <div class="header">
      <nav class="navbar navbar-default">
        <img src="/img/airplane_header.PNG" alt="Airplane Header">
        <div class="container-fluid">
          <div class="navbar-header">
            <!-- this BAX Airlines header is also home/index/search flight -->
            <a class="navbar-brand active" href="/#"><b>BAX Airlines</b></a>
          </div>
          <ul class="nav justify-content-end">
            <li class="nav-item">
              <a class="nav-link" href="#">Book a Flight</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/boarding_passes.php">Boarding Passes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/profile.php">User Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/login_register.php">
                <?php echo $_SESSION['login'] ?>
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="wrapper">
      <div class="row">
        <div class="col-md-15">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Profile (John Smith)</h5>
              
              <a href="/boarding_passes.php">View Boarding Passes</a>
              <br>
              <br>
              <p>Username: johnsmith1234@aol.com</p>
              <p>Password: **********</p>
              <br>
              <p> Payment Methods:</p>
              <p> VISA 1234</p>
              <button class="btn btn-primary">Add a new payment method</button>
              <br>
              <br>
              <button class="btn btn-primary">Remove a payment method</button>
            </div>
          </div>
    </div>
  </body>
</html>

<?php
  include 'config/database.php';
  include 'class/accounts.php';
  include 'class/airports.php';
  include 'class/flight_seats.php';
  include 'class/flights.php';
  include 'class/user_bookings.php';
  require 'config/simple_html_dom.php';
  $database = new Database();
  $db = $database->getConnection();
    ?>