<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">

    <title>Boarding Passes</title>
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
    <div class= "boarding pass information">
      <h2>ATL to LAX</h2>
        <p>
          Full Name: John Doe
          Date: December 23, 2022
          Boarding Time: 8:00am
          Departing Airport: Atlanta International Airport
          Arriving: Airport: Los Angeles International Airport 
          Estimated Flight Duration: 6h 52m
          Gate: 22A
          Group C Seat: 23B
        </p>
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