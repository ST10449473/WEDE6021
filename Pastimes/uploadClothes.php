<?php
include("DBConn.php");

if(isset($_POST['upload'])){

$name=$_POST['name'];
$brand=$_POST['brand'];
$price=$_POST['price'];
$desc=$_POST['description'];

$conn->query("INSERT INTO tblClothes
(item_name,brand,price,description)
VALUES('$name','$brand','$price','$desc')");

echo "Clothes Added!";
}
?>

<h2>Upload Clothes</h2>

<form method="POST">
<input name="name" placeholder="Item Name" required>
<input name="brand" required>
<input name="price" required>
<textarea name="description"></textarea>
<button name="upload">Upload</button>
</form>