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
    echo "<p class='success'>✅ Event added! <a href='dashboard.php'>Back</a></p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Event</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 50px;
        }
        .form-container {
            background: white;
            padding: 20px 30px;
            border-radius: 5px;
            width: 400px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, textarea, button {
            width: 100%;
            margin-top: 10px;
            padding: 10px;
            font-size: 14px;
        }
        .success {
            background: #e0ffe0;
            padding: 10px;
            border: 1px solid #0a0;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Add New Event</h2>
    <form method="post">
        <label>Name:</label>
        <input type="text" name="name" required>

        <label>Description:</label>
        <textarea name="description" rows="4" required></textarea>

        <label>Date:</label>
        <input type="date" name="event_date" required>

        <button type="submit">Add Event</button>
    </form>
</div>

</body>
</html>