<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="/notekeeper/client/style/note-about.css">
    <script src="/notekeeper/server/script/note-about.js" defer></script>
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
                            <a href="#">
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
        <div class="about-contents">
            <h1>About Notekeeper</h1>
            <p></p>
        </div>
        <div class="team">
        </div>
    </div>
</body>
<html>
