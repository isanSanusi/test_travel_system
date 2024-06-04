<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM buses";
$result = $conn->query($sql);
?>
<h1>Data Buses</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Bus Company</th>
        <th>Departure City</th>
        <th>Destination City</th>
        <th>Travel Date</th>
        <th>Departure Time</th>
        <th>Arrival Time</th>
        <th>Price</th>
        <th>Seats Available</th>
        <th>Action</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["bus_company"]."</td>
                <td>".$row["departure_city"]."</td>
                <td>".$row["destination_city"]."</td>
                <td>".$row["travel_date"]."</td>
                <td>".$row["departure_time"]."</td>
                <td>".$row["arrival_time"]."</td>
                <td>".$row["price"]."</td>
                <td>".$row["seats_available"]."</td>
                <td>
                    <a href='index.php?page=edit_bus&id=".$row["id"]."'>Edit</a> |
                    <a href='index.php?page=delete_bus_action&id=".$row["id"]."'>Delete</a>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='10'>No buses found</td></tr>";
    }
    ?>
</table>
<?php
$conn->close();
?>
