<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);
?>
<h1>Data Users</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Number Bus</th>
        <th>Bus Name</th>
        <th>Customer Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Booking Date</th>
        <th>Seats</th>
        <th>Seats Number</th>
        <th>Total Price</th>
        <th>Action</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["bus_id"]."</td>
                <td>".$row["bus_company"]."</td>
                <td>".$row["passenger_name"]."</td>
                <td>".$row["passenger_email"]."</td>
                <td>".$row["passenger_phone"]."</td><td>".$row["booking_date"]."</td><td>".$row["seats"]."</td><td>".$row["seat_numbers"]."</td><td>".$row["total_price"]."</td>
                <td>
                    <a href='index.php?page=edit_customer&id=".$row["id"]."'>Edit</a> |
                    <a href='index.php?page=delete_customer&id=".$row["id"]."'>Delete</a>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No customers found</td></tr>";
    }
    ?>
</table>
<?php
$conn->close();
?>
