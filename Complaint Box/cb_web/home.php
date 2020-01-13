<?php
require("api/session.php");
?>
<a href="home.php"><img src="img/home.png" /></a>
<br><br>
<center><img src="img/box.png" border="0" /></center>
<center><a style="color:#FF3333;">Because Your Problem Matters.</a></center>
<center><h2>Welcome! <?php echo $_SESSION['USER_NAME'];?></h2></center><!-- -------------------------------------------------->
<br>
<a href="submit_complaint.php"><img src="img/submit.png" border="0" /></a><br>
<a href="recent_complaint.php"><img src="img/recent.png" border="0" /></a><br>
<a href="most_voted_complaint.php"><img src="img/most_voted.png" border="0" /></a><br>
<a href="tel:+88029350468"> <img src="img/call_police.png" border="0" /></a><br>
<a href="my_profile.php"><img src="img/my_profile.png" border="0" /></a><br>
<br>
<a href="logout.php"><img src="img/logout.png" border="0" /></a>
