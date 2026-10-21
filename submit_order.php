<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config.php';

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header("Location: order.html");
    exit();
}
$name = $_POST['customer_name'];
$contact = $_POST['contact_number'];
$email = $_POST['email'];
$address = $_POST['house_address'];

$size = $_POST['bouquet_size'];
$foliage = $_POST['foliage'];

if(empty($_POST['flowers'])){
    die("please select at least one flower.");
}

$flowers = implode(", ", $_POST['flowers']);

switch($size) {
    case "S":
        $price = 25;
        break;

    case "M":
        $price = 35;
        break;
    
    case "L":
        $price = 45;
        break;

    default:
        $price = 0;

}

$sql ="INSERT INTO orders (customer_name, contact_number, email, house_address, bouquet_size, foliage, flowers, total_price)
VALUES (?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($sql);

if (!$stmt){
        die("Database error: " . $conn->error);
    }
    
$stmt->bind_param("sssssssd", $name, $contact, $email, $address, $size, $foliage, $flowers, $price);

    
    if ($stmt->execute()){

        $stmt->close();
        $conn->close();

        echo "<script>
                alert('Thank you for yout Purchase! Your order has been received.');
                window.location.href = 'index.html';
                </script>";
            exit();

    } else {
        echo "Error placing order: " . $stmt->error;

        $stmt->close();
        $conn->close();
    }
                                                                                                                                                                                                                   
?>