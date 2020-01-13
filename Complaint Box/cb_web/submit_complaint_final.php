<?php
require("api/session.php");
require("api/config.php");
?>
<a href="home.php"><img src="img/home.png" /></a>
<center><h3>Continue Submission</h3></center>
<form action="api/submit_complaint.php" method="post" enctype="multipart/form-data">
	<input name="ward" type="hidden" value="<?php echo $_POST['ward'];?>" />
	<input name="place" type="hidden" value="<?php echo $_POST['place'];?>" />
	<input name="road" type="hidden" value="<?php echo $_POST['road'];?>" />
	<input name="type_id" type="hidden" value="<?php echo $_POST['type_id'];?>" />
	<input name="title" type="hidden" value="<?php echo $_POST['title'];?>" />
	<table border="0" align="center">
		<tr>
			<td><input type="file" name="upload"></td>
		</tr>
		<tr>
			<td><textarea name="description" placeholder="Add problem description" rows="3" cols="40"></textarea></td>
		</tr>
		<tr>
			<td><textarea name="recommendation" placeholder="Add recommendation" rows="3" cols="40"></textarea></td>
		</tr>
		<tr>
			<td align="center"><input type="submit" value="Submit" /> <input type="button" value="Cancel" onclick="location.href='home.php';" /></td>
		</tr>
	</table>
</form>