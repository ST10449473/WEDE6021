<?php
session_start();
include "DBConn.php";

/* Select Clothing Store Database */
$conn->select_db("clothingStore");

/* Fetch Products */
$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
<title>Pastimes Clothing Store</title>

<style>

body{
    font-family: Arial, Helvetica, sans-serif;
    background:#f4f8ff;
    margin:0;
}

/* NAVBAR */
.navbar{
    background:#003366;
    padding:15px;
    text-align:center;
}

.navbar a{
    color:white;
    margin:15px;
    text-decoration:none;
    font-weight:bold;
}

.navbar a:hover{
    text-decoration:underline;
}

/* TITLE */
h1{
    text-align:center;
    color:#003366;
}

/* PRODUCT GRID */
.container{
    display:flex;
    flex-wrap:wrap;
    justify-content:center;
}

/* CARD */
.card{
    background:white;
    width:250px;
    margin:20px;
    padding:15px;
    border-radius:10px;
    box-shadow:0px 0px 10px rgba(0,0,0,0.15);
    text-align:center;
}

.card h3{
    color:#003366;
}

.price{
    font-size:18px;
    font-weight:bold;
    color:green;
}

/* BUTTON */
button{
    background:#007BFF;
    color:white;
    border:none;
    padding:10px;
    margin-top:10px;
    border-radius:5px;
    cursor:pointer;
}

button:hover{
    background:#0056b3;
}

</style>
</head>

<body>

<!-- NAVIGATION -->
<div class="navbar">
    <a href="store.php">Home</a>
    <a href="cart.php">Cart</a>
    <a href="login.php">Login</a>
    <a href="register.php">Register</a>
    <a href="adminLogin.php">Admin</a>
</div>

<h1>Pastimes Clothing Store</h1>

<div class="container">

<?php
if($result->num_rows > 0){

    while($row = $result->fetch_assoc()){
?>

        <div class="card">

            <h3><?php echo $row['name']; ?></h3>

            <p>Category: <?php echo $row['category']; ?></p>

            <p class="price">R<?php echo $row['price']; ?></p>

            <!-- ADD TO CART FORM -->
            <form method="POST" action="cart.php">

                <input type="hidden" name="id"
                value="<?php echo $row['id']; ?>">

                <input type="hidden" name="name"
                value="<?php echo $row['name']; ?>">

                <input type="hidden" name="price"
                value="<?php echo $row['price']; ?>">

                <button type="submit" name="add">
                    Add To Cart
                </button>

            </form>

        </div>

<?php
    }

}else{
    echo "<h3>No products available</h3>";
}
?>

</div>

</body>
</html>