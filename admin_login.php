<?php
session_start();
include 'partials/_dbconnect.php';

$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin_loggedin'] = true;
            $_SESSION['admin_username'] = $username;
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
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="output.css">
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
  <div class="bg-white p-8 rounded-lg shadow-md w-96">
    <h1 class="text-2xl font-bold mb-6 text-center">Admin Login</h1>
    <?php if ($showError): ?>
      <p class="bg-red-100 text-red-600 p-2 rounded mb-4"><?= $showError ?></p>
    <?php endif; ?>
    <form action="admin_login.php" method="POST" class="flex flex-col gap-4">
      <input type="text" name="username" placeholder="Username" required class="border p-2 rounded">
      <input type="password" name="password" placeholder="Password" required class="border p-2 rounded">
      <button type="submit" class="bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Login</button>
    </form>
  </div>
</body>
</html>
