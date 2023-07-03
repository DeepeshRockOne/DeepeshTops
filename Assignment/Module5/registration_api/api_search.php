<?php
    header("Content-Type: application/json");
    header("Acess-Control-Allow-Origin: *");

    $array_data = json_decode(file_get_contents("php://input"), true);

    $user_name = $array_data["user_name"];

    require_once("dbconfig.php");

    $query = "SELECT * FROM users WHERE user_name LIKE '%".$user_name."%'";

    $result = mysqli_query($conn, $query);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode($output);
    } else {
        echo json_encode(array("message" => "User not found", "status" => false));
    }
?>