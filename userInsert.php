<?php
include 'conn.php';
include 'function.php';
// pobieranie danych z formularza
$name=$_REQUEST['userName'];
$login=$_REQUEST['userLogin'];
$haslo=$_REQUEST['userHaslo'];
$magazyn=$_REQUEST['userMagazyn'];
$lokalizacja=$_REQUEST['userLokalizacja'];
$kategoria=$_REQUEST['userKategoria'];
$etykieta=$_REQUEST['userEtykieta'];

$walidacja["zapis"] = "";
$walidacja["edycjaInfo"]="";
$walidacja["walidacjaOk"]="";
debugger;
if (strlen($name)<1){
	$walidacjaOk=FALSE;
	$walidacja["nameClass"]='poleWymagane';
	$walidacja["namePlaceholder"]='Pole wymagane ! ';
	$walidacja["edycjaInfo"].= "Nazwa jest wymagana. ";
}

if (strlen($login)<1){
	$walidacjaOk=FALSE;
	$walidacja["loginClass"]='poleWymagane';
	$walidacja["loginPlaceholder"]='Pole wymagane ! ';
	$walidacja["edycjaInfo"].= "Login jest wymagany. ";
}
else
{
	if (ileMalp($login)<1)
	{
		$walidacjaOk=FALSE;
		$walidacja["edycjaInfo"].= "Login musi zawierać znak @ . ";
		$walidacja["loginClass"]='poleWymagane';
	}
	
	if (ileMalp($login)>1)
	{
		$walidacjaOk=FALSE;
		$walidacja["edycjaInfo"].= "Login może zawierać tylko jeden znak @ . ";
		$walidacja["loginClass"]='poleWymagane';
	}
	
	if (substr($login,0,1)=="@" || substr($login,strlen($login)-1,1)=="@"){
		$walidacjaOk=FALSE;
		$walidacja["edycjaInfo"].= "Login musi mieć format adresu emailowego. ";
		$walidacja["loginClass"]='poleWymagane';
	}
}



if (strlen($haslo)<1){
	$walidacjaOk=FALSE;
	$walidacja["hasloClass"]='poleWymagane';
	$walidacja["hasloPlaceholder"]='Pole wymagane ! ';
	$walidacja["edycjaInfo"].= "Hasło jest wymagane. ";
}

echo json_encode($walidacja);

?>
