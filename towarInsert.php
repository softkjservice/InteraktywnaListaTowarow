 <?php
include 'conn.php';
include 'function.php';
// pobieranie danych z formularza
$nazwa=$_REQUEST['towNazwa'];
$indeks=$_REQUEST['towIndeks'];
$ilosc=$_REQUEST['towIlosc'];
$jm=$_REQUEST['towJm'];
$cena=$_REQUEST['towCena'];
$kod=$_REQUEST['towKod'];

//$kodOld=$_REQUEST['kodOld'];
//Zerowanie zmiennych
$walidacja["nazwa"] = "";
$walidacja["indeks"] = "";
$walidacja["ilosc"] = "";
$walidacja["jm"] = "";
$walidacja["cena"] = "";
$walidacja["nazwaClass"]= "";
$walidacja["nazwaPlaceholder"]= "";
$walidacja["iloscClass"]= "";
$walidacja["iloscPlaceholder"]= "";
$walidacja["zapis"]="";
$walidacja["walidacjaOk"]="";
$walidacja["kodJest"]="";
$walidacja["edycjaInfo"]="";

//sprawdzenie pól wymaganych
$walidacjaOk=TRUE;
$edycja=FALSE;
$edycjaInfo="";
$dodajInfo="";
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Edit")
	{
		$edycja=TRUE;
		$id=$_REQUEST['user_id'];
	}
}
	
// Walidacja nazwy: czy nie jest polem pustym
if (strlen($nazwa)<1){
	$walidacjaOk=FALSE;
	$walidacja["nazwaClass"]='poleWymagane';
	$walidacja["nazwaPlaceholder"]='Pole wymagane ! ';
	//$walidacja["zapis"]='Wypełnij pola wymagane';
	$walidacja["edycjaInfo"].= "Nazwa jest wymagana. ";
	//$edycjaInfo .= "Nazwa jest wymagana. ";
	//$walidacja["nazwaInfo"]='Pole wymagane !';
}

//Walidacja ilości
// Czy nie jest polem pustym
if (strlen($ilosc)<1){
	$walidacjaOk=FALSE;
	$walidacja["iloscClass"]='poleWymagane';
	$walidacja["iloscPlaceholder"]='Pole wymagane !';
	//$walidacja["zapis"]='Wypełnij pola wymagane';
	$walidacja["edycjaInfo"].= "Stan jest wymagany. ";
	//$edycjaInfo .= "Stan jest wymagany. ";
	//$walidacja["iloscInfo"]='Pole wymagane !';
}
else {
	// Czy nie zawiera znaków niedozwolonych dla liczby
	if (ilePoPrzecinku($ilosc)==-2){ 
		$walidacjaOk=FALSE;
		$walidacja["iloscClass"]='poleWymagane';
		$walidacja["iloscPlaceholder"]='Zły format liczby !';
		$walidacja["edycjaInfo"].= "Niedozwolone znaki w liczbie. ";
	
	}
	// Kontrola ilości znaków po przecinku - dozwolone 3
	if (ilePoPrzecinku($ilosc)>3){
		$walidacjaOk=FALSE;
		$walidacja["iloscClass"]='poleWymagane';
		$walidacja["iloscPlaceholder"]='Zły format liczby !';
		$walidacja["edycjaInfo"].= "Ilość: dozwolone 3 znaki po przecinku. ";
	
	}
}

//Walidacja ceny
// Czy nie jest polem pustym
if (strlen($cena)>0){
	// Czy nie zawiera znaków niedozwolonych dla liczby
	if (ilePoPrzecinku($cena)==-2){
		$walidacjaOk=FALSE;
		$walidacja["cenaClass"]='poleWymagane';
		$walidacja["cenaPlaceholder"]='Zły format liczby !';
		$walidacja["edycjaInfo"].= "Niedozwolone znaki w liczbie. ";
	
	}
	// Kontrola ilości znaków po przecinku - dozwolone 2
	if (ilePoPrzecinku($cena)>2){
		$walidacjaOk=FALSE;
		$walidacja["cenaClass"]='poleWymagane';
		$walidacja["cenaPlaceholder"]='Zły format liczby !';
		$walidacja["edycjaInfo"].= "Cena: dozwolone 2 znaki po przecinku. ";
	
	}
	
}

//Walidacja kodu
// Jeśli nie jest polem pustym
if (strlen($kod)>0){
	// Czy zawiera same cyfry
	if (ilePoPrzecinku($kod)!=-1){
		$walidacjaOk=FALSE;
		$walidacja["kodClass"]='poleWymagane';
		$walidacja["kodPlaceholder"]='Zły format liczby !';
		$walidacja["edycjaInfo"].= "Niedozwolone znaki w kodzie. ";

	}
}




//obsługa powtarzalności kodu kreskowego w przypadku edycji
$kodZmieniony=FALSE;
$kodZnaleziony="";

if ($edycja==TRUE){
	$query = "SELECT * FROM towary WHERE id = '".$id."'";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_array($result))
	{
		if (strlen($row["kod"])>0){
			$kodZnaleziony = $row["kod"];
		}
	}
	//$tekst1="kod nie zmieniony";
	if (strlen($kod)>0){
		if ($kodZnaleziony!=$kod){
			$kodZmieniony=TRUE;
			$edycjaInfo .= "Kod kreskowy zmieniony. ";
			//$tekst1="kod zmieniony";
		}
	}
}




//Sprawdzam, czy taki kod kreskowy już jest w bazie
if (!$edycja==TRUE || $kodZmieniony==TRUE)  
{
	$query = "SELECT * FROM towary WHERE kod = '".$kod."'";
	$result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_array($result))
	{
		if (strlen($row["kod"])>0){
			$walidacja["edycjaInfo"].= "Taki kod kreskowy już istnieje.";
			$walidacjaOk=FALSE;
		}
	}
}




//jeśli walidacja ok to podejmujemy próbę dopisania do bazy
if ($walidacjaOk)
{
	if (!$edycja==TRUE){
		$sql = "INSERT INTO towary (nazwa,indeks,ilosc,jm,cena,kod)
		VALUES ('$nazwa', '$indeks', '$ilosc', '$jm', '$cena', '$kod')";
	}
	else{
		$sql= "UPDATE towary
			SET nazwa = '$nazwa', indeks = '$indeks', ilosc = '$ilosc', jm = '$jm', cena = '$cena', kod = '$kod'	WHERE id = $id	";
	}
		
	
	if ($conn->query($sql) === TRUE) {
		// echo "New record created successfully";
		$walidacja["zapis"]='Sukces. Pozycja zapisana.';
	} else {
		$walidacja["zapis"]='Error!. Pozycja nie została do bazy';
	}
}
else{
	$walidacja["walidacjaOk"]="Brak poprawnej walidacji ";
}
	

$conn->close();

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Edit")
	{
		if (strlen($walidacja["edycjaInfo"]) == 0){
			$edycjaInfo = "Operacja zakończona sukcesem. ";
		}
		echo json_encode($walidacja);
		//echo $edycjaInfo;
		//echo json_encode($walidacja["edycjaInfo"]);
	}
}
else{
	echo json_encode($walidacja);
}


?>

