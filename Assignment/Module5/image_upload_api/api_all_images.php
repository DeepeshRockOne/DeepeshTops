<?php
    header("Content-Type: application/json");
    header("Acess-Control-Allow-Origin: *");

    $conn = mysqli_connect('localhost','root','','image_upload_api');

    if(!$conn) {
        die("Connection failed: ". mysqli_connect_error());
    }

    $query = "SELECT * FROM images";

    $result = mysqli_query($conn, $query);

    $count = mysqli_num_rows($result);

    if ($count > 0) {
        $output = mysqli_fetch_all($result, MYSQLI_ASSOC);

        echo json_encode($output);
    } else {
        echo json_encode(array("message" => "No any image uploaded yet", "status" => false));
    }
?>