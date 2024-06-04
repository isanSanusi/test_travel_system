<!DOCTYPE html>
<html>
<head>
    <title>Add New Bus</title>
</head>
<body>
    <h1>Add New Bus</h1>
    <form method="post" action="add_bus_action.php">
        <p>
            <label for="bus_company">Bus Company:</label>
            <input type="text" name="bus_company" required>
        </p>
        <p>
            <label for="departure_city">Departure City:</label>
            <input type="text" name="departure_city" required>
        </p>
        <p>
            <label for="destination_city">Destination City:</label>
            <input type="text" name="destination_city" required>
        </p>
        <p>
            <label for="travel_date">Travel Date:</label>
            <input type="date" name="travel_date" required>
        </p>
        <p>
            <label for="departure_time">Departure Time:</label>
            <input type="time" name="departure_time" required>
        </p>
        <p>
            <label for="arrival_time">Arrival Time:</label>
            <input type="time" name="arrival_time" required>
        </p>
        <p>
            <label for="price">Price:</label>
            <input type="number" name="price" step="0.01" required>
        </p>
        <p>
            <label for="seats_available">Seats Available:</label>
            <input type="number" name="seats_available" required>
        </p>
        <p>
            <input type="submit" value="Add Bus">
        </p>
    </form>
</body>
</html>
