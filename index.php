<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Event Registration</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Upcoming Events</h1>
    <ul>
        <?php
        $result = $conn->query("SELECT * FROM events ORDER BY event_date ASC");
        while ($row = $result->fetch_assoc()) {
            echo "<li><strong>{$row['name']}</strong> ({$row['event_date']})<br>
            {$row['description']}<br>
            <a href='register.php?event_id={$row['id']}'>Register</a></li><hr>";
        }
        ?>
    </ul>
</body>
</html>