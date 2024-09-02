function showPassword() {
    var x = document.getElementById("passwd");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

function showPassword() {
  var password = document.getElementById("passwd");
  var confirmPassword = document.getElementById("c-passwd");
  var checkbox = document.getElementById("show-password");

  if (checkbox.checked){
    password.type = "text";
    confirmPassword.type = "text";
  } else {
    password.type = "password";
    confirmPassword.type = "password";
  }
}

  // for toast notification 
  document.addEventListener('DOMContentLoaded', (event) => {
    const successToast = document.getElementById('success-toast');
    const successMsg = document.getElementById('success-msg');
    if (successMsg) {
        successToast.textContent = successMsg.textContent;
        successToast.style.display = 'flex';
        setTimeout(() => {
            successToast.style.display = 'none';
            window.location.href = "/client/php/note-login.php"; 
        }, 2000); 
    }

    const errorToast = document.getElementById('error-toast');
    const errorMsg = document.getElementById('error-msg');
    if (errorMsg) {
        errorToast.textContent = errorMsg.textContent;
        errorToast.style.display = 'flex';
        setTimeout(() => {
            errorToast.style.display = 'none';
        }, 2000); 
    }
});
// for toast notification
