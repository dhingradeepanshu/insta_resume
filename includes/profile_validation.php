<?php
	include 'db.php';
	session_start();
	$email = $_SESSION['email'];
	if(isset($_POST['submit'])){
		$name=mysqli_real_escape_string($connect,$_POST['name']);
		
		$sql = "update user set name='$name' where email = '$email'; ";
		$result= mysqli_query($connect,$sql);
		header("Location: ../website/profile.php?change=success");
		
	}