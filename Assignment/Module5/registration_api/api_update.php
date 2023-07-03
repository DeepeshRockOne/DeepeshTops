<?php
    header("Content-Type: application/json");
    header("Acess-Control-Allow-Origin: *");
    header("Acess-Control-Allow-Methods: PUT");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $array_data = json_decode(file_get_contents("php://input"), true);

    $uid = $array_data["id"];
    $name = $array_data["name"];
    $email = $array_data["email"];
    $phone = $array_data["phone"];
    $address = $array_data["address"];

    require_once("dbconfig.php");

    $query = "UPDATE users SET name='".$name."',email='".$email."',phone='".$phone."',address='".$address."' WHERE id='".$uid."'";

    if (mysqli_query($conn, $query) or die("Update query failed")) {
        echo json_encode(array("message" => "User updated successfully", "status" => true));
    } else {
        echo json_encode(array("message" => "Failed user not updated", "status" => false));
    }
?>