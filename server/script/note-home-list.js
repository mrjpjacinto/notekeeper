function darkMode() {
  var element = document.body;
  element.classList.toggle("darkmode");

  if (element.classList.contains("darkmode")) {
    localStorage.setItem("theme", "dark");
  } else {
    localStorage.setItem("theme", "light");
  }
}

function applySavedTheme() {
  var theme = localStorage.getItem("theme");
  if (theme === "dark") {
    document.body.classList.add("darkmode");
  } else {
    document.body.classList.remove("darkmode");
  }
}

window.onload = function() {
  applySavedTheme();
  document.getElementById('noteTextPad').style.display = 'none';
}


function openNote() {
  document.getElementById('noteTextPad').style.display = 'flex';
  document.body.classList.add('modal-open');
}

function closeNote() {
  document.getElementById('noteTextPad').style.display = 'none';
  document.body.classList.remove('modal-open');
}

function openNotification() {
  document.getElementById("notification").style.display = "flex";
  document.body.classList.add("modal-open");
}

function closeNotification() {
  document.getElementById("notification").style.display = "none";
  document.body.classList.remove("modal-open");
}

window.addEventListener("click", function(event) {
  var modal = document.getElementById("notification");
  if (event.target === modal) {
      closeNotification();
  }
});

function toggleMenu() {
  document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
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

function deleteSelected() {
  var deleteButton = document.getElementById("delete-selected-button");

  if (deleteButton.style.display === "none" || deleteButton.style.display === "") {
      deleteButton.style.display = "flex"; 
  } else {
      deleteButton.style.display = "none";
  }
}