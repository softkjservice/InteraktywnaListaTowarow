<?php
include('connection.php');
include('function.php');
//header("Location: towarDodaj.php");

if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM towary 
		WHERE id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["nazwa"] = $row["nazwa"];
		$output["indeks"] = $row["indeks"];
		$output["ilosc"] = $row["ilosc"];
		$output["jm"] = $row["jm"];
		$output["cena"] = $row["cena"];
		$output["kod"] = $row["kod"];
		
	}
	echo json_encode($output);
}

	
?>