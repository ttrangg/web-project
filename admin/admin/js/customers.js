$(document).ready(function(){

	getCustomers();

	function getCustomers(){
		$.ajax({
			url : '../admin/classes/Customers.php',
			method : 'POST',
			data : {GET_CUSTOMERS:1},
			success : function(response){
				
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {

					var customersHTML = "";

					$.each(resp.message, function(index, value){

						customersHTML += '<tr>'+
									          '<td>'+value.cus_id+'</td>'+
									          '<td>'+value.cus_name+'</td>'+
									          '<td>'+value.phone+'</td>'+
											  '<td>'+value.address+'</td>'+
									          '<td>'+value.email+'</td>'+
											  '<td><a cid="'+value.cus_id+'" class="btn btn-sm btn-danger delete-customer" style="color:#fff;"><i class="fas fa-trash-alt"></i></a></td>'+
									       '</tr>'

					});

					$("#customer_list").html(customersHTML);

				}else if(resp.status == 303){

				}

			}
		})
		
	}

	$(document.body).on('click', '.delete-customer', function(){

		var cid = $(this).attr('cid');
		if (confirm("Are you sure to delete this item ?")) {
			$.ajax({

				url : '../admin/classes/Customers.php',
				method : 'POST',
				data : {DELETE_CUSTOMERS: 1, cid:cid},
				success : function(response){
					console.log(response);
					var resp = $.parseJSON(response);
					if (resp.status == 202) {
						getCustomers();
					}else if (resp.status == 303) {
						alert(resp.message);
					}
				}

			});
		}else{
			alert('Cancelled');
		}
		

	});

});

