<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM buses WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Bus not found";
        exit();
    }
} else {
    echo "Invalid request";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Bus</title>
</head>
<body>
    <h1>Edit Bus</h1>
    <form method="post" action="edit_bus_action.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <p>
            <label for="bus_company">Bus Company:</label>
            <input type="text" name="bus_company" value="<?php echo $row['bus_company']; ?>" required>
        </p>
        <p>
            <label for="departure_city">Departure City:</label>
            <input type="text" name="departure_city" value="<?php echo $row['departure_city']; ?>" required>
        </p>
        <p>
            <label for="destination_city">Destination City:</label>
            <input type="text" name="destination_city" value="<?php echo $row['destination_city']; ?>" required>
        </p>
        <p>
            <label for="travel_date">Travel Date:</label>
            <input type="date" name="travel_date" value="<?php echo $row['travel_date']; ?>" required>
        </p>
        <p>
            <label for="departure_time">Departure Time:</label>
            <input type="time" name="departure_time" value="<?php echo $row['departure_time']; ?>" required>
        </p>
        <p>
            <label for="arrival_time">Arrival Time:</label>
            <input type="time" name="arrival_time" value="<?php echo $row['arrival_time']; ?>" required>
        </p>
        <p>
            <label for="price">Price:</label>
            <input type="number" name="price" step="0.01" value="<?php echo $row['price']; ?>" required>
        </p>
        <p>
            <label for="seats_available">Seats Available:</label>
            <input type="number" name="seats_available" value="<?php echo $row['seats_available']; ?>" required>
        </p>
        <p>
            <input type="submit" value="Update Bus">
        </p>
    </form>
</body>
</html>
