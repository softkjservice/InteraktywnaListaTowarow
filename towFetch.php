<?php
include('connection.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM towary ";
$sort="nic";
$sort1="nic1";
//print_r($_POST["order"]);


if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE nazwa LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR indeks LIKE "%'.$_POST["search"]["value"].'%" ';
}

if(isset($_POST["order"]))
{
	$sort1= $_POST['order']['0']['dir'];
	$sort=$_POST['order']['0']['column'];
	switch ($sort)
	{
		case "0":
			$colName="Nazwa";
			break;
		
		case "1":
			$colName="Ilosc";
			break;
			
		
	}
	//$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
	$query .= 'ORDER BY '.$colName.' '.$_POST['order']['0']['dir'].' ';
	
}

else
{
	$query .= 'ORDER BY id DESC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$filtered_rows = $statement->rowCount();
$data = array();

foreach($result as $row)
{
	$sub_array = array();
	//$sub_array[] = "";
	$sub_array[] = $row["nazwa"];
	//$sub_array[] = $sort;
	//$sub_array[] = $row["indeks"];
	//$sub_array[] = $sort1;
	$sub_array[] = $row["ilosc"];
	//$sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update" style="font-size: 40px">Edit</button>';
	$sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update fontEdit btnZielony" >&nbsp; Edit&nbsp; </button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete fontEdit btnCzerwony" >&nbsp; Del &nbsp;&nbsp;</button>';
	$data[] = $sub_array;
}

$output = array(
		"draw"				=>	intval($_POST["draw"]),
		"recordsTotal"		=> 	$filtered_rows,
		"recordsFiltered"	=>	get_total_all_records(),
		"data"				=>	$data
);
echo json_encode($output);


?>