<?php include 'config.php'; ?>
<?php
$name = $_POST['name'];
$email = $_POST['email'];
$event_id = $_POST['event_id'];

$stmt = $conn->prepare("INSERT INTO registrations (name, email, event_id) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $name, $email, $event_id);
$stmt->execute();

echo "Registration successful! <a href='index.php'>Go back</a>";
?>