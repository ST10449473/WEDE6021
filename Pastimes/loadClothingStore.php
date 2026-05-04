<?php
include "DBConn.php";

$sql = file_get_contents(__DIR__ . "/myClothingStore.sql");

if ($conn->multi_query($sql)) {
    echo "Clothing Store Database Loaded Successfully!";
} else {
    echo "Error: " . $conn->error;
}
?>