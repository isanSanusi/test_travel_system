

<?php
include 'db_conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Booking</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Book Your Bus Travel</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="packages.php">Packages</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Find and Book Your Bus Travel</h2>
        <form action="index.php" method="get">
            <label for="from">From:</label>
            <input type="text" id="from" name="from" placeholder="Enter departure city" required>
            
            <label for="to">To:</label>
            <input type="text" id="to" name="to" placeholder="Enter destination city" required>
            
            <label for="date">Travel Date:</label>
            <input type="date" id="date" name="date" required>
            
            <label for="passengers">Number of Passengers:</label>
            <input type="number" id="passengers" name="passengers" min="1" max="10" required>
            
            <input type="submit" value="Search Buses">
        </form>
        <?php
        if (isset($_GET['from']) && isset($_GET['to']) && isset($_GET['date']) && isset($_GET['passengers'])) {
            $from = $_GET['from'];
            $to = $_GET['to'];
            $date = $_GET['date'];
            $passengers = $_GET['passengers'];

            // Query untuk mencari bus yang tersedia berdasarkan inputan pengguna
            $sql = "SELECT * FROM buses WHERE departure_city='$from' AND destination_city='$to' AND travel_date='$date'";
            $result = $conn->query($sql);

            echo "<h2>Available Buses from " . htmlspecialchars($from) . " to " . htmlspecialchars($to) . " on " . htmlspecialchars($date) . "</h2>";
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>Bus Company</th><th>Departure Time</th><th>Arrival Time</th><th>Price</th><th>Seats Available</th><th>Book</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['bus_company']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['departure_time']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['arrival_time']) . "</td>";
                    echo "<td>$" . htmlspecialchars($row['price']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['seats_available']) . "</td>";
                    echo "<td><a href='book.php?bus_id=" . htmlspecialchars($row['id']) . "'>Book Now</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No buses found for your search criteria.</p>";
            }
        }
        ?>
    </main>
</body>
</html>

