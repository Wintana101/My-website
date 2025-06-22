<?php include 'config.php'; ?>
<?php
$event_id = $_GET['event_id'];
$event = $conn->query("SELECT * FROM events WHERE id=$event_id")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register for Event</title>
</head>
<body>
    <h2>Register for: <?= $event['name'] ?></h2>
    <form action="register_submit.php" method="post">
        <input type="hidden" name="event_id" value="<?= $event_id ?>">
        Name: <input type="text" name="name" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>