<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="index.php?page=buses">Data Buses</a></li>
            <li><a href="index.php?page=customers">Data Pelanggan</a></li>
            <li><a href="index.php?page=add_bus">Tambah Bus</a></li>
        </ul>
    </div>
    <div class="main-content">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            include($page . ".php");
        } else {
            echo "<h1>Welcome to Admin Dashboard</h1>";
        }
        ?>
    </div>
    <script src="js/scripts.js"></script>
</body>
</html>
