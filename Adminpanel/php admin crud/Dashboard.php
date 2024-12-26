<?php
    session_start();

    // Check if the user is authenticated
    if (!isset($_SESSION["id"])) {
        header("Location: login.php"); // Redirect to login page
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="sidebar">
        <h2>Dashboard</h2>
        <ul>
            <li><a href="admin_page.php">Product</a></li>
            <li><a href="#customer">Customer</a></li>
            <li><a href="#user">User</a></li>
        </ul>
    </div>
    <div class="main-content">
        <a href="admin_page.php" class="box" id="product">
            <h2>Product</h2>
        </a>
        <a href="customer.html" class="box" id="customer">
            <h2>Customer</h2>
        </a>
        <a href="user.html" class="box" id="user">
            <h2>User</h2>
        </a>
    </div> 
    <script src="dashboard.js"></script>
</body>
</html>
