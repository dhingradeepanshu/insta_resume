var showPassword = document.querySelector("#showPassword");
var password = document.querySelector("#prevPass");
var password1 = document.querySelector("#newPass");
var password2 = document.querySelector("#newPassConf");

showPassword.addEventListener("click", () => {
  if(password.type === "password" )
  {
    password.type = "text";
    password1.type = "text";
    password2.type = "text";
    
  }
  else{
    password.type = "password";
    password1.type = "password";
    password2.type = "password";

    
  }

})

