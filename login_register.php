<?php
session_start();
require_once 'config/connect.php';
if (isset($_SESSION['AccountID'])) {
  unset($_SESSION['AccountID']);
  unset($_SESSION['Username']);
  $_SESSION['login'] = "Login";
  header("Location: index.php");
  exit();
}
if (isset($_POST['register_submit'])) {
  if (getAccountsDB()->checkUserExists($_POST['register_username'])) {
    echo "<script>
      document.addEventListener('DOMContentLoaded', function () {
        const errorElement = document.getElementById('register_msg');
        errorElement.style.color = \"#FF0000\";
        errorElement.innerHTML = \"Username already exists\";
    });
        </script>";
  } else {
    getAccountsDB()->createAccount($_POST['register_username'], $_POST['register_password']);
    echo "<script>
      document.addEventListener('DOMContentLoaded', function () {
        const errorElement = document.getElementById('register_msg');
        errorElement.style.color = \"#228C22\";
        errorElement.innerHTML = \"Registration successful! Please login.\";
    });
        </script>";
  }
}
if (isset($_POST['login_submit'])) {
  if (!getAccountsDB()->authenticateAccount($_POST['login_username'], $_POST['login_password'])) {
    echo "<script>
      document.addEventListener('DOMContentLoaded', function () {
        const errorElement = document.getElementById('login_msg');
        errorElement.style.color = \"#FF0000\";
        errorElement.innerHTML = \"Invalid username or password!\";
    });
        </script>";
  } else {
    $_SESSION['AccountID'] = getAccountsDB()->getAccountID($_POST['login_username']);
    $_SESSION['Username'] = $_POST['login_username'];
    $_SESSION['login'] = "Logout";
    header("Location: index.php");
    exit();
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

  <title>Login/Register</title>
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
            <a class="nav-link active" href="/profile.php">User Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/login_register.php">Login</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <div class="wrapper">
    <div class="row">

      <!-- register form -->
      <div class="col-sm-6">
        <h5 class="card-title"><b>REGISTER</b></h5>
        </br>
        <form method="POST" action="">
          <div class="form-group">
            <label for="username">USERNAME</label>
            <input type="text" class="form-control" id="register_username" name="register_username"
              placeholder="enter username" required>
          </div>
          </br>
          <div class="form-group">
            <label for="password">PASSWORD</label>
            <input type="password" class="form-control" id="register_password" name="register_password"
              placeholder="enter password" required>
          </div>
          </br>
          <button type="submit" id="register_submit" name="register_submit" class="btn btn-primary">REGISTER</button>
        </form>
        <p id="register_msg"></p>
      </div>

      <!-- login form -->
      <div class="col-sm-6">
        <h5 class="card-title"><b>LOGIN</b></h5>
        </br>
        <form method="POST" action="">
          <div class="form-group">
            <label for="username">USERNAME</label>
            <input type="text" class="form-control" id="login_username" name="login_username"
              placeholder="enter username" required>
          </div>
          </br>
          <div class="form-group">
            <label for="password">PASSWORD</label>
            <input type="password" class="form-control" id="login_password" name="login_password"
              placeholder="enter password" required>
          </div>
          </br>
          <button type="submit" id="login_submit" name="login_submit" class="btn btn-primary">LOGIN</button>
        </form>
        <p id="login_msg"></p>
      </div>
    </div>

  </div>

</body>

</html>