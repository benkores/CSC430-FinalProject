<?php
session_start();
require_once 'config/connect.php';
if (isset($_SESSION['AccountID'])) {
  $_SESSION['login'] = "Logout";
} else {
  $_SESSION['login'] = "Login";
}

if(isset($_POST['submit'])) {
  $_SESSION['fname'] = $_POST['fname'];
  $_SESSION['lname'] = $_POST['lname'];
  $_SESSION['person_type'] = $_POST['person_type'];
  $_SESSION['seat'] = $_POST['seat'];
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
  for ($i = 1; $i <= $_SESSION['travelers']; $i++) {
    echo "<div class='col'>

    <h5><b>Traveler $i</b></h5><br>
      <div class='form-group row'>
        <label for='fname' class='col-sm-1 col-form-label'>First Name*: </label>
        <input type='text' class='form-control' id='fname' name='fname' style='width:25%; height:25%;'>
      </div>
      </br>
      <div class='form-group row'>
        <label for='lname' class='col-sm-1 col-form-label'>Last Name*:</label>
        <input type='text' class='form-control' id='lname' name='lname' style='width:25%; height:25%;'>
      </div>
      </br>

      <label for='person_type'>Person Type*:</label>
      <select name='person_type' id='person_type'>
        <option value='adult'>Adult</option>
        <option value='child'>Child</option>
      </select>
      <br><br>
      <p>Choose a seat*:</p>
      <input type='radio' id='seat' name='seat' value='21A'>
      <label for='A'>21A</label><br>
      <input type='radio' id='seat' name='seat' value='21B'>
      <label for='B'>21B</label><br>
      <input type='radio' id='seat' name='seat' value='21C'>
      <label for='C'>21C</label><br>
      <input type='radio' id='seat' name='seat' value='21D'>
      <label for='D'>21D</label><br>
      <input type='radio' id='seat' name='seat' value='21E'>
      <label for='E'>21E</label><br>
      <input type='radio' id='seat' name='seat' value='21F'>
      <label for='F'>21F</label>


      </br></br></br>
  </div>";
  }
?>
<button type='submit' name='submit' class='btn btn-primary'>Continue</button>
<a href='./index.php'><button class='btn btn-primary me-2'>Cancel</button></a>
</form>
</div>

</html>