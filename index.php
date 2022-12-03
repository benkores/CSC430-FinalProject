<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
    <!-- when <form> and </form> are uncommented, will function as a form -->
    <!-- so rn button acts as a link not submit, uncomment <form> and </form> -->
    <form method="POST" action="flight_results.php">
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
          $from_airports = array();
          $from_airports = getAirportsDB()->getFromAirports();
          echo "<select name='from' id='from'>";
          foreach ($from_airports as $from_airport) {
            echo "<option value='" . $from_airport[0] . "'>" . $from_airport[0] . " (" . $from_airport[1] . ")</option>";
          }
          echo "</select>";
          ?>
      </div><br>
      <div class="dropdown">
        <label for="ToDestination">TO:</label>
        <?php
        $to_airports = array();
        $to_airports = getAirportsDB()->getToAirports("ATL");
        echo "<select name='to' id='to'>";
        foreach ($to_airports as $to_airport) {
          echo "<option value='" . $to_airport[0] . "'>" . $to_airport[0] . " (" . $to_airport[1] . ")</option>";
        }
        echo "</select>";
        ?>
      </div><br>
      <div class="departureDate">
        <label for="to">DEPARTURE DATE</label>
        <div class="field">
          <input type="date" data-date-inline-picker="true" class="dd" required />
        </div>
      </div>
      <div class="returnDate" id="returnDate">
        <label for="from">RETURN DATE</label>
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
      <button type="submit" class="btn btn-primary">Search</button>
    </form>
  </div>

</body>

</html>

<?php
$database = new Database();

function getDB()
{
  require_once 'config/database.php';
  $database = new Database();
  $db = $database->getConnection();
  return $db;
}
function getAirportsDB()
{
  require_once 'class/airports.php';
  $airports = new Airports(getDb());
  return $airports;
}
?>

<script>
  function hide() {
    if (document.getElementById('inlineRadio1').checked) {
      var element = document.getElementById("returnDate");
      element.classList.remove("visible");
      element.classList.add("invisible");
    } else if (document.getElementById('inlineRadio2').checked) {
      var element = document.getElementById("returnDate");
      element.classList.remove("invisible");
      element.classList.add("visible");
    }
  }
</script>