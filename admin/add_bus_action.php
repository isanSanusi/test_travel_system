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
    $bus_company = $_POST['bus_company'];
    $departure_city = $_POST['departure_city'];
    $destination_city = $_POST['destination_city'];
    $travel_date = $_POST['travel_date'];
    $departure_time = $_POST['departure_time'];
    $arrival_time = $_POST['arrival_time'];
    $price = $_POST['price'];
    $seats_available = $_POST['seats_available'];

    $sql = "INSERT INTO buses (bus_company, departure_city, destination_city, travel_date, departure_time, arrival_time, price, seats_available)
            VALUES ('$bus_company', '$departure_city', '$destination_city', '$travel_date', '$departure_time', '$arrival_time', '$price', '$seats_available')";

    if ($conn->query($sql) === TRUE) {
        echo "New bus added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: index.php?page=buses");
}
?>
