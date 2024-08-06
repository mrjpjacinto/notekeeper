<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/notekeeper/client/style/note-home-tiles.css">
    <script src="/notekeeper/server/script/note-home-tiles.js"></script>
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
                    <p>Name<br>username@example.com</p>
                    </div>
                    <div class="dropdown-option">
                        <a href="#">
                        <span class="material-symbols-outlined">
                            account_circle
                            </span>
                            Profile</a>
                        <a href="#">
                        <span class="material-symbols-outlined">
                            person_add
                            </span>
                            Add Account</a>
                        <a href="#">
                        <span class="material-symbols-outlined">
                            switch_account
                            </span>
                            Switch Account</a>
                        <a href="#">    
                        <span class="material-symbols-outlined">
                            settings
                            </span>
                            Settings</a>
                        <a href="#">
                        <span class="material-symbols-outlined">
                            help
                            </span>
                            Help</a>
                        <a href="#">
                        <span class="material-symbols-outlined">
                            logout
                            </span>
                            Log Out</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="topnav1">
            <div class="left-nav1">
                <button>
                <span class="material-symbols-outlined">
                    add_circle
                    </span>
                </button>
                <button onclick="darkMode()">
                    <span class="material-symbols-outlined" id="darkmode">
                        dark_mode
                        </span>
                    </button>
                <button>
                    <span class="material-symbols-outlined">
                        <a href="/notekeeper/client/php/note-home-list.php">list</a>
                        </span>
                    </button>
            </div>
            <div class="right-nav1">
                <div class="input">
                    <button>
                        <span class="material-symbols-outlined">
                            search
                            </span>
                        </button>
                    <input type="text" placeholder="Search notes...">
                </div>
            </div>
        </div>
        <!-- NAVBAR -->
         <!-- BODY -->
        <div class="note-card">
            <div class="note-template">
                <div class="note-content">
                    <div class="note-heading">
                        <h1>Title</h1>
                        <div class="heading-tools">
                        <span class="material-symbols-outlined">
                            edit
                        </span>
                        <span class="material-symbols-outlined">
                            delete
                            </span>
                        </div>
                    </div>
                    <div class="note-body">
                        Content
                    </div>
                    <div class="note-footer">
                        mm/dd/yyyy 00:00<br>
                        mm/dd/yyyy 00:00
                    </div>
                </div>
            </div>
            <div class="note-template">
                <div class="note-content">
                    <div class="note-heading">
                        <h1>Title</h1>
                        <div class="heading-tools">
                        <span class="material-symbols-outlined">
                            edit
                        </span>
                        <span class="material-symbols-outlined">
                            delete
                            </span>
                        </div>
                    </div>
                    <div class="note-body">
                        Content
                    </div>
                    <div class="note-footer">
                        mm/dd/yyyy 00:00<br>
                        mm/dd/yyyy 00:00
                    </div>
                </div>
            </div>
            <div class="note-template">
                <div class="note-content">
                    <div class="note-heading">
                        <h1>Title</h1>
                        <div class="heading-tools">
                        <span class="material-symbols-outlined">
                            edit
                        </span>
                        <span class="material-symbols-outlined">
                            delete
                            </span>
                        </div>
                    </div>
                    <div class="note-body">
                        Content
                    </div>
                    <div class="note-footer">
                        mm/dd/yyyy 00:00<br>
                        mm/dd/yyyy 00:00
                    </div>
                </div>
            </div>
            <div class="note-template">
                <div class="note-content">
                    <div class="note-heading">
                        <h1>Title</h1>
                        <div class="heading-tools">
                        <span class="material-symbols-outlined">
                            edit
                        </span>
                        <span class="material-symbols-outlined">
                            delete
                            </span>
                        </div>
                    </div>
                    <div class="note-body">
                        Content
                    </div>
                    <div class="note-footer">
                        mm/dd/yyyy 00:00<br>
                        mm/dd/yyyy 00:00
                    </div>
                </div>
            </div>
        </div>
        <div class="note-card">
            <div class="note-template">
                <div class="note-content">
                    <div class="note-heading">
                        <h1>Title</h1>
                        <div class="heading-tools">
                        <span class="material-symbols-outlined">
                            edit
                        </span>
                        <span class="material-symbols-outlined">
                            delete
                            </span>
                        </div>
                    </div>
                    <div class="note-body">
                        Content
                    </div>
                    <div class="note-footer">
                        mm/dd/yyyy 00:00<br>
                        mm/dd/yyyy 00:00
                    </div>
                </div>
            </div>
            <div class="note-template">
                <div class="note-content">
                    <div class="note-heading">
                        <h1>Title</h1>
                        <div class="heading-tools">
                        <span class="material-symbols-outlined">
                            edit
                        </span>
                        <span class="material-symbols-outlined">
                            delete
                            </span>
                        </div>
                    </div>
                    <div class="note-body">
                        Content
                    </div>
                    <div class="note-footer">
                        mm/dd/yyyy 00:00<br>
                        mm/dd/yyyy 00:00
                    </div>
                </div>
            </div>
            <div class="note-template">
                <div class="note-content">
                    <div class="note-heading">
                        <h1>Title</h1>
                        <div class="heading-tools">
                        <span class="material-symbols-outlined">
                            edit
                        </span>
                        <span class="material-symbols-outlined">
                            delete
                            </span>
                        </div>
                    </div>
                    <div class="note-body">
                        Content
                    </div>
                    <div class="note-footer">
                        mm/dd/yyyy 00:00<br>
                        mm/dd/yyyy 00:00
                    </div>
                </div>
            </div>
            <div class="note-template">
                <div class="note-content">
                    <div class="note-heading">
                        <h1>Title</h1>
                        <div class="heading-tools">
                        <span class="material-symbols-outlined">
                            edit
                        </span>
                        <span class="material-symbols-outlined">
                            delete
                            </span>
                        </div>
                    </div>
                    <div class="note-body">
                        Content
                    </div>
                    <div class="note-footer">
                        mm/dd/yyyy 00:00<br>
                        mm/dd/yyyy 00:00
                    </div>
                </div>
            </div>
        </div>
        <!-- BODY -->
    </div>
</body>
</html>
