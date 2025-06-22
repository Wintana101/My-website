<?php
session_start();
include 'config.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$result = $conn->query("SELECT * FROM events ORDER BY event_date ASC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Events</title>
</head>
<body>
    <h2>All Events</h2>
    <a href="add_event.php">➕ Add New Event</a> |
    <a href="logout.php">🚪 Logout</a>
    <br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Date</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['name']; ?></td>
            <td><?= $row['description']; ?></td>
            <td><?= $row['event_date']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>