<?php 
include '../includes/db.php';
session_start();
$email = $_SESSION['email'];
?>
<?php 
$sql = "select * from contact where email = '$email';";
$result = mysqli_query($connect,$sql);
$arr = mysqli_fetch_assoc($result);            
$mobile = $arr['mobile'];

  $sql = "select * from personal where email = '$email';";
  $result = mysqli_query($connect,$sql);
  $arr = mysqli_fetch_assoc($result);
 $name = $arr['name'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Template2</title>
    <link rel="stylesheet" href="../css/template2.css">
  </head>
  <body>
    <div class="container">
      <div class="image">
        <?php
        $email = $_SESSION['email'];
        $sql = "select * from picture where email = '$email';";
        $result= mysqli_query($connect,$sql);
        $row = mysqli_fetch_assoc($result);
        $dp = $row['picture'];
        if($dp==''){
          echo '<img src="../images/boy.svg" alt="Default Pic" class="boy">' ;
        }
        else{
          echo '<img src="../images/'.$dp.'" alt="Default Pic" class="boy">' ;

        }
         ?>  
      </div>
      <div class="top">
        <img src="../images/top.svg" alt="" class="image1">
      </div>
      <div class="middle">
        <div class="row1">
          <div class="one">
            <?php 
            $sql = "select * from personal where email = '$email';";
            $result = mysqli_query($connect,$sql);
            $arr = mysqli_fetch_assoc($result);
            $name = $arr['name'];
            $dob = $arr['dob'];
            $address = $arr['address'];
            $about_yourself = $arr['about_yourself'];

            $sql = "select * from contact where email = '$email';";
            $result = mysqli_query($connect,$sql);
            $arr = mysqli_fetch_assoc($result);            
            $mobile = $arr['mobile'];
            ?>
            <h2>Personal Information</h2>
            <br>
            <ul>
              <li>Name: <?php echo "$name" ?></li>
              <li>Date Of Birth: <?php echo "$dob" ?></li>
              <li>Address: <?php echo "$address" ?></li>
              <li>Mobile: +91 <?php echo "$mobile" ?></li>
              <li>Email: <?php echo "$email" ?></li>
              <li>About Yourself: <?php echo "$about_yourself" ?></li>
            </ul>
          </div>
          <div class="two">
            <?php 
            $sql = "select * from project where email = '$email';";
            $result = mysqli_query($connect,$sql);
            $arr = mysqli_fetch_assoc($result);
            $project1 = $arr['project1'];
            $project2 = $arr['project2'];
            $project3 = $arr['project3'];
            ?>
            <h2>Projects</h2>
            <br>
            <ul>
              <li><?php echo"$project1"; ?></li>
              <li><?php echo"$project2"; ?></li>
              <li><?php echo"$project3"; ?></li>
            </ul>
          </div>
        </div>
        <div class="row2">
          <div class="one">
            <?php 
            $sql = "select * from skill where email = '$email';";
            $result = mysqli_query($connect,$sql);
            $arr = mysqli_fetch_assoc($result);
            $skill1 = $arr['skill1'];
            $skill2 = $arr['skill2'];
            $skill3 = $arr['skill3'];
            $skill4 = $arr['skill4'];
            ?>
            <h2>Skills</h2>
            <br>
            <ul>
              <li><?php echo"$skill1"; ?></li>
              <li><?php echo"$skill2"; ?></li>
              <li><?php echo"$skill3"; ?></li>
              <li><?php echo"$skill4"; ?></li>
            </ul>


          </div>
          <div class="two">
             <?php 
            $sql = "select * from education where email = '$email' and type='college';";
            $result = mysqli_query($connect,$sql);
            $arr = mysqli_fetch_assoc($result);
            $cname = $arr['name'];
            $caddress = $arr['address'];
            $cscore = $arr['score'];

            $sql = "select * from education where email = '$email' and type='higher';";
            $result = mysqli_query($connect,$sql);
            $arr = mysqli_fetch_assoc($result);
            $hname = $arr['name'];
            $haddress = $arr['address'];
            $hscore = $arr['score'];

            $sql = "select * from education where email = '$email' and type='primary';";
            $result = mysqli_query($connect,$sql);
            $arr = mysqli_fetch_assoc($result);
            $pname = $arr['name'];
            $paddress = $arr['address'];
            $pscore = $arr['score'];
            ?>
            <h2>Education</h2>
            <br>
            <ul>
               <ul>
                 <li><?php echo"$cname"; ?><em><?php echo",$caddress"; ?></em></li>
                 
                 <li><?php echo"$cscore"; ?></li>
               </ul> 
               <ul>
                 <li><?php echo"$hname"; ?><em><?php echo",$haddress"; ?></em></li>
                 
                 <li><?php echo"$hscore"; ?></li>
               </ul>
               <ul>
                 <li><?php echo"$pname"; ?><em><?php echo",$paddress"; ?></em></li>
                 
                 <li><?php echo"$pscore"; ?></li>
               </ul>
            </ul>
          </div>
        </div>
        <div class="row3">
          <div class="one">
             <?php 
            $sql = "select * from experience where email = '$email';";
            $result = mysqli_query($connect,$sql);
            $arr = mysqli_fetch_assoc($result);
            $exp1 = $arr['exp1'];
            $exp2 = $arr['exp2'];
            $exp3 = $arr['exp3'];
            ?>
            <h2>Experience</h2>
            <br>
            <ul>
              <li><?php echo"$exp1"; ?></li>
              <li><?php echo"$exp2"; ?></li>
              <li><?php echo"$exp3"; ?></li>
            </ul>
          </div>
          <div class="two">
            <?php 
            $sql = "select * from extra where email = '$email';";
            $result = mysqli_query($connect,$sql);
            $arr = mysqli_fetch_assoc($result);
            $extra1 = $arr['extra1'];
            $extra2 = $arr['extra2'];
            $extra3 = $arr['extra3'];
            $extra4 = $arr['extra4'];
            ?>
            <h2>Extra Curricular Activites</h2>
            <br>
            <ul>
              <li><?php echo"$extra1"; ?></li>
              <li><?php echo"$extra2"; ?></li>
              <li><?php echo"$extra3"; ?></li>
              <li><?php echo"$extra4"; ?></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="bottom">
      <img src="../images/bottom.svg" alt="" class="image2">
      </div>
    </div>

  </body>
</html>
