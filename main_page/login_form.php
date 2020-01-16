<!-- Login form -->

              <form class="log" action="includes/login_validation.php" method="post" autocomplete="off">

                <label for="email-address">Email:</label><br>
                <input type="email" class="sign-up-input" name="email" id="email-address1" required><br>

                <label for="password1">Password:</label><br>
                <input type="password" class="sign-up-input" name="pwd" id="password1" required><br>

                <input type="checkbox" id="show-password1">

                <label for="show-password1"> Show Password</label>


<?php
                if(isset($_GET['login'])){

                  if($_GET['login']=="invalidemail"){
                    echo '<p class="fail">Account Doesn\'t Exist</p>';
                  }
                  elseif($_GET['login']=="incorrectpwd"){
                    echo '<p class="fail">Incorrect Password</p>';
                  }
                  
                  echo '<script>
                    var login = document.querySelector(".login");
                    var log = document.querySelector(".log");
                    var sign = document.querySelector(".sign");
                    var signup = document.querySelector(".signup");
                    var form = document.querySelector(".formContent");
                    sign.classList.remove("changeSignupA");
                    sign.classList.add("changeSignupR");
                    log.classList.add("changeLoginA");
                    log.classList.remove("changeLoginR");
                    form.style.height = "40vh";
                    form.style.marginTop = "6rem";
                    signup.style.borderBottom = "none";
                    login.style.borderBottom = "1px solid #4286f4";
                  </script>';
                }
                ?>


                
                <input type="submit" name="submit" id="submit1" value="Submit">
                

              </form>

            </div>
        </div>