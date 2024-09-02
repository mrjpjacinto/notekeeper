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
    <link rel="stylesheet" href="/client/style/note-about.css">
    <script src="/server/script/note-about.js" defer></script>
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
                            <a href="#">
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
            </div>
        </div>
        <!-- NAV -->

        <!-- ABOUT CONTENTS -->

        <!-- ABOUT NOTEKEEPER -->
        <div class="container">
            <div class="container1">   

                <div class="about-contents">
                    <h1>About NoteKeeper</h1>

                    <p>NoteKeeper is a note-taking website designed to help you jot down ideas, keep track of tasks, and remind 
            you of things to do. It's a powerful tool that organizes your thoughts, tasks, and important information in one convenient 
              place. Acting as a digital notebook, NoteKeeper ensures that your information is stored in a structured, easy to access 
              format.</p>
                    
                    <p> Designed to be intuitive and easy to use, NoteKeeper is perfect 
              for anyone from students to professionals who wants to take notes quickly and without hassle. This website is designed with 
                  the user in mind, offering an intuitive and user-friendly interface that anyone can navigate with ease. From students 
                needing a reliable place to store class notes to professionals managing multiple projects, NoteKeeper adapts to your needs. 
                    The clean design and straightforward functionality make it easy to quickly capture and organize your 
                                                        thoughts without any hassle.</p>
                                                        
                </div>

            </div>
            <!-- ABOUT NOTEKEEPER -->

            <!-- MEET THE TEAM -->
            <div class="container2">

            <h1> Meet the Team</h1>
                <div class="slideshow-container">

                    <div class="slideshow">
                        <div class="slide"><img src="/client/assets/image1.png" alt="Image 1"></div>
                        <div class="slide"><img src="/client/assets/image3.png" alt="Image 2"></div>
                        <div class="slide"><img src="/client/assets/image2.png" alt="Image 3"></div>
                        <div class="slide"><img src="/client/assets/image4.png" alt="Image 4"></div>
                        <div class="slide"><img src="/client/assets/image5.png" alt="Image 5"></div>
                        <div class="slide"><img src="/client/assets/image1.png" alt="Image 1"></div>
                        <div class="slide"><img src="/client/assets/image3.png" alt="Image 2"></div>
                        <div class="slide"><img src="/client/assets/image2.png" alt="Image 3"></div>
                        <div class="slide"><img src="/client/assets/image4.png" alt="Image 4"></div>
                        <div class="slide"><img src="/client/assets/image5.png" alt="Image 5"></div>
                        <div class="slide"><img src="/client/assets/image1.png" alt="Image 1"></div>
                        <div class="slide"><img src="/client/assets/image3.png" alt="Image 2"></div>
                        <div class="slide"><img src="/client/assets/image2.png" alt="Image 3"></div>
                        <div class="slide"><img src="/client/assets/image4.png" alt="Image 4"></div>
                        <div class="slide"><img src="/client/assets/image5.png" alt="Image 5"></div>
                        <div class="slide"><img src="/client/assets/image1.png" alt="Image 1"></div>
                        <div class="slide"><img src="/client/assets/image3.png" alt="Image 2"></div>
                        <div class="slide"><img src="/client/assets/image2.png" alt="Image 3"></div>
                        <div class="slide"><img src="/client/assets/image4.png" alt="Image 4"></div>
                        <div class="slide"><img src="/client/assets/image5.png" alt="Image 5"></div>
                    </div>

                </div>
            </div>
        </div>
            <!-- MEET THE TEAM -->
        <!-- ABOUT CONTENTS -->
    </div>
</body>
<html>
