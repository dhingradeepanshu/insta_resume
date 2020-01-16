<div class="formContent">
            <a href="#" class="signup">Sign Up</a>
            <a href="#" class="login">Login</a>
            <div class="container">

              <!-- sign up form -->
              <form action="includes/signup_validation.php" class="sign" method="post" autocomplete="off">
                <label for="full-name">Full Name:</label><br>
                <input type="text" class="sign-up-input" name="name" id="full-name" value="" autofocus required><br>

                <label for="registration-number">Registration Number:</label><br>
                <input type="text" class="sign-up-input" name="regno" pattern="[0-9]{2}[a-zA-Z]{3}[0-9]{4}" title="example 18BCE0181" id="registration-number" required><br>

                <label for="email-address">Email:</label><br>
                <input type="email" class="sign-up-input" name="email" id="email-address" required><br>

                <label for="password">Password:</label><br>
                <input type="password" class="sign-up-input" name="pwd" id="password" required><br>

                <label for="confirm-password">Confirm Password:</label><br>
                <input type="password" class="sign-up-input" name="confpwd" id="confirm-password" required><br>

                <input type="checkbox" id="show-password">
                
                <label for="show-password"> Show Password</label>

                <input type="submit" name="submit" id="submit" value="Submit">
                
                <?php
                if(isset($_GET['password'])){
                  if($_GET['password']=="nomatch"){
                  echo '<p class="fail">Password does not match</p>';

                }
                }
                if(isset($_GET['signup'])){
                  if($_GET['signup']=="success"){
                  echo '<p class="success">Signup Successful!</p>';
                }
                else if($_GET['signup']=="already"){
                  echo '<p class="fail">Account Already Exists!</p>';
                }
                }
                if(isset($_GET['logout'])){
                  if($_GET['logout']=="success"){
                  echo '<p class="success">Logout Successful!</p>';
                }
                }
                
                
                ?>
              </form>

