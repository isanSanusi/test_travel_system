
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bus_id = $_POST['bus_id'];
    $bus_name = $_POST['bus_name'];
    $passenger_name = $_POST['passenger_name'];
    $passenger_email = $_POST['passenger_email'];
    $passenger_phone = $_POST['passenger_phone'];
    $seats = $_POST['seats'];
    $seat_numbers = implode(',', $_POST['seat_numbers']);
    $booking_date = date("Y-m-d");

    // Get bus details
    $sql = "SELECT price, seats_available FROM buses WHERE id='$bus_id'";
    $result = $conn->query($sql);
    $bus = $result->fetch_assoc();
    $total_price = $bus['price'] * $seats;

    if ($seats > $bus['seats_available']) {
        echo "Not enough seats available.";
    } else {
        // Insert booking
        $sql = "INSERT INTO bookings (bus_id, bus_company, passenger_name, passenger_email, passenger_phone, booking_date, seats, seat_numbers, total_price) VALUES ('$bus_id','$bus_name', '$passenger_name', '$passenger_email', '$passenger_phone', '$booking_date', '$seats', '$seat_numbers', '$total_price')";

        if ($conn->query($sql) === TRUE) {
            // Update seats available
            $new_seats_available = $bus['seats_available'] - $seats;
            $sql = "UPDATE buses SET seats_available='$new_seats_available' WHERE id='$bus_id'";
            $conn->query($sql);
            echo "Booking successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
} else {
    $bus_id = $_GET['bus_id'];
    $sql = "SELECT * FROM buses WHERE id='$bus_id'";
    $result = $conn->query($sql);
    $bus = $result->fetch_assoc();

    // Get booked seats
    $sql = "SELECT seat_numbers FROM bookings WHERE bus_id='$bus_id'";
    $result = $conn->query($sql);
    $booked_seats = [];
    while ($row = $result->fetch_assoc()) {
        $booked_seats = array_merge($booked_seats, explode(',', $row['seat_numbers']));
    }

    function is_seat_booked($seat_number, $booked_seats) {
        return in_array($seat_number, $booked_seats);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Now</title>
</head>
<body>
    <h2>Book Now</h2>
    <form method="post" action="book.php">
        <input type="hidden" name="bus_id" value="<?php echo $bus['id']; ?>">
        <input type="hidden" name="bus_name" value="<?php echo $bus['bus_company']; ?>">
        <p>Bus Company: <?php echo $bus['bus_company']; ?></p>
        <p>Departure City: <?php echo $bus['departure_city']; ?></p>
        <p>Destination City: <?php echo $bus['destination_city']; ?></p>
        <p>Travel Date: <?php echo $bus['travel_date']; ?></p>
        <p>Departure Time: <?php echo $bus['departure_time']; ?></p>
        <p>Arrival Time: <?php echo $bus['arrival_time']; ?></p>
        <p>Price: <?php echo $bus['price']; ?></p>
        <p>Seats Available: <?php echo $bus['seats_available']; ?></p>
        <p>
            <label for="passenger_name">Name:</label>
            <input type="text" name="passenger_name" required>
        </p>
        <p>
            <label for="passenger_email">Email:</label>
            <input type="email" name="passenger_email" required>
        </p>
        <p>
            <label for="passenger_phone">Phone:</label>
            <input type="text" name="passenger_phone" required>
        </p>
        <p>
            <label for="seats">Seats:</label>
            <input type="number" name="seats" min="1" max="<?php echo $bus['seats_available']; ?>" required>
        </p>
        <p>Select Your Seats:</p>
        <div>
            <?php for ($i = 1; $i <= 22; $i++): ?>
                <label>
                    <input type="checkbox" name="seat_numbers[]" value="<?php echo $i; ?>" <?php echo is_seat_booked($i, $booked_seats) ? 'disabled' : ''; ?>>
                    Seat <?php echo $i; ?>
                </label>
                <?php if ($i % 4 == 0) echo '<br>'; ?>
            <?php endfor; ?>
        </div>
        <p>
            <input type="submit" value="Book Now">
        </p>
    </form>
</body>
</html>
<?php
}
?>

