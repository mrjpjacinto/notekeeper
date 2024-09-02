function showPassword() {
  var passwordField = document.getElementById("passwd");
  var checkbox = document.querySelector(".show-password input[type='checkbox']");
  if (checkbox.checked) {
      passwordField.type = "text";
  } else {
      passwordField.type = "password";
  }
}

document.addEventListener('DOMContentLoaded', (event) => {
    const errorToast = document.getElementById('error-toast');
    const successToast = document.getElementById('success-toast');

    // Display error toast if it has content
    const errorMsg = document.getElementById('error-msg');
    if (errorMsg && errorMsg.textContent.trim() !== '') {
        errorToast.style.display = 'flex';
        setTimeout(() => {
            errorToast.style.display = 'none';
        }, 1000); 
    }

    // Display success toast if it has content
    const successMsg = document.getElementById('success-msg');
    if (successMsg && successMsg.textContent.trim() !== '') {
        successToast.style.display = 'flex';
        setTimeout(() => {
            successToast.style.display = 'none';
            window.location.href = "/client/php/note-home-tiles.php"; 
        }, 1000); 
    }
});
