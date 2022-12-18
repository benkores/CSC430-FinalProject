<?php
session_start();
require_once 'config/connect.php';
if (isset($_SESSION['AccountID'])) {
  $_SESSION['login'] = "Logout";
} else {
  echo "<script>
    document.getElementById('profilecard').innerHTML = 'You must be logged in to view this page.';
      </script>";
  $_SESSION['login'] = "Login";
}

if (isset($_POST['submit'])) {
  if(!getAccountsDB()->authenticateAccount($_SESSION['Username'], $_POST['old_pwd'])) {
    echo "<script>
      document.addEventListener('DOMContentLoaded', function () {
        const errorElement = document.getElementById('chng_msg');
        errorElement.style.color = \"#FF0000\";
        errorElement.innerHTML = \"Old password entered incorrectly. Please try again.\";
    });
        </script>";
  } else {
    getAccountsDB()->updateAccountPwd($_SESSION['Username'], $_POST['new_pwd']);
    echo "<script>
        document.addEventListener('DOMContentLoaded', function () {
          const errorElement = document.getElementById('chng_msg');
          errorElement.style.color = \"#228C22\";
          errorElement.innerHTML = \"Password changed successfully! Please log in again.\";
      });
          </script>";
    unset($_SESSION['AccountID']);
    unset($_SESSION['Username']);
    $_SESSION['login'] = "Login";
    header("Refresh:2; url=login_register.php");
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">

    <title>Profile</title>
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
      <div class="row">
        <div class="col-md-15">
          <div class="card">
            <div id="profilecard" class="card-body">
              <a href="/boarding_passes.php">View Boarding Passes</a>
              <br>
              <script>
                function openChange() {
                  document.getElementById('pwd_chng').style.display = 'block';
                  document.getElementById('button1').style.display = 'none';
                }

                function closeChange() {
                  document.getElementById('pwd_chng').style.display = 'none';
                  document.getElementById('button1').style.display = 'block';
                }
                </script>
              <br>
              <div id='userInfo'>
              <p>Username: <?php echo $_SESSION['Username'] ?></p>
              <p>Password: ********* <button id="button1" onclick="openChange()" class="btn btn-danger ms-2">Change</button></p>
              </div>

              <form action="" method="POST" id="pwd_chng" style="display: none">
              <p>Old password: <input name="old_pwd" type="text"/></p>
              <p>New password:<input name="new_pwd" type="text"/><button type="submit" name="submit" class="btn btn-danger ms-2">Submit</button><button onclick="closeChange()" class="btn btn-danger ms-2">Cancel</button></p>
              </form>
              <p id="chng_msg"></p>
              <br>
            </div>
          </div>
    </div>
  </body>
</html>