<?php
session_start();
require("../api/config.php");
$complaint_id = $_GET['complaint_id'];

if($complaint_id)
{
	$sql = "select count(*) total from vote where complaint_id='$complaint_id'";
	$out = mysql_query($sql, $db);
	if($rows = mysql_fetch_array($out))
		echo $rows['total'];
}
mysql_close($db);
?>