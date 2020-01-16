<?php

include 'db.php';
session_start();
$email= $_SESSION['email'];
 	if(isset($_POST['submit'])){
 		$skill1= mysqli_real_escape_string($connect,$_POST['skill1']);
 		$skill2= mysqli_real_escape_string($connect,$_POST['skill2']);
 		$skill3= mysqli_real_escape_string($connect,$_POST['skill3']);
 		$skill4= mysqli_real_escape_string($connect,$_POST['skill4']);

 		$exp1= mysqli_real_escape_string($connect,$_POST['exp1']);
 		$exp2= mysqli_real_escape_string($connect,$_POST['exp2']);
 		$exp3= mysqli_real_escape_string($connect,$_POST['exp3']);


 		$sql = "update skill set skill1='$skill1', skill2='$skill2', skill3='$skill3', skill4='$skill4'where email='$email';";
 		mysqli_query($connect,$sql);
 		$sql = "update experience set exp1='$exp1', exp2='$exp2', exp3='$exp3' where email='$email';";
 		mysqli_query($connect,$sql);


 		
 		header('Location: ../website/cresume.php?save1=success');

 	}