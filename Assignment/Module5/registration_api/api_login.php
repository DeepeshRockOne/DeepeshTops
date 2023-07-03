<?php
    header("Content-Type: application/json");
    header("Acess-Control-Allow-Origin: *");

    $array_data = json_decode(file_get_contents("php://input"), true);

    $user_name = $array_data["user_name"];
    $password = md5($array_data["password"]);

    require_once("dbconfig.php");

    $query = "SELECT user_name FROM users WHERE user_name='".$user_name."'";

    $result = mysqli_query($conn, $query);

    $count = mysqli_num_rows($result);

    if ($count > 0) {
        $query = "SELECT * FROM users WHERE user_name='".$user_name."' AND password='".$password."'";

        $result = mysqli_query($conn, $query);

        $count = mysqli_num_rows($result);

        if ($count > 0) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            echo json_encode(array("message" => "Login successfully", "status" => true));
        } else {
            echo json_encode(array("message" => "Failed Password is not valid", "status" => false));
        }
    } else {
        echo json_encode(array("message" => "Failed User name is not valid", "status" => false));
    }
?>