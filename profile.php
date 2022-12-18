<?php
session_start();
require_once 'config/connect.php';
if (isset($_SESSION['AccountID'])) {
  $_SESSION['login'] = "Logout";
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
            <div class="card-body">
              <a href="/boarding_passes.php">View Boarding Passes</a>
              <br>
              <script>
                function openChange() {
                  document.getElementById('pwd_chng').style.display = 'block';
                  document.getElementById('button1').style.display = 'none';
                }
                </script>
              <br>
              <p>Username: <?php echo $_SESSION['Username'] ?></p>
              <p>Password: **********  <button id="button1" onclick="openChange()" class="btn btn-danger ms-2">Change</button></p>

              <form action="" method="POST" id="pwd_chng" style="display: none">
              <p>Old password: <input type="text"/></p>
              <p>New password: <input type="text"/> <button type="submit" class="btn btn-danger ms-2">Change</button></p>
              </form>
              <br>
            </div>
          </div>
    </div>
  </body>
</html>