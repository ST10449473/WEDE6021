<?php
include("DBConn.php");

if(isset($_POST['register'])){

$name=$_POST['name'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=md5($_POST['password']);

$conn->query("INSERT INTO tblUser
(full_name,email,username,password,user_type,verified)
VALUES('$name','$email','$username','$password','customer',0)");

echo "Waiting for Admin Verification";
}
?>

<form method="POST">
<input type="text" name="name" placeholder="Full Name" required>
<input type="email" name="email" required>
<input type="text" name="username" required>
<input type="password" name="password" required>
<button name="register">Register</button>
</form>