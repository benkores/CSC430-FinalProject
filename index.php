<?php
session_start();
require_once 'config/connect.php';
if (isset($_SESSION['AccountID'])) {
  $_SESSION['login'] = "Logout";
} else {
  $_SESSION['login'] = "Login";
}
if (isset($_POST['submit'])) {
  $_SESSION["from"] = $_POST['from'];
  $_SESSION["to"] = $_POST['to'];
  /*
  if ($_SESSION['from'] = $_SESSION['to']) {
    echo "<script>
      document.addEventListener('DOMContentLoaded', function () {
        const errorElement = document.getElementById('error_msg');
        errorElement.style.color = \"#FF0000\";
        errorElement.innerHTML = \"Departure airport and arrival airport cannot be the same\";
    });
        </script>";
  } else {
    */
    $_SESSION["dep_date"] = $_POST['dept_date'];
    $_SESSION["travelers"] = $_POST['travelers'];
    $_SESSION["class"] = $_POST['class'];
    $option = $_POST['inlineRadioOptions'];
    $flights = getFlightsDB()->getFlights($_SESSION["from"], $_SESSION["to"], $_SESSION["dep_date"]);
    if ($option == "option1") {
      if (count($flights) == 0) {
        echo "<script>
      document.addEventListener('DOMContentLoaded', function () {
        const errorElement = document.getElementById('error_msg');
        errorElement.style.color = \"#FF0000\";
        errorElement.innerHTML = \"No flight results found\";
    });
        </script>";
      } else {
        header("Location: flight_results_oneway.php");
        exit();
      }
    } else {
      $_SESSION["return_date"] = $_POST['return_date'];
      $flights_return = getFlightsDB()->getFlights($_SESSION["to"], $_SESSION["from"], $_SESSION["return_date"]);
      if (count($flights) == 0 || count($flights_return) == 0) {
        echo "<script>
      document.addEventListener('DOMContentLoaded', function () {
        const errorElement = document.getElementById('error_msg');
        errorElement.style.color = \"#FF0000\";
        errorElement.innerHTML = \"No flight results found\";
    });
        </script>";
      } else {
        header("Location: flight_results_roundtrip.php");
        exit();
      }
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
    <!-- when <form> and </form> are uncommented, will function as a form -->
    <!-- so rn button acts as a link not submit, uncomment <form> and </form> -->
    <form method="POST" action="">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"
          onclick="hide()">
        <label class="form-check-label" for="inlineRadio1">One Way Trip</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" checked
          onclick="hide()">
        <label class="form-check-label" for="inlineRadio2">Round Trip</label>
      </div>

      </br></br>
      <div class="dropdown">
        <label for="fromDestination">FROM:</label>
        <?php
        $airports = getAirportsDB()->getAirports();
        echo "<select name='from' id='from'>";
        foreach ($airports as $from_airport) {
          echo "<option value='" . $from_airport[0] . "'>" . $from_airport[0] . " (" . $from_airport[1] . ")</option>";
        }
        echo "</select>";
        ?>
      </div><br>
      <div class="dropdown">
        <label for="ToDestination">TO:</label>
        <?php
        echo "<select name='to' id='to'>";
        foreach ($airports as $to_airport) {
          echo "<option value='" . $to_airport[0] . "'>" . $to_airport[0] . " (" . $to_airport[1] . ")</option>";
        }
        echo "</select>";
        ?>
      </div><br>
      <div class="departureDate">
        <label for="to">DEPARTURE DATE</label>
        <div class="field">
          <input type="date" id="dept_date" name="dept_date" data-date-inline-picker="true" class="dd" required />
        </div>
      </div><br>
      <div class="returnDate" id="returnDate">
        <label for="from">RETURN DATE</label>
        <div class="field">
          <input type="date" id="return_date" name="return_date" date-date-inline-picker="true" class="dd" required />
        </div>
      </div>
      </br>

      <div class="form-group">
        <label for="Travelers">NUMBER OF TRAVELERS:</label>
        <input type="number" id="travelers" name="travelers" min="1" required>
        </select>
        </br><br>
        <div class="dropdown">
          <label for="TicketClass">CLASS:</label>
          <select name="class" id="class">
            <option value="economy">Economy</option>
            <option value="business">Business</option>
            <option value="first">First</option>
          </select>
        </div>

        </br></br>
        <button type="submit" name="submit" class="btn btn-primary">Search</button>
    </form>
    <p id="error_msg"></p>
  </div>

</body>

</html>
<script>
  function hide() {
    if (document.getElementById('inlineRadio1').checked) {
      var element1 = document.getElementById("returnDate");
      element1.classList.remove("visible");
      element1.classList.add("invisible");
      var element2 = document.getElementById("return_date");
      element2.required = false;
    } else if (document.getElementById('inlineRadio2').checked) {
      var element = document.getElementById("returnDate");
      element.classList.remove("invisible");
      element.classList.add("visible");
      var element2 = document.getElementById("return_date");
     element2.required = true;
    }
  }
</script>