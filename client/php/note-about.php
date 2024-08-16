<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NoteKeeper</title>
    <link rel="icon" href="/client/assets/note-app-logo.png">
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
        <!-- NAV -->
        <div class="topnav1">
            <div class="left-nav1">
                <button onclick="goBack()">
                <span class="material-symbols-outlined">
                    arrow_back
                    </span>
                </button>
            </div>
        </div>
        <!-- NAV -->
         <!-- ABOUT CONTENTS -->
          <!-- ABOUT NOTEKEEPER -->
        <div class="about-contents">
            <h1>About</h1>
            <h2>About NoteKeeper</h2>
            <p>NoteKeeper is a note-taking website for you to take down notes, to remind you things to do, and to jot down ideas from your creative mind.</p>
            <p></p>
        </div>
        <!-- ABOUT NOTEKEEPER -->
         <!-- MEET THE TEAM -->
          <div class="team-bg">
            <div class="team">
                <h2>Meet the Team!</h2>
                <div class="team-pic">
                    <img src="\notekeeper\client\assets\image-placeholder.webp">
                </div>
                <div class="team-pic">
                    <img src="\notekeeper\client\assets\image-placeholder.webp">
                </div>
                <div class="team-pic">
                    <img src="\notekeeper\client\assets\image-placeholder.webp">
                </div>
                <div class="team-pic">
                    <img src="\notekeeper\client\assets\image-placeholder.webp">
                </div>
                <div class="team-pic">
                    <img src="\notekeeper\client\assets\image-placeholder.webp">
                </div>
                <div class="scroll-buttons">
                    <a class="prev" onclick="scrollPic(-1)">
                        <span class="material-symbols-outlined">arrow_back_ios</span>
                    </a>
                    <a class="next" onclick="scrollPic(1)">
                        <span class="material-symbols-outlined">arrow_forward_ios</span>
                    </a>
                </div>

                <div class="team-name">
                    <p id="teamName">0</p>
                </div>

                <div class="team-pic-row">
                    <div class="team-pic-column">
                        <img class="demo cursor" src="\notekeeper\client\assets\image-placeholder-2.png" onclick="teamPic(1)" alt="Name 1">
                    </div>
                    <div class="team-pic-column">
                        <img class="demo cursor" src="\notekeeper\client\assets\image-placeholder-2.png" onclick="teamPic(2)" alt="Name 2">
                    </div>
                    <div class="team-pic-column">
                        <img class="demo cursor" src="\notekeeper\client\assets\image-placeholder-2.png" onclick="teamPic(3)" alt="Name 3">
                    </div>
                    <div class="team-pic-column">
                        <img class="demo cursor" src="\notekeeper\client\assets\image-placeholder-2.png" onclick="teamPic(4)" alt="Name 4">
                    </div>
                    <div class="team-pic-column">
                        <img class="demo cursor" src="\notekeeper\client\assets\image-placeholder-2.png" onclick="teamPic(5)" alt="Name 5">
                    </div>
                </div>
            </div>
        <!-- MEET THE TEAM -->
        </div>
        <!-- ABOUT CONTENTS -->
    </div>
</body>
<html>
