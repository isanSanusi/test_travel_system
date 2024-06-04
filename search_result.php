
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

$departure_city = $_POST['departure_city'];
$destination_city = $_POST['destination_city'];
$travel_date = $_POST['travel_date'];

$sql = "SELECT * FROM buses WHERE departure_city='$departure_city' AND destination_city='$destination_city' AND travel_date='$travel_date'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>Bus Company</th>
                <th>Departure City</th>
                <th>Destination City</th>
                <th>Travel Date</th>
                <th>Departure Time</th>
                <th>Arrival Time</th>
                <th>Price</th>
                <th>Seats Available</th>
                <th>Action</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <h2> Pilih Bus Anda</h2>
                <td>".$row["bus_company"]."</td>
                <td>".$row["departure_city"]."</td>
                <td>".$row["destination_city"]."</td>
                <td>".$row["travel_date"]."</td>
                <td>".$row["departure_time"]."</td>
                <td>".$row["arrival_time"]."</td>
                <td>".$row["price"]."</td>
                <td>".$row["seats_available"]."</td>
                <td><a href='book.php?bus_id=".$row["id"]."'>Book Now</a></td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}

$conn->close();
?>

