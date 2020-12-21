<!DOCTYPE html>
<html>

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/towarDodaj.js"></script>
	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/nowaPozycja.css">
</head>

<body>
	<div class="divlogo">
		<a  href="index.php"><img src="img/kj09.PNG" width="250"   class="d-inline-block mr-1 align-bottom" alt="Oprogramowanie dla firm"><span class="logo"></span></a>
		<span class="tyt">Nowa pozycja</span>
	</div>
	<br>
	<form id="tow_form" method="post" action="towarInsert.php"  >
		  <div>
			<label for="towNazwa"><span class="tyt2">Nazwa:</span></label><br>
			<input type="text" id="towNazwa" name="towNazwa"  placeholder="nazwa" autofocus></input>
		  </div>
		  <div>

			<label for="towIndeks"><span class="tyt2">Indeks:</span></label>
			<input type="text" id="towIndeks" name="towIndeks" placeholder="indeks"></input>
		  </div>
		  <div>
		   
			<label for="towIlosc"><span class="tyt2">Ilość:</span></label>
			<input type="number" step="0.001" min="0" id="towIlosc" name="towIlosc" placeholder="ilość" ></input>
		  </div>
		  <div>
		 
			<label for="towIndeks"><span class="tyt2">Jednostka miary:</span></label>
			<input type="text" id="towJm" name="towJm" value="kg"></input>
		  </div>

		  <div>
		  
			<label for="towCena"><span class="tyt2">Cena:</span></label>
			<input type="number" step="0.01" min="0" id="towCena" name="towCena" placeholder="cena"></input>
		  </div>
		  <div>
		   
			<label for="towKod"><span class="tyt2">Kod kreskowy:</span></label>
			<input type="number" step="1" min="0" id="towKod" name="towKod" placeholder="kod kreskowy"></input>
		  </div>
		  <br><br><br>
		  <div>
			  <button type="button" id="Enter" class="divfloatleft width_03">Enter</button>
			  <button type="button" id="Reset" class="divfloatleft width_03">Reset</button>  
			  <a href="index.php"><button type="button" id="Powrot" class="divfloatleft width_03">Esc</button> </a> 
		  </div>
		 <br><br><br>
	</form>

	<div class="divstopka">
		<p id="p1"><span class="tyt1">Magazyn główny</span></p>
		<p id="p2"><span class="tyt1">Użytkownik zalogowany: KJ</span></p>
	</div>

	</body>
</html>
