//zestaw skryptów dla pliku towarDodaj.php
$(document).ready(function(){
	$("#towJm").val("szt.");
});

/*
  $(document).ready(function(){
	$("#towNazwa").bind("change paste keyup", function() 
		{
		$('#towNazwa').removeClass("wymagane");
		 $.ajax({
			    method: "POST",
			    url: "towarValidSer.php",
			    data: 
				    {
				     towNazwa: $("#towNazwa").val() ,
					 numer: "1",
				     
					},
					dataType:"JSON",
			    //success: function(response) {alert(response); }
					success: function(response) 
					{
						$("#p1").text(response.nazwa); 
						$("#p2").text(response.error); 
					}
			});		  
		});
	});
	
	$(document).ready(function(){
	$("#towIndeks").bind("change paste keyup", function() 
		{
		 $.ajax({
			    method: "POST",
			    url: "towarValidSer.php",
			    data: 
				    {
				     towIndeks: $("#towIndeks").val() ,
					 numer: "2",
				     
					},
					dataType:"JSON",
			    //success: function(response) {alert(response); }
					success: function(response) 
					{
						$("#p1").text(response.indeks); 
						$("#p2").text(response.error);  
					}
			});		  
		});
	});

	$(document).ready(function(){
		$("#towIlosc").bind("change paste keyup", function() 
			{
			$('#towIlosc').removeClass("wymagane");
			 $.ajax({
				    method: "POST",
				    url: "towarValidSer.php",
				    data: 
					    {
					     towIlosc: $("#towIlosc").val() ,
						 numer: "3",					     
					},
						dataType:"JSON",
						success: function(response) 
						{
							$("#p1").text(response.ilosc); 
							$("#p2").text(response.error); 
							document.getElementById("towIlosc").value = response.ilosc;
						}
				});		  
			});
		});

	$(document).ready(function(){
		$("#towJm").bind("change paste keyup", function() 
			{
			
			 $.ajax({
				    method: "POST",
				    url: "towarValidSer.php",
				    data: 
					    {
					     towJm: $("#towJm").val() ,
						 numer: "4",
					     
						},
				    //success: function(response) {alert(response); }
						success: function(response) 
						{
							$("#p1").html(response); 
						}
				});		  
			});
		});

	$(document).ready(function(){
		$("#towCena").bind("change paste keyup", function() 
			{
			 $.ajax({
				    method: "POST",
				    url: "towarValidSer.php",
				    data: 
					    {
					     towCena: $("#towCena").val() ,
						 numer: "5",				     
						},
						dataType:"JSON",
						success: function(response) 
						{
							$("#p1").text(response.cena); 
							$("#p2").text(response.error); 
							document.getElementById("towCena").value = response.cena;
						}
				});		  
			});
		});

	$(document).ready(function(){
		$("#towKod").bind("change paste keyup", function() 
			{
			 $.ajax({
				    method: "POST",
				    url: "towarValidSer.php",
				    data: 
					    {
					     towKod: $("#towKod").val() ,
						 numer: "6",					     
						},
						dataType:"JSON",
				    //success: function(response) {alert(response); }
						success: function(response) 
						{
							//$("#p1").html(response); 
							document.getElementById("towKod").value = response.kod;
							$("#p1").text(response.kod); 
							$("#p2").text(response.error); 
							
						}
				});		  
			});
		});

*/
	
	
	
	$(document).ready(function(){
		$("#Enter").click(function() 
			{
			//alert("coś");
			 $.ajax({
				    method: "POST",
				    url: "towarInsert.php",
				    data: 
					    {	
				    	towNazwa: $("#towNazwa").val() ,
				    	towIndeks: $("#towIndeks").val() ,
				    	towIlosc: $("#towIlosc").val() ,
				    	towJm: $("#towJm").val() ,
				    	towCena: $("#towCena").val() ,
					    towKod: $("#towKod").val() ,						 					     
						},
						dataType:"JSON",
				    //success: function(response) {alert(response); }
						success: function(response) 
						{
							//alert(response);
							$('#towNazwa').addClass(response.nazwaClass);
							$('#towNazwa').attr("placeholder",response.nazwaPlaceholder);
							$('#towIlosc').addClass(response.iloscClass);
							$('#towIlosc').attr("placeholder",response.iloscPlaceholder);
							$('#towCena').addClass(response.cenaClass);
							$('#towKod').addClass(response.kodClass);
							alert(response.zapis+" "+ response.walidacjaOk+" " + response.edycjaInfo);
						    //  $( "#towNazwa").focus();
							 
							//$("#p1").text(response.nazwaInfo); 
							//$("#p2").text(response.zapis);
							//$("#p3").html(response.kodJest);
							
							//$("#p2").text(response.nazwaClass);
							
						    if (response.kodJest!=""){
						    	$("#towKod").focus();
						    	$("#towKod").val("");
						    }
							
						}
						//,
						// error: function (jqXHR, textStatus, errorThrown) { errorFunction(); }
				});		  
			});
		});

	$(document).ready(function(){
		  $("#Reset").click(function(){
		    $("#towNazwa:text").val("");
		    $("#towIndeks:text").val("");
		    //$("#towIlosc:text").val("0");
		    $("#towIlosc").val("null");
		    $("#towJm").val("szt.");
		    $("#towCena").val("null");
		    $("#towKod").val("null");
		    $('#towNazwa').removeClass("poleWymagane");
		    $('#towIlosc').removeClass("poleWymagane");
		    $('#towCena').removeClass("poleWymagane");
		    $('#towKod').removeClass("poleWymagane");
		    $("#towNazwa").focus();
		   /*
		    $('#towNazwa').attr("placeholder","");
		    $('#towIlosc').attr("placeholder","");
		    
		    $('#towNazwa').attr("placeholder","Nazwa");
		    $('#towIlosc').attr("placeholder","Ilość");
		    */
		  });
		});
	
// Zmiana pola input po naciśnięciu Entera
	$(document).ready(function(){
		$('#towNazwa').on('keypress', function (e) {
	         if(e.which === 13){
	        	 $("#towIndeks").focus();
	         }
			});
		});
	
	
	
	$(document).ready(function(){
		$('#towIndeks').on('keypress', function (e) {
	         if(e.which === 13){
	        	 $("#towIlosc").focus();
	         }
			});
		});
	
	$(document).ready(function(){
		$('#towIlosc').on('keypress', function (e) {
	         if(e.which === 13){
	        	 $("#towCena").focus();
	         }
			});
		});
	
	$(document).ready(function(){
		$('#towCena').on('keypress', function (e) {
	         if(e.which === 13){
	        	 $("#towKod").focus();
	         }
			});
		});
	
	$(document).ready(function(){
		$('#towKod').on('keypress', function (e) {
	         if(e.which === 13){
	        	 $("#Enter").focus();
	         }
			});
		});
	
	