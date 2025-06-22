<?php include '../config.php'; session_start(); ?>
<?php
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>
<h2>Admin Dashboard</h2>
<a href="add_event.php">Add Event</a> | <a href="../index.php">Public Site</a><br><br>

<h3>Registrations</h3>
<?php
$result = $conn->query("SELECT r.name, r.email, e.name AS event_name 
                        FROM registrations r JOIN events e ON r.event_id = e.id");
while ($row = $result->fetch_assoc()) {
    echo "{$row['name']} ({$row['email']}) - {$row['event_name']}<br>";
}
?>