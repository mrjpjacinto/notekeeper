<?php
session_start();
include '/xampp/htdocs/notekeeper/server/db-conn.php';

// Define the formatDate function
function formatDate($date) {
    $datetime = new DateTime($date);

    return $datetime->format('Y-m-d H:i:s');
}

// Check if the user is logged in
if (!isset($_SESSION['uname'])) {
    header("Location: /notekeeper/client/php/note-login.php");
    exit();
}

$fname = isset($_SESSION['fname']) ? $_SESSION['fname'] : 'fname';
$lname = isset($_SESSION['lname']) ? $_SESSION['lname'] : 'lname';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : 'email';

$user_id = $_SESSION['id']; // Get the logged-in user's ID

// Initialize search term
$search_term = isset($_GET['search']) ? $_GET['search'] : '';

// Prepare SQL query with search functionality
$sql = "SELECT * FROM notes WHERE user_id = ?";
$params = [$user_id];
$types = 'i';

// Append search term to SQL query if provided
if (!empty($search_term)) {
    $sql .= " AND title LIKE ?";
    $params[] = '%' . $search_term . '%';
    $types .= 's'; // Add 's' for string type
}

// Order by date_created DESC
$sql .= " ORDER BY date_created DESC";

// Prepare and execute the statement
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param($types, ...$params); // Bind parameters
    if ($stmt->execute()) {
        $result = $stmt->get_result();
    } else {
        $_SESSION['error'] = "Error executing query: " . $stmt->error;
    }
    $stmt->close();
} else {
    $_SESSION['error'] = "Error preparing statement: " . $conn->error;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NoteKeeper</title>
    <link rel="icon" href="/notekeeper/client/assets/note-app-logo.png">
    <link rel="stylesheet" href="/notekeeper/client/style/note-home-list.css">
    <script src="/notekeeper/server/script/note-home-list.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <!-- NAVBAR -->
    <div class="main-container">
            <div class="topnav">
                <div class="left-nav">
                    <img src="/notekeeper/client/assets/note-app-logo.png">
                </div>
                <div class="right-nav">
                    <img src="/notekeeper/client/assets/Avatar-placeholder.png" onclick="toggleMenu()" class="dropbtn">
                </div>
                <!-- DROPDOWN -->
                <div class="dropdown">
                    <div class="dropdown-content" id="myDropdown">
                        
                        <div class="dropdown-display">
                            <img src="/notekeeper/client/assets/Avatar-placeholder.png">
                            <p id="un"> <?php echo ($fname); ?> <?php echo ($lname); ?></p>
                            <p id="un"><?php echo ($email); ?></p>
                        </div>

                        <div class="dropdown-option">
                            <div class="option-1"> 
                                <a href="/notekeeper/client/php/note-about.php">
                                    <span class="material-symbols-outlined"> info </span>
                                <p> About </p></a>
                            </div>
                            
                            <div class="option-2"> 
                                <a href="/notekeeper/server/sign-up-login-db-conn/log-out.php">
                                    <span class="material-symbols-outlined"> logout </span>
                                <p> Log Out </p></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- DROPDOWN -->
            </div>

            <div class="topnav1">
                <div class="left-nav1">
                    <button id="nav-icon" onclick="openNote()" class="tooltip">
                        <span class="material-symbols-outlined">add_circle</span>
                        <span class="tooltip-text">Add a note</span>
                    </button>
                    <button id="nav-icon" onclick="darkMode()" class="tooltip">
                        <span class="material-symbols-outlined" id="darkmodeswitch">dark_mode</span>
                        <span class="tooltip-text">Toggle theme</span>
                    </button>
                    <button class="tooltip">
                        <span class="material-symbols-outlined">
                            <a id="nav-icon" href="/notekeeper/client/php/note-home-tiles.php">grid_view</a>
                            </span>
                            <span class="tooltip-text">Switch to Tiles</span>
                        </button>
                    <button id="nav-icon" onclick="openNotification()" class="tooltip">
                        <span class="material-symbols-outlined" id="notif-message">
                            notifications
                        </span>
                        <span class="tooltip-text">Reminders</span>
                    </button>
                    <button id="nav-icon" class="tooltip">
                        <span class="material-symbols-outlined" onclick="deleteSelected(), selectNotes()">
                            select_check_box
                        </span>
                        <span class="tooltip-text">Select</span>
                    </button>
                </div>
                
                <form id="searchForm" action="" method="get">
                    <div class="right-nav1">
                        <div class="input-1">
                            <button id="search-icon" type="submit">
                                <span class="material-symbols-outlined">search</span>
                            </button>
                            <input class="search-bar" type="text" name="search" placeholder="Search notes..." value="<?php echo htmlspecialchars(isset($_GET['search']) ? $_GET['search'] : ''); ?>">
                            <!-- Clear Search Button -->
                            <?php if (!empty($_GET['search'])): ?>
                                <a id="close-icon" href="note-home-list.php" id="clear-search">
                                    <span class="material-symbols-outlined">close</span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            </div>


        <div class="note-list">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Format the date
                    $formattedDate = formatDate($row['date_created']);
                    
                    echo '<div class="note-template" onclick="openViewNote(this)" data-id="' . htmlspecialchars($row['id']) . '" data-title="' . htmlspecialchars($row['title']) . '" data-content="' . htmlspecialchars($row['content']) . '">';
                    echo '<div class="note-content">';
                    echo '<div class="note-heading">';
                    echo '<h1 id="title-note">' . htmlspecialchars($row['title']) . '</h1>'; // Remove id attribute
                    echo '<div class="heading-tools">';
                    echo '</div></div>';
                    echo '<div class="note-body">' . htmlspecialchars($row['content']) . '</div>';
                    echo '<div class="note-footer">' . htmlspecialchars($formattedDate) . '</div>';
                    echo '</div></div>';
                }
            } else {
                echo '<div class="note-list"><p>Added notes will appear here.<p></div>';
            }
            ?>
        </div>
    </div>

    <!-- NOTEPAD MODAL -->
    <div class="note-text-pad" id="noteTextPad">
        <div class="note-text">
            <div class="textpad-icon">
                <div class="textpad-icon-left">
                    <button onclick="closeNote()">
                        <span class="material-symbols-outlined">arrow_back</span>
                    </button>
                </div>
                <div class="textpad-icon-right">
                    <button id="undoButton">
                        <span class="material-symbols-outlined">undo</span>
                    </button>
                    <button id="redoButton">
                        <span class="material-symbols-outlined"> redo </span>
                    </button>
                    <button id="format"> 
                        <span class="material-symbols-outlined"> format_bold </span>
                    </button>
                    <button id="format">
                        <span class="material-symbols-outlined">format_italic</span>
                    </button>
                    <button id="format">
                        <span class="material-symbols-outlined">format_underlined</span>
                    </button>
                    <button id="format">
                        <span class="material-symbols-outlined">format_color_text</span>
                    </button>
                    <button id="reminderButton" onclick="setReminder()">
                        <span class="material-symbols-outlined">add_alert</span>
                    </button>
                </div>
            </div>
            <div class="textpad">
                <form id="noteForm" action="/notekeeper/server/db-conn-for-notes/save-note.php" method="post">
                <input type="hidden" name="redirect" value="note-home-list.php">
                    <h1>
                        <input type="text" id="noteTitle" name="title" placeholder="Enter title.." maxlength="50" required>
                    </h1>
                    <textarea id="noteContent" name="content" placeholder="Enter content..." required></textarea>
                    <footer>
                        <div class="word-count">
                            Word Count: <span id="wordCount">0</span>/250
                        </div>
                        <div class="bottom-buttons">
                            <div class="undo-redo">
                                <button id="undoButton1">
                                    <span class="material-symbols-outlined">undo</span>
                                </button>
                                <button id="redoButton1">
                                    <span class="material-symbols-outlined"> redo </span>
                                </button>
                            </div>
                            <div class="save-delete">
                                <button id="saveButton" type="submit">Save</button>
                            </div>
                        </div>
                    </footer>
                </form>
            </div>
        </div>
       <!-- NOTEPAD MODAL -->
    </div>
    <!--SET REMINDER -->
    <div class="reminder-modal" id="reminderModal">
        <div class="reminder-input">
            <label for="setReminder">Set Reminder:</label>
            <input type="datetime-local" id="setReminder" name="setReminder">
            <div class="reminder-buttons">
                <button type="submit" id="confirmSet">
                    Set
                </button>
                <button id="cancel" onclick="closeReminder()">
                    Cancel
                </button>
            </div>
        </div>
    </div>
    <!--SET REMINDER -->
    <!-- VIEW NOTE MODAL -->
    <div class="view-note" id="viewNote">
        <div class="view-note-modal">
            <div class="view-note-icon">
                <div class="view-note-icon-left">
                    <button onclick="closeViewNote()">
                        <span class="material-symbols-outlined"> arrow_back </span>
                    </button>
                </div>
                <div class="view-note-icon-right">
                    <button onclick="openEditNote(), closeViewNote()">
                        <span class="material-symbols-outlined"> edit </span>
                    </button>
                </div>
            </div>
            <div class="view-note-content">
                <div class="view-heading"><h1 id="note-title">Title</h1></div>
                <div class="view-content"><p id="note-content">Content...</p></div>
            <footer>
                <div class="save-delete">
                    <button id="deleteButton" onclick="deleteSelectedNotes()">Delete</button>
                </div>
            </footer>
            </div>
        </div>
        <!-- DELETE WARNING -->
        <div class="delete-note-warning" id="deleteNoteWarning">
            <div class="delete-note-warning-modal">
                <p>Are you sure you want to delete note?</p>
                <p>This action cannot be undone!</p>
                <div class="delete-warning-buttons">                
                    <button id="cancelDelete" onclick="closeWarning()">
                        Cancel
                    </button>
                    <button type="button" id="confirmDelete" onclick="deleteNote()">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    <!-- DELETE WARNING -->
    <!-- SUCCESS/ERROR TOAST -->
        <div class="toast delete-error-toast" id="deleteError">
            <span class="material-symbols-outlined">error</span>
            <h3>Failed to delete note!</h3>
        </div>
        <div class="toast delete-success-toast" id="deleteSuccess">
            <span class="material-symbols-outlined">check_circle</span>
            <h4>Note Successfully Deleted!</h4>
        </div>
     <!-- SUCCESS/ERROR TOAST -->
    </div>
    <!-- VIEW NOTE MODAL -->
         <!--EDIT NOTE MODAL -->
    <div class="edit-note" id="editNote">
        <div class="edit-note-text">
            <div class="edit-note-icon">
                <div class="edit-note-icon-left">
                    <button onclick="closeEditNote()">
                        <span class="material-symbols-outlined">arrow_back</span>
                    </button>
                </div>
                <div class="edit-note-icon-right">
                    <button id="undoButton">
                        <span class="material-symbols-outlined">undo</span>
                    </button>
                    <button id="redoButton">
                        <span class="material-symbols-outlined"> redo </span>
                    </button>
                    <button id="format"> 
                        <span class="material-symbols-outlined"> format_bold </span>
                    </button>
                    <button id="format">
                        <span class="material-symbols-outlined">format_italic</span>
                    </button>
                    <button id="format">
                        <span class="material-symbols-outlined">format_underlined</span>
                    </button>
                    <button id="format">
                        <span class="material-symbols-outlined">format_color_text</span>
                    </button>
                    <button id="reminderButton" onclick="setReminder()">
                        <span class="material-symbols-outlined">add_alert</span>
                    </button>
                </div>
            </div>
            <div class="edit-textpad">
                <form id="noteForm" action="/notekeeper/server/db-conn-for-notes/save-note.php" method="post">
                <input type="hidden" name="redirect" value="note-home-list.php">
                    <h1>
                        <input type="text" id="noteTitle" name="title" placeholder="Enter title.." maxlength="50" required>
                    </h1>
                    <textarea id="editNoteContent" name="content" placeholder="Enter content..." required></textarea>
                    <footer>
                        <div class="word-count">
                            Word Count: <span id="editWordCount">0</span>/250
                        </div>
                        <div class="bottom-buttons">
                            <div class="undo-redo">
                                <button id="undoButton1">
                                    <span class="material-symbols-outlined">undo</span>
                                </button>
                                <button id="redoButton1">
                                    <span class="material-symbols-outlined"> redo </span>
                                </button>
                            </div>
                            <div class="save-delete">
                                <button id="saveButton" type="submit">Save</button>
                            </div>
                        </div>
                    </footer>
                </form>
            </div>
        </div>
       <!-- EDIT NOTE MODAL -->
    </div>
    <div class="notification-window" id="notification">
        <div class="notif">
            <div class="notif-content">
                <header><h2>Reminders</h2>  </header>
                <div class="notif-display">
                    <div class="notif-template">
                        <header><h4>Title</h4></header>
                        <p>Content</p>
                        <footer id="date-time"> <p> date and time </p> </footer>
                    </div>
                    <div class="notif-template">
                    </div>
                    <div class="notif-template">
                    </div>
                    <div class="notif-template">
                    </div>
                </div>    
                <p id="info"> Notes with upcoming Reminders <br> appear here </p>
                <span id="notif-message"></span>
                <footer><button onclick="closeNotification()">Close</button></footer>
            </div>
        </div>
    </div>
    <!-- DELETE SELECTED -->
        <div class="delete" id="delete-selected-button">
            <div class="delete-icon">Delete Selected</div>
        </div>
    </div>
    <!-- DELETE SELECTED -->
      <!-- NAV SELECT COUNT -->
    <div class="nav-select-count">
        <div class="nav-select" id="selectNoteCount">
            <div class="nav-select-left">
                <button id="cancelSelect" onclick="cancelSelect()">
                    <span class="material-symbols-outlined">close</span>
                </button>
                <h3><span id="selectCount">0</span> Selected</h3>
            </div>
            <div class="nav-select-right">

            </div>
        </div>
    </div>
    <!-- NAV SELECT COUNT -->
</body>
</html>
<?php
$conn->close();
?>
