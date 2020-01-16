<?php 

session_start();
if(!$_SESSION['email']){
header("Location: ../index.php");
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/Dashboard.css">
    <!-- <script>
      function preventBack(){
       window.history.forward(); 
      }
      setTimeout("preventBack()",0);
      window.onunload = function(){ null };
    </script> -->
  </head>
  <body>

    <div class="navigation">
      <!-- <input type="checkbox" class="check" name="checkhack" value="">
      <label for="checkhack" class="button">
        <span button="icon"> &rarr; <br></span>
        <span button="icon"> &rarr; <br></span>
        <span button="icon"> &rarr; <br></span>
      </label> -->

      <div class="nav">
        <nav>
          <ul class="sideNav">
            <li class="item top"><a href="profile.php">Profile</a></li>
            <li class="item middle1"><a href="cresume.php">Create Resume</a></li>
           
            <li class="item middle3"><a href="vresume.php">View Resume</a></li>
            <li class="item bottom"><a href="../includes/logout.php">Logout</a></li>
          </ul>
        </nav>
      </div>
    </div>

    <h1 class="mainHeading">
      Welcome Back
    </h1>

    <div class="instruction">
      <h4 class="subHeading">Just follow these basic steps:</h4>
      <h5 class="create">Creating Resume</h5>
      <p class="steps one">1. click on Create Resume option from side navbar. </p>
      <p class="steps two">2. Fill all the required fields.</p>
      <p class="steps three">3. Submit the details and the resume would be generated!</p>
      <p class="steps four">4. Download The resume. Its totally free!</p>

      <h5 class="update">Updating Resume</h5>
      <p class="steps five">1. click on Update Resume option from side navbar. </p>
      <p class="steps six">2. Update all the required fields.</p>
      <p class="steps seven">3. Submit the details and the resume would be Updated!</p>
    </div>

    <img src="../images/resumeDocs.svg"  class="imgResume" alt="">
    <img src="../images/mainDoc.svg" alt="" class="doc">


  <script src="../js/Dashboard.js" charset="utf-8"></script>
  </body>
</html>
