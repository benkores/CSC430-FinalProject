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

    <title>Book Flight</title>
  </head>

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
            <a class="nav-link" href="/book.php">Book a Flight</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/boarding_passes.php">Boarding Passes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/profile.php">User Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/login_register.php">Login</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>


  <div class="wrapper">
    <div class="col">

    <H1>TRAVELER 1</H1>

    <form action="payment.php" method="POST">            
          <div class="form-group row">
              <label for="Fname" class="col-sm-1 col-form-label">First Name (required): </label>
              <input type="text" class="form-control" id="inputCardNum"style="width:25%; height:25%;">
            </div>
            </br>
            <div class="form-group row">
             <label for="Lname" class="col-sm-1 col-form-label">Last Name (required):</label>
             <input type="text" class="form-control" id="inputCardName"style="width:25%; height:25%;">
           </div>
            </br>
           
            <label for="cars">Person Type (required):</label>
  <select name="People" id="AGE">
    <option value="adult">Adult</option>
    <option value="child">Child</option>
  </select>
           
  <p>Choose a seat (required):</p>
  <input type="radio" id="1" name="A" value="21A">
  <label for="A">21A</label><br>
  <input type="radio" id="2" name="B" value="21B">
  <label for="B">21B</label><br>  
  <input type="radio" id="3" name="C" value="21C">
  <label for="C">21C</label><br>
  <input type="radio" id="4" name="D" value="21D">
  <label for="D">21D</label><br>
  <input type="radio" id="5" name="E" value="21E">
  <label for="E">21E</label><br>  
  <input type="radio" id="6" name="F" value="21F">
  <label for="F">21F</label>


            </br></br></br>
            <a href="./index.php"><button type="submit" name="submit" class="btn btn-primary">Cancel</button></a>
            <button type="submit" name="submit" class="btn btn-primary">Continue</button>
          </form>

  </div>
</div>

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