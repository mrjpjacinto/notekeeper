<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NoteKeeper</title>
    <link rel="icon" href="/notekeeper/client/assets/note-app-logo.png">
    <link rel="stylesheet" href="/notekeeper/client/style/note-about.css">
    <script src="/notekeeper/server/script/note-about.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">   
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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
        <div class="container">
            <div class="container1">   

                <div class="about-contents">
                    <h1>About NoteKeeper</h1>

                    <p>NoteKeeper is a note-taking website for you to take down notes, to remind you things to do, and to jot down ideas from  </p>
                    <p>your creative mind. A powerful tool designed to help users organize their thoughts, tasks, and important information in one place. </p>
                    <p>It acts as a digital notebook, making it a valuable tool for keeping track of information in a structured, easy-to-access format.</p>
                    <p>This app also has a feature that users can set reminders for time-sensitive tasks, transforming the app into a useful personal  </p>
                    <p>organizer for daily to-dos or important deadlines. It is designed to be intuitive and easy to use, enabling anyone from students to  </p>
                    <p> professionals to quickly jot down notes without hassle. </p>
                </div>

            </div>
            <!-- ABOUT NOTEKEEPER -->

            <!-- MEET THE TEAM -->
            <div class="container2">

            <h1> Meet the Team</h1>
                <div class="slideshow-container">

                    <div class="slideshow">
                        <div class="slide"><img src="/notekeeper/client/assets/image3.png" alt="Image 1"></div>
                        <div class="slide"><img src="/notekeeper/client/assets/image1.png" alt="Image 2"></div>
                        <div class="slide"><img src="/notekeeper/client/assets/image2.png" alt="Image 3"></div>
                        <div class="slide"><img src="/notekeeper/client/assets/image4.png" alt="Image 4"></div>
                        <div class="slide"><img src="/notekeeper/client/assets/image5.png" alt="Image 5"></div>
                    </div>

                </div>
            </div>
        </div>
            <!-- MEET THE TEAM -->
        <!-- ABOUT CONTENTS -->
    </div>
</body>
<html>
