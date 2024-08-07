function showPassword() {
    var x = document.getElementById("psword");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

function showConfirmPassword() {
    var x = document.getElementById("c-psword");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

document.addEventListener('DOMContentLoaded', (event) => {
    const successToast = document.getElementById('success-toast');

    const successMsg = document.getElementById('success-msg');
    if (successMsg) {
        successToast.textContent = successMsg.textContent;
        successToast.style.display = 'flex';
        setTimeout(() => {
            successToast.style.display = 'none';
            window.location.href = "/notekeeper/client/php/note-login.php"; 
        }, 2000); 
    }
});
