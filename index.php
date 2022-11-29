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
            <a class="nav-link" href="/">Policies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/profile.php">User Profile</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <div class="wrapper">
    <!-- when <form> and </form> are uncommented, will function as a form -->
    <!-- so rn button acts as a link not submit, uncomment <form> and </form> -->
    <!-- <form> -->
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
      <label class="form-check-label" for="inlineRadio1">One Way Trip</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" checked>
      <label class="form-check-label" for="inlineRadio2">Round Trip</label>
    </div>

    </br></br>

    <div class="form-group">
      <label for="fromDestination">FROM</label>
      <input type="text" class="form-control" id="inputFrom" placeholder="ATL (Atlantic International L..." required>
    </div>
    <div class="form-group">
      <label for="toDestination">TO</label>
      <input type="text" class="form-control" id="inputTo" placeholder="LAX (Los Angeles Internationa..." required>
    </div>

    </br>

    <div class="departureDate">
      <label for="to">DEPARTURE DATE</label>
      <div class="field">
        <input type="date" data-date-inline-picker="true" class="dd" required />
      </div>
    </div>

    <div class="arrivalDate">
      <label for="from">ARRIVAL DATE</label>
      <div class="field">
        <input type="date" date-date-inline-picker="true" class="dd" required />
      </div>
    </div>
    </br>

    <div class="dropdown">
      <label for="Travelers">TRAVELERS:</label>
      <select name="adults" id="adults">
        <option value="0" selected>0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
      </select>
      <span style="font-size: 10pt;">
        ADULTS
      </span>
    </div>

    <div class="dropdown" style="padding-top: 5px;">
      <label style="margin-left: 92px"></label>
      <select name="childs" id="childs">
        <option value="0" selected>0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
      </select>
      <span style="font-size: 10pt;">
        CHILDREN
      </span>
    </div>

    </br>

    <div class="dropdown">
      <label for="Travelers">CLASS:</label>
      <select name="class" id="class">
        <option value="economy">Economy</option>
        <option value="business">Business</option>
        <option value="first">First</option>
      </select>
    </div>

    </br></br>

    <!-- can be replaced by eventlistener -->
    <a href="/flight_results.php">
      <button type="submit" class="btn btn-primary">Search</button>
    </a>
    <!-- </form> -->
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