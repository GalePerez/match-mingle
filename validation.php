<!DOCTYPE HTML>  
<html>
<link rel="stylesheet"href="css/bootstrap.css">
<head>
</head>
<style>
  .form-floating {
    width: 40rem;
  }
</style>
<body class="bg-dark">
<nav class="navbar navbar-expand-lg" style="background-color: #485d38">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav fs-5">
          <li class="nav-item">
            <a class="nav-link text-light" href="hello.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="aboutme.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="filemanager.php">File Manager</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="calculator.php">Calculator</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="readfile.php">Readfile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger " href="logout.php"><button class="btn btn-danger">Logout</button></a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>

<?php
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $website = test_input($_POST["website"]);
  $comment = test_input($_POST["comment"]);
  $gender = test_input($_POST["gender"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div class="d-flex justify-content-center">
  <div class="rounded-5 p-3 m-4" style="
        width: 50vw;
        border: solid #8aac70;
        background-color: #3c4436;
  ">
    <h2 class="text-light text-center">PHP Form Validation Example</h2>
    <div class="d-flex justify-content-center">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
      <!-- Name -->
        <div class="form-floating mb-3">
            <input type="name" class="form-control" id="floatingInput" placeholder="Input Name" name="name">
            <label for="floatingInput">Name</label>
        </div>
      <!-- Email -->
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@gmail.com" name="email">
            <label for="floatingInput">Email address</label>
        </div>
      <!-- Website. -->
        <div class="form-floating mb-3">
            <input type="name" class="form-control" id="floatingInput" placeholder="Link" name="website">
            <label for="floatingInput">Website</label>
        </div>
      <!-- Gender -->
        <h4 class="text-light">Gender:</h4>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="Male" value="male">
          <label class="form-check-label text-light" for="Male">
            Male
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="Female" >
          <label class="form-check-label text-light" for="Female" value="female">
            Female
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="Other" >
          <label class="form-check-label text-light" for="Other" value="other">
            Other
          </label>
        </div>
      <!-- Comments -->
        <div class="form-floating my-3">
          <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px" name="comment"></textarea>
          <label for="floatingTextarea">Comments</label>
        </div>
        <input type="submit" name="submit" value="Submit">
      <div>
    </form>

    <?php
    echo "<h2>Your Input:</h2>";
    echo $name;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $website;
    echo "<br>";
    echo $comment;
    echo "<br>";
    echo $gender;
    ?>
  </div>
</div>
</body>
</html>