<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/style/sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
      <?php include "./style/sidebar.css" ?>
      <?php include "./style/home.css" ?>
    </style>
<body>
<nav class="sidebar close">
  <header>
    <div class="image-text">
      <div class="text logo-text">
        <span class="name">MatchMingle</span>
        <span class="name">Welcome, User!</span>
      </div>
    </div>

  <i class="fa-solid fa-chevron-right fa-2xs toggle" style="color: #ffffff;"></i>
  </header>

  <div class="menu-bar">
    <div class="menu">

      <ul class="menu-links">
        <li class="nav-link">
          <a href="home.php">
            <i class="fa-solid fa-house fa-lg" style="color: #738f63;"></i>
            <span class="text nav-text">Home</span>
          </a>
        </li>

        <li class="nav-link">
          <a href="profile.php">
            <i class="fa-solid fa-user fa-lg" style="color: #738f63;"></i>
            <span class="text nav-text">Profile</span>
          </a>
        </li>


        <li class="nav-link">
          <a href="#">
            <i class="fa-solid fa-comment fa-lg" style="color: #738f63;"></i>
            <span class="text nav-text">Chat</span>
          </a>
        </li>

        <li class="nav-link">
          <a href="index.php">
            <i class="fa-solid fa-right-from-bracket fa-lg" style="color: #738f63;"></i>
            <span class="text nav-text">Log-out</span>
          </a>
        </li>

      </ul>
    </div>
    </div>
  </div>
</nav>

  <section class="home">
    <div class="text">Home</div>
    <div class="main-container">
        <div class="container-1">
          <a href="profile.php">
            <div>
              <img src="./src/home_photos/matchmake.png" style="height: 400px; width: 400px;" class="matchmake-img"/>
            </div>
            <div>
            <h1>Meet and Match!<h1>
            </div>
          </a>
        </div>
        <div class="container-2">
          <div class="container-3">
            <a href="profile.php">
              <div>
                <img src="./src/home_photos/viewprofile.png" style="height: 200px; width: 190px;">
              </div>
              <div>
                <h3>View/Edit Profile<h3>
              </div>
            </a>
          </div>
          <div class="container-4">
          <a href="profile.php">
            <div>
                <img src="./src/home_photos/chat.png" style="height: 220px; width: 210px;">
              </div>
              <div>
                <h3>Chat your Match!<h3>
              </div>
            </div>
          </a>
        </div>
    </div>
  </section>


<script>
  const body = document.querySelector('body'),
    sidebar = body.querySelector('nav'),
    toggle = body.querySelector(".toggle"),
    searchBtn = body.querySelector(".search-box"),
    modeSwitch = body.querySelector(".toggle-switch"),
    modeText = body.querySelector(".mode-text");
  toggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
  })
  searchBtn.addEventListener("click", () => {
    sidebar.classList.remove("close");
  });
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>