<?php
include("DBConn.php");

$conn->query("DROP TABLE IF EXISTS tblUser");

$conn->query("
CREATE TABLE tblUser(
user_id INT AUTO_INCREMENT PRIMARY KEY,
full_name VARCHAR(100),
email VARCHAR(100),
username VARCHAR(50),
password VARCHAR(255),
user_type VARCHAR(20),
verified TINYINT DEFAULT 0
)");

$file=fopen("userData.txt","r");

while(($line=fgets($file))!==false){

$data=explode(",",trim($line));

$conn->query("INSERT INTO tblUser
(full_name,email,username,password,user_type)
VALUES('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]')");
}

echo "Table Created Successfully!";
?>