<?php
    header("Content-Type: application/json");
    header("Acess-Control-Allow-Origin: *");

    $array_data = json_decode(file_get_contents("php://input"), true);

    $uid = $array_data["id"];

    require_once("dbconfig.php");

    $query = "SELECT * FROM users WHERE id='".$uid."'";

    $result = mysqli_query($conn, $query);

    $count = mysqli_num_rows($result);

    if ($count > 0) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        echo json_encode($row);
    } else {
        echo json_encode(array("message" => "No user found", "status" => false));
    }
?>