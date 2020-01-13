<?php
session_start();
require("config.php");
$nid 		= $_POST['nid'];
$password 	= $_POST['password'];

if($nid && $password)
{
	$sql = "select * from user where nid='$nid' and password='$password'";
	$out = mysql_query($sql, $db);
	if($rows = mysql_fetch_array($out))
	{
		$_SESSION['USER_ID'] = $rows['id'];
		$_SESSION['USER_NAME'] = $rows['name'];
		$_SESSION['USER_NID'] = $rows['nid'];
		header("Location:../home.php");
	}
	else
		header("Location:../login.php?err=2");
}
else
	header("Location:../login.php?err=1");

mysql_close($db);
?>