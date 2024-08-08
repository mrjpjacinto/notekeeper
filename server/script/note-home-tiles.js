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
  document.getElementById('notification').style.display = 'none'; // Ensure notification is hidden on page load
}

function openNotification() {
  document.getElementById('notification').style.display = "flex";
  document.getElementById('notif-message').focus(); // Optional: focus for accessibility
}

function closeNotification() {
  document.getElementById('notification').style.display = "none";
}

function showNotification(message) {
  document.getElementById('notif-message').textContent = message;
  openNotification();
}

function openNotification() {
  console.log('Opening notification');
  document.getElementById('notification').style.display = "flex";
}

function closeNotification() {
  console.log('Closing notification');
  document.getElementById('notification').style.display = "none";
}

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
