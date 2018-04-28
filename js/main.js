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

	$('#show').on('click', function(){
		var pass = $('#password');
		var fieldtype = pass.attr('type');
		if(fieldtype == 'password'){
			pass.attr('type','text');
			$(this).text('Hide');
		}else{
			pass.attr('type','password');
			$(this).text('Show');
		}
	});

//Auto Save Data
	$('#autosave').click(function(){ 
		var content = $('#content').val();
		if($.trim(content) != ''){
			$.ajax({
				url:"aj/autorefresh.php",
				method:"POST",
				data:{body:content},
				success:function(data){ 
					 $('#content').val("")
				} 
			});
			return false;
		}
	});

//Auto load data
	setInterval(function(){
		$('#autoview').load("aj/getData.php").fadeIn('slow');
	},1000);

//Live Data Search
	$('#livesearch').keyup(function(){
		var keyword = $(this).val();
		if(keyword != ''){
			$.ajax({
				url:"aj/LiveSerch.php",
				method:"POST",
				data:{seach:keyword},
				dataType:"text",
				success:function(data){
					$('#serachResult').html(data);
				}
			});
		}else{
			$('#serachResult').html("");
		}
	});

});  