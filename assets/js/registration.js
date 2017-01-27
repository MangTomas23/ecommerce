var password = document.getElementsByName('password')[0];
var confirm_password = document.getElementsByName('cpassword')[0];

function validatePassword() {
  console.log(password.value);
  if(password.value != confirm_password.value ){
    confirm_password.setCustomValidity("Passwords don't match!");
  }else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
