<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">

  <title>User Profile</title>
</head>

<body>
  <div class="header">
    <nav class="navbar navbar-default">
      <img src="/img/airplane_header.PNG" alt="Airplane Header">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="/#"><b>BAX Airlines</b></a>
        </div>
        <ul class="nav justify-content-end">
          <li class="nav-item">
            <a class="nav-link" href="/index.php">Book a Flight</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/boarding_passes.php">Boarding Passes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/login_register.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/profile.php">User Profile</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>

  <div class="wrapper">
    <div class="row">

      <!-- register form -->
      <div class="col-sm-6">
        <h5 class="card-title"><b>REGISTER</b></h5>
        </br>
        <form>
          <div class="form-group">
            <label for="username">USERNAME</label>
            <input type="text" class="form-control" id="inputUsername" placeholder="enter username">
          </div>
          </br>
          <div class="form-group">
            <label for="password">PASSWORD</label>
            <input type="password" class="form-control" id="inputPassword" placeholder="enter password">
          </div>
          </br></br></br>
          <button type="submit" class="btn btn-primary">REGISTER</button>
        </form>
      </div>

      <!-- login form -->
      <div class="col-sm-6">
        <h5 class="card-title"><b>LOGIN</b></h5>
        </br>
        <form>
          <div class="form-group">
            <label for="username">USERNAME</label>
            <input type="text" class="form-control" id="inputUsername" placeholder="enter username">
          </div>
          </br>
          <div class="form-group">
            <label for="password">PASSWORD</label>
            <input type="password" class="form-control" id="inputPassword" placeholder="enter password">
          </div>
          </br>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="dropdownCheck">
            <label class="form-check-label" for="dropdownCheck">
              Remember me
            </label>
          </div>
          </br>
          <button type="submit" class="btn btn-primary">LOGIN</button>
        </form>
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