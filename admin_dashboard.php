<?php
session_start();
include '../partials/_dbconnect.php'; // adjust path

// Protect admin route
if(!isset($_SESSION['admin_loggedin'])) {
    header("location: admin_login.php");
    exit;
}

// Fetch stats
$users = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM user"))['total'];
$restaurants = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM restaurant"))['total'];
$orders = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM orders"))['total'];
$revenue = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(amount) AS total FROM orders WHERE payment='SUCCESS'"))['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../output.css">
</head>
<body class="bg-gray-100 font-poppins">
  <div class="max-w-7xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <div class="bg-white p-5 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold">Total Users</h2>
        <p class="text-2xl font-bold text-blue-600"><?= $users ?></p>
      </div>
      <div class="bg-white p-5 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold">Restaurants</h2>
        <p class="text-2xl font-bold text-green-600"><?= $restaurants ?></p>
      </div>
      <div class="bg-white p-5 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold">Orders</h2>
        <p class="text-2xl font-bold text-purple-600"><?= $orders ?></p>
      </div>
      <div class="bg-white p-5 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold">Revenue</h2>
        <p class="text-2xl font-bold text-red-600">₹<?= $revenue ?: 0 ?></p>
      </div>
    </div>

    <!-- Add links to management pages -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
      <a href="manage_users.php" class="bg-blue-500 text-white text-center py-4 rounded-lg shadow hover:bg-blue-600">Manage Users</a>
      <a href="manage_restaurants.php" class="bg-green-500 text-white text-center py-4 rounded-lg shadow hover:bg-green-600">Manage Restaurants</a>
      <a href="manage_orders.php" class="bg-purple-500 text-white text-center py-4 rounded-lg shadow hover:bg-purple-600">Manage Orders</a>
    </div>
  </div>
</body>
</html>
