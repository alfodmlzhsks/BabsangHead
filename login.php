<?php
session_start();
include("config.php");
if($_SESSION[id]){
echo "<META HTTP-EQUIV=Refresh CONTENT=\"1; URL=index.php\">";
	echo "<script>
		alert('이미 로그인한 상태입니다.'); 
		history.go(-2)
		</script>";
		
		
	//echo "<META HTTP-EQUIV=Refresh CONTENT=\"0; URL=character.html\">"; // 이미 로그인을 한상태 일시
}else {
		$u = mysql_real_escape_string($_POST[id]);
		$p = mysql_real_escape_string($_POST[password]);
		$s = mysql_query("SELECT * FROM `accounts` WHERE `name`='".$u."'") or die(mysql_error());
		$i = mysql_fetch_array($s);
		
		
		if($i['password'] == hash('sha512',$p.$i['salt']) || sha1($p) == $i['password']){
			$user = mysql_query("SELECT * FROM `accounts` WHERE `name`='".$i['name']."' AND `password`='".$i['password']."'") or die(mysql_error());
			$auser = mysql_fetch_array($user);
			$_SESSION['id'] = $auser['id'];
			$_SESSION['name'] = $auser['name'];
			$_SESSION['mute'] = $auser['mute'];
			if($auser['webadmin'] == "1"){
				$_SESSION['admin'] = $auser['webadmin'];
			}
			if($auser['gm'] == "1"){
				$_SESSION['gm'] = $auser['gm'];
			}
			$name = mysql_query("SELECT * FROM `web_profile` WHERE `accountid`='".$auser['id']."'") or die(mysql_error());
			$pname = mysql_fetch_array($name);
			if($pname['name'] == NULL){
				$_SESSION['pname'] = NULL;
			}else{
				$_SESSION['pname'] = $pname['name'];
			}
			echo "<META HTTP-EQUIV=Refresh CONTENT=\"0; URL=community.php\">";
		}else{
			echo "<script>
		alert('아이디 또는 비밀번호가 올바르지 않습니다'); 
		history.go(-1)
		</script>";
}
}


?>