<?php
include_once 'db.php';
if(isset($_POST['submit'])){
	$search=mysqli_real_escape_string($connect,$_POST['search']);
	$search = strtolower($search);
	$sql="select * from regdetails where registration_number='$search';";
 	$result= mysqli_query($connect,$sql);
 	$row= mysqli_num_rows($result);
 	if($row==0){
 		header("Location: ../website/adminresume.php?regno=no");
 	}
 	if($row==1){
 		$sql="select email from regdetails where registration_number='$search';";
 		$result= mysqli_query($connect,$sql);
 		$row= mysqli_fetch_assoc($result);
 		session_start();
 		$_SESSION['email'] = $row['email'];
 		header("Location: ../website/template2.php");
 	}
}