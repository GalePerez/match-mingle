<?php

include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        if (
            isset($_POST['name']) &&
            isset($_POST['address']) &&
            isset($_POST['hobbies']) &&
            isset($_POST['aboutme']) &&
            (isset($_POST['fgender']) || isset($_POST['mgender']))
            && isset($_POST['profilePic'])
        ) {
            $name = Secure($_POST['name']);
            $address = (Secure($_POST['address']));
            $hobbies = json_encode(($_POST['hobbies']));
            $aboutme = json_encode(($_POST['aboutme']));
            $fgender = isset($_POST['fgender']) ? $_POST['fgender'] : null;
            $mgender = isset($_POST['mgender']) ? $_POST['mgender'] : null;
            $profilePic = $_POST['profilePic'];
            $gender = $mgender ? $mgender : $fgender;
            $sql = "UPDATE `users` SET `name` = '$name', `address` = '$address', `hobbies` = '$hobbies', `about_me` = '$aboutme', `gender` = '$gender',  `profile_pic` = '$profilePic' WHERE `User_ID` = '" . $_SESSION['id'] . "'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo json_encode(['status' => 200 , 'message' => 'Record Updated Successfully']);
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
        die($e);
        http_response_code(500);
        echo json_encode(['status' => 500, 'message' => "Internal Server Error", 'error' => $e]);
    }
}
