<?php
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NoteKeeper</title>
    <link rel="icon" href="/client/assets/note-app-logo.png">
    <link rel="stylesheet" href="/notekeeper/client/style/note-login.css">
    <script src="/notekeeper/server/script/note-login.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
            <!-- Error Toast Notification -->
        <div class="toast error-toast" id="error-toast">
            <?php if (isset($_SESSION['error'])): ?>
                <p id="error-msg"><?php echo $_SESSION['error']; ?></p>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
        </div>

        <!-- Success Toast Notification -->
        <div class="toast success-toast" id="success-toast">
            <?php if (isset($_SESSION['success'])): ?>
                <p id="success-msg"><?php echo $_SESSION['success']; ?></p>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>
        </div>
        </div>
            <div class="main-container">
                <div class="login">
                    <a href="/notekeeper/index.php">
                    <img src="/notekeeper/client/assets/note-app-logo.png"></a>
                    <h2>Log In</h2>
                    <form action="/notekeeper/server/sign-up-login-db-conn/db-conn-login.php" method="post">
                        <div class="input">
                            <label for="uname">Username</label>
                            <input type="text" id="uname" name="uname" required>
                        </div>
                        <div class="input">
                            <label for="passwd">Password</label>
                            <input type="password" id="passwd" name="passwd" required>
                            <div class="show-password">
                                <input type="checkbox" onclick="showPassword()">Show Password
                            </div>
                        </div>
                        <button class="click" type="submit">Log In</button>
                        <p>Don't have an account? <a href="/notekeeper/client/php/note-signup.php">Sign up</a> now!</p>
                    </form>
                </div>
        </div>
        </body>
        </html>