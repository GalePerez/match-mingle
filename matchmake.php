<?php include 'includes/header.php'; ?>
<?php

$userId = $_SESSION['user']['User_ID'];
$gender = $_SESSION['user']['gender'];
$user_hobbies = $_SESSION['user']['hobbies'];
$sql = "";
$match_user = '';
$error = '';

foreach ($_SESSION['user'] as $index => $user) {
    if ($_SESSION['user'][$index] == "") {
        echo '<script>alert("Please update your profile fully and then check the match. Thanks."); window.location = "home.php";</script>';
        exit();
    }
}

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
        // make the match here
        $sql = "SELECT `users`.* FROM `users` JOIN `matches` ON `matches`.`male_user_id` != '$userId' WHERE `users`.`hobbies` = '$user_hobbies' AND `users`.User_ID != '$userId' AND `users`.gender = 'female' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $numRows = mysqli_num_rows($result);
            if ($numRows > 0) {
                $data = mysqli_fetch_assoc($result);
                $match_user_id = $data['User_ID'];
                $match_username = $data['Username'];
                $match_sql = "INSERT INTO `matches`(`male_user_id`, `female_user_id`) VALUES ('$userId','$match_user_id')";
                $match_result = mysqli_query($conn, $match_sql);
                if ($match_result) {
                    echo '<script>alert("You have been matched with ' . $match_username . '. . Thanks."); window.location = "home.php";</script>';
                    exit();
                } else {
                    die("Internal server error");
                }
            } else {
                $error = "Could not match with anyone";
            }
        } else {
            die("Internal server error");
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
        // make the match here
        $sql = "SELECT `users`.* FROM `users` JOIN `matches` ON `matches`.`female_user_id` != '$userId' WHERE `users`.`hobbies` = '$user_hobbies' AND `users`.User_ID != '$userId' AND `users`.gender = 'male' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $numRows = mysqli_num_rows($result);
            if ($numRows > 0) {
                $data = mysqli_fetch_assoc($result);
                $match_user_id = $data['User_ID'];
                $match_sql = "INSERT INTO `matches`(`male_user_id`, `female_user_id`) VALUES ('$match_user_id','$userId')";
                $match_result = mysqli_query($conn, $match_sql);
                if ($match_result) {
                    echo '<script>alert("You have been matched with ' . $match_username . '. . Thanks."); window.location = "home.php";</script>';
                    exit();
                } else {
                    die("Internal server error");
                }
            } else {
                $error = "Could not match with anyone";
            }
        } else {
            die("Internal server error");
        }
    }
} else {
    echo '<script>alert("Please update your profile fully and then check the match. Thanks."); window.location = "home.php";</script>';
    exit();
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
                    <a href="<?php echo BASE_URL ?>chat.php?user_id=<?php echo $match_user['User_ID'] ?>" style="text-decoration: none;">
                        <span>Chat Now!</span>
                    </a>
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
                            <img src="<?php echo BASE_URL ?>uploads/<?php echo $match_user['gallery_pic_1'] ?>" class="card-img-top" alt="..." id="profile-pic-1">
                        <?php } else { ?>
                            <img src="<?php echo BASE_URL ?>src/placeholder.png" class="card-img-top" alt="..." id="profile-pic-1">
                        <?php } ?>
                    </div>
                    <div class="card m-2" style="width: 150px; height: 150px">
                        <?php if ($match_user['gallery_pic_2'] != "") { ?>
                            <img src="<?php echo BASE_URL ?>uploads/<?php echo $match_user['gallery_pic_2'] ?>" class="card-img-top" alt="..." id="profile-pic-2">
                        <?php } else { ?>
                            <img src="<?php echo BASE_URL ?>src/placeholder.png" class="card-img-top" alt="..." id="profile-pic-1">
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    <?php } else { ?>
        <section class="home">
            <div class="main-container">
                No match found
            </div>
        </section>
    <?php } ?>
</section>

<?php include 'includes/footer.php'; ?>