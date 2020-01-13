<?php
session_start();
require("../api/config.php");
$complaint_id = $_GET['complaint_id'];

if($complaint_id)
{
	$sql = "insert into vote (complaint_id, user_id, entry_date)  values ('$complaint_id', '".$_SESSION['USER_ID']."', NOW())";
	mysql_query($sql, $db);
	$sql = "update complaint set vote=vote+1 where id='$complaint_id'";
	mysql_query($sql, $db);
	echo '<img src="img/like.png" />';
}
mysql_close($db);
?>