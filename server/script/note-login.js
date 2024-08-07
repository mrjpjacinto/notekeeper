function showPassword() {
    var x = document.getElementById("psword");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

  document.addEventListener('DOMContentLoaded', (event) => {
    const errorMsg = document.getElementById('error-msg');
    if (errorMsg) {
        setTimeout(() => {
            errorMsg.style.display = 'none';
        }, 2000);
    }
    const successMsg = document.getElementById('success-msg');
    if (successMsg) {
      setTimeout(() => {
        successMsg.style.display = 'none';
        window.location.href = "/notekeeper/client/php/note-home-list.php";
      }, 2000);
    }
})