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

  // New functions for handling note submission

  function submitNote() {
    var form = document.getElementById('noteForm');
    var formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(result => {
        if (result.includes('Error')) {
            alert('Error: ' + result);
        } else {
            alert('Note saved successfully!');
            closeNote();
            location.reload(); // Reload the page to show the new note
        }
    })
    .catch(error => {
        alert('Error submitting the note: ' + error);
    });
}

document.getElementById('noteForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent default form submission
    submitNote();
});
  