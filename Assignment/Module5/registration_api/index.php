<?php
    header("Content-Type: application/json");
    header("Acess-Control-Allow-Origin: *");

    require_once("dbconfig.php");

    $query = "SELECT * FROM users";

    $result = mysqli_query($conn, $query) or die("Select query failed.");

    $count = mysqli_num_rows($result);

    if ($count > 0) {
        $output = mysqli_fetch_all($result, MYSQLI_ASSOC);

        echo json_encode($output);
    } else {
        echo json_encode(array("message" => "No any users registered.", "status" => false));
    }
?>