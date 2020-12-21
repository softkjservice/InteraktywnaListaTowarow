<?php
$host = "localhost"; /* Host name */
$username = "root"; /* User */
$password = ""; /* Password */
$dbname = "firma_01"; /* Database name */
// Create connection
//$conn = new mysqli($host, $user, $password, $dbname);
$connection = new PDO( 'mysql:host=localhost;dbname=firma_01', $username, $password );
//$connection = new PDO( 'mysql:host=$host;dbname=$dbname', $username, $password );

?>