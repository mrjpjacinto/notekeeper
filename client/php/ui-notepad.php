<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NoteKeeper</title>
    <link rel="icon" href="/notekeeper/client/assets/note-app-logo.png">
    <link rel="stylesheet" href="/notekeeper/client/style/ui-notepad.css">
    <script src="/notekeeper/server/script/ui-notepad.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    
<div class="main-container">
    
    <!-- NAVBAR -->
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
                        <p>Name<br>username@example.com</p>
                    </div>

                    <div class="dropdown-option">
                        <a href="#">
                        <span class="material-symbols-outlined">
                            info
                            </span>
                            About</a>
                        <a href="/notekeeper/server/sign-up-login-db-conn/log-out.php">
                        <span class="material-symbols-outlined">
                            logout
                            </span>
                            Log Out</a>
                    </div>
            </div>
        </div>
    </div>
   
    <!-- NAVBAR -->

    <!-- HERO-SECTION -->
        <div class="hero-container">

            <div class="textpad-icon">
                <button>
                    <span class="material-symbols-outlined"> arrow_back </span>
                </button>

                <button>
                    <span class="material-symbols-outlined"> undo </span>
                </button>
                <button>
                    <span class="material-symbols-outlined"> redo </span>
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

            <div class="textpad">
                <h1>Enter title..</h1>
                <p> Take a note..</p>
            </div>
        </div>

    
</body>
</html>