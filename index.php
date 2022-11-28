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

  <title>Home</title>
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

    <div class="fromDestination">
      <label for="from">FROM</label>
      <div class="field">
        <input type="text" placeholder="ATL (Atlantic In...)" required>
      </div>
    </div>

    <div class="toDestination">
      <label for="to">TO</label>
      <div class="field">
        <input type="text" placeholder="LAX (Los Angele...)" required>
      </div>
    </div>

    </br>

    <div class="departureDate">
      <label for="to">DEPARTURE DATE</label>
      <div class="field">
        <input type="date" data-date-inline-picker="true" required />
      </div>
    </div>

    </br>

    <div class="dropdown">
      <label for="Travelers">TRAVELERS:</label>
      <select name="adults" id="adults">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
      </select>
      <span style="font-size: 10pt;">
        ADULTS
      </span>
    </div>

    </br>

    <div class="dropdown">
      <label style="margin-left: 92px"></label>
      <select name="childs" id="childs">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
      </select>
      <span style="font-size: 10pt;">
        CHILDS
      </span>
    </div>

    </br>

    <div class="dropdown">
      <label for="Travelers">CLASS:</label>
      <select name="childs" id="childs">
        <option value="economy">Economy</option>
        <option value="business">Business</option>
        <option value="first">First</option>
      </select>
    </div>

    </br>

    <!-- will be replaced by eventlistener -->
    <a href=flight_results.php>
      <button class="button">Search</button>
    </a>

  </div>
  <!--wrapper end-->

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