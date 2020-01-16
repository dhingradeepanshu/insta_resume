<?php 
 include_once '../includes/db.php';
session_start();
$email = $_SESSION['email'];
$sql= "select * from personal where email='$email'";
$result = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($result);
$sql1= "select * from contact where email='$email'";
$result1= mysqli_query($connect,$sql1);
$row1 = mysqli_fetch_assoc($result1);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Create Resume</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/cresume.css">

  </head>
  <body>

    <a href="Dashboard.php"><img src="../images/back.svg" class="back" alt=""></a>

    <div class="progressBar">
      <div class="color"></div>
    </div>

    <h2 class="stats">0%</h2>

    <div class="card">
      <div class="contentMain">
        <h2 class="heading" id='one'>Personal Details</h2>

        <form class="personal" autocomplete="off" action="../includes/personal.php" method="post">
          <label for="name" class="description">Name:</label>
          <input type="text" id="name" class="field" placeholder="Ex. John Doe" value="<?php echo $row['name'] ?>" name='name'>

          <label for="dob" class="description two">Date of Birth:</label>
          <input type="date" id="dob" class="field two" value="<?php echo $row['dob'] ?>" name='dob'>

          <label for="address" class="description three">Address:</label>
          <input type="text" id="address" class="field three" placeholder="Address" value="<?php echo $row['address'] ?>" name='address'>

          <label for="mobile" class="description four">Mobile:</label>
          <div class="flag_div"><img src="../images/flag.svg" class="flag" style="width:20px">+91</div>
          <input type="tel" id="mobile" class="num field four" placeholder="Phone Number" value="<?php echo $row1['mobile'] ?>" name='mobile'>

          <label for="email" class="description five">Email:</label>
          
          <div class="field five ema"><?php echo $row['email'] ?></div>

          <label for="content" class="description six">About yourself:</label>
          <textarea name="about" id="content" cols="30" rows="7" class="about" placeholder="About Yourself...."><?php echo $row['about_yourself']?></textarea>
          <p class="instruction">*Save details before clicking Next.</p>
          <input type="submit" name="submit" class="save" value="Save">


          <?php
            if(isset($_GET['changes'])){
              if($_GET['changes']=='save'){
              echo'<p class="success">Saved Successfully!</p>';
            }
            else if($_GET['changes']=='madeupd'){
              echo'<p class="success">Updated Successfully!</p>';
            }
            else if($_GET['changes']=='madesame'){
              echo'<p class="success">Saved!</p>';
            }
            else{
               echo'<p class="success">Changes Saved Successfully!</p>';
            }
            } 
            if(isset($_GET['mobile'])){
              echo'<p class="fail">Contact Number already in use.</p>';
            }


           ?>



        </form>

        <a href="#" class="next">Next</a>

      </div>
    </div>

<?php
$sql= "select * from education where email='$email' and type='college'";
$result = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($result);
$cname =$row['name'];
$cadd =$row['address'];
$cgpa =$row['score'];

$sql= "select * from education where email='$email' and type='higher'";
$result = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($result);
$hname =$row['name'];
$hadd =$row['address'];
$hgpa =$row['score'];


$sql= "select * from education where email='$email' and type='primary'";
$result = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($result);
$pname =$row['name'];
$padd =$row['address'];
$pgpa =$row['score'];
?>
    <div class="cardRight1" id="cardRight1">
      <div class="contentMain">
        <h2 class="heading" id='two'>Educational Details</h2>

        <form class="education" autocomplete="off" action="../includes/education.php" method="post">

          <label for="college" class="description">College:</label>
          <input type="text" id="college" class="field" placeholder="Name" name="cname" value='<?php echo"$cname"; ?>'>
          <input type="text" class="field e2" placeholder="Address" name="cadd" value='<?php echo"$cadd"; ?>'>
          <input type="text" class="field e3" placeholder="CGPA / Percentage" name="cgpa" value='<?php echo"$cgpa"; ?>'>

          <label for="highSchool" class="description h1">Higher education:</label>
          <input type="text" id="highSchool" class="field h1" placeholder="Name" name="hname" value='<?php echo"$hname"; ?>'>
          <input type="text" class="field h2" placeholder="Address" name="hadd" value='<?php echo"$hadd"; ?>'>
          <input type="text" class="field h3" placeholder="CGPA / Percentage" name="hgpa" value='<?php echo"$hgpa"; ?>'>

          <label for="primaryEdn" class="description p1">Primary Education:</label>
          <input type="text" id="primaryEdn" class="field p1" placeholder="Name" name="pname" value='<?php echo"$pname"; ?>'>
          <input type="text" class="field p2" placeholder="Address" name="padd" value='<?php echo"$padd"; ?>'>
          <input type="text" class="field p3" placeholder="CGPA / Percentage" name="pgpa" value='<?php echo"$pgpa"; ?>'>

          
          <input type="submit" name="submit" class="save ncard" value="Save">

          

        </form>
        <!-- <a href="#" class="next1">Next</a> -->

      </div>
    </div>



<?php


$sql= "select * from skill where email='$email';";
$result = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($result);
$skill1 =$row['skill1'];
$skill2 =$row['skill2'];
$skill3 =$row['skill3'];
$skill4 =$row['skill4'];

$sql= "select * from experience where email='$email';";
$result = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($result);
$exp1 =$row['exp1'];
$exp2 =$row['exp2'];
$exp3 =$row['exp3'];



?>



    <div class="cardRight2" id="cardRight2">
      <div class="contentMain">
        <h2 class="heading" id='three'>Skills</h2>
          <form class="skills" action="../includes/skill.php" method="post" autocomplete="off">

            <div class="box1">
            <input type="text" class="dataField" id="skill1" placeholder="Skills" name="skill1" value='<?php echo"$skill1"; ?>'>
            <input type="text" class="dataField" id="skill2" placeholder="Skills" name="skill2" value='<?php echo"$skill2"; ?>'>
            <input type="text" class="dataField" id="skill3" placeholder="Skills" name="skill3" value='<?php echo"$skill3"; ?>'>
            <input type="text" class="dataField" id="skill4" placeholder="Skills" name="skill4" value='<?php echo"$skill4"; ?>'>
            </div>

        <h2 class="heading" id='five'>Experience</h2>

            <div class="box2">
            <input type="text" class="dataField" id="exp1" placeholder="Experience" name="exp1" value='<?php echo"$exp1"; ?>'>
            <input type="text" class="dataField" id="exp2" placeholder="Experience" name="exp2" value='<?php echo"$exp2"; ?>'>
            <input type="text" class="dataField" id="exp3" placeholder="Experience" name="exp3" value='<?php echo"$exp3"; ?>'>
            </div>

          
          <input type="submit" name="submit" class="save ncard" value="Save">
        </form>
        <!-- <a href="#" class="next2">Next</a> -->

      </div>
    </div>

<?php


$sql= "select * from extra where email='$email';";
$result = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($result);
$extra1 =$row['extra1'];
$extra2 =$row['extra2'];
$extra3 =$row['extra3'];
$extra4 =$row['extra4'];

$sql= "select * from project where email='$email';";
$result = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($result);
$project1 =$row['project1'];
$project2 =$row['project2'];
$project3 =$row['project3'];



?>


    <div class="cardRight3" id="cardRight3">
      <div class="contentMain">
        <h2 class="heading" id='four'>Extra Curricular</h2>
        <form action="../includes/extra.php" class="activities" method="post" autocomplete="off">

            <div class="box1">
            <input type="text" class="dataField" id="act1" placeholder="Extra Curricular Activities" name="extra1" value='<?php echo"$extra1"; ?>'>
            <input type="text" class="dataField" id="act2" placeholder="Extra Curricular Activities" name="extra2" value='<?php echo"$extra2"; ?>'>
            <input type="text" class="dataField" id="act3" placeholder="Extra Curricular Activities" name="extra3" value='<?php echo"$extra3"; ?>'> 
            <input type="text" class="dataField" id="act4" placeholder="Extra Curricular Activities" name="extra4" value='<?php echo"$extra4"; ?>'>
            </div>

        <h2 class="heading" id='six'>Projects</h2>

            <div class="box2">
            <input type="text" class="dataField" id="exp1" placeholder="Project" name="project1" value='<?php echo"$project1"; ?>'>
            <input type="text" class="dataField" id="exp2" placeholder="Project" name="project2" value='<?php echo"$project2"; ?>'>
            <input type="text" class="dataField" id="exp3" placeholder="Project" name="project3" value='<?php echo"$project3"; ?>'>
            </div>


          <input type="submit" name="submit" class="submit" value="Submit">
        </form>
        <!-- <a href="#" class="next3">Submit</a> -->

      </div>
    </div>

    <?php 
          if(isset($_GET['save'])){
            if($_GET['save']=='success'){
              echo "<script>
              var card = document.querySelector('.card');
              var color = document.querySelector('.color')
              var stats = document.querySelector('.stats');
              var one = document.querySelector('#cardRight1');
              var two = document.querySelector('#cardRight2');
              card.style.animation = '1s swoopOutone forwards';
               one.style.animation = '1s swoopOut forwards';
               two.style.animation = '1s swoopIn forwards';
               stats.textContent = '66%';
               color.style.animation = '1s progress66 forwards';
              </script>";

              

            }
          }

          ?>




      <?php 
          if(isset($_GET['save1'])){
            if($_GET['save1']=='success'){
              echo "<script>
              var card = document.querySelector('.card');
              var one = document.querySelector('#cardRight1');
              var two = document.querySelector('#cardRight2');
              var three = document.querySelector('#cardRight3');
              var color = document.querySelector('.color')
              var stats = document.querySelector('.stats');
              card.style.animation = '1s swoopOutone forwards';
              one.style.animation = '1s swoopIn forwards';
              two.style.animation = '1s swoopOut forwards';
              three.style.animation = '1s swoopIn forwards';
              stats.textContent = '100%';
              color.style.animation = '1s progress100 forwards';
              </script>";

              

            }
          }

          ?>


    <script src="../js/cresume.js" charset="utf-8"></script>


  </body>
</html>
