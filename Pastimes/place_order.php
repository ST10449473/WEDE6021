<?php
session_start();
include "db_connect.php";

if(!isset($_SESSION['cart'])){
    header("Location: store.php");
    exit();
}

$total = 0;

foreach($_SESSION['cart'] as $id => $qty){

    $sql = "SELECT * FROM products WHERE id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $total += $row['price'] * $qty;
}

/* Insert Order */
$sql = "INSERT INTO orders(total_amount)
        VALUES('$total')";

$conn->query($sql);

$order_id = $conn->insert_id;

/* Insert Order Items */
foreach($_SESSION['cart'] as $id => $qty){

    $sql = "INSERT INTO order_items(order_id, product_id, quantity)
            VALUES('$order_id','$id','$qty')";

    $conn->query($sql);
}

/* Clear Cart */
unset($_SESSION['cart']);
?>

<h1>✅ Order Placed Successfully!</h1>

<a href="store.php">Back to Store</a>