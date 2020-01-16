<?php 
include '../includes/db.php';
session_start();
if(!$_SESSION['email']){
header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Resume</title>
	<link rel="stylesheet" type="text/css" href="../css/adminresume.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="hero">
		<div class="nav">
			<h1 class="heading">InstaResume</h1>
			<a href="../includes/logout.php"><h1 class="logout">Logout</h1></a>
		</div>
		<div class="main">
			<div class="card">
			<h1 class="head">Search Resume</h1>
			<hr class="line">

			<form class="example" action="../includes/search.php" method="post" autocomplete="off">
  			<input type="text" placeholder="Registration Number" name="search" required>
  			<button type="submit" name="submit"><i class="fa fa-search"></i></button>
			</form>
			<?php 
			if(isset($_GET['regno'])){
				if($_GET['regno']=='no'){
					echo "<p class='fail'><strong>Registration Number not found.</strong></p>";
				}

			}

			?>
			
		</div>
		</div>
	</div>

</body>
</html>