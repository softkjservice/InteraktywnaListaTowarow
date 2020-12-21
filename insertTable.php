<?php
//include 'config.php';
// $conn->set_charset("utf8");
include 'connection.php';
//$conn->set_charset("utf8");
$sql = "INSERT INTO users (login, haslo, name, email, grupa, oddzial, uwagi)
VALUES ('softkj', '1957kj', 'Krzysztof Jaworski 1', 'krzysztof.jaworski@softcenter.eu', 'glowna', 'Łódź Fabryczna', 'wpis testowy ')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>