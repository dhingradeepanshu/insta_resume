<?php
include 'db.php';
session_start();
$email= $_SESSION['email'];
	if(isset($_POST['submit'])){
		$name= mysqli_real_escape_string($connect,$_POST['name']);
		$dob= mysqli_real_escape_string($connect,$_POST['dob']);
		$address= mysqli_real_escape_string($connect,$_POST['address']);
		$mobile= mysqli_real_escape_string($connect,$_POST['mobile']);
		$about= mysqli_real_escape_string($connect,$_POST['about']);
		if($dob!=NULL){
		$sql = "update personal set name='$name',dob='$dob',address='$address',about_yourself='$about' where email='$email';";
		mysqli_query($connect,$sql);
		}
		if($dob==NULL){
		$sql = "update personal set name='$name',dob=NULL,address='$address',about_yourself='$about' where email='$email';";
		mysqli_query($connect,$sql);
		}	
		if($mobile!=''){
		$sql= "select * from contact where mobile='$mobile';";
		$result = mysqli_query($connect,$sql);
		$row = mysqli_num_rows($result);
		$num = mysqli_fetch_assoc($result);
		$sql1= "select * from contact where email='$email';";
		$result1 = mysqli_query($connect,$sql1);
		$row1 = mysqli_num_rows($result1);
		if($row1>0){
			if($row>0){
				if($num['email']!=$email){
					header('Location: ../website/cresume.php?mobile=alreadyother');
				}else{
					header('Location: ../website/cresume.php?changes=madesame');
				}
			}
			else{
				$sql= "update contact set mobile='$mobile' where email='$email'";
				mysqli_query($connect,$sql);
				header('Location: ../website/cresume.php?changes=madeupd');
			}
		}else{
			if($row>0){
				header('Location: ../website/cresume.php?mobile=already');
			}
			else{
				$sql= "insert into contact values('$email','$mobile');";
				mysqli_query($connect,$sql);
				header('Location: ../website/cresume.php?changes=save');
			}
		}

	}else{
		$sql1= "select * from contact where email='$email';";
		$result1 = mysqli_query($connect,$sql1);
		$row1 = mysqli_num_rows($result1);
		if($row1>0){
			$sql= "delete from contact where email='$email'";
			 mysqli_query($connect,$sql);
		}
		header('Location: ../website/cresume.php?changes=done');
	}
}