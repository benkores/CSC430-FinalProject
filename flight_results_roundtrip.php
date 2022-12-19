<?php
session_start();
require_once 'config/connect.php';
if (isset($_SESSION['AccountID'])) {
  $_SESSION['login'] = "Logout";
} else {
  $_SESSION['login'] = "Login";
}
if (isset($_POST['submit'])) {
  if(isset($_SESSION['AccountID'])) {
    $_SESSION['flight_id']  = $_POST['flight_id'];
    $_SESSION['dep_time'] = getFlightsDB()->getColumnFromFlights($_SESSION['flight_id'],"departure_time");
    $_SESSION['arrive_date'] = getFlightsDB()->getColumnFromFlights($_SESSION['flight_id'],"arrival_date");
    $_SESSION['arrive_time'] = getFlightsDB()->getColumnFromFlights($_SESSION['flight_id'], "arrival_time");
    $_SESSION['gate'] = getFlightsDB()->getColumnFromFlights($_SESSION['flight_id'], "gate");
    $_SESSION['terminal'] = getFlightsDB()->getColumnFromFlights($_SESSION['flight_id'], "terminal");
    $_SESSION['boarding_begins'] = getFlightsDB()->getColumnFromFlights($_SESSION['flight_id'], "boarding_begins");
    $_SESSION['boarding_ends'] = getFlightsDB()->getColumnFromFlights($_SESSION['flight_id'], "boarding_ends");
    if ($_SESSION["class"] == "first") {
      $_SESSION['number_of_seats'] = getFlightsDB()->getColumnFromFlights($_SESSION['flight_id'], "number_of_first_class_seats");
      $_SESSION['price'] = getFlightsDB()->getColumnFromFlights($_SESSION['flight_id'], "first_cost");
    } else if ($_SESSION["class"] == "business") {
      $_SESSION['number_of_seats'] = getFlightsDB()->getColumnFromFlights($_SESSION['flight_id'], "number_of_business_class_seats");
      $_SESSION['price'] = getFlightsDB()->getColumnFromFlights($_SESSION['flight_id'], "business_cost");
    } else {
      $_SESSION['number_of_seats'] = getFlightsDB()->getColumnFromFlights($_SESSION['flight_id'], "number_of_economy_seats");
      $_SESSION['price'] = getFlightsDB()->getColumnFromFlights($_SESSION['flight_id'], "economy_cost");
    }
    $_SESSION['flight_id_return']  = $_POST['flight_id_return'];
    $_SESSION['dep_time_return'] = getFlightsDB()->getColumnFromFlights($_SESSION['flight_id_return'],"departure_time");
    $_SESSION['arrive_date_return'] = getFlightsDB()->getColumnFromFlights($_SESSION['flight_id_return'],"arrival_date");
    $_SESSION['arrive_time_return'] = getFlightsDB()->getColumnFromFlights($_SESSION['flight_id_return'], "arrival_time");
    $_SESSION['gate_return'] = getFlightsDB()->getColumnFromFlights($_SESSION['flight_id_return'], "gate");
    $_SESSION['terminal_return'] = getFlightsDB()->getColumnFromFlights($_SESSION['flight_id_return'], "terminal");
    $_SESSION['boarding_begins_return'] = getFlightsDB()->getColumnFromFlights($_SESSION['flight_id_return'], "boarding_begins");
    $_SESSION['boarding_ends_return'] = getFlightsDB()->getColumnFromFlights($_SESSION['flight_id_return'], "boarding_ends");
    if ($_SESSION["class"] == "first") {
      $_SESSION['number_of_seats_return'] = getFlightsDB()->getColumnFromFlights($_SESSION['flight_id_return'], "number_of_first_class_seats");
      $_SESSION['price_return'] = getFlightsDB()->getColumnFromFlights($_SESSION['flight_id_return'], "first_cost");
    } else if ($_SESSION["class"] == "business") {
      $_SESSION['number_of_seats_return'] = getFlightsDB()->getColumnFromFlights($_SESSION['flight_id_return'], "number_of_business_class_seats");
      $_SESSION['price_return'] = getFlightsDB()->getColumnFromFlights($_SESSION['flight_id_return'], "business_cost");
    } else {
      $_SESSION['number_of_seats_return'] = getFlightsDB()->getColumnFromFlights($_SESSION['flight_id_return'], "number_of_economy_seats");
      $_SESSION['price_return'] = getFlightsDB()->getColumnFromFlights($_SESSION['flight_id_return'], "economy_cost");
    }
    header("Location: book.php");
    exit();
  } else {
    echo "<script>
    document.addEventListener('DOMContentLoaded', function () {
      const errorElement = document.getElementById('bookmsg');
      errorElement.style.color = \"#FF0000\";
      errorElement.innerHTML = \"You must be logged in to book a flight.\";
    });
      alert('You must be logged in to book a flight.');
        </script>";
  }
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
  <?php
    $flights = getFlightsDB()->getFlights($_SESSION["from"], $_SESSION["to"], $_SESSION["dep_date"]);
    foreach ($flights as $flight) {
      echo "<div class=\"wrapper\">
      <form action='' method='POST'>
    <h5 for=\"result\"><b>Flight ID # " . $flight[0] . "  " . $_SESSION["from"] . "-->" . $_SESSION["to"] . "</b></h5></br>
    <table>
      <tr>
        <td>
          <ul>
            <li>Departs:</li>
            <li>Arrives:</li>
            <li>Gate:</li>
            <li>Terminal:</li>
            <li>Boarding Begins:</li>
            <li>Boarding Ends:</li>
            <li>Number of Seats:</li>
            <li>Price per Seat:</li>
          </ul>
        </td>
        <td>
          <ul class=\"float-right\">
            <li>" . $_SESSION["dep_date"] . " " . $flight[4] . "</li>
            <li>" . $flight[5] . " " . $flight[6] . "</li>
            <li>" . $flight[7] . "</li>
            <li>" . $flight[8] . "</li>
            <li>" . $flight[9] . "</li>
            <li>" . $flight[10] . "</li>";
      if ($_SESSION["class"] == "first") {
        echo "<li>" . $flight[11] . " </li>";
        echo "<li>$" . $flight[14] . "</li>";
      } else if ($_SESSION["class"] == "business") {
        echo "<li>" . $flight[12] . " </li>";
        echo "<li>$" . $flight[15] . "</li>";
      } else {
        echo "<li>" . $flight[13] . " </li>";
        echo "<li>$" . $flight[16] . "</li>";
      }
      echo "
          </ul>
        </td>
      </tr>
    </table>";
      $flights_return = getFlightsDB()->getFlights($_SESSION["to"], $_SESSION["from"], $_SESSION["return_date"]);
      foreach ($flights_return as $flight_return) {
        echo "
    <h5 for=\"result\"><b>Flight ID # " . $flight_return[0] . "  " . $_SESSION["to"] . "-->" . $_SESSION["from"] . "</b></h5></br>
    <table>
      <tr>
        <td>
          <ul>
            <li>Departs:</li>
            <li>Arrives:</li>
            <li>Gate:</li>
            <li>Terminal:</li>
            <li>Boarding Begins:</li>
            <li>Boarding Ends:</li>
            <li>Number of Seats:</li>
            <li>Price per Seat:</li>
          </ul>
        </td>
        <td>
          <ul class='float-right'>
            <li>" . $_SESSION["return_date"] . " " . $flight_return[4] . "</li>
            <li>" . $flight_return[5] . " " . $flight_return[6] . "</li>
            <li>" . $flight_return[7] . "</li>
            <li>" . $flight_return[8] . "</li>
            <li>" . $flight_return[9] . "</li>
            <li>" . $flight_return[10] . "</li>";
        if ($_SESSION["class"] == "first") {
          echo "<li>" . $flight_return[11] . " </li>";
          echo "<li>$" . $flight_return[14] . "</li>";
        } else if ($_SESSION["class"] == "business") {
          echo "<li>" . $flight_return[12] . " </li>";
          echo "<li>$" . $flight_return[15] . "</li>";
        } else {
          echo "<li>" . $flight_return[13] . " </li>";
          echo "<li>$" . $flight_return[16] . "</li>";
        }
      echo "
          </ul>
        </td>
      </tr>
    </table>";
      }
      echo "
      <input type='hidden' name='flight_id' value='$flight[0]'>
      <input type='hidden' name='flight_id_return' value='$flight_return[0]'>
      <input type=\"submit\" id='submit' name='submit' value='Book' class=\"btn btn-primary\"></button>
      <div id='bookmsg'></div>
        </form>
  </div>";
    }
    ?>
</body>

</html>