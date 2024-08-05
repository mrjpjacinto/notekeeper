<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/notekeeper/server/style/note-home.css">
    <script src="notekeeper/server/script/note-home.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <div class="main-container">
        <div class="topnav">
            <div class="left-nav">
                <img src="/notekeeper/server/assets/note-app-logo.png">
            </div>
            <div class="right-nav">
                <a class="option" href="../notekeeper/client/php/note-login.php">Log In</a>
                <a class="option" href="../notekeeper/client/php/note-signup.php">Sign Up</a>
            </div>
        </div>
        <div class="topnav1">
            <div class="left-nav1">
                <span class="material-symbols-outlined">
                    add_circle
                    </span>
            </div>
            <div class="right-nav1">
                <div class="input">
                    <input type="text" placeholder="Search notes...">
                </div>
            </div>
        </div>
        <!-- <div class="topnav2">
            <div class="left-nav2">
                <button  onclick="myFunction()">
                <span class="material-symbols-outlined">
                    dark_mode
                    </span>
                </button>
            </div>
        </div> -->
        <div class="note-card">
            <div class="note-template">

            </div>
        </div>
    </div>
</body>
</html>