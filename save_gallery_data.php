<?php

include 'includes/connection.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        if (isset($_FILES['gallery_pic_1']['tmp_name']) && isset($_FILES['gallery_pic_2']['tmp_name'])) {
            $pic_1_tmp_name = $_FILES['gallery_pic_1']['tmp_name'];
            $pic_2_tmp_name = $_FILES['gallery_pic_2']['tmp_name'];

            $pic_1_name = generateRandomString(20);
            $pic_2_name = generateRandomString(20);

            move_uploaded_file($pic_1_tmp_name, UPLOAD_URL . "$pic_1_name.png");
            move_uploaded_file($pic_2_tmp_name, UPLOAD_URL . "$pic_2_name.png");

            $sql = "UPDATE `users` SET `gallery_pic_1` = '$pic_1_name.png', `gallery_pic_2` = '$pic_2_name.png' WHERE `User_ID` = '" . $_SESSION['id'] . "'";
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
            echo json_encode(['status' => 400, 'message' => 'Please select files']);
            exit();
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['status' => 500, 'message' => "Internal Server Error", 'error' => $e]);
    }
}
