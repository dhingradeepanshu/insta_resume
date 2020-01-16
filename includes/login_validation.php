<?php
 include_once 'db.php';

 if(isset($_POST['submit'])){
 	$email=mysqli_real_escape_string($connect,$_POST['email']);
 	$pwd=mysqli_real_escape_string($connect,$_POST['pwd']);
 	if($email=="admin@gmail.com" && $pwd=="admin"){
 		session_start();
 		$_SESSION['email'] = $_POST['email'];
 		header("Location: ../website/admin.php");
 	}
 	else{
 		echo "$email";
 		echo "$pwd";
 	$sql="select * from user where email='$email';";
 	$result= mysqli_query($connect,$sql);
 	$row= mysqli_num_rows($result);
 	if($row==0){
 		header("Location: ../index.php?login=invalidemail");
 		exit();
 	}
 	else {
 		$sql="select password from user where email='$email';";
 		$result= mysqli_query($connect,$sql);
 		$ans= mysqli_fetch_assoc($result);
 		if(!password_verify($pwd,$ans['password'] )){
 			header("Location: ../index.php?login=incorrectpwd");
 			exit();
 		}
 		else{
 			session_start();
			$_SESSION['email'] = $_POST['email'];
 			header("Location: ../website/Dashboard.php");
 		}

 	}
 }
 }
 