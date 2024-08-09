function showPassword() {
    var x = document.getElementById("passwd");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

document.addEventListener('DOMContentLoaded', (event) => {
    const errorToast = document.getElementById('error-toast');
    const successToast = document.getElementById('success-toast');

    
    const errorMsg = document.getElementById('error-msg');
    if (errorMsg) {
        errorToast.textContent = errorMsg.textContent;
        errorToast.style.display = 'flex';
        setTimeout(() => {
            errorToast.style.display = 'none';
        }, 1000); 
    }

   
    const successMsg = document.getElementById('success-msg');
    if (successMsg) {
        successToast.textContent = successMsg.textContent;
        successToast.style.display = 'flex';
        setTimeout(() => {
            successToast.style.display = 'none';
            window.location.href = "/notekeeper/client/php/note-home-list.php"; 
        }, 1000); 
    }
});
