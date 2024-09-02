<?php
session_start();
include '/var/www/html/server/db-conn.php';

// Check if the user is logged in
if (!isset($_SESSION['uname'])) {
    header("Location: /client/php/note-login.php");
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
    <title>NoteKeeper</title>
    <link rel="icon" href="/client/assets/note-app-logo.png">
    <link rel="stylesheet" href="/client/style/note-help.css">
    <script src="/server/script/note-help.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">   
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <!-- NAVBAR -->
    <div class="main-container">
        <div class="topnav">
            <div class="left-nav">
                <img src="/client/assets/note-app-logo.png">
                <h3></h3>
            </div>
            <div class="right-nav">
                <img src="<?php
                            $profileImgPath = '/client/assets/profilepictures/' . $_SESSION['img'];
                            echo (isset($_SESSION['img']) && !empty($_SESSION['img']) && file_exists($_SERVER['DOCUMENT_ROOT'] . $profileImgPath)) 
                                ? $profileImgPath 
                                : '/client/assets/Avatar-placeholder.png'; 
                            ?>" onclick="toggleMenu()" class="dropbtn">
            </div>
            <!-- DROPDOWN -->
            <div class="dropdown">
                <div class="dropdown-content" id="myDropdown">
                    
                    <div class="dropdown-display">
                        <img src="<?php
                            $profileImgPath = '/client/assets/profilepictures/' . $_SESSION['img'];
                            echo (isset($_SESSION['img']) && !empty($_SESSION['img']) && file_exists($_SERVER['DOCUMENT_ROOT'] . $profileImgPath)) 
                                ? $profileImgPath 
                                : '/client/assets/Avatar-placeholder.png'; 
                            ?>">
                        <p id="un"> <?php echo ($fname); ?> <?php echo ($lname); ?></p>
                        <p id="un"><?php echo ($email); ?></p>
                    </div>

                    <div class="dropdown-option">
                        <div class="option-1"> 
                            <a href="/client/php/note-about.php">
                                <span class="material-symbols-outlined"> info </span>
                            <p> About </p></a>
                        </div>
                         
                        <div class="option-2"> 
                            <a href="/server/sign-up-login-db-conn/log-out.php">
                                <span class="material-symbols-outlined"> logout </span>
                            <p> Log Out </p></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- DROPDOWN -->
        </div>
        <!-- NAV -->
        <div class="topnav1">
            <div class="left-nav1">
                <button onclick="goBack()">
                <span class="material-symbols-outlined">
                    arrow_back
                    </span>
                </button>
                <h2>NoteKeeper Help</h2>
            </div>
        </div>
        <!-- NAV -->

        <!-- HELP CONTENTS -->
        <div class="help-container">
            <div class="help">
                <h1>How to Use NoteKeeper</h1>
                <p id="firstp">Take notes, save ideas, make concepts. </p>

                <h3>Creating a new note</h3>
                    <ol>
                        <li>To begin, open Notekeeper(notekeeperurl)</li>
                        <li>Click the plus button <span class="material-symbols-outlined">add_circle</span> to make a new note.</li>
                        <li>Write down anything you want.</li>
                        <li>If you sometimes make a mistake, you can click the <span class="material-symbols-outlined">undo</span>undo and <span class="material-symbols-outlined">redo</span>redo buttons.</li>
                        <ul>
                            <li>The <span class="material-symbols-outlined">undo</span>undo button reverts the most recent input.</li>
                            <li>The <span class="material-symbols-outlined">redo</span>redo button reapplies the input that was recently undone.</li>
                        </ul>
                        <li>Click the Save button.</li>
                    </ol>
                <h3>Editing a note</h3>
                <ol>
                    <li>Open an existing note.</li>
                    <li>Click the edit button <span class="material-symbols-outlined">edit</span> on the top right.</li>
                    <li>Make any changes to your note.</li>
                    <li>Click the Save button</li>
                </ol>
                <h3>Deleting a Note</h3>
                <ol>
                    <li>Open an existing note.</li>
                    <li>Click the Delete Button.</li>
                    <li id="lastline">You can delete multiple notes by selecting this button <span class="material-symbols-outlined">select_check_box</span> on the top, and click the Delete Selected button.</li>
                    <strong>WARNING: This will delete the note forever.</strong>
                </ol>
            </div>
        </div>
        <!-- HELP CONTENTS -->

        
    </div>
</body>
<html>
