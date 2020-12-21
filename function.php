<?php

function upload_image()
{
	if(isset($_FILES["user_image"]))
	{
		$extension = explode('.', $_FILES['user_image']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = './upload/' . $new_name;
		move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
		return $new_name;
	}
}

function get_image_name($user_id)
{
	include('db.php');
	$statement = $connection->prepare("SELECT image FROM users WHERE id = '$user_id'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["image"];
	}
}

function get_total_all_records()
{
	include('connection.php');
	$statement = $connection->prepare("SELECT * FROM towary");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

// funkcja sprawdz, czy znak jest cyfrą lub kropką lub przecinkiem
function czyLiczbaDozwolony(string $x)
{
	if  ($x=="0"||$x=="1"||$x=="2"||$x=="3"||$x=="4"||$x=="5"||$x=="6"||$x=="7"||$x=="8"||$x=="9"||$x=="."||$x==",")
	{
		return "tak";
	}
	else
	{
		return "nie";
	}
}


function czyLiczba(string $x)
{
	
}

// funkcja sprawdz, czy znak jest cyfrą
function czyCyfra(string $x)
{
	if  ($x=="0"||$x=="1"||$x=="2"||$x=="3"||$x=="4"||$x=="5"||$x=="6"||$x=="7"||$x=="8"||$x=="9")
	{
		return "tak";
	}
	else
	{
		return "nie";
	}
}

//Funkcja zwraca ilość znaków po przecinku  (-2 oznacza niedozwolone znaki w liczbie)
function ilePoPrzecinku(string $x)
{
	$ile=strlen($x);
	for ($i=0; $i<strlen($x); $i++){
		$znak=substr($x,$i,1);
		if (czyCyfra($znak)=="nie"){
			if ($znak=="," || $znak=="."){
				$ile=$i;
			}
			else{
				$ile=-2;
				return $ile;
			}
		}
	}
	$ile=strlen($x)-($ile+1);
	return $ile;
}

function ileMalp(string $x)
{
	$iloscMalp=0;
	for ($i=0; $i<strlen($x); $i++)
	{
		$znak=substr($x,$i,1);
		if ($znak=="@")
		{
			$iloscMalp++;
		}
	}
	return $iloscMalp;
}

?>