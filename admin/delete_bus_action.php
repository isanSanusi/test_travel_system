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
    $sql = "DELETE FROM buses WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Bus deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: index.php?page=buses");
} else {
    echo "Invalid request";
}
?>
