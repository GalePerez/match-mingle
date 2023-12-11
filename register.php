<?php include 'includes/connection.php' ?>
<?php

if (isset($_POST['submit'])) {
  try {
    $users = Secure($_POST['user']);
    $passs = Secure($_POST['pass']);
    $fnames = Secure($_POST['fname']);
    $mnames = Secure($_POST['mname']);
    $lnames = Secure($_POST['lname']);
    $pos = 'Employee';
    $pass = password_hash($passs, PASSWORD_DEFAULT);

    if (empty($users) || empty($passs) || empty($fnames) || empty($mnames) || empty($lnames)) {
      echo '<script>alert("Please Fill all fields"); window.location = "register.php";</script>';
      exit();
    }

    $sql = "SELECT * FROM `users` WHERE `Username` = '$users'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
      echo '<script>alert("User Exists. Try a different username."); window.location = "register.php";</script>';
      exit();
    } else {
      $sql = "INSERT INTO `users`( `Username`, `Password`, `Fname`, `Mname`, `Lname`, `Position`) VALUES ('$users','$pass','$fnames','$mnames','$lnames','$pos')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        $_SESSION['username'] = $users;
        $_SESSION['id'] = mysqli_insert_id($conn);
        header("Location: profile.php");
        exit();
      } else {
        echo '<script>alert("User could not be created. try again in a moment"); window.location = "register.php";</script>';
        exit();
      }
    }
  } catch (Exception $e) {
    echo '<script>alert("Internal Server Error ' . $e . '"); window.location = "register.php";</script>';
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
  <title></title>
</head>

<body style="background-color: #ffeff2">
  <div class="container-login mt-5">
    <div class="row justify-content-center">
      <div class="col-xl-4 col-lg-5 col-md-5">
        <div class="card shadow-sm my-5 p-3">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">

                <div class="login-form">

                  <form method="POST" class="form-group">
                    <div class="form-group">
                      <input type="text" class="form-control" name="user" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="pass" placeholder="Password">
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control" name="fname" placeholder="First Name">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="mname" placeholder="Middle Name">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="lname" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                      <button type="submit" name="submit" class="form-control btn"
                        style="background-color: #fd4a65 ; color: white">REGISTER</button>
                    </div>
                  </form>

                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="login.php">Already have an Account?</a>
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