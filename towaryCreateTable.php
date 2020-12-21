<?php
include 'connection.php';
// sql to create table
$sql = "CREATE TABLE towary (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nazwa VARCHAR(50) NOT NULL,
indeks VARCHAR(50) NOT NULL,
ilosc VARCHAR(50) NOT NULL,
jm VARCHAR(50),
cena VARCHAR(50),
kod VARCHAR(50)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table towary created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>