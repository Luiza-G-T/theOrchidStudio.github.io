<?php

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST'){
        HEADER("Location: shopping_cart.html");
        exit();
}

$name = trim($_POST['customer_name']);
$contact = trim($_POST['contact_number']);
$address = trim($_POST['house_address']);
$items = $_POST['cart_items'];
$total = $_POST['total_price'];

$sql = "INSERT INTO cart_orders (customer_name, contact_number, house_address, items, total_price) VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Database error: " . $conn->error);
}

$stmt->bind_param("ssssd", $name, $contact, $address, $items, $total);

if ($stmt->execute()) {

echo    "<script>
            localStorage.removeItem('cart');
            alert('Thank you for your Purchase! Your order has been received.');
            window.location.href = 'index.html';
        </script>";
} else {
    echo 'Error placing order: ' . $stmt->error;
}

$stmt->close();
$conn->close();

?>