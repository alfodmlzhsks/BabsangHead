<?php
$gn = mysql_query("SELECT * FROM `web_news` ORDER BY `id` DESC LIMIT 5") or die(mysql_error());
while($n = mysql_fetch_array($gn)){
$gc = mysql_query("SELECT * FROM `web_ncomments` WHERE `nid`='".$n['id']."' ORDER BY `id` ASC") or die(mysql_error());
$cc = mysql_num_rows($gc);
?>
<tr>
	<td>
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
			<?php
				echo "<td class=\"main_bbs\"><img src=\"images/".$n['type'].".gif\" align=\"absmiddle\"> ";
					echo "[".$n['date']."] ";
					echo "<a href=\"news.php?id=".$n['id']."\">".stripslashes($n['title'])."</a></td><td align=\"right\"><b>".$cc."</b> <img src=\"images/comment.png\">";
				echo "</td>";
			echo "</tr>";
		  	echo "<tr>";
				echo "<td><img src=\"images/bbs_line_02.gif\" width=\"100%\" height=\"7\"></td>";
			echo "</tr>";
			?>
		</tbody>
		</table>
	</td>
</tr>
<?php
}
?>