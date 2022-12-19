<?php
session_start();
require_once 'config/connect.php';
if (isset($_SESSION['AccountID'])) {
  $_SESSION['login'] = "Logout";
} else {
  $_SESSION['login'] = "Login";

  echo "<script>
      document.addEventListener('DOMContentLoaded', function () {
        const errorElement = document.getElementById('passcard');
        errorElement.style.color = \"#FF0000\";
        errorElement.innerHTML = \"You must be logged in to view this page.\";
    });
        </script>";
  header("Refresh:1; url=login_register.php");
}
if (isset($_POST['submit'])) {
  getBookingsDB()->deleteBooking(($_POST['booking_id']));
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
    <div id='passcard' class="d-flex justify-content-center">
      <button class="btn btn-danger ms-1 mb-2 text-center" onClick="window.print()">Print Boarding Passes</button>
    </div>
    <?php
    $user_bookings = getBookingsDB()->getUserBookings($_SESSION['AccountID']);
    foreach ($user_bookings as $user_booking) {
      echo "<div class=\"row\">";
      echo "<form action=\"\" method=\"POST\">";
      echo "<div class=\"card mb-3\" id=\"boarding-pass-" . $user_booking[16] . "\">
    <div class=\"card-body\">
    <h5 class=\"card-title\">" . $user_booking[1] . " to " . $user_booking[2] . "</h5>
    <p class=\"card-text\">Gate: " . $user_booking[6] . " | Terminal: " . $user_booking[7] . " | Boarding Group: " . $user_booking[10] . " | Seat: " . $user_booking[11] . "</p>
    <p>Name: " . $user_booking[3] . " " . $user_booking[4] . "</p>
    <p>Person Type: " . $user_booking[5] . "</p>
    <p>Departs: " . $user_booking[12] . "     " . $user_booking[13] . "</p>
    <p>Arrives: " . $user_booking[14] . "     " . $user_booking[15] . "</p>
    <p>Boarding Begins: " . $user_booking[8] . "</p>
    <p>Boarding Ends: " . $user_booking[9] . "</p>
    <input type='hidden' name='booking_id' value='$user_booking[16]'>
    <input type=\"submit\" id='submit' name='submit' value='Cancel Booking' class=\"btn btn-primary\"></button>
    </form>
    </div>
    </div>
    </div>";
    }
    ?>
  </div>
</body>

</html>