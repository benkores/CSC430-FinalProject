<?php
session_start();
require_once 'config/connect.php';
if (isset($_SESSION['AccountID'])) {
  $_SESSION['login'] = "Logout";
} else {
  $_SESSION['login'] = "Login";
}
$travelers = $_SESSION['traveler_info'];
$fare;
foreach ($travelers as $traveler) {
  $fare += $_SESSION['price'];
  if (isset($_SESSION['flight_id_return'])) {
    $fare += $_SESSION['price_return'];
  }
}
$taxes_fees = ($fare * 0.0875) + 20;
$total = $fare + $taxes_fees;
if (isset($_POST['submit'])) {
  foreach($travelers as $traveler) {
    getBookingsDB()->addBooking($_SESSION['AccountID'], $_SESSION['flight_id'], getSeatsDB()->getSeatID($traveler[3]), $traveler[0], $traveler[1], $traveler[2]);
    if (isset($_SESSION['flight_id_return'])) {
      getBookingsDB()->addBooking($_SESSION['AccountID'], $_SESSION['flight_id_return'], getSeatsDB()->getSeatID($traveler[4]), $traveler[0], $traveler[1], $traveler[2]);
    }
  }
  header("Location: boarding_passes.php");
  exit();
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
            <a class="nav-link" href="/index.php">Book a Flight</a>
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
    <h4 class="text-center"><b>Checkout</b></h4>
    <?php
    if (isset($_SESSION['flight_id_return'])) {
      echo "<h5><b>Round Trip (" . $_SESSION['travelers'] . " Travelers)</b></h5><br>";
      foreach ($travelers as $traveler) {
        echo "
            <div class='row'>
            <div class='col'>
            <div class='card w-100 text-center'>
            <div class='card-body'>
            <p class='card-text'>" . $_SESSION['dep_date'] . " • " . $_SESSION['dep_time'] . " to " . $_SESSION['arrive_time'] . " • " . $_SESSION['class'] . " • " . "$traveler[0] $traveler[1]" . " • " . $traveler[2] . "</p
            </div>
            </div>
            </div>";
        echo "
            <div class='col'>
            <div class='card w-100 text-center'>
            <div class='card-body'>
            <p class='card-text'>" . $_SESSION['return_date'] . " • " . $_SESSION['dep_time_return'] . " to " . $_SESSION['arrive_time_return'] . " • " . $_SESSION['class'] . " • " . "$traveler[0] $traveler[1]" . " • " . $traveler[2] . "</p
            </div>
            </div>
            </div>
            </div>";
      }
    } else {
      echo "<h5><b>One Way (" . $_SESSION['travelers'] . " Travelers)</b></h5><br>";
      foreach ($travelers as $traveler) {
        echo "
            <div class='row'>
            <div class='col'>
            <div class='card w-100 text-center'>
            <div class='card-body'>
            <p class='card-text'>" . $_SESSION['dep_date'] . " • " . $_SESSION['dep_time'] . " to " . $_SESSION['arrive_time'] . " • " . $_SESSION['class'] . " • " . "$traveler[0] $traveler[1]" . " • " . $traveler[2] . "</p
            </div>
            </div>
            </div>";
      }
      echo "</div>";
    }
    ?>
    <br>
    <table>
      <tr>
        <td>
          <ul>
            <li>Fare:</li>
            <li>Taxes and Fees:</li>
            <li>Total Due:</li>
          </ul>
        </td>
        <td>
          <ul class="float-right">
            <li>$<?php echo $fare?>.00</li>
            <li>$<?php echo $taxes_fees?>.00</li>
            <li>$<?php echo $total?>.00</li>
          </ul>
        </td>
      </tr>
    </table>

    <br>
    <form method="POST">
      <div class="cards">
        <h5 class="cards pe-5"><b>Card Information</b></h5>
        <img src="/img/visa.PNG" alt="visa" style="width:50px;height:30px;">
        <img src="/img/mastercard.PNG" alt="mastercard" style="width:50px;height:30px;">
        <img src="/img/americanexpress.PNG" alt="americanexpress" style="width:40px;height:30px;">
        <img src="/img/discover.PNG" alt="discover" style="width:50px;height:30px;">
      </div>
      <br><br>
      <div class="form-group row">
        <label for="card_num" class="col-sm-3 col-form-label">Card number*: </label>
        <div class="col-sm-5">
          <input type="number" class="form-control" id="card_number" name="card_number" required>
        </div>
      </div>
      </br>
      <div class="form-group row">
        <label for="card_name" class="col-sm-3 col-form-label">Name on card*:</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="card_name" name="card_name" required>
        </div>
      </div>
      </br>
      <div class="form-group row">
        <label for="card_expiration" class="col-sm-3 col-form-label">Expiration Date*:</label>
        <div class="col-sm-1">
          <input type="text" class="form-control" id="card_expiration" name="card_expiration" placeholder="MM/YY"
            required>
        </div>
        <label for="card_security" class="col-sm-3 col-form-label">Security code*:</label>
        <div class="col-sm-1">
          <input type="number" class="form-control" id="card_security" name="card_security" required>
        </div>
      </div>
      <br><br>
      <h5 class="cards"><b>Billing Information</b>
      </h5><br><br>
      <div class="form-group row">
        <label for="billing_address" class="col-sm-3 col-form-label">Address*: </label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="billing_address" name="billing_address" required>
        </div>
      </div><br>

      <div class="form-group row">
        <label for="billing_city" class="col-sm-3 col-form-label"> City*: </label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="billing_city" name="billing_city" required>
        </div>
      </div><br>

      <div class="form-group row">
        <label for="billing_state" class="col-sm-3 col-form-label">State*: </label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="billing_state" name="billing_state" required>
        </div>
      </div><br>

      <div class="form-group row">
        <label for="billing_zip" class="col-sm-3 col-form-label">ZIP*: </label>
        <div class="col-sm-5">
          <input type="number" class="form-control" id="billing_zip" name="billing_zip" required>
        </div>
      </div><br>

      <div class="form-group row">
        <label for="billing_country" class="col-sm-3 col-form-label"> Country*: </label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="billing_country" name="billing_country" required>
        </div>
      </div>
      </br></br></br>
      <button type="submit" name="submit" class="btn btn-primary">Buy</button>
      <a href="./index.php"><button class="btn btn-primary me-2">Cancel</button></a>
    </form>
  </div>
  </div>





</body>

</html>