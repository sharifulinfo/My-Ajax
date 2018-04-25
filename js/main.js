$(document).ready(function(){ 
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
});  