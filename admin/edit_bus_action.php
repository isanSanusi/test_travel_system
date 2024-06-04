<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $bus_company = $_POST['bus_company'];
    $departure_city = $_POST['departure_city'];
    $destination_city = $_POST['destination_city'];
    $travel_date = $_POST['travel_date'];
    $departure_time = $_POST['departure_time'];
    $arrival_time = $_POST['arrival_time'];
    $price = $_POST['price'];
    $seats_available = $_POST['seats_available'];

    $sql = "UPDATE buses SET bus_company='$bus_company', departure_city='$departure_city', destination_city='$destination_city', travel_date='$travel_date', departure_time='$departure_time', arrival_time='$arrival_time', price='$price', seats_available='$seats_available' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Bus updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: index.php?page=buses");
}
?>
