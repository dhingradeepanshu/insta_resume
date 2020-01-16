<?php
 include_once 'db.php';
  

if(isset($_POST['submit'])){
	$name=mysqli_real_escape_string($connect,$_POST['name']);
 	$regno=mysqli_real_escape_string($connect,$_POST['regno']);
 	$email=mysqli_real_escape_string($connect,$_POST['email']);
 	$pwd=mysqli_real_escape_string($connect,$_POST['pwd']);
 	$hashedpwd=password_hash($pwd, PASSWORD_DEFAULT);
 	$regno = strtolower($regno);
 	$sql="select * from regdetails where registration_number='$regno'";
 	$sql1="select * from user where email='$email'";
 	$result= mysqli_query($connect,$sql);
 	$result1= mysqli_query($connect,$sql1);
 	$row= mysqli_num_rows($result);
 	$row1= mysqli_num_rows($result1);
	if($_POST['pwd']!=$_POST['confpwd']){
		header("Location: ../index.php?password=nomatch");
		exit();
	}
	else if($row>0 || $row1>0){
		header("Location: ../index.php?signup=already");
	}
	else{
		$sql="insert into user values('$email','$name','$hashedpwd');";
		mysqli_query($connect,$sql);
		$sql="insert into regdetails values('$email','$regno');";
		mysqli_query($connect,$sql);
		$sql = "insert into picture(email) values('$email');";
		mysqli_query($connect,$sql);
		$sql = "insert into personal(email) values('$email');";
		mysqli_query($connect,$sql);
		$sql = "insert into education(email,type) values('$email','college');";
		mysqli_query($connect,$sql);
		$sql = "insert into education(email,type) values('$email','higher');";
		mysqli_query($connect,$sql);
		$sql = "insert into education(email,type) values('$email','primary');";
		mysqli_query($connect,$sql);
		$sql = "insert into skill(email) values('$email');";
		mysqli_query($connect,$sql);
		$sql = "insert into experience(email) values('$email');";
		mysqli_query($connect,$sql);
		$sql = "insert into extra(email) values('$email');";
		mysqli_query($connect,$sql);
		$sql = "insert into project(email) values('$email');";
		mysqli_query($connect,$sql);
		header("Location: ../index.php?signup=success");
	}
}
?>