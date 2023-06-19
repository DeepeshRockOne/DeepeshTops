<?php
$bookingType = $_POST['bookingType'];
$checkinDate = $_POST['checkinDate'];
$checkoutDate = $_POST['checkoutDate'];

$slot = $_POST['slot'];

if (empty($checkinDate)) {
    echo 'error';
    exit;
}

// Store the booking details in the database (you'll need to configure your MySQL connection)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_room_booking";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    echo 'error';
    exit;
}

if($bookingType == "full-day" || $bookingType == "custom") {
    $slot = "NULL";
}

$sql = "INSERT INTO bookings (booking_type,checkin_date,checkout_date,slot) VALUES ('$bookingType','$checkinDate','$checkoutDate','$slot')";

if ($conn->query($sql) === TRUE) {
    echo 'success';
} else {
    echo 'error';
}

$conn->close();
?>
