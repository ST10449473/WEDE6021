<?php
include("DBConn.php");

$message="";
$username="";
$email="";

if(isset($_POST['login'])){

$username=$_POST['username'];
$email=$_POST['email'];
$password=md5($_POST['password']);

$sql="SELECT * FROM tblUser
WHERE username='$username'
AND email='$email'
AND password='$password'
AND verified=1";

$result=$conn->query($sql);

if($result->num_rows>0){

$row=$result->fetch_assoc();

echo "<h2>User ".$row['full_name']." is logged in</h2>";

echo "<table border=1>";

foreach($row as $column=>$value){
echo "<tr><td>$column</td><td>$value</td></tr>";
}

echo "</table>";

}else{
$message="Invalid login or not verified";
}
}
?>

<form method="POST">

<h3><?php echo $message;?></h3>

<input type="text" name="username"
value="<?php echo $username;?>" required>

<input type="email" name="email"
value="<?php echo $email;?>" required>

<input type="password" name="password" required>

<button name="login">Login</button>

</form>