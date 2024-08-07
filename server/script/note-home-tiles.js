function darkMode() {
  var element = document.body;
  element.classList.toggle("darkmode");

  if(element.classList.contains("darkmode")){
    localStorage.setItem("theme", "dark");
  }
  else{
    localStorage.setItem("theme", "light");
  }
}

function applySavedTheme(){
var theme = localStorage.getItem("theme");
if(theme === "dark"){
  document.body.classList.add("darkmode");
}
else{
  document.body.classList.remove("darkmode")
}
}

window.onload = applySavedTheme;

 function toggleMenu() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }

  function openNote() {
    document.getElementById('noteTextPad').style.display = 'block';
  }
  function closeNote() {
    document.getElementById('noteTextPad').style.display = 'none';
  }