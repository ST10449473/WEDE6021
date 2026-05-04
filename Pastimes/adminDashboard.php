<?php
include("DBConn.php");

echo "<h1>Admin Dashboard</h1>";

/* VERIFY USER */
if(isset($_GET['verify'])){
$id=$_GET['verify'];
$conn->query("UPDATE tblUser SET verified=1 WHERE user_id=$id");
}

/* DELETE USER */
if(isset($_GET['delete'])){
$id=$_GET['delete'];
$conn->query("DELETE FROM tblUser WHERE user_id=$id");
}

/* SHOW USERS */
$result=$conn->query("SELECT * FROM tblUser");

echo "<table border=1>";
echo "<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Verified</th>
<th>Action</th>
</tr>";

while($row=$result->fetch_assoc()){

echo "<tr>";

echo "<td>".$row['user_id']."</td>";
echo "<td>".$row['full_name']."</td>";
echo "<td>".$row['email']."</td>";
echo "<td>".$row['verified']."</td>";

echo "<td>
<a href='?verify=".$row['user_id']."'>Verify</a> |
<a href='?delete=".$row['user_id']."'>Delete</a>
</td>";

echo "</tr>";
}

echo "</table>";
?>