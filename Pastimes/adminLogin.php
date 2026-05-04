<?php
session_start();
include("DBConn.php");

$message="";

if(isset($_POST['login'])){

$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM tblAdmin 
        WHERE username='$username' 
        AND password='$password'";

$result = $conn->query($sql);

if($result->num_rows > 0){

    $_SESSION['admin']=$username;

    // ✅ FIXED REDIRECT PATH
    header("Location: http://localhost/Pastimes/adminDashboard.php");
    exit();

}else{
    $message="Wrong Admin Details";
}
}
?>

<h2>Admin Login</h2>

<form method="POST">

<p style="color:red;"><?php echo $message;?></p>

Username:<br>
<input type="text" name="username" required><br><br>

Password:<br>
<input type="password" name="password" required><br><br>

<button name="login">Admin Login</button>

</form>