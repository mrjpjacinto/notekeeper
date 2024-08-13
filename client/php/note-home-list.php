<?php
session_start();
include '/xampp/htdocs/notekeeper/server/db-conn.php';

// Check if the user is logged in
if (!isset($_SESSION['uname'])) {
    header("Location: /notekeeper/client/php/note-login.php");
    exit();
}

$fname = isset($_SESSION['fname']) ? $_SESSION['fname'] : 'fname';
$lname = isset($_SESSION['lname']) ? $_SESSION['lname'] : 'lname';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : 'email';

$user_id = $_SESSION['id']; // Get the logged-in user's ID

// Fetch notes from the database for the logged-in user
$sql = "SELECT * FROM notes WHERE user_id = ? ORDER BY date_created DESC";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $user_id); // Bind the user ID parameter
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
    <title>Home</title>
    <link rel="stylesheet" href="/notekeeper/client/style/note-home-list.css">
    <script src="/notekeeper/server/script/note-home-list.js"></script>
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
                        <p> <?php echo ($fname); ?> <?php echo ($lname); ?></p>
                        <p><?php echo ($email); ?></p>
                    </div>

                    <div class="dropdown-option">
                        <div class="option-1"> 
                            <a href="#">
                                <span class="material-symbols-outlined"> info </span></a>
                            <p> About </p>
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
                    <span class="material-symbols-outlined" onclick="deleteSelected()">
                        select_check_box
                    </span>
                    <span class="tooltip-text">Select</span>
                </button>
            </div>
            
            <div class="right-nav1">
                <div class="input-1">
                    <button id="search-icon" >
                        <span class="material-symbols-outlined">search</span>
                    </button>
                    <input class="search-bar" type="text" placeholder="Search notes...">
                </div>
            </div>
        </div>

        <div class="note-list">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="note-template" onclick="openViewNote()">';
                    echo '<div class="note-content">';
                    echo '<div class="note-heading">';
                    echo '<h1>' . htmlspecialchars($row['title']) . '</h1>';
                    echo '<div class="heading-tools">';
                    echo '</div></div>';
                    echo '<div class="note-body">' . htmlspecialchars($row['content']) . '</div>';
                    echo '<div class="note-footer">' . $row['date_created'] . '</div>';
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
                    <button id="reminderButton">
                        <span class="material-symbols-outlined">add_alert</span>
                    </button>
                    <button> 
                        <span class="material-symbols-outlined"> format_bold </span>
                    </button>
                    <button>
                        <span class="material-symbols-outlined">format_italic</span>
                    </button>
                    <button>
                        <span class="material-symbols-outlined">format_underlined</span>
                    </button>
                    <button>
                        <span class="material-symbols-outlined">format_color_text</span>
                    </button>
                    <button>
                        <span class="material-symbols-outlined">format_list_bulleted</span>
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
                    <div class="bottom-buttons">
                    <button id="reminderButton1">
                        <span class="material-symbols-outlined">add_alert</span>
                    </button>
                        <div class="undo-redo">
                            <button id="undoButton1">
                                <span class="material-symbols-outlined">undo</span>
                            </button>
                            <button id="redoButton1">
                                <span class="material-symbols-outlined"> redo </span>
                            </button>
                        </div>
                        <div class="save-delete">
                            <button id="deleteButton">Delete</button>
                            <button id="saveButton" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
       <!-- NOTEPAD MODAL -->
    </div>
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
                    <button onclick="openNote(), closeViewNote()">
                        <span class="material-symbols-outlined"> edit </span>
                    </button>
                </div>
            </div>
            <div class="view-note-content">
                <div class="view-heading"><h1>Title</h1></div>
                <div class="view-content"><p>Content...</p></div>
            </div>
        </div>
    </div>
    <!-- VIEW NOTE MODAL -->
        <div class="notification-window" id="notification">
            <div class="notif">
                <div class="notif-icon">
                </div>
                <div class="notif-content">
                    <h2>Reminders</h2>       
                    <p> Notes with upcoming Reminders <br> appear here </p>
                    <span id="notif-message"></span>
                    <button onclick="closeNotification()">Close</button>
                </div>
            </div>
        </div>
    <!-- DELETE SELECTED -->
        <div class="delete" id="delete-selected-button">
            <div class="delete-icon">Delete Selected</div>
        </div>
    </div>
    <!-- DELETE SELECTED -->
     
</body>
</html>
<?php
$conn->close();
?>
