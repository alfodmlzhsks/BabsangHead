<?php
session_start();
/* MySQL */
$host = "localhost"; /* your host - standard: localhost */
$user = "root"; /* your database user - standard: root */
$pass = "root"; /* your database password - standard: root */
$database = "odinms"; /* your database name - standard: odinms */

$conn = mysql_connect($host,$user,$pass);
$db = mysql_select_db($database, $conn) or die(mysql_error());

$sitetitle = "룰라서버";
$client = "http://"; /* URL to your client */
$servername = "룰라서버"; /* Name of your private server */
/* User online check */
if(isset($_SESSION['id'])){
	$logouttime = 300;
	$timenow = time();
	$loggedtime = $timenow - $logouttime;
	$query = mysql_query("UPDATE `accounts` SET `sitelogged` = '".$timenow."' WHERE `id`='".$_SESSION['id']."'") or die(mysql_error());
	$retrieve = mysql_query("SELECT * FROM `accounts` WHERE `sitelogged` >= '".$loggedtime."'") or die(mysql_error());
	$online = mysql_fetch_array($retrieve);
}

/* Functions */
function getOnline(){
	$logouttime = 100;
	$timenow = time();
	$loggedtime = $timenow - $logouttime;
	$a = mysql_query("SELECT * FROM `accounts` WHERE `sitelogged` >= '".$loggedtime."'") or die(mysql_error());
	$b = mysql_num_rows($a);
	return $b;
}
function onlineCheck($string){
	$logouttime = 300;
	$timenow = time();
	$loggedtime = $timenow - $logouttime;
	$a = mysql_query("SELECT * FROM `accounts` WHERE `sitelogged` >= '".$loggedtime."' AND `id`='".$string."'") or die(mysql_error());
	$b = mysql_fetch_array($a);
	if($b['sitelogged'] >= $loggedtime){
		$check = "<img src=\"images/online.png\" height=\"13\" width=\"13\">";
	}else{
		$check = "<img src=\"images/offline.png\" height=\"13\" width=\"13\">";
	}
	return $check;
}
function getID($string){
	$a = mysql_query("SELECT * FROM `web_profile` WHERE `name`='".$string."'") or die(mysql_error());
	$b = mysql_fetch_array($a);
	return $b['accountid'];
}
function getName(){
	$a = mysql_query("SELECT * FROM `accounts` WHERE `id`='".$_SESSION['id']."'") or die(mysql_error());
	$b = mysql_fetch_array($a);
	return $b['name'];
}

$forumurl = "userblog.php"; /* 건드리지 마시오 */


?>
