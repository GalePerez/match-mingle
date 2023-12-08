<?php include 'includes/header.php'; ?>
<?php

$userId = $_SESSION['user']['User_ID'];
$gender = $_SESSION['user']['gender'];
// echo "<pre>";
// print_r($_SESSION['user']);
// die();
$sql = "";
$match_user = '';
$error = '';
if ($gender == "male") {
    $sql = "SELECT * FROM `matches` WHERE `male_user_id` = '$userId'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        $data = mysqli_fetch_assoc($result);
        $id = $data['female_user_id'];
        $match_sql = "SELECT * FROM `users` WHERE `User_ID` = '$id'";
        $result_user = mysqli_fetch_assoc(mysqli_query($conn, $match_sql));
        $match_user = $result_user;
    } else {
        $sql = "SELECT u.* FROM users u LEFT JOIN matches m ON u.User_ID = m.female_user_id OR u.User_ID = m.male_user_id WHERE m.female_user_id IS NULL AND m.male_user_id IS NULL AND u.hobbies IN (SELECT hobbies FROM users WHERE user_id = 1) AND u.User_ID != 1 AND u.gender = 'female';";
        $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);
        if ($numRows > 0) {
            $data = mysqli_fetch_assoc($result);
            $match_id = $data['User_ID'];
            $sql = "INSERT INTO `matches`(`male_user_id`, `female_user_id`) VALUES ('$userId','$match_id')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("location: " . $_SERVER['REQUEST_URI']);
                exit();
            } else {
                die("error occured");
            }
        } else {
            $error = "Could Not Find a match";
            // not enough users on site
        }

    }
} elseif ($gender == "female") {
    $sql = "SELECT * FROM `matches` WHERE `female_user_id` = '$userId'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        $data = mysqli_fetch_assoc($result);
        $id = $data['male_user_id'];
        $match_sql = "SELECT * FROM `users` WHERE `User_ID` = '$id'";
        $result_user = mysqli_fetch_assoc(mysqli_query($conn, $match_sql));
        $match_user = $result_user;
    } else {
        // $sql = "SELECT `users`.* FROM `users` LEFT JOIN `matches` ON `users`.`User_ID` = `matches`.`female_user_id` OR `users`.`User_ID` = `matches`.`male_user_id` WHERE `matches`.`female_user_id` IS NULL AND `matches`.`male_user_id` IS NULL;";
        $sql = "SELECT u.* FROM users u LEFT JOIN matches m ON u.User_ID = m.female_user_id OR u.User_ID = m.male_user_id WHERE m.female_user_id IS NULL AND m.male_user_id IS NULL AND u.hobbies IN (SELECT hobbies FROM users WHERE user_id = 1) AND u.User_ID != 1 AND u.gender = 'male';";
        $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);
        if ($numRows > 0) {
            $data = mysqli_fetch_assoc($result);
            $match_id = $data['User_ID'];
            $sql = "INSERT INTO `matches`(`male_user_id`, `female_user_id`) VALUES ('$match_id','$userId')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("location: " . $_SERVER['REQUEST_URI']);
                exit();
            } else {
                die("error occured");
            }
        } else {
            $error = "Could Not Find a match";
        }
    }
}

?>
<link rel="stylesheet" href="<?php echo BASE_URL ?>style/matchmake.css">
<section class="home">
    <?php if ($error == "") { ?>
        <div class="text">Matchmaking</div>
        <h1 style="text-align: center; color: #707070;">You have been matched with
            <?php echo $match_user['Username'] ?>
        </h1>
        <div class="main-container">
            <div class="profile-container">
                <img src="./src/profile.jpg" class="profile-photo" />
                <h5>Name:
                    <?php echo $match_user['Fname'] ?>
                    <?php echo $match_user['Lname'] ?>
                </h5>
                <h6>
                    <?php echo $match_user['gender'] ?>
                </h6>
                <button class="btn-shine">
                    <span>Chat Now!</span>
                </button>
            </div>
            <div class="info-container">
                <div class="address-container">
                    <h6>From:</h6>
                    <p class="info-style">
                        <?php echo $match_user['address'] ?>
                    </p>
                </div>
                <div class="hobby-container">
                    <h6>Hobby:</h6>
                    <p class="info-style">
                        <?php foreach (json_decode($match_user['hobbies'], true) as $hobbies) { ?>
                            <b>
                                <?php echo $hobbies; ?>
                                &nbsp;
                            </b>
                        <?php } ?>
                    </p>
                </div>
                <div class="aboutme-container">
                    <h6>About me:</h6>
                    <p class="info-style">
                        <?php echo $match_user['about_me'] ?>
                    </p>
                </div>
            </div>
            <div class="about-container">
                <h5>Gallery</h5>
                <div class="photos">
                    <div class="card m-2" style="width: 150px; height: 150px">
                        <?php if ($match_user['gallery_pic_1'] != "") { ?>
                            <img src="<?php echo BASE_URL ?>uploads/<?php echo $match_user['gallery_pic_1'] ?>"
                                class="card-img-top" alt="..." id="profile-pic-1">
                        <?php } else { ?>
                            <img src="<?php echo BASE_URL ?>src/placeholder.png" class="card-img-top" alt="..."
                                id="profile-pic-1">
                        <?php } ?>
                    </div>
                    <div class="card m-2" style="width: 150px; height: 150px">
                        <?php if ($match_user['gallery_pic_2'] != "") { ?>
                            <img src="<?php echo BASE_URL ?>uploads/<?php echo $match_user['gallery_pic_2'] ?>"
                                class="card-img-top" alt="..." id="profile-pic-2">
                        <?php } else { ?>
                            <img src="<?php echo BASE_URL ?>src/placeholder.png" class="card-img-top" alt="..."
                                id="profile-pic-1">
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    <?php } else { ?>
        No match found
    <?php } ?>
</section>

<?php include 'includes/footer.php'; ?>