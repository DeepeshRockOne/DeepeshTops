<?php
    header("Content-Type: application/json");
    header("Acess-Control-Allow-Origin: *");
    header("Acess-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $array_data = json_decode(file_get_contents("php://input"), true);

    $name = $array_data["name"];
    $user_name = $array_data["user_name"];
    $email = $array_data["email"];
    $phone = $array_data["phone"];
    $password = md5($array_data["password"]);
    $address = $array_data["address"];

    require_once("dbconfig.php");

    $query = "SELECT 'user_name' FROM users WHERE user_name = '".$user_name."'";

    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        echo json_encode(array("message" => "Username already registered", "status" => false));
    } else {
        $query = "INSERT INTO users (name, user_name, email, phone, password, address) VALUES ('".$name."', '".$user_name."', '".$email."', '".$phone."', '".$password."', '".$address."')";

        if (mysqli_query($conn, $query) or die("Insert query failed")) {
            echo json_encode(array("message" => "User registered successfully", "status" => true));
        } else {
            echo json_encode(array("message" => "Failed user not register", "status" => false));
        }
    }
?>