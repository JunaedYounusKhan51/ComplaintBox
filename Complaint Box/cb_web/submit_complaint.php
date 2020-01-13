<?php
require("api/session.php");
require("api/config.php");
?>
<a href="home.php"><img src="img/home.png" /></a>
<center><h3>Submit your complaint here.</h3></center>
<form action="submit_complaint_next.php" method="post">
	<table border="0" align="center">
		<tr>
			<td><input name="ward" type="text" placeholder="Ward No." autocomplete="off"/></td>
		</tr>
		<tr>
			<td><input name="place" type="text" placeholder="Place" autocomplete="off"/></td>
		</tr>
		<tr>
			<td><input name="road" type="text" placeholder="Road No." autocomplete="off"/></td>
		</tr>
		<tr>
			<td>
				<select name="type_id">
					<option value="">--Select Type of the Problem--</option>
					<?php
					$sql = "select * from type where status='Y'";
					$out = mysql_query($sql, $db);
					while($rows = mysql_fetch_array($out))
					{
						echo '<option value="'.$rows['id'].'">'.$rows['name'].'</option>';
					}
					?>					
				</select>
			</td>
		</tr>
		<tr>
			<td><input name="title" type="text" placeholder="Title of the Complaint" autocomplete="off"/></td>
		</tr>
		<tr>
			<td align="center"><input type="submit" value="Continue" /></td>
		</tr>
	</table>
</form>