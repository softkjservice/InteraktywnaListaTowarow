<?php
include 'conn.php';
// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS towary (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nazwa VARCHAR(50) NOT NULL,
indeks VARCHAR(50) NOT NULL,
ilosc VARCHAR(20) NOT NULL,
jm VARCHAR(20),
cena VARCHAR(20),
kod VARCHAR(20),
kategoria VARCHAR(50),
etykieta VARCHAR(20),
lokalizacja VARCHAR(20),
magazyn VARCHAR(20)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table towary created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>