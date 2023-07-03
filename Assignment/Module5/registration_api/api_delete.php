<?php
    header("Content-Type: application/json");
    header("Acess-Control-Allow-Origin: *");
    header("Acess-Control-Allow-Methods: DELETE");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $array_data = json_decode(file_get_contents("php://input"), true);

    $uid = $array_data["id"];

    require_once("dbconfig.php");

    $query = "DELETE FROM users WHERE id='".$uid."'";

    if (mysqli_query($conn, $query) or die("Delete query failed")) {
        echo json_encode(array("message" => "User deleted successfully", "status" => true));
    } else {
        echo json_encode(array("message" => "Failed user not deleted", "status" => false));
    }
?>