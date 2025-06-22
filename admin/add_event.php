<?php include '../config.php'; session_start(); ?>
<?php
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $date = $_POST['event_date'];

    $stmt = $conn->prepare("INSERT INTO events (name, description, event_date) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $desc, $date);
    $stmt->execute();
    echo "Event added! <a href='dashboard.php'>Back</a>";
}
?>
<form method="post">
    Name: <input type="text" name="name"><br><br>
    Description: <textarea name="description"></textarea><br><br>
    Date: <input type="date" name="event_date"><br><br>
    <button type="submit">Add Event</button>
</form>