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

    <title>Payment</title>
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


          
    
    <h3><b>Fare:</b></h3>
    <h3><b>Taxes and Fees:</b></h3>
    <h3><b>Total Due:</b></h3>

          <br>

      <div class="cards">
         <h4 class="cards"><b>Card Information</b></h4>
         <img src="/img/visa.PNG" alt="visa"style="width:75px;height:50px;">
         <img src="/img/mastercard.PNG" alt="mastercard"style="width:75px;height:50px;">
         <img src="/img/americanexpress.PNG" alt="americanexpress"style="width:75px;height:50px;">
         <img src="/img/discover.PNG" alt="discover"style="width:75px;height:50px;">
      </div>
       
          <form>            
          <div class="form-group row">
              <label for="card num" class="col-sm-1 col-form-label">Card number: </label>
              <input type="text" class="form-control" id="inputCardNum"style="width:25%;">
            </div>
            </br>
            <div class="form-group row">
             <label for="card name" class="col-sm-1 col-form-label">Name on card:</label>
             <input type="text" class="form-control" id="inputCardName"style="width:25%;">
           </div>
            </br>
           <div class="form-group row">
             <label for="card name" class="col-sm-1 col-form-label">Expiration Date:</label>
             <input type="text" class="form-control" id="Expiration"style="width:5%;" placeholder="MM/YY">
           </div>
           
            </br></br></br>
            <button type="submit" class="btn btn-primary">BUY</button>
         </form>
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