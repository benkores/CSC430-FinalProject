<?php
session_start();
require_once 'config/connect.php';
if (isset($_SESSION['AccountID'])) {
  $_SESSION['login'] = "Logout";
} else {
  $_SESSION['login'] = "Login";
}

if (isset($_POST['submit'])) {
  $travelers = array();
  for ($i = 1; $i <= $_SESSION['travelers']; $i++) {
    $traveler = array();
    array_push($traveler, $_POST["fname_$i"]);
    array_push($traveler, $_POST["lname_$i"]);
    array_push($traveler, $_POST["person_type_$i"]);
    array_push($traveler, $_POST["seat_$i"]);
    array_push($travelers, $traveler);
  }
  $_SESSION['traveler_info'] = $travelers;
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
          <a class="nav-link" href="/login_register.php">
            <?php echo $_SESSION['login'] ?>
          </a>
        </li>
      </ul>
    </div>
  </nav>
</div>

<div class="wrapper">
  <form method='POST'>
    <?php
    $seats = getSeatsDB()->getFlightSeats($_SESSION['flight_id']);
    for ($i = 1; $i <= $_SESSION['travelers']; $i++) {
      echo "
      <h5><b>Traveler $i</b></h5><br>
        <div class='form-group row'>
          <label for='fname_$i' class='col-sm-1 col-form-label'>First Name*: </label>
          <input type='text' class='form-control' id='fname_$i' name='fname_$i' style='width:25%; height:25%;' required>
        </div>
        </br>
        <div class='form-group row'>
          <label for='lname_$i' class='col-sm-1 col-form-label'>Last Name*:</label>
          <input type='text' class='form-control' id='lname_$i' name='lname_$i' style='width:25%; height:25%;' required>
        </div>
        </br>
        <label for='person_type_$i'>Person Type*:</label>
        <select name='person_type_$i' id='person_type_$i' required>
          <option value='adult'>Adult</option>
          <option value='child'>Child</option>
        </select>
        <br><br>
        <p>Choose a seat*:</p>";
      $counter = 0;
      echo "<div class='row'>";
      foreach ($seats as $seat) {
        echo "
            <div class='col-2'>
              <input type='radio' id='seat_$i' name='seat_$i' value='$seat[2]' required>
              <label for='$seat[2]'>$seat[2]</label><br>
            </div>
          ";
        $counter++;
        if ($counter % 6 == 0) {
          echo "</div><div class='row'>";
        }
      }
      echo "</div>
        </br></br></br>";
    }
    ?>
    <button type='submit' name='submit' class='btn btn-primary'>Continue</button>
    <a href='./index.php'><button class='btn btn-primary me-2'>Cancel</button></a>
  </form>
</div>

</html>