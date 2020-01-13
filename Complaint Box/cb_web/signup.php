<?php
$err = $_GET['err'];
$msg = "";

if($err)
{
	switch($err)
	{
		case '1': $msg = "Any info can not be Blank!!"; break;
		case '2': $msg = "Nid duplicate!!"; break;
		case '3': $msg = "Wrong confirm password!!"; break;
		default: $msg = "Unknown Error!!!";
	}
}
?>
<body style="background:url(img/login4.jpg);">
<center><h3>Please Register Here.</h3></center>
<form action="api/signup.php" method="post">
	<table border="0" align="center">
		<tr>
			<td>Name</td><td><input name="name" type="text" autocomplete="off" /></td>
		</tr>
		<tr>
			<td>Nid</td><td><input name="nid" type="text" autocomplete="off" /></td>
		</tr>
		<tr>
			<td>Password</td><td><input name="password" type="password" autocomplete="off" /></td>
		</tr>
		<tr>
			<td>Confirm Password</td><td><input name="cpassword" type="password" autocomplete="off" /></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" value="Register" /> <input type="button" value="Back" onclick="location.href='login.php';" /></td>
		</tr>
		<tr>
			<td colspan="2" align="center" style="color:#FF0000;"><?php echo $msg;?></td>
		</tr>
	</table>
</form>