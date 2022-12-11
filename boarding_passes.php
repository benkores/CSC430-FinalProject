<?php
session_start();
require_once 'config/connect.php';
if (isset($_SESSION['AccountID'])) {
  $_SESSION['login'] = "Logout";
} else {
  $_SESSION['login'] = "Login";
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/favicon.ico">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">

  <title>Home</title>
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
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">ATL to LAX</h5>
          <p class="card-text">Gate: 21C | Terminal: 1 | Boarding Group: 3 | Seat 12A</p>
          <p>Name: John Smith</p>
          <p>Person Type: Adult</p>
          <p>Departs: 12/23/2022 9:00 AM</p>
          <p>Arrives: 12/23/2022 12:00 PM</p>
          <p>Boarding Begins: 8:15 AM</p>
          <p>Boarding Ends: 8:45 AM</p>
          <button class="btn btn-primary ms-1">Print</button>
          <button class="btn btn-primary">Cancel</button>
        </div>
      </div>
    </div>

      </div>
    </div>
  </div>
</div>
  </body>
</html>