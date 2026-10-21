<?php

session_start();
include 'config.php';

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header("Location: admin_login.php");
    exit();
}

$username = trim($_POST['username']);
$password = $_POST['password'];

$sql = "SELECT * FROM admins WHERE username = ?";
$stmt = $conn->prepare($sql);

if (!$stmt){
    die("Database error: " . $conn->error);
}

$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

if($result && $result->num_rows === 1){

    $admin = $result->fetch_assoc();

    if(password_verify($password, $admin['password'])){

        $_SESSION['admin'] = $admin['username'];

        $stmt->close();
        $conn->close();
        
        header("Location: admin_dashboard.php");
        exit();
    }
}

$stmt->close();
$conn->close();

echo "Invalid username or password";

?>