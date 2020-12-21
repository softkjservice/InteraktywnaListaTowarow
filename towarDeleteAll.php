<?php
include 'connection.php';

$sql = "DELETE FROM towary";

if ($conn->query($sql) === TRUE) {
    echo "wszystkie rekodry bazy users zostały usunięte";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>