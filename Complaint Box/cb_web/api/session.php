<?php
session_start();
if(!$_SESSION['USER_ID'])
	header("Location:login.php");
?>