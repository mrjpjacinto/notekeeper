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

window.onload = function(){
  applySavedTheme();

  document.getElementById('notification').style.display = 'none';
}

  document.getElementById('noteTextPad').style.display = 'none';
 }

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


  function openNotification() {
    document.getElementById('notification').style.display = "flex";
    document.getElementById('notif-icon').focus();
}

function closeNotification() {
    document.getElementById('notification').style.display = "none";
}

function showNotification(message) {
    document.getElementById('notif-message').textContent = message;
    openNotification();
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
  

  document.addEventListener('DOMContentLoaded', () => {
    const textarea = document.getElementById('text-area');
    const noteTextPad = document.getElementById('noteTextPad');
    
    textarea.addEventListener('input', () => {
        textarea.style.height = 'auto';
        const newHeight = Math.min(textarea.scrollHeight, window.innerHeight * 0.6);
        textarea.style.height = `${newHeight}px`; 
    });

    window.openNote = function() {
        noteTextPad.style.display = 'flex';
        document.body.classList.add('modal-open'); 
    };

    window.closeNote = function() {
        noteTextPad.style.display = 'none';
        document.body.classList.remove('modal-open'); 
    };
});
