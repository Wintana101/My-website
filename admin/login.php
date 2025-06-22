<?php include '../config.php'; session_start(); ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = md5($_POST['password']);

    $res = $conn->query("SELECT * FROM admins WHERE username='$user' AND password='$pass'");
    if ($res->num_rows == 1) {
        $_SESSION['admin'] = $user;
        header("Location: dashboard.php");
    } else {
        echo "Invalid credentials";
    }
}
?>
<form method="post">
    Username: <input type="text" name="username"><br><br>
    Password: <input type="password" name="password"><br><br>
    <button type="submit">Login</button>
</form>