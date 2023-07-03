<?php
    $DBhost = "localhost";
    $DBusername = "root";
    $DBpassword = "";
    $db = "resgistration_api";

    $conn = mysqli_connect($DBhost, $DBusername, $DBpassword, $db);

    if(!$conn) {
        die("Connection failed: ". mysqli_connect_error());
    }
?>