<?php
include("config.php");
if($_SESSION['id']){
	$logouttime = 100;
	$timenow = time();
	$loggedtime = $timenow - $logouttime;
	$query = mysql_query("UPDATE `accounts` SET `sitelogged` = '".$loggedtime."' WHERE `id`='".$_SESSION['id']."'") or die(mysql_error());
	session_destroy();
	echo "로그아웃되었습니다! 다시 접속해보세요.<br />";
	echo "1초후에 메인으로 돌아갑니다.";
	echo "<META HTTP-EQUIV=Refresh CONTENT=\"1; URL=index.php\">";
}else{
	echo "이미 로그아웃되있습니다!";
}
?>