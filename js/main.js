$(document).ready(function(){ 

//Check User Availability...
	$('#username').blur(function(){
		var username = $(this).val();
		$.ajax({
			url:"aj/checkUser.php",
			method:"POST",
			data:{username:username},
			dataType:"text",
			success:function(data){
				$('#userstatus').html(data);
			}
		});
	});

//Auto complete Text Box...

	$('#skill').keyup(function(){
		var skill = $(this).val();
		if(skill != ''){
			$.ajax({
				url:"aj/autofield.php",
				method:"POST",
				data:{skill:skill},
				success:function(data){
					$('#skilltatus').fadeIn();
					$('#skilltatus').html(data);
				}
			});
		}
	});

	$(document).on('click','li',function(){
		$('#skill').val($(this).text());
		$('#skilltatus').fadeOut();

	});

});  