<?php
session_start();
require_once 'config/connect.php';
if (isset($_SESSION['AccountID'])) {
  if (isset($_SESSION['login_time_stamp'])) {
    if(time()-$_SESSION['login_time_stamp'] > 60*60*24*30) {
      unset($_SESSION['AccountID']);
      unset($_SESSION['Username']);
      $_SESSION['login'] = "Login";
    } else {
      $_SESSION['login'] = "Logout";
    }
  } else {
    $_SESSION['login'] = "Logout";
  }
} else {
  $_SESSION['login'] = "Login";
}
?>
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
                        <a class="nav-link" href="/index.php">Book a Flight</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/boarding_passes.php">Boarding Passes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/profile.php">User Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login_register.php"><?php echo $_SESSION['login']?></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <?php
  $flights = array();
  $flights = getFlightsDB()->getFlights($_SESSION["from"], $_SESSION["to"], $_SESSION["dep_date"]);
    foreach ($flights as $flight) {
        echo "<div class=\"wrapper\">
    <h5 for=\"result\"><b>Flight ID # " . $flight[0] . "  " . $_SESSION["from"] . "-->" . $_SESSION["to"] . "</b></h5></br>
    <table>
      <tr>
        <td>
          <ul class=\"infoLabels\">
            <li class=\"departs\">Departs:</li>
            <li class=\"arrives\">Arrives:</li>
            <li class=\"gate\">Gate:</li>
            <li class=\"terminal\">Terminal:</li>
            <li class=\"boardingBegins\">Boarding Begins:</li>
            <li class=\"boardingEnds\">Boarding Ends:</li>
            <li class=\"numberSeats\">Number of Seats:</li>
            <li class=\"priceSeat\">Price per Seat:</li>
          </ul>
        </td>
        <td>
          <ul class=\"information\">
            <li class=\"departsInfo\">" . $_SESSION["dep_date"] . " " . $flight[4] . "</li>
            <li class=\"arrivesInfo\">" . $flight[5] . " " . $flight[6] . "</li>
            <li class=\"gateInfo\">" . $flight[7] . "</li>
            <li class=\"terminalInfo\">" . $flight[8] . "</li>
            <li class=\"boardingBeginsInfo\">" . $flight[9] . "</li>
            <li class=\"boardingEndsInfo\">" . $flight[10] . "</li>";
        if ($_SESSION["class"] == "first") {
            echo "<li class=\"numberSeatsInfo\">" . $flight[11] . " </li>";
            echo "<li class=\"priceSeatInfo\">$" . $flight[14] . "</li>";
        } else if ($_SESSION["class"] == "business") {
            echo "<li class=\"numberSeatsInfo\">" . $flight[12] . " </li>";
            echo "<li class=\"priceSeatInfo\">$" . $flight[15] . "</li>";
        } else {
            echo "<li class=\"numberSeatsInfo\">" . $flight[13] . " </li>";
            echo "<li class=\"priceSeatInfo\">$" . $flight[16] . "</li>";
        }
        echo "
          </ul>
        </td>
      </tr>
    </table>";
        $flights = getFlightsDB()->getFlights($_SESSION["to"], $_SESSION["from"], $_SESSION["return_date"]);
        foreach ($flights as $flight) {
            echo "
    <h5 for=\"result\"><b>Flight ID # " . $flight[0] . "  " . $_SESSION["to"] . "-->" . $_SESSION["from"] . "</b></h5></br>
    <table>
      <tr>
        <td>
          <ul class=\"infoLabels\">
            <li class=\"departs\">Departs:</li>
            <li class=\"arrives\">Arrives:</li>
            <li class=\"gate\">Gate:</li>
            <li class=\"terminal\">Terminal:</li>
            <li class=\"boardingBegins\">Boarding Begins:</li>
            <li class=\"boardingEnds\">Boarding Ends:</li>
            <li class=\"numberSeats\">Number of Seats:</li>
            <li class=\"priceSeat\">Price per Seat:</li>
          </ul>
        </td>
        <td>
          <ul class=\"information\">
            <li class=\"departsInfo\">" . $_SESSION["return_date"] . " " . $flight[4] . "</li>
            <li class=\"arrivesInfo\">" . $flight[5] . " " . $flight[6] . "</li>
            <li class=\"gateInfo\">" . $flight[7] . "</li>
            <li class=\"terminalInfo\">" . $flight[8] . "</li>
            <li class=\"boardingBeginsInfo\">" . $flight[9] . "</li>
            <li class=\"boardingEndsInfo\">" . $flight[10] . "</li>";
            if ($_SESSION["class"] == "first") {
                echo "<li class=\"numberSeatsInfo\">" . $flight[11] . " </li>";
                echo "<li class=\"priceSeatInfo\">$" . $flight[14] . "</li>";
            } else if ($_SESSION["class"] == "business") {
                echo "<li class=\"numberSeatsInfo\">" . $flight[12] . " </li>";
                echo "<li class=\"priceSeatInfo\">$" . $flight[15] . "</li>";
            } else {
                echo "<li class=\"numberSeatsInfo\">" . $flight[13] . " </li>";
                echo "<li class=\"priceSeatInfo\">$" . $flight[16] . "</li>";
            }
            echo "
          </ul>
        </td>
      </tr>
    </table>";
        }
        echo "
      <button type=\"submit\" class=\"btn btn-primary\">Book</button>;
  </div>";
    }
  ?>
</body>
</html>