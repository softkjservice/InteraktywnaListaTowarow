

	const text = "Moja mała świnka ****";
	console.log(text);




$(document).ready(function(){
	$("#userEnter").click(function() 
			{
			//alert("coś");
			 $.ajax({
				    method: "POST",
				    url: "userInsert.php",
				    /*data: 
					    {	
				    	userName: $("#userName").val() ,
				    	userLogin: $("#userLogin").val() ,
				    	userHaslo: $("#userHaslo").val() ,
				    	userMagazyn: $("#userMagazyn").val() ,
				    	userLokalizacja: $("#userLokalizacja").val() ,
				    	userKategoria: $("#userKategoria").val() ,
				    	userEtykieta: $("#userEtykieta").val() ,					 					     
						},*/
				    	data: $('form').serialize(),
						dataType:"JSON",
				    //success: function(response) {alert(response); }
						success: function(response) 
						{
							$('#userName').addClass(response.nameClass);
						
							$('#userName').attr("placeholder",response.namePlaceholder);
							$('#userLogin').addClass(response.loginClass);
							$('#userLogin').attr("placeholder",response.loginPlaceholder);
							$('#userHaslo').addClass(response.hasloClass);
							$('#userHaslo').attr("placeholder",response.hasloPlaceholder);
							console.log("odpowiedż 01: ",response.hasloPlaceholder);
							 
							alert(response.zapis+" "+ response.walidacjaOk+" " + response.edycjaInfo);
						}
	
				});		  
			});
		});

	$(document).ready(function(){
		  $("#userReset").click(function(){
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



// Obsługa klawisza Enter
$(document).ready(function(){
		$('#userName').on('keypress', function (e) {
	         if(e.which === 13){
	        	 $("#userLogin").focus();
	         }
			});
		});

$(document).ready(function(){
	$('#userLogin').on('keypress', function (e) {
         if(e.which === 13){
        	 $("#userHaslo").focus();
         }
		});
	});

$(document).ready(function(){
	$('#userHaslo').on('keypress', function (e) {
         if(e.which === 13){
        	 $("#userMagazyn").focus();
         }
		});
	});

$(document).ready(function(){
	$('#userMagazyn').on('keypress', function (e) {
         if(e.which === 13){
        	 $("#userLokalizacja").focus();
         }
		});
	});

$(document).ready(function(){
	$('#userLokalizacja').on('keypress', function (e) {
         if(e.which === 13){
        	 $("#userKategoria").focus();
         }
		});
	});

$(document).ready(function(){
	$('#userKategoria').on('keypress', function (e) {
         if(e.which === 13){
        	 $("#userEtykieta").focus();
         }
		});
	});

$(document).ready(function(){
	$('#userEtykieta').on('keypress', function (e) {
         if(e.which === 13){
        	 $("#userEnter").focus();
         }
		});
	});
