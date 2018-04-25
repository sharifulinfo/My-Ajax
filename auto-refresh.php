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
			<table>
				<tr>
					<td>User Message:</td>
					<td><textarea id="content"></textarea></td>
					
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" id="autosave" value="Send"></td>
				</tr>
			</table> 
		<div id="autoview"></div>
	</div>
</div>
<?php include 'inc/footer.php'; ?>