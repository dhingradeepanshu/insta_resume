<?php

include 'db.php';
session_start();
$email= $_SESSION['email'];
 	if(isset($_POST['submit'])){
 		$cname= mysqli_real_escape_string($connect,$_POST['cname']);
 		$cadd= mysqli_real_escape_string($connect,$_POST['cadd']);
 		$cgpa= mysqli_real_escape_string($connect,$_POST['cgpa']);

 		$hname= mysqli_real_escape_string($connect,$_POST['hname']);
 		$hadd= mysqli_real_escape_string($connect,$_POST['hadd']);
 		$hgpa= mysqli_real_escape_string($connect,$_POST['hgpa']);

 		$pname= mysqli_real_escape_string($connect,$_POST['pname']);
 		$padd= mysqli_real_escape_string($connect,$_POST['padd']);
 		$pgpa= mysqli_real_escape_string($connect,$_POST['pgpa']);

 		$sql = "update education set name='$cname', address='$cadd', score='$cgpa' where email='$email' and type='college';";
 		mysqli_query($connect,$sql);
 		$sql = "update education set name='$hname', address='$hadd', score='$hgpa' where email='$email' and type='higher';";
 		mysqli_query($connect,$sql);
 		$sql = "update education set name='$pname', address='$cadd', score='$pgpa' where email='$email' and type='primary';";
 		mysqli_query($connect,$sql);


 		
 		header('Location: ../website/cresume.php?save=success');

 	}