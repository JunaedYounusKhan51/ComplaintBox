<?php
require("api/session.php");
require("api/config.php");
$ward = $_POST['ward'];
$place = $_POST['place'];
$road = $_POST['road'];
$type_id = $_POST['type_id'];
$title = $_POST['title'];
?>
<script src="js/common.js"></script> 
<a href="home.php"><img src="img/home.png" /></a>
<table border="0" align="center">
  <tr>
    <td style="background-color:#FFFF00"><b>These problems look simillar to your problem type. Please check them before submitting</b><br /><br /></td>
  </tr>
  <tr>
    <td><div style="overflow:auto;height:360;">
		<?php
		$sql = "select * from complaint where ward='$ward' and place='$place' and road='$road' and type_id='$type_id' order by entry_date desc limit $output_limit";
		$out = mysql_query($sql, $db);
		while($rows = mysql_fetch_array($out))
		{
			$time = strtotime($rows['entry_date']);
			
			echo '<b style="color:#0033CC;">'.$rows['title'].'</b> <span style="color:#999999;font-size:11px;">'.humanTiming($time).' ago</span> <br>';
			echo '<img src="upload/'.$rows['id'].'.jpg?'.time().'" width="340" />';
			echo '<div id="show_less" align="justify" style="display:;">'.(strlen($rows['description'])>$see_more_length ? substr($rows['description'],0, $see_more_length).'....<a href="#" style="text-decoration:none;" onclick="display_control(\'show_less\',\'show_more\');">[see more]</a>' : $rows['description']).'</div>';
			echo '<div id="show_more" align="justify" style="display:none;">'.$rows['description'].' <a href="#" style="text-decoration:none;" onclick="display_control(\'show_more\',\'show_less\');">[see less]</a></div>';
			echo '<table width="100%" style="color:#999999;font-size:11px;">
					<tr>';
					
					$sql1 = "select * from vote where complaint_id='".$rows['id']."' and user_id='".$_SESSION['USER_ID']."'";
					$out1 = mysql_query($sql1, $db);
					if($rows1 = mysql_fetch_array($out1))
						echo '<td>Vote: <img src="img/like.png" /></td>';
					else
						echo '<td>Vote: <span id="show_take_vote_'.$rows['id'].'"><img src="img/unlike.png" onclick="take_vote(\''.$rows['id'].'\');" style="cursor:pointer;" /></span></td>';
					
					$sql1 = "select count(*) total from vote where complaint_id='".$rows['id']."'";
					$out1 = mysql_query($sql1, $db);
					if($rows1 = mysql_fetch_array($out1))	
						echo '<td align="right">Total Vote: <span id="show_total_vote_'.$rows['id'].'">'.$rows1['total'].'</span></td>';
						
			echo 	'</tr>
					<tr>
						<td colspan="2"><textarea name="" rows="2" cols="40" placeholder="Comment..."></textarea></td>					
					</tr>
					<tr>
						<td colspan="2" align="right"><input name="" type="button" value="Submit" style="font-size:11px;background-color:#0033FF;color:#FFFFFF" /></td>
					</tr>
				  </table>';
			echo '<hr />';
		}
		?>
	</div></td>
  </tr>
  <tr>
    <td><form action="submit_complaint_final.php" method="post">
			<input name="ward" type="hidden" value="<?php echo $ward;?>" />
			<input name="place" type="hidden" value="<?php echo $place;?>" />
			<input name="road" type="hidden" value="<?php echo $road;?>" />
			<input name="type_id" type="hidden" value="<?php echo $type_id;?>" />
			<input name="title" type="hidden" value="<?php echo $title;?>" />
			<input type="submit" value="My problem did not match any of these. 
Continue Submission" style="text-align:center;background-color:#009900;width:100%;color:#FFFFFF"/>
			<input type="button" value="Abort Submission. Return home" style="text-align:center;background-color:#FF0000;width:100%;color:#FFFFFF;" onclick="location.href='home.php';"/>
		</form>
	</td>
  </tr>
</table>