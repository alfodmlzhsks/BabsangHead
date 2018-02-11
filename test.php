<?php 
include("config.php");
?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">

	<tbody><tr>
        <td>
            <span style="float: left;">
            <a href="userblog.php"><img class="main_title" border="0" src="images/bbs_ucommunity_title.gif" alt="more"></a></span>

            <span style="float: right; padding-top: 3px; line-height: 10px;" class="table_text_11">


        </td>
    </tr>

    <tr>
	        <td height="4"></td>

	    </tr>
	    <tr>
	        <td style="background-color: rgb(255, 159, 0);" height="3"></td>
	    </tr>
	    <tr>
	         <td height="4"></td>
	    </tr>
	<tr>
		<td width="200">		
		<?php
			$gb = mysql_query("SELECT * FROM `web_userblog` ORDER BY `id` DESC LIMIT 5") or die(mysql_error());
			while($b = mysql_fetch_array($gb)){
				$gc = mysql_query("SELECT * FROM `web_ubcomments` WHERE `bid`='".$b['id']."' ORDER BY `id` ASC") or die(mysql_error());
				$cc = mysql_num_rows($gc);
				echo "<table style=\"width: 100%; height: 100%;\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">";
				echo "<tbody><tr>";
			    echo "<td width=\"10\"></td>";
				echo "<td><img src=\"images/gm_arrow.gif\" width=\"7\" height=\"5\">[".$b['date']."] [<a href=\"members.php?name=".$b['author']."\">".$b['author']."</a>] <b><a href=\"userblog.php?id=".$b['id']."\">".stripslashes($b['title'])."</a></b></td><td align=\"right\"><b>".$cc."</b> <img src=\"images/comment.png\"></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td colspan=\"3\"><img src=\"images/bbs_line_02.gif\" width=\"100%\" height=\"7\"></td>";
				echo "</tr>";
				echo "</tbody></table>";
			}
		?>

		
</td>
	</tr>
</tbody></table>

						<!--END : 유저게시판 -->

					</td>
				</tr>
		</table>