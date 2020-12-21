<?php
include 'conn.php';
// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS user (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
login VARCHAR(50) NOT NULL,
haslo VARCHAR(50) NOT NULL,
magazyn VARCHAR(50),
lokalizacja VARCHAR(50),
kategoria VARCHAR(50),
etykieta VARCHAR(50)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table user created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>