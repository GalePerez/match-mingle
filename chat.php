<?php include 'includes/header.php'; ?>
<?php
if (!(isset($_GET['user_id'])  && $_GET['user_id'] > 0)) {
    header("location: " . BASE_URL . "profile.php");
}
$data = '';
$message = [];
$id = Secure($_GET['user_id']);
$sql = "SELECT * FROM `users` WHERE `User_ID` = '$id'";
$result = mysqli_query($conn, $sql);
$sender_id = $_SESSION['id'];
if ($result) {
    $numRow = mysqli_num_rows($result);
    if ($numRow > 0) {
        $data = mysqli_fetch_assoc($result);
        $msql = "SELECT * FROM `messages` WHERE `sender_id` = '$sender_id' AND `receiver_id` = '$id' OR `sender_id` = '$id' AND `receiver_id` = '$sender_id' ";
        $mResult = mysqli_query($conn, $msql);
        if ($mResult) {
            while ($row = mysqli_fetch_assoc($mResult)) {
                $message[] = $row;
            }
        }
    } else {
        header("location: " . BASE_URL . "profile.php");
    }
} else {
    header("location: " . BASE_URL . "profile.php");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['submit-message-btn'])) {
        $message = $_POST['message'];
        $sql = "INSERT INTO `messages`(`sender_id`, `receiver_id`, `text`) VALUES ('$sender_id','$id','$message')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("location: " . $_SERVER["REQUEST_URI"]);
        }
    }
}

?>

<link rel="stylesheet" href="<?php echo BASE_URL ?>style/chat.css">
<section class="home">
    <div class="text">Chat</div>
    <div class="main-container">
        <div class="chat-info">
            <img src="<?php echo BASE_URL . "uploads/" . $data['profile_pic'] ?>" class="profile" style="width: 40px">
            <h6><?php echo $data['Username'] ?><h6>
        </div>
        <div class="chat-body">
            <?php foreach ($message as $texts) {
                if ($texts['sender_id'] == $sender_id) { ?>
                    <div class="message message-right"><?php echo $texts['text'] ?></div>
                <?php
                } else { ?>
                    <div class="message message-left"><?php echo $texts['text'] ?></div>
            <?php }
            } ?>
        </div>
        <div class="message">
            <div class="input">
                <div class="chat">
                    <form action="" method="post">
                        <input type="text" name="message" placeholder="Type a message..." />
                        <button type="submit" name="submit-message-btn"><img src="./src/icons/send.png" style="width: 40px" /></button>
                    </form>
                </div>
            </div>
            <div class="send">

            </div>
        </div>
    </div>
</section>


<?php include 'includes/footer.php'; ?>