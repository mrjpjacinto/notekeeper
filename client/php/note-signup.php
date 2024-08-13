<?php
  session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="/notekeeper/client/style/note-signup.css">
    <script src="/notekeeper/server/script/note-signup.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="toast success-toast" id="success-toast"></div>
    <?php if (isset($_SESSION['success'])): ?>
        <p class="hidden" id="success-msg"><?php echo $_SESSION['success']; ?></p>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>
    <div class="main-container">
        <div class="signup">
            <a href="/notekeeper/index.php">
            <img src="/notekeeper/client/assets/note-app-logo.png"></a>
            <h2>Sign Up</h2>
            <form action="/notekeeper/server/sign-up-login-db-conn/db-conn-sign-up.php" method="post">
                <div class="input-a">
                    <div class="input">
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="fname" required> 
                    </div>
                    <div class="input">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required> 
                    </div>
                </div>
                <div class="input-b">
                    <div class="input">
                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" name="lname" required> 
                    </div>
                    <div class="input">
                    <label for="passwd">Password</label>
                    <input type="password" id="passwd" name="passwd" required> 
                    </div>
                </div>
                <div class="input-c">
                    <div class="input">
                        <label for="uname">Username</label>
                        <input type="text" id="uname" name="uname" required>
                    </div>
                    <div class="input">
                        <label for="c-psword">Confirm Password</label>
                        <input type="password" id="c-psword" name="c-psword" required>
                        <div class="show-password">
                            <input type="checkbox" onclick="showPassword()">Show Password
                        </div>
                    </div>
                </div> 
                <button class="click" type="submit">Sign Up</button>
                <p>Already have an account? <a href="/notekeeper/client/php/note-login.php">Log in!</a></p>
            </form>
        </div>
    </div>
</body>
</html>