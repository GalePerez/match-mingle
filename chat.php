<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="<?php echo BASE_URL ?>style/chat.css">
<section class="home">
    <div class="text">Chat</div>
    <div class="main-container">
        <div class="chat-info">
                <img src="./src/profile.jpg" class="profile" style="width: 40px">
                <h6>Username<h6>
        </div>
        <div class="chat-body">

        </div>
        <div class="message">
            <div class="input">
            <div class="chat">
                    <input type="text" placeholder="Type a message..." />
                    <button type="submit"><img src="./src/icons/send.png" style="width: 40px"/></button>
                </div>
            </div>
            <div class="send">
               
            </div>
        </div>


    </div>


</section>


<?php include 'includes/footer.php'; ?>