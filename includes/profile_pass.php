<?php
	include 'db.php';
	session_start();
	$email = $_SESSION['email'];
	if(isset($_POST['submit'])){
		$pwd=mysqli_real_escape_string($connect,$_POST['pwd']);
		$newpwd=mysqli_real_escape_string($connect,$_POST['newpwd']);
		$confnewpwd=mysqli_real_escape_string($connect,$_POST['confnewpwd']);
		

		if ($pwd!="") {
			
			$sql = "select * from user where email = '$email';";
			$result= mysqli_query($connect,$sql);
			$row = mysqli_fetch_assoc($result);

			if ($newpwd!=$confnewpwd) {
				//passwords donot match
				header("Location: ../website/profile.php?password=nomatch#cpass");
			}
			elseif (!password_verify($pwd, $row['password'])) {
				//old password incorrect
				header("Location: ../website/profile.php?password=incorrect#cpass");
			}
			else{
				//changes saved suceesfully
				$newpwd = password_hash($newpwd, PASSWORD_DEFAULT);
				$sql = "update user set password='$newpwd' where email = '$email'; ";
				$result= mysqli_query($connect,$sql);
				header("Location: ../website/profile.php?changepass=success#cpass");
			}
		}
	}