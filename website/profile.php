<?php
include '../includes/db.php';
session_start();

$email = $_SESSION['email'];
$sql = "select * from user where email = '$email';";
$result= mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$sql = "select * from regdetails where email = '$email';";
$result= mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($result);
$regno = $row['registration_number'];

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profile</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/profile.css">

  </head>
  <body>
    <a href="Dashboard.php"><img src="../images/back.svg" class="back" alt=""></a>
    <div class="container">
      <div class="dp">
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

      <a href="#upload" class="photo"><div class="camera_div"><img src="../images/camera.svg" alt="Camera Icon" class="camera"></div></a>

      <div class="details">
        <form id="profile_form" action="../includes/profile_validation.php" method="post" autocomplete="off">
        
        <label for="name" class="labels">Name:</label>
        <input type="text" id="name" name="name" value= "<?php echo $name ?>" required>

        <p class="labels one">Email:</p>
        <strong><p class="data"><?php echo strtolower($email) ?></p></strong>

        <p class="labels two">Registration Number:</p>
        <strong><p class="data next"><?php echo strtoupper($regno)?> </p></strong>

        <a href="#cpass"><p class="labels three"><img class="keyword" src="../images/keyword.svg"> Password updation</p></a>
        <?php 

        if(isset($_GET['change'])){
          echo '<p class="success">Saved successfully!</p>';
        }

        ?>

        <input type="submit" name="submit" value="Save" class="save">
        
        </form>


      </div>
    </div>

    <div class="content">
      <h2 class="mainHeading">Perks of using our platform:</h2>

      <p class="steps on">1. Its totally free! </p>
      <p class="steps tw">2. You can create, update and download unlimited CV's.</p>
      <p class="steps th">3. Your data is completely secure.</p>
      <p class="steps fo">4. Access it anytime, anywhere!</p>
    </div>

    <form  enctype="multipart/form-data" method="post" autocomplete="off" action="../includes/profile_picture.php" id="upload">
        
        <div class="upload_content">
        <img src="../images/camera.svg" alt="Camera Icon" class="camera">
        <p class="para">Upload Profile Picture</p>
        <input type="file" name="file">
        <input type="submit" name="upload" value="Save">
        <input type="submit" name="remove" value="Remove Photo" class="remove">
        <a href="#profile_form" class="upload_close">&times;</a>
        <?php 

        if(isset($_GET['fail'])){
          if($_GET['fail']="nosupport"){
          echo '<p class="fail">File Type Not Supported</p>';
        }elseif($_GET['fail']="error"){
          echo '<p class="fail">Error while uploading File</p>';
        }

      }elseif (isset($_GET['success'])) {
        echo '<p class="success">Successfully uploaded Image</p>';
      }

        ?>
        </div>
        
    </form>

        <form method="post" autocomplete="off" action="../includes/profile_pass.php" id="cpass">
          <div class="cpass_content">
            <img src="../images/keyword.svg" alt="Camera Icon" class="camera">
        <p class="para">Password Updation</p>
        <label for="prevPass" class="labels four">Previous Password:</label>
        <input type="password" name="pwd" id="prevPass" required> <br>

        <label for="newPass" class="labels five">New Password:</label>
        <input type="password" name="newpwd" id="newPass" required> <br>

        <label for="newPassConf" class="labels six">Confirm Password:</label>
        <input type="password" name="confnewpwd" id="newPassConf" required> <br>

        <input type="checkbox" name="" value="" id="showPassword">
        <label for="showPassword" class="labels seven">Show Password</label>

        <a href="#profile_form" class="upload_close">&times;</a>
        <input type="submit" name="submit" value="Save" class="save">
        <?php

        
        if(isset($_GET['password'])){
          if($_GET['password']=="nomatch"){
            echo '<p class="fail">Unmatched new password</p>';
          }
          elseif ($_GET['password']=="incorrect") {
            echo '<p class="fail">Incorrect Password</p>';
          }
        }
        if(isset($_GET['changepass'])){
          echo '<p class="success">Changes saved successfully!</p>';
        }
         ?>
       </div>
        </form>
        <script type="text/javascript" src="../js/profile.js"></script>
  </body>
</html>