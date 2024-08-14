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

function openViewNote() {
  document.getElementById('viewNote').style.display = 'flex';
}
function closeViewNote() {
  document.getElementById('viewNote').style.display = 'none';
}

function openEditNote() {
  document.getElementById('editNote').style.display = 'flex';
}
function closeEditNote() {
  document.getElementById('editNote').style.display = 'none';
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

document.addEventListener('DOMContentLoaded', function() {
  const noteContent = document.getElementById('noteContent');
  const editNoteContent = document.getElementById('editNoteContent');
  const wordCountDisplay = document.getElementById('wordCount');
  const editWordCountDisplay = document.getElementById('editWordCount');
  const MAX_WORD_COUNT = 250; // Maximum allowed word count

  function updateWordCount(textarea, displayElement) {
      textarea.addEventListener('input', function() {
          const text = textarea.value.trim();
          const words = text ? text.split(/\s+/) : [];
          let wordCount = words.length;
          if (wordCount > MAX_WORD_COUNT) {
              wordCount = MAX_WORD_COUNT;
              // Optionally, you can truncate the text to fit the word limit here.
              textarea.value = words.slice(0, MAX_WORD_COUNT).join(' ');
          }
          displayElement.textContent = wordCount;
      });
  }

  updateWordCount(noteContent, wordCountDisplay);
  updateWordCount(editNoteContent, editWordCountDisplay);
});

var modal = document.getElementById('reminderModal');

function setReminder() {
    modal.style.display = 'flex';
}

function closeReminder() {
    modal.style.display = 'none';
}

window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
};

document.addEventListener('DOMContentLoaded', function() {
    const reminderInput = document.getElementById('setReminder');
    const confirmSetButton = document.getElementById('confirmSet');

    function checkReminder() {
        if (reminderInput.value.trim() === '') {
            confirmSetButton.disabled = true;
        } else {
            confirmSetButton.disabled = false;
        }
    }

    checkReminder();
    reminderInput.addEventListener('input', checkReminder);
});