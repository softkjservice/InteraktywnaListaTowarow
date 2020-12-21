<html>
	<head>
		<title> !!*Webslesson Demo - PHP PDO Ajax CRUD with Data Tables and Bootstrap Modals</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="js/index.js"></script>
		<script src="js/towarDodaj.js"></script>
		<link rel="stylesheet" href="css/common.css">	
		<link rel="stylesheet" href="css/edit.css">	 
	</head>
	<body>
		<div class="divlogo">
			<a  href="index.php"><img src="img/kj09.PNG" width="250"   class="d-inline-block mr-1 align-bottom" alt="Lista towarów"><span class="logo"></span></a>
			<span class="tyt">Lista towarów</span>
		</div>
		
		<div class="container box">
			 <div class="divcenter">
				<br>
			    <a href="towarDodaj.php"><button type="button" id="Dodaj" class="btnDodaj">+  Dodaj nowy towar >></button> </a>   
			 </div>
		 	 <br>
			<div class="table-responsive">
				<table id="table_data" class="table table-bordered table-hover table-dark">
					<thead>
						<tr>
							
							<th width="65%">Nazwa</th>
							
							<th width="15%">Stan</th>
							<th width="10%">Edit</th>
							<th width="10%">Del</th>
						</tr>
					</thead>
				</table>
			</div>		
		</div>
		<div class="divstopka">
			<p id="p01"><span class="tyt1">Magazyn główny ver. _01</span></p>
			<p id="p02"><span class="tyt1">Użytkownik zalogowany: KJ</span></p>
		</div>
	</body>
</html>

 
 <div id="userModal" class=" modal fade">
 	<div class="divlogo">
		<a  href="index.php"><img src="img/kj09.PNG" width="250"   class="d-inline-block mr-1 align-bottom" alt="Lista towarów"><span class="logo"></span></a>
		<span class="tyt">Edycja</span>
	</div>
	<div class="modal-dialog container box">
		<form method="post" id="user_form" enctype="multipart/form-data" class="formClass">
			<div class="modal-content">
				
				<div class="modal-body">
					<label><span class="tyt2">Nazwa:</span></label>
				    <input type="text" id="towNazwa" name="towNazwa" class="form-control form-control_01"   autofocus></input>
					<br />
					<label><span class="tyt2">Indeks:</span></label>
  					<input type="text" name="towIndeks" id="towIndeks" class="form-control form-control_01" placeholder="Indeks"/>
					<br />					
					<label><span class="tyt2">Ilość:</span></label>
					<input type="number" step="0.001" name="towIlosc" id="towIlosc" class="form-control form-control_01" placeholder="Ilość"/>
					<br />
			
					<label><span class="tyt2">J.miary:</span></label>
					<input type="text" id="towJm" name="towJm" class="form-control form-control_01" placeholder="Jednostka"></input>

					<label><span class="tyt2">Cena:</span></label>
				    <input type="number" step="0.01" id="towCena" name="towCena" class="form-control form-control_01" placeholder="Cena towaru"></input>
					<br />
					<label><span class="tyt2">Kod:</span></label>
  					<input type="number" step="1" name="towKod" id="towKod" class="form-control form-control_01" placeholder="Kod kreskowy"/>
					<br />	
					
				</div>
				<div class="modal-footer displayFlex">
					<input type="hidden" name="user_id" id="user_id" />
					<input type="hidden" name="operation" id="operation" />
					<div class="width_05">
					 <input type="submit" name="action" id="action" class="btn btn-success " value="Enter" /> 
					<!--<input  name="action" id="action" class="btn btn-success " value="Add" />	 -->				
					</div>
					<div class="width_05">
					<button type="button" class="btn btn-success  " data-dismiss="modal">Esc</button>
					</div>
					
				</div>
			</div>
		</form>
		<div class="divstopka">
			<p id="p01"><span class="tyt1">Magazyn główny ver. _01</span></p>
			<p id="p02"><span class="tyt1">Użytkownik zalogowany: KJ</span></p>
		</div>
	</div>
</div>

 

		