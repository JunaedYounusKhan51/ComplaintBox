<?php
require("config.php");
$name 		= $_POST['name'];
$nid 		= $_POST['nid'];
$password 	= $_POST['password'];
$cpassword 	= $_POST['cpassword'];

if($name and $nid and $password)
{	
	$sql = "select * from user where nid='$nid'";
	$out = mysql_query($sql, $db);
	if($rows = mysql_fetch_array($out))
		header("Location:../signup.php?err=2");
	else
	{
		if($password == $cpassword)
		{
			$sql = "insert into user(name, nid, password) values('$name','$nid','$password')";
			mysql_query($sql, $db);
			
			header("Location:../login.php");
		}
		else
			header("Location:../signup.php?err=3");
	}
}
else
	header("Location:../signup.php?err=1");

mysql_close($db);
?>