<?php

include 'connection.php';

define("BASE_URL" , "http://localhost/matchmingle/");

if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
} else {
    echo '<script>alert("Anauthorized Login."); window.location = "login.php";</script>';
    exit();
}

$sql = "SELECT * FROM `users` WHERE `User_ID` = '".$_SESSION['id']."'";
$result = mysqli_query($conn, $sql);
$userData = mysqli_fetch_assoc($result);
$userData['hobbies'] = json_decode($userData['hobbies'],true);
$userData['about_me'] = json_decode($userData['about_me'],true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL ?>style/sidebar.css">

</head>
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
                        <a href="logout.php">
                            <i class="fa-solid fa-right-from-bracket fa-lg" style="color: #738f63;"></i>
                            <span class="text nav-text">Log-out</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>