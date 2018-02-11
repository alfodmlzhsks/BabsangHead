<?php
$ge = mysql_query("SELECT * FROM `web_events` ORDER BY `id` DESC LIMIT 5") or die(mysql_error());
while($e = mysql_fetch_array($ge)){
$gc = mysql_query("SELECT * FROM `web_ecomments` WHERE `eid`='".$e['id']."' ORDER BY `id` ASC") or die(mysql_error());
$cc = mysql_num_rows($gc);
?>
<tr>
	<td>
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<td class="main_bbs">
					<?php
                        echo "<img src=\"images/".$e['type'].".gif\" align=\"absmiddle\"> ";
                        echo "[".$e['date']."] ";
                        echo "<a href=\"events.php?id=".$e['id']."\">".stripslashes($e['title'])."</a>";
                    ?>
                    </td><td align="right"><?php
					echo "<b>".$cc."</b> <img src=\"images/comment.png\">";
					?></td>
            	</tr>
                <tr>
                	<td colspan="2">
                        <img src="images/bbs_line_02.gif" width="100%" height="7">
					</td>
                </tr>
            </tbody>
		</table>
	</td>
</tr>
<?php
}
?>
