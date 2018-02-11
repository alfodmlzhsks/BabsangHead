<?php
include("config.php");

if($_SESSION['id']){
	echo "<script>
		alert('이미 로그인한 상태입니다.'); 
		history.go(-2)
		</script>";
}else
	
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		$cpassword = mysql_real_escape_string($_POST['cpassword']);
		$email = mysql_real_escape_string($_POST['email']);
		$birth = mysql_real_escape_string($_POST['birth']);
		
		$ucheck = mysql_query("SELECT * FROM `accounts` WHERE `name`='".$username."'") or die(mysql_error());
		if($username == ""){
		echo "<script>
		alert('아이디를 적어주세요'); 
		history.go(-1)
		</script>";
		}elseif(mysql_num_rows($ucheck) >= 1){
			echo "<script>
		alert('아이디가 이미있습니다.'); 
		history.go(-1)
		</script>";
		}elseif($password == ""){
			echo "<script>
		alert('비밀번호를 적어주세요.'); 
		history.go(-1)
		</script>";
		}elseif($password != $cpassword){
			echo "<script>
		alert('비밀번호가 서로 맞지않습니다.'); 
		history.go(-1)
		</script>";
		}elseif($email == ""){
			echo "<script>
		alert('이메일을 적어주세요.'); 
		history.go(-1)
		</script>";
		}elseif(strlen($username) < 4){
			echo "<script>
		alert('아이디는 4이상 12미만 이여야 합니다.'); 
		history.go(-1)
		</script>";
		}elseif(strlen($username) > 12){
		echo "<script>
		alert('아이디는 4이상 12미만 이여야 합니다.'); 
		history.go(-1)
		</script>";
		}elseif(strlen($password) < 6){
		echo "<script>
		alert('비밀번호는 6이상 12미만 이여야 합니다.'); 
		history.go(-1)
		</script>";
		}elseif(strlen($password) > 12){
		echo "<script>
		alert('비밀번호는 6이상 12미만 이여야 합니다.'); 
		history.go(-1)
		</script>";
		}elseif($birth == ""){
		echo "<script>
		alert('생성날짜를 적어주세요'); 
		history.go(-1)
		</script>";
		}else{
			$ia = mysql_query("INSERT INTO `accounts` (`name`,`password`,`birthday`,`email`) VALUES ('".$username."','".sha1($password)."','".$birth."','".$email."')") or die(mysql_error());
					echo "<script>
		alert('밥상머리 회원가입에 진심으로 축하드립니다.'); 
		history.go(-2) 
		</script>";
		// 마이페이지로 이동할수있도록 소스코딩 하기
		}
?>