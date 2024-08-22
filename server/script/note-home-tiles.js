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

// undo redo
document.addEventListener('DOMContentLoaded', () => {
  const undoButton = document.getElementById('undoButton');
  const redoButton = document.getElementById('redoButton');
  const undoButton1 = document.getElementById('undoButton1');
  const redoButton1 = document.getElementById('redoButton1');
  const editUndoButton = document.getElementById('editUndoButton');
  const editRedoButton = document.getElementById('editRedoButton');
  const editUndoButton1 = document.getElementById('editUndoButton1');
  const editRedoButton1 = document.getElementById('editRedoButton1');
  const noteContent = document.getElementById('noteContent');
  const editNoteContent = document.getElementById('editNoteContent');

  let undoStack = [];
  let redoStack = [];
  let undoStackEdit = [];
  let redoStackEdit = [];

  function saveState() {
      if (noteContent) {
          undoStack.push(noteContent.value);
          redoStack = [];
      }
      if (editNoteContent) {
          undoStackEdit.push(editNoteContent.value);
          redoStackEdit = [];
      }
      updateButtonStates();
  }

  function undo() {
      if (noteContent && undoStack.length > 0) {
          redoStack.push(noteContent.value);
          noteContent.value = undoStack.pop();
          updateButtonStates();
      }
      if (editNoteContent && undoStackEdit.length > 0) {
          redoStackEdit.push(editNoteContent.value);
          editNoteContent.value = undoStackEdit.pop();
          updateButtonStates();
      }
  }

  function redo() {
      if (noteContent && redoStack.length > 0) {
          undoStack.push(noteContent.value);
          noteContent.value = redoStack.pop();
          updateButtonStates();
      }
      if (editNoteContent && redoStackEdit.length > 0) {
          undoStackEdit.push(editNoteContent.value);
          editNoteContent.value = redoStackEdit.pop();
          updateButtonStates();
      }
  }

  function updateButtonStates() {
      const undoAvailable = undoStack.length > 0;
      const redoAvailable = redoStack.length > 0;
      const undoAvailableEdit = undoStackEdit.length > 0;
      const redoAvailableEdit = redoStackEdit.length > 0;

      function updateButtons(buttons, availableUndo, availableRedo) {
          buttons.forEach(button => {
              button.classList.toggle('button-disabled', !availableUndo && !availableRedo);
              button.disabled = !availableUndo && !availableRedo;
          });
      }

      updateButtons([undoButton, redoButton], undoAvailable, redoAvailable);
      updateButtons([undoButton1, redoButton1], undoAvailable, redoAvailable);
      updateButtons([editUndoButton, editRedoButton], undoAvailableEdit, redoAvailableEdit);
      updateButtons([editUndoButton1, editRedoButton1], undoAvailableEdit, redoAvailableEdit);
  }

  if (noteContent) noteContent.addEventListener('input', saveState);
  if (editNoteContent) editNoteContent.addEventListener('input', saveState);

  [undoButton, redoButton, undoButton1, redoButton1, editUndoButton, editRedoButton, editUndoButton1, editRedoButton1].forEach(button => {
    if (button) {
      button.addEventListener('click', () => {
        if (button === undoButton || button === undoButton1 || button === editUndoButton || button === editUndoButton1) {
          undo();
        } else if (button === redoButton || button === redoButton1 || button === editRedoButton || button === editRedoButton1) {
          redo();
        }
      });
    }
  });
});

// undo redo

// for viewing the note
function openViewNote(element) {
  const title = element.getAttribute('data-title');
  const content = element.getAttribute('data-content');
  
  document.querySelector('.view-heading h1').textContent = title;
  document.querySelector('.view-content p').textContent = content;
  
  document.getElementById('viewNote').style.display = 'flex';
}

function closeViewNote() {
  document.getElementById('viewNote').style.display = 'none';
}
// for viewing the note
function openEditNote() {
  document.getElementById('editNote').style.display = 'flex';
}
function closeEditNote() {
  document.getElementById('editNote').style.display = 'none';
  document.getElementById('viewNote').style.display = 'flex';
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



document.getElementById('noteForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent default form submission
  submitNote();
});

// Select to Delete Multiple Notes
// Global flag to track if delete mode is active
let deleteMode = false;

// Activate delete mode
function selectNotes() {
    deleteMode = true;
    document.body.classList.add('no-hover'); // Add class to disable hover effect
    document.getElementById('selectNoteCount').style.display = 'flex';
    document.getElementById('delete-selected-button').style.display = 'flex';
    document.querySelectorAll('.note-template').forEach(note => {
        note.classList.add('selectable');
        note.addEventListener('click', toggleSelection); // Add click event listener
    });
}

// Cancel selection mode
function cancelSelect() {
    deleteMode = false;
    document.body.classList.remove('no-hover'); // Remove class to enable hover effect
    document.getElementById('selectNoteCount').style.display = 'none';
    document.getElementById('delete-selected-button').style.display = 'none';
    document.querySelectorAll('.note-template').forEach(note => {
        note.classList.remove('selectable', 'selected');
        note.removeEventListener('click', toggleSelection); // Remove click event listener
    });
    updateSelectedCount();
}

function sortFavorites() {
  const navFavorites = document.getElementById('navFavorites');
  if (navFavorites.style.display === 'flex') {
    navFavorites.style.display = 'none';
  } else {
    navFavorites.style.display = 'flex';
  }
}

// Toggle note selection
function toggleSelection(event) {
    if (deleteMode) {
        event.stopPropagation(); // Prevent the click event from propagating
        this.classList.toggle('selected');
        updateSelectedCount();
    }
}

// Handle note click
function handleNoteClick(noteElement, event) {
    if (!deleteMode) {
        openViewNote(noteElement); // Call openViewNote only if not in delete mode
    }
    event.stopPropagation(); // Prevent the event from propagating
}

// Update the selected notes count
function updateSelectedCount() {
    const selectedNotes = document.querySelectorAll('.note-template.selected');
    document.getElementById('selectCount').textContent = selectedNotes.length;
}

// Function to delete selected notes
function deleteSelected() {
    const selectedNotes = document.querySelectorAll('.note-template.selected');
    const ids = Array.from(selectedNotes).map(note => note.getAttribute('data-id'));

    if (ids.length > 0) {
        fetch('/notekeeper/server/db-conn-for-notes/deleting-multiple-notes.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                ids: ids.join(',')
            })
        })
        .then(response => response.text())
        .then(result => {
            alert(result);
            location.reload(); // Reload the page to reflect changes
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
}

// Add an event listener to the delete button
document.getElementById('delete-selected-button').addEventListener('click', deleteSelected);
// Select to Delete Multiple Notes

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



// for deletion and editing
let currentNoteId = null;

function openViewNote(element) {
    // Set note ID for deletion or editing
    currentNoteId = element.getAttribute('data-id');
    
    // Set note title and content in the view modal
    document.querySelector('.view-heading h1').textContent = element.getAttribute('data-title');
    document.querySelector('.view-content p').textContent = element.getAttribute('data-content');
    
    // Store note ID in a data attribute on the edit button
    document.getElementById('editNote').setAttribute('data-id', currentNoteId);
    
    // Show view note modal
    document.getElementById('viewNote').style.display = 'flex';
}

function closeViewNote() {
    document.getElementById('viewNote').style.display = 'none';
}

function openEditNote() {
    // Hide the view note modal
    document.getElementById('viewNote').style.display = 'none';
    
    // Show the edit note modal
    document.getElementById('editNote').style.display = 'flex';
    
    // Pre-fill the edit form with existing note data
    const title = document.querySelector('.view-heading h1').textContent;
    const content = document.querySelector('.view-content p').textContent;
    
    // Update form fields
    document.getElementById('editNoteTitle').value = title;
    document.getElementById('editNoteContent').value = content;
    
    // Set the note ID in the hidden input field for form submission
    document.getElementById('note_id').value = currentNoteId;
}

function closeEditNote() {
    document.getElementById('editNote').style.display = 'none';
    document.getElementById('viewNote').style.display = 'flex';
}

function openDeleteWarning() {
    document.getElementById('deleteNoteWarning').style.display = 'flex';
}

function closeWarning() {
    document.getElementById('deleteNoteWarning').style.display = 'none';
}

function showToast(id, duration = 1000) {
    // Hide all toasts
    document.querySelectorAll('.toast').forEach(toast => {
        toast.style.display = 'none';
    });

    // Show the specific toast
    const toast = document.getElementById(id);
    toast.style.display = 'flex';

    // Hide the toast after the specified duration
    setTimeout(() => {
        toast.style.display = 'none';
    }, duration);
}

function deleteNote() {
    if (currentNoteId === null) {
        showToast('deleteError', 1000); // Show error toast if no note is selected
        return;
    }

    let formData = new FormData();
    formData.append('id', currentNoteId);

    fetch('/notekeeper/server/db-conn-for-notes/for-deletion.php', {
        method: 'POST',
        body: formData, // Send the FormData object
    })
    .then(response => response.text()) // Expecting text response instead of JSON
    .then(data => {
        if (data.trim() === 'success') { // Adjust based on the response from PHP
            // Remove note from the list
            document.querySelector(`.note-template[data-id='${currentNoteId}']`).remove();
            
            // Show success toast and delay redirect
            showToast('deleteSuccess', 1000);
            setTimeout(() => {
                window.location.href = '/notekeeper/client/php/note-home-tiles.php';
            }, 8000); // Delay redirect to match the toast display duration
        } else {
            showToast('deleteError', 1000); // Show error toast
        }
        closeWarning();
        closeViewNote();
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('deleteError', 1000); // Show error toast
        closeWarning();
    });
}
// for deletion and editing



