<?php include 'header.php'; ?>
<link rel="stylesheet" href="<?php echo BASE_URL ?>style/home.css">
<section class="home">
  <div class="text">Home</div>
  <div class="main-container">
    <div class="container-1">
      <a href="profile.php">
        <div class="match-box">
          <div>
            <img src="./src/home_photos/matchmake.png" style="height: 250px; width: 250px;" class="matchmake-img" />
          </div>
          <div>
            <h1>Meet and Match!<h1>
          </div>
        </div>
      </a>
    </div>
    <div class="container-2">
      <div class="container-3">
        <a href="profile.php">
          <div class="profile-box">
            <div>
              <img src="./src/home_photos/viewprofile.png" style="height: 100px; width: 100px;">
            </div>
            <div>
              <h5>View/Edit Profile<h5>
            </div>
          </div>
        </a>
      </div>
      <div class="container-4">
        <a href="profile.php">
          <div class="chat-box">
            <div>
                <img src="./src/home_photos/chat.png" style="height: 100px; width: 100px;">
            </div>
            <div>
                <h5>Chat your Match!<h5>
              </div>
            </div>
          </div>
        </a>
      </div>
  </div>
</section>


<?php include 'footer.php'; ?>