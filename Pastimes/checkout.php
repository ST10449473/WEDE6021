<?php
session_start();
include "db_connect.php";

/* Check if cart exists */
if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])){
    echo "<h2>Your cart is empty</h2>";
    echo "<a href='store.php'>Go Back to Store</a>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Checkout</title>

<style>
body{
    font-family: Arial;
    background:#f4f6f8;
    text-align:center;
}

.container{
    width:70%;
    margin:auto;
    background:white;
    padding:20px;
    border-radius:10px;
}

table{
    width:100%;
    border-collapse:collapse;
}

th,td{
    padding:10px;
    border-bottom:1px solid #ddd;
}

button{
    background:#007BFF;
    color:white;
    padding:10px 20px;
    border:none;
    border-radius:5px;
}
</style>

</head>
<body>

<div class="container">

<h1>Checkout</h1>

<table>
<tr>
<th>Product</th>
<th>Price</th>
<th>Quantity</th>
<th>Total</th>
</tr>

<?php
$total = 0;

foreach($_SESSION['cart'] as $id => $qty){

    $sql = "SELECT * FROM products WHERE id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $subtotal = $row['price'] * $qty;
    $total += $subtotal;
?>

<tr>
<td><?php echo $row['name']; ?></td>
<td>R<?php echo $row['price']; ?></td>
<td><?php echo $qty; ?></td>
<td>R<?php echo $subtotal; ?></td>
</tr>

<?php } ?>

</table>

<h2>Grand Total: R<?php echo $total; ?></h2>

<br>

<form action="place_order.php" method="POST">
<button type="submit">Place Order</button>
</form>

<br>
<a href="store.php">Continue Shopping</a>

</div>

</body>
</html>