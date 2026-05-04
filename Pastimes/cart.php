<?php
session_start();

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

if(isset($_POST['add'])){
    $item = [
        "id" => $_POST['id'],
        "name" => $_POST['name'],
        "price" => $_POST['price']
    ];

    $_SESSION['cart'][] = $item;
}

if(isset($_GET['remove'])){
    unset($_SESSION['cart'][$_GET['remove']]);
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Your Cart</title>

<style>
body{
    font-family:Arial;
    background:#f4f8ff;
    text-align:center;
}

table{
    margin:auto;
    border-collapse:collapse;
    width:60%;
}

th,td{
    border:1px solid #ccc;
    padding:10px;
}

button{
    background:red;
    color:white;
    border:none;
    padding:5px 10px;
}
</style>
</head>

<body>

<h1>Shopping Cart</h1>

<table>
<tr>
<th>Product</th>
<th>Price</th>
<th>Action</th>
</tr>

<?php
$total = 0;

foreach($_SESSION['cart'] as $index=>$item){
    $total += $item['price'];
    echo "<tr>
            <td>{$item['name']}</td>
            <td>R{$item['price']}</td>
            <td><a href='cart.php?remove=$index'><button>Remove</button></a></td>
          </tr>";
}
?>

</table>

<h2>Total: R<?php echo $total; ?></h2>

<br>
<a href="store.php">Continue Shopping</a>

</body>
</html>