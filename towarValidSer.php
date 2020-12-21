<?php

$numer = $_REQUEST["numer"];
$odpowiedz["error"]="";
switch ($numer) {
	case "1":
		$towNazwa = $_REQUEST["towNazwa"];
		$odpowiedz["nazwa"]=$towNazwa;
		echo json_encode($odpowiedz);
		break;
	case "2":
		$towIndeks = $_REQUEST["towIndeks"];
		$odpowiedz["indeks"]=$towIndeks;
		echo json_encode($odpowiedz);
		break;
	case "3":
		$towIlosc = $_REQUEST["towIlosc"];
		$lastZnak=substr($towIlosc,strlen($towIlosc)-1,1);
		if (!strstr("012340567890",$lastZnak)){
			$towIlosc=substr($towIlosc,0,strlen($towIlosc)-1);
			$odpowiedz["error"]="Ostrzeżenie: Możliwe są tylko cyfry 0 - 9!";
		}
		
		/*
		$towIlosc=str_replace(",",".",$towIlosc);
		//sprawdzam czy ostatni znak należy do zbioru: (0123456789.,)
		$lastZnak=substr($towIlosc,strlen($towIlosc)-1,1);
		if (czyLiczba($lastZnak)=="nie" && strlen($towIlosc)>0){
			$towIlosc=substr($towIlosc,0,strlen($towIlosc)-1);	//znak nie jest cyfrą i zostaje odrzucony
		}
		// Jeśli 2 kropki w liczbie
		if (substr_count($towIlosc,".")>1){
			$towIlosc=substr($towIlosc,0,strlen($towIlosc)-1);   //zwraca pole bez ostatniego znaku
			$odpowiedz["error"]="Wystąpił błąd: Liczba może zawierać tylko jedną kropkę dziesiętną !";
		}
		// 3 znaki po kropce
		if (strlen($towIlosc) - stripos($towIlosc,".")>4 && stripos($towIlosc,".")>0){
			$towIlosc=substr($towIlosc,0,strlen($towIlosc)-1);
			$odpowiedz["error"]="Wystąpił błąd: Ilość może zawierać tylko 3 cyfry dziesiętne!";
		}
		*/
		$odpowiedz["ilosc"]=$towIlosc;
		echo json_encode($odpowiedz);	
		break;
	case "4":
		$towJm = $_REQUEST["towJm"];
		echo "Jednostka miary : ".$towJm;
		break;
	case "5":		
		$towCena = $_REQUEST["towCena"];
		$lastZnak=substr($towCena,strlen($towCena)-1,1);
		if (!strstr("012340567890",$lastZnak)){
			$towCena=substr($towCena,0,strlen($towCena)-1);
			$odpowiedz["error"]="Ostrzeżenie: Możliwe są tylko cyfry 0 - 9!";
		}
		
		/*
		$towCena=str_replace(",",".",$towCena);
		// Sprawdzam, czy ostatnio wprowadzony znak jest cyfrą
		$lastZnak=substr($towCena,strlen($towCena)-1,1);
		if (czyLiczba($lastZnak)=="nie" && strlen($towCena)>0){
			$towCena=substr($towCena,0,strlen($towCena)-1);	//znak nie jest cyfrą i zostaje odrzucony
		}
		// Jeśli 2 kropki w liczbie
		if (substr_count($towCena,".")>1){
			$towCena=substr($towCena,0,strlen($towCena)-1);   //zwraca pole bez ostatniego znaku
			$odpowiedz["error"]="Wystąpił błąd: Liczba może zawierać tylko jedną kropkę dziesiętną !";
		}
		// 2 znaki po kropce
		if (strlen($towCena) - stripos($towCena,".")>3 && stripos($towCena,".")>0){
			$towCena=substr($towCena,0,strlen($towCena)-1);
			$odpowiedz["error"]="Wystąpił błąd: Cena może zawierać tylko 2 cyfry dziesiętne!";
		}		
		*/
		$odpowiedz["cena"]=$towCena;
		echo json_encode($odpowiedz);
		break;
	case "6":
		$towKod = $_REQUEST["towKod"];
		$lastZnak=substr($towKod,strlen($towKod)-1,1);
		if (!strstr("012340567890",$lastZnak)){
			$towKod=substr($towKod,0,strlen($towKod)-1);
			$odpowiedz["error"]="Ostrzeżenie: Możliwe są tylko cyfry 0 - 9!";
		}
		if (strlen($towKod)>13){
			$towKod=substr($towKod,0,strlen($towKod)-1);
			$odpowiedz["error"]="Ostrzeżenie: ilość znaków kodu kreskowego jest maksymalna!";
		}
		$odpowiedz["kod"]=$towKod;
		echo json_encode($odpowiedz);
		break;
	default:
		echo "Pole nie określone !";
}

// funkcja sprawdz, czy znak jest cyfrą lub kropką lub przecinkiem
function czyLiczba(string $x) 
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

// funkcja sprawdz, czy znak jest cyfrą lub kropką lub przecinkiem
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
//$imie = $_REQUEST["imie"];
//$nazwisko = $_REQUEST["nazwisko"];
//echo "Twoje imię to ".$imie." ".$nazwisko


?>