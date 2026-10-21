<?php

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.html");
    exit();
}

$name = trim($_POST['name']);
$feedback = trim($_POST['feedback']);
$rating = trim($_POST['rating']);

$sql = "INSERT INTO feedback (customer_name, feedback, rating) VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Database error: " . $conn->error);
}

$stmt->bind_param("sss", $name, $feedback, $rating);

if($stmt->execute()){
    $stmt->close();
    $conn->close();

    echo "<script> alert('Thank you for your feeback!');
        window.location.href = 'index.html';
        </script>";
        exit();
} else {
    echo "Error saving feedback: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>