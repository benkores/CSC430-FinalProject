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

  <title>Flights Results</title>
</head>

<body>
  <div class="header">
    <img src="/img/airplane_header.PNG" alt="Airplane Header">

    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="/#"><b>BAX Airlines</b></a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="/book.php">Book a Flight</a></li>
          <li><a href="/boarding_passes.php">Boarding Passes</a></li>
          <li><a href="/policies">Policies</a></li>
          <!--blank for now-->
          <li><a href="/login_register.php">User Profile</a></li>
        </ul>
      </div>
    </nav>
  </div>

  <!-- wrapper to put everything in a box below header -->
  <!-- doesnt work yet -->
  <div class="wrapper">

    <div></br>placeholder</br></div>

  </div>
  <!--wrapper end-->

  </nav>
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