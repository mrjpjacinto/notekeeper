<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/notekeeper/notekeeper/server/style/note-index.css">
    <script src="/notekeeper/notekeeper/server/script/note-index.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <div class="main-container">

    <!-- NAVBAR -->
        <div class="navbar">

        <!-- LEFT-NAV -->
            <div class="left-nav">
                <img src="/notekeeper/notekeeper/client/assets/note-app-logo.png">
            </div>
        
        <!-- RIGHT-NAV -->
            <div class="right-nav">
                <a class="option" href="/notekeeper/notekeeper/client/php/note-login.php">LOG IN</a>
                <a class="option" href="/notekeeper/notekeeper/client/php/note-signup.php">SIGN UP</a>
            </div>
        </div>
    <!-- NAVBAR -->

    <!-- HERO-SECTION -->
        <div class="hero-container">

            <div class="content">
                <h1> Welcome to NoteKeeper!</h1>
                <p> Write it down before you forget it.</p>
                <p>Take notes, save ideas, and make a reminders </p>
            </div>

            <div class="photo">
                <img src="/notekeeper/notekeeper/client/assets/indexphoto.png" alt="welcome photo">
            </div>

            <div class="hero-buttom">
                <a href="/notekeeper/notekeeper/client/php/note-signup.php">
                <button class="button"> Try NoteKeeper </button>
                </a>
            </div>
        </div>   
    <!-- HERO-SECTION -->

    </div>
</body>
</html>