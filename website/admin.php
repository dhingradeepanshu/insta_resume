<?php 

session_start();
if(!$_SESSION['email']){
header("Location: ../index.php");
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>

<div class="hero">
	<div class="nav">
		<h1 class="heading">InstaResume</h1>
		<a href="../includes/logout.php"><h1 class="logout">Logout</h1></a>
	</div>
	<div class="main">
		<div class="card">
			<h1 class="head">View Students</h1>
			<hr class="line">
			<a class="button" href="students.php">Students</a>
		</div>
		<div class="card">
			<h1 class="head">View Resume</h1>
			<hr class="line">
			<a class="button" href="adminresume.php">Resume</a>
		</div>
	</div>
</div>

</body>
</html>