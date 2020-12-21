<!DOCTYPE html>
<html>

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/userDodaj.js"></script>
	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/nowaPozycja.css">
</head>

<body>
	<div class="divlogo">
		<a  href="index.php"><img src="img/kj09.png" width="250"   class="d-inline-block mr-1 align-bottom" alt="Oprogramowanie dla firm"><span class="logo"></span></a>
		<span class="tyt">Nowy Użytkownik</span>
	</div>
	<br>
	
	<form id="user_form" method="post" action=""  >
		  <div>
			<label for="userName"><span class="tyt2">Imię i nazwisko:</span></label><br>
			<input type="text" id="userName" name="userName"  placeholder="imię i nazwisko" autofocus></input>
		  </div>
		  <div>

			<label for="userLogin"><span class="tyt2">Login:</span></label>
			<input type="email" id="userLogin" name="userLogin" placeholder="login - adres e-mail"></input>
		  </div>
		  <div>  
			<label for="userHaslo"><span class="tyt2">Hasło:</span></label>
			<input type="password" id="userHaslo" name="userHaslo" placeholder="hasło" ></input>
		  </div>
		  <div>
			<label for="userMagazyn"><span class="tyt2">Magazyn:</span></label>
			<input type="text" id="userMagazyn" name="userMagazyn" value="MG"></input>
		  </div>

 		  <div>  
			<label for="userLokalizacja"><span class="tyt2">Lokalizacja:</span></label>
			<input type="text" id="userLokalizacja" name="userLokalizacja" placeholder="lokalizacja" ></input>
		  </div>
		  
		  <div>  
			<label for="userKategoria"><span class="tyt2">Przydzielona kategoria towarów:</span></label>
			<input type="text" id="userKategoria" name="userKategoria" placeholder="kategoria towarów" ></input>
		  </div>
		  
 		  <div>  
			<label for="userEtykieta"><span class="tyt2">Przydzielona etykieta towarów:</span></label>
			<input type="text" id="userEtykieta" name="userEtykieta" placeholder="etykieta towarów" ></input>
		  </div>
		  
		  <br><br><br>
		  <div>
			  <button type="button" id="userEnter" class="divfloatleft width_03">Enter</button>
			  <button type="button" id="userReset" class="divfloatleft width_03">Reset</button>  
			  <a href="index.php"><button type="button" id="userPowrot" class="divfloatleft width_03">Esc</button> </a> 
		  </div>
		 <br><br><br>
	</form>

	<div class="divstopka">
		<p id="p1"><span class="tyt1">Magazyn główny</span></p>
		<p id="p2"><span class="tyt1">Użytkownik zalogowany: KJ</span></p>
	</div>

	</body>
</html>
