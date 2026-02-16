<?php
// Railway ke environment variables se connection details lena
$host = getenv('MYSQLHOST');
$user = getenv('MYSQLUSER');
$pass = getenv('MYSQLPASSWORD');
$db   = getenv('MYSQLDATABASE');
$port = getenv('MYSQLPORT');

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Android app se aane wala data
$name = $_POST['name'];
$phone = $_POST['phone'];
$district = $_POST['district'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];

$sql = "INSERT INTO sos_requests (name, phone, district, lat, lng) VALUES ('$name', '$phone', '$district', '$lat', '$lng')";

if ($conn->query($sql) === TRUE) {
    echo "SUCCESS"; // Yehi "SUCCESS" word Android app check karta hai
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
