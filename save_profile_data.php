<?php

include 'includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        if (
            isset($_POST['name']) &&
            isset($_POST['address']) &&
            isset($_POST['hobbies']) &&
            isset($_POST['aboutme']) &&
            (isset($_POST['fgender']) || isset($_POST['mgender'])) &&
            isset($_FILES['profilePic'])
        ) {
            $name = Secure($_POST['name']);
            $address = (Secure($_POST['address']));
            $hobbies = (($_POST['hobbies']));
            $aboutme = (($_POST['aboutme']));
            $fgender = isset($_POST['fgender']) ? $_POST['fgender'] : null;
            $mgender = isset($_POST['mgender']) ? $_POST['mgender'] : null;
            $pic_1_tmp_name = $_FILES['profilePic']['tmp_name'];
            $pic_1_name = generateRandomString(20);
            move_uploaded_file($pic_1_tmp_name, UPLOAD_URL . "$pic_1_name.png");
            // $gender = $mgender ? $mgender : $fgender;
            if ($mgender == "undefined") {
                $gender = $fgender;
            } else {
                $gender = $mgender;
            }
            $sql = "UPDATE `users` SET `name` = '$name', `address` = '$address', `hobbies` = '$hobbies', `about_me` = '$aboutme', `gender` = '$gender',  `profile_pic` = '$pic_1_name.png' WHERE `User_ID` = '" . $_SESSION['id'] . "'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo json_encode(['status' => 200, 'message' => 'Record Updated Successfully']);
            } else {
                http_response_code(400);
                echo json_encode(['status' => 400, 'message' => "An Error Occurred", 'error' => mysqli_error($conn)]);
                exit();
            }
        } else {
            http_response_code(400);
            echo json_encode(['status' => 400, 'message' => 'fill all fields']);
            exit();
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['status' => 500, 'message' => "Internal Server Error", 'error' => $e]);
    }
}
