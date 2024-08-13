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

function openNote() {
  document.getElementById('noteTextPad').style.display = 'flex';
  document.body.classList.add('modal-open');
}

function closeNote() {
  document.getElementById('noteTextPad').style.display = 'none';
  document.body.classList.remove('modal-open');
}

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
// Function to handle note submission
function submitNote() {
  var form = document.getElementById('noteForm');
  
  // Prevent the default form submission and submit manually
  form.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Check if required fields are filled
    var title = document.getElementById('noteTitle').value;
    var content = document.getElementById('noteContent').value;

    if (title.trim() === '' || content.trim() === '') {
      alert('Please fill in both title and content.');
      return;
    }

    // Submit the form
    form.submit();
  });
}

// Initialize the form submission handler when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', function() {
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