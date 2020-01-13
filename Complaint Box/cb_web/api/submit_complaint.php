<?php
require("session.php");
require("config.php");
$ward 			= $_POST['ward'];
$place 			= $_POST['place'];
$road 			= $_POST['road'];
$type_id 		= $_POST['type_id'];
$title 			= $_POST['title'];
$description 	= $_POST['description'];
$recommendation	= $_POST['recommendation'];

if($ward and $place and $road and $type_id and $title and $description and $recommendation)
{	
	$sql = "insert into complaint(ward, place, road, type_id, title, description, recommendation, user_id, entry_date) values('$ward','$place','$road','$type_id','$title','$description','$recommendation','".$_SESSION['USER_ID']."',NOW())";
	mysql_query($sql, $db);
	$target_file = '../upload/'.mysql_insert_id().'.jpg';
	move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file);
	echo 'Your complaint submission successfully. go <a href="../home.php">Home</a>';
}
else
	echo 'You give blank data. Try again please <input type="button" value="close" onclick="location.href=\'../submit_complaint.php\';" />';

mysql_close($db);
?>