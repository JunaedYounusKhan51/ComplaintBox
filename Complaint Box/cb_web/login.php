<?php
session_start();
if($_SESSION['USER_ID'])
	header("Location:home.php");
	
$err = $_GET['err'];
$msg = "";

if($err)
{
	switch($err)
	{
		case '1': $msg = "Nid and Password can not be Blank!!"; break;
		case '2': $msg = "Invalid Nid or Password!!"; break;
		default: $msg = "Unknown Error!!!";
	}
}
?>
<body style="background:url(img/login4.jpg);">
<center><h3>Please Login Here. Or <a href="signup.php"> SignUp</a></h3></center>
<form action="api/login.php" method="post">
	<table border="0" align="center">
		<tr>
			<td>Nid</td><td><input name="nid" type="text" autocomplete="off" /></td>
		</tr>
		<tr>
			<td>Password</td><td><input name="password" type="password" autocomplete="off" /></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" value="Login" /></td>
		</tr>
		<tr>
			<td colspan="2" align="center" style="color:#FF0000;"><?php echo $msg;?></td>
		</tr>
	</table>
</form>
</body>