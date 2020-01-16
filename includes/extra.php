<?php

include 'db.php';
session_start();
$email= $_SESSION['email'];
 	if(isset($_POST['submit'])){
 		$extra1= mysqli_real_escape_string($connect,$_POST['extra1']);
 		$extra2= mysqli_real_escape_string($connect,$_POST['extra2']);
 		$extra3= mysqli_real_escape_string($connect,$_POST['extra3']);
 		$extra4= mysqli_real_escape_string($connect,$_POST['extra4']);

 		$project1= mysqli_real_escape_string($connect,$_POST['project1']);
 		$project2= mysqli_real_escape_string($connect,$_POST['project2']);
 		$project3= mysqli_real_escape_string($connect,$_POST['project3']);


 		$sql = "update extra set extra1='$extra1', extra2='$extra2', extra3='$extra3', extra4='$extra4'where email='$email';";
 		mysqli_query($connect,$sql);
 		$sql = "update project set project1='$project1', project2='$project2', project3='$project3' where email='$email';";
 		mysqli_query($connect,$sql);


 		
 		header('Location: ../website/Dashboard.php?form=done');

 	}
