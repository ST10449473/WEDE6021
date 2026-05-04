<?php
include("DBConn.php");

$result=$conn->query("SELECT * FROM tblClothes");

echo "<h1>Shop Clothes</h1>";

while($row=$result->fetch_assoc()){

echo "<div style='border:1px solid black;padding:10px;margin:10px;'>";

echo "<h3>".$row['item_name']."</h3>";
echo "Brand: ".$row['brand']."<br>";
echo "Price: R".$row['price']."<br>";
echo $row['description'];

echo "</div>";
}
?>