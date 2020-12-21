
 $(document).ready(function(){
		$('#add_button').click(function(){
			$('#user_form')[0].reset();
			$('.modal-title').text("Add User");
			$('#action').val("Add");
			$('#operation').val("Add");
			//$('#user_uploaded_image').html('');
		});
 

 
 var dataTable = $('#table_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[[ 0, "ASC" ]],
		"ajax":{
			url:"towFetch.php",
			type:"POST"
		},
		

	});


 $(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		var towNazwa = $('#towNazwa').val();
		var towIndeks = $('#towIndeks').val();
		var towIilosc = $('#towIlosc').val();
		var towJm = $('#towJm').val();
		var towCena = $('#towCena').val();
		var towKod = $('#towKod').val();
		
		//if(towNazwa != '' && towIndeks != '')
		//{
			$.ajax({
				//url:"towInsert.php",
				url:"towarInsert.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				dataType:"JSON",
				success:function(data)
				{
					alert(data.zapis+" "+ data.walidacjaOk+" " + data.edycjaInfo);
					$('#user_form')[0].reset();
					$('#userModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		//}
		//else
		//{
		//	alert("Both Fields are Required");
		//}
	});


 
 $(document).on('click', '.update', function(){
		var user_id = $(this).attr("id");
		$("#p1").html(user_id); 
		$.ajax({
			url:"towFetchSingle.php",
			method:"POST",
			data:{user_id:user_id},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#towNazwa').val(data.nazwa);
				$('#towIndeks').val(data.indeks);
				$('#towIlosc').val(data.ilosc);
				$('#towJm').val(data.jm);
				$('#towCena').val(data.cena);
				$('#towKod').val(data.kod);
				$('.modal-title').text("Edycja");
				$('#user_id').val(user_id);
				$('#action').val("Enter");
				$('#operation').val("Edit");
				var kodOld=data.kod;
			}
		})
	});

 
 
 $(document).on('click', '.delete', function(){
		var user_id = $(this).attr("id");
		if(confirm("Czy na pewno chcesz usunąć pozycję ?"))
		{
			$.ajax({
				url:"towDelete.php",
				method:"POST",
				data:{user_id:user_id},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;	
		}
	});
 
 $('.dataTables_filter input[type="search"]').
 attr('placeholder','Szukaj ....').
 css({'width':'350px','height':'60px','display':'inline-block'});
	 
 });	
