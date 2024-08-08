<?php
session_start();

include '/xampp/htdocs/notekeeper/server/db-conn.php';
include '/xampp/htdocs/notekeeper/server/db-conn-for-notes/fetch-user-info.php';

if (!isset($_SESSION['uname'])) {
    header("Location: /notekeeper/client/php/note-login.php");
    exit();
}
$fname = isset($_SESSION['fname']) ? $_SESSION['fname'] : 'fname';
$lname = isset($_SESSION['lname']) ? $_SESSION['lname'] : 'lname';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : 'email';
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
                <img src="/notekeeper/client/assets/Avatar-placeholder.png"onclick="toggleMenu()" class="dropbtn">
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
                                <span class="material-symbols-outlined"> logout </span></a>
                            <p> Log Out </p>
                        </div>

                    </div>

                </div>
            </div>
            <!-- DROPDOWN -->
        </div>
        
        <div class="topnav1">
            <div class="left-nav1">
                <button onclick="openNote()">
                <span class="material-symbols-outlined">
                    add_circle
                    </span>
                </button>
                <button onclick="darkMode()">
                    <span class="material-symbols-outlined" id="darkmodeswitch">
                        dark_mode
                        </span>
                    </button>
                <button>
                    <span class="material-symbols-outlined">
                        <a href="/notekeeper/client/php/note-home-tiles.php">grid_view</a>
                        </span>
                    </button>
                <button>
                    <span class="material-symbols-outlined">
                        notifications
                    </span>
                </button>
                <button>
                    <span class="material-symbols-outlined">
                        select_check_box
                    </span>
                </button>
            </div>
            <div class="right-nav1">
                <div class="input-1">
                    <button class="search-icon">
                        <span class="material-symbols-outlined">
                            search
                            </span>
                        </button>
                    <input class="search-bar" type="text" placeholder="Search notes...">
                </div>
            </div>
        </div>

    <!-- HERO-SECTION -->
        <div class="note-list">

            <div class="note-template note-content">

                <div class="note-heading">
                    
                    <div class="title">
                        <h1>Title</h1>
                    </div>

                    <div class="heading-tools">
                        <span class="material-symbols-outlined" id="text">
                            edit
                        </span>
                        <span class="material-symbols-outlined" id="text">
                            delete
                        </span>
                    </div>
                </div>

                <div class="content-1" id="text">
                    
                    <div class="note-body" id="text">
                            Content
                    </div>
                    <div class="note-footer" id="text">
                            mm/dd/yyyy 00:00<br>
                            mm/dd/yyyy 00:00
                    </div>
                </div>
            </div>

            <div class="note-template note-content">

                <div class="note-heading">
                    
                    <div class="title">
                        <h1>Title</h1>
                    </div>
   
                    <div class="heading-tools">
                        <span class="material-symbols-outlined" id="text">
                            edit
                        </span>
                        <span class="material-symbols-outlined" id="text">
                            delete
                            </span>
                    </div>
                </div>

                <div class="content-1">
                    
                    <div class="note-body" id="text">
                            Content
                    </div>
                    <div class="note-footer" id="text">
                            mm/dd/yyyy 00:00<br>
                            mm/dd/yyyy 00:00
                    </div>
                </div>
            </div>
        </div>

    <!-- HERO-SECTION -->

    <!-- NOTEPAD MODAL -->
    <div class="note-text-pad" id="noteTextPad">
        <div class="note-text">

            <div class="textpad-icon">
                <div class="textpad-icon-left">
                    <button onclick="closeNote()">
                        <span class="material-symbols-outlined"> arrow_back </span>
                    </button>
                </div>
                <div class="textpad-icon-right">
                    <button>
                        <span class="material-symbols-outlined"> undo </span>
                    </button>
                    <button>
                        <span class="material-symbols-outlined"> redo </span>
                    </button>

                    <button>
                        <span class="material-symbols-outlined">add_alert</span>
                    </button>
                    <button> 
                        <span class="material-symbols-outlined"> format_bold </span>
                    </button>
                    <button>
                        <span class="material-symbols-outlined"> format_italic </span>
                    </button>
                    <button>
                        <span class="material-symbols-outlined"> format_underlined </span>
                    </button>
                    <button>
                        <span class="material-symbols-outlined"> format_color_text </span>
                    </button>
                    
                    <button>
                        <span class="material-symbols-outlined"> format_list_bulleted </span>
                    </button>
                    <button>

                    </button>
                </div>
            </div>

            <div class="textpad">
                <h1><input type="text" placeholder="Enter title.." maxlength="50"></h1>
                <textarea id="text-area" placeholder="Enter text">
                    
                </textarea>
            </div>
        </div>
    </div>
     <!-- NOTEPAD MODAL -->
</body>
</html>