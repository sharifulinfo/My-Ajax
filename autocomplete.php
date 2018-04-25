<?php include 'inc/header.php'; ?>
<h2>Topics: Project List</h2>
<style>
	.skill{    width: 29%;
    margin-left: 50px;
    background: #ddd;
    color: blue;
    padding: 7px;}
    .skill ul li{
    	cursor: pointer;
    }
</style>
<div class="content">
	<div class="topics">
		<form action="" method="">
			<table>
				<tr>
					<td>Skill:</td>
					<td><input type="text" name="skill" id = "skill"></td>
				</tr>
			</table>
		</form>
		<div id="skilltatus"></div>
	</div>
</div>
<?php include 'inc/footer.php'; ?>