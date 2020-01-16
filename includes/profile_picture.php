<?php
	include 'db.php';
	session_start();
	$email = $_SESSION['email'];
	$sql = "select * from user where email = '$email';";
	$result= mysqli_query($connect,$sql);
	$row = mysqli_fetch_assoc($result);
	$sql = "select * from regdetails where email = '$email';";
	$result= mysqli_query($connect,$sql);
	$row = mysqli_fetch_assoc($result);
	$regno = $row['registration_number'];
	if(isset($_POST['upload'])){
		$file = $_FILES['file'];

		$fileName = $_FILES['file']['name'];
		$fileTempName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error'];
		$fileType = $_FILES['file']['type'];

		$fileExtn = explode('.', $fileName);
		$fileExtnlow = strtolower(end($fileExtn));

		$allowed = array('jpg','jpeg','png');

		if(in_array($fileExtnlow,$allowed)){
			if($fileError === 0){
				// $email = $_SESSION['email'];
				// $sql = "select * from login where email = '$email';";
				// $result= mysqli_query($connect,$sql);
				// $row = mysqli_fetch_assoc($result);
				// $regno = $row['regno'];
				$fileNewName = $regno.".".$fileExtnlow;
				
				$fileDesti = '../images/'.$fileNewName;
				
				$fileN = '../images/'.$regno.'.jpg';
				unlink($fileN);
				$fileN = '../images/'.$regno.'.jpeg';
				unlink($fileN);
				$fileN = '../images/'.$regno.'.png';
				unlink($fileN);

				move_uploaded_file($fileTempName, $fileDesti);

				$sql = "update picture set picture='$fileNewName' where email='$email';";
				mysqli_query($connect,$sql);
				header("Location: ../website/profile.php?success=upload#upload");
				
			
			}
			else{
				header("Location: ../website/profile.php?fail=error#upload");
			}

		}else{
			header("Location: ../website/profile.php?fail=nosupport#upload");
		}

	}else{
		$email = $_SESSION['email'];
		$fileN = '../images/'.$regno.'.jpg';
		unlink($fileN);
		$fileN = '../images/'.$regno.'.jpeg';
		unlink($fileN);
		$fileN = '../images/'.$regno.'.png';
		unlink($fileN);
		$sql = "update picture set picture=NULL where email='$email';";
		mysqli_query($connect,$sql);
		header("Location: ../website/profile.php");
	}