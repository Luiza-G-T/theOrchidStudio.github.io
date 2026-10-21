<?php

session_start();
include 'config.php';

if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit();
}



$orders = mysqli_query($conn, "SELECT * FROM orders ORDER BY order_date DESC");
$products = mysqli_query($conn, "SELECT * FROM products ORDER BY created_at DESC");

?>

<!DOCTYPE html>
<html lang="en">
<!--Head START-->
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Florist Website</title>
<!--link to CSS file-->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
<!--Head END-->

<!--Body-->
<!--<nav id="navigation_bar"></nav>-->
    <body>
        <header id="header_bar"><h2 id="web_title">the Orchid Studio</h2></header>
        <div id="header"></div>
        <nav id="navigation_bar">
            <a href="admin_login.php" class="btn">Admin-Login<i class="fa fa-user"></i></a>
            <a href="order.html" class="btn">Custom-Orders<i class="fa fa-gift"></i></a>
            <a href="shopping_cart.html" class="btn">View-Cart<i class="fa fa-shopping-cart"></i></a>
        </nav>
<div class="admin_dashboard_css">
        <h1 class="h1dashboard">Admin Dashboard</h1>
        <p class="pdashboard">Welcome, <?php echo htmlspecialchars($_SESSION['admin']);?></p>
        <hr>

        <h1 class="h1dashboard">Custom Orders</h1>

        <table> 
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Address</th>
                <th>Size</th>
                <th>Foliage</th>
                <th>Flowers</th>
                <th>Total</th>
                <th>Date</th>
            </tr>

            <?php while ($order = mysqli_fetch_assoc($orders)): ?>

            <tr>
                <td><?= $order['order_id'] ?></td>
                <td> <?= htmlspecialchars($order['customer_name']) ?></td>
                <td> <?= htmlspecialchars($order['contact_number']) ?></td>
                <td> <?= htmlspecialchars($order['email']) ?></td>
                <td> <?= htmlspecialchars($order['house_address']) ?></td>
                <td> <?= htmlspecialchars($order['bouquet_size']) ?></td>
                <td> <?= htmlspecialchars($order['foliage']) ?></td>
                <td> <?= htmlspecialchars($order['flowers'] ?? '') ?></td>
                <td>£<?= htmlspecialchars($order['total_price']) ?></td>
                 <td><?= $order['order_date'] ?></td>
            </tr>
            <?php endwhile; ?>

        </table>
        <hr>

        <h1 class="h1dashboard">Current Products</h1>

        <table id="dashboard_table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price (£)</th>
                <th>Uploaded at</th>
            </tr>

            <?php while ($product = mysqli_fetch_assoc($products)): ?>
            <tr>
                <td><?= $product['id'] ?></td>
                <td> <?= htmlspecialchars($product['name']) ?></td>
                <td> <?= htmlspecialchars($product['description']) ?></td>
                <td>£<?= htmlspecialchars($product['price']) ?></td>
                <td><?= $product['created_at'] ?></td>  
            </tr>
            <?php endwhile; ?>
        </table>
        <hr>
            <div class="dashboard_logout">
            <a href="logout.php">Logout</a>
            </div>
    </div>
    </body>
</html>
        