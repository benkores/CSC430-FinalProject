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
    <nav class="navbar navbar-default">
      <img src="/img/airplane_header.PNG" alt="Airplane Header">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="/#"><b>BAX Airlines</b></a>
        </div>
        <ul class="nav justify-content-end">
          <li class="nav-item">
            <a class="nav-link" href="/book.php">Book a Flight</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/boarding_passes.php">Boarding Passes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/login_register.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/profile.php">User Profile</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>

  <div class="wrapper">
    <h5 for="result"><b>#1 &emsp;&emsp; ATL --> LAX</b></h5></br>

    <table>
      <tr>
        <td>
          <ul class="infoLabels">
            <li class="departs">Departs:</li>
            <li class="arrives">Arrives:</li>
            <li class="gate">Gate:</li>
            <li class="terminal">Terminal:</li>
            <li class="boardingBegins">Boarding Begins:</li>
            <li class="boardingEnds">Boarding Ends:</li>
            <li class="numberSeats">Number of Seats:</li>
            <li class="priceSeat">Price per Seat:</li>
          </ul>
        </td>
        <td>
          <ul class="information">
            <li class="departsInfo">11/01/2022 9:00 AM</li>
            <li class="arrivesInfo">11/01/2022 12:00 PM</li>
            <li class="gateInfo">B9</li>
            <li class="terminalInfo">1</li>
            <li class="boardingBeginsInfo">8:15 AM</li>
            <li class="boardingEndsInfo">8:45 AM</li>
            <li class="numberSeatsInfo">60</li>
            <li class="priceSeatInfo">$200</li>
          </ul>
        </td>
      </tr>
    </table>

    <!-- can be replaced by eventlistener -->
    <!-- replace /# with page/file after clicking book
    currently leads back to index/home/flight serach -->
    <a href="/#">
      <button type="submit" class="btn btn-primary">Book</button>
    </a>

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