<?php include 'connection.php' ?>

<?php
if (isset($_POST['submit'])) {
  $user = Secure($_POST['user']);
  $pass = Secure($_POST['pass']);
  if (empty($user) || empty($pass)) {
    echo '<script>alert("Please insert both username and password."); window.location = "login.php";</script>';
    exit();
  }
  $sql = "SELECT * FROM `users` WHERE `Username` = '$user'";
  $result = mysqli_query($conn, $sql);
  $numRows = mysqli_num_rows($result);
  if ($numRows > 0) {
    $data = mysqli_fetch_assoc($result);
    if (password_verify($pass, $data['Password'])) {
      $_SESSION['username'] = $data['Username'];
      $_SESSION['id'] = $data['User_ID'];
      header("Location: home.php");
      exit();
    } else {
      echo '<script>alert("Incorrect username or password."); window.location = "login.php";</script>';
      exit();
    }
  } else {
    echo '<script>alert("Incorrect username or password."); window.location = "login.php";</script>';
    exit();
  }
}
?>


<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Login</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="background-color: #ffeff2">
  <div class="container-login mt-5">
    <div class="row justify-content-center">
      <div class="col-xl-4 col-lg-5 col-md-5">
        <div class="card shadow-sm my-3 p-3">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">

                <div class="login-form">

                  <form method="POST" class="form-group">
                    <div class="form-group">
                      <input onkeyup="Secure()" type="text" class="form-control" name="user" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input onkeyup="Secure()" type="password" class="form-control" name="pass" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <button type="submit" name="submit" class="form-control btn" style="background-color: #fd4a65 ; color: white">LOGIN</button>
                    </div>
                  </form>

                  <hr>
                  <div class="text-center">
                    <span class="small"> </span><a class="font-weight-bold small" href="register.php">Register Here!</a>
                  </div>
                  <div class="text-center">
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>

</html>