
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>InstaResume</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/InstaResume.css">
    <script>
       window.history.forward(); 
      
    </script>
  </head>
  <body>

    <header>

      <div class="nav">
        <ul class="navbar">
          <li>InstaResume</li>
          <li><a href="#">About Us</a></li>
        </ul>
      </div>

      <div class="resume">

        <div class="content">
          <h1 class="mainHeading">InstaResume</h1>
          <h3 class="subHeading">The dynamic resume builder!</h3>
          <p class="details">Build your resumes hassle-free and access them anywhere.<br>
            It is easy to use and free of cost. Sign Up to get started! </p>
        </div>

        <div class="imageCarousel">
          <img id="img1" src="images/resume.svg" alt="">

        </div>

        <?php  include 'main_page/signup_form.php';    ?>
        <?php  include 'main_page/login_form.php';     ?>

              

      </div>
    </header>


<script src="js/InstaResume.js" charset="utf-8"></script>
  </body>
</html>