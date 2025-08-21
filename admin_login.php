<?php
session_start();
include 'partials/_dbconnect.php';

$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM admins WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin_loggedin'] = true;
            $_SESSION['admin_id'] = $row['admin_id'];
            $_SESSION['admin_name'] = $row['name'];
            header("location: admin_dashboard.php");
            exit;
        } else {
            $showError = "Invalid password.";
        }
    } else {
        $showError = "Admin not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="output.css">
</head>
<body>
    <h2>Admin Login</h2>
    <?php if ($showError) { echo "<p style='color:red;'>$showError</p>"; } ?>
    <form action="admin_login.php" method="post">
        <input type="email" name="email" placeholder="Admin Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
