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
	<title>Students</title>

</head> <link rel="stylesheet" type="text/css" href="../css/students.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
<body>

	<div class="hero">
		<div class="nav">
			<h1 class="heading">InstaResume</h1>
			<a href="../includes/logout.php"><h1 class="logout">Logout</h1></a>
		</div>

		<div class="main">
				<table>
  <thead>
    <tr>
      <th scope="col">Sr. No.</th>
      <th scope="col">Name</th>
      <th scope="col">Reg. No.</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "select email,name from user;";
    $result= mysqli_query($connect,$sql);
    $i=1;
    while($row = mysqli_fetch_row($result)){
      $email = $row[0];
      $sql1 = "select * from regdetails where email = '$email';";
$result1= mysqli_query($connect,$sql1);
$row1 = mysqli_fetch_assoc($result1);
$regno = $row1['registration_number'];
    $regno = strtoupper($regno);
      echo "<tr>";
      echo "<td>".$i."</td>";
      echo "<td>".$row[1]."</td>";
      echo "<td>".$regno."</td>";
      echo "<td>".$email."</td>";
      echo "</tr>";
      $i+=1;
    }

     ?>
    

    
  </tbody>
</table>
			
		</div>
	</div>	

</body>
</html>