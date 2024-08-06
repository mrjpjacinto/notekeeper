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