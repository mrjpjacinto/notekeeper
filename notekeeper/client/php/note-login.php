<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="/notekeeper/notekeeper/server/style/note-login.css">
    <script src="/notekeeper/notekeeper/server/script/note-login.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="main-container">
        <div class="login">
            <img src="/notekeeper/notekeeper/client/assets/note-app-logo.png">
            <h2>Log In</h2>
            <form>
                <div class="input">
                    <label for="uname">Username</label>
                    <input type="text" id="uname" name="uname" required>
                </div>
                <div class="input">
                    <label for="psword">Password</label>
                    <input type="password" id="psword" name="psword" required>
                    <div class="show-password">
                        <input type="checkbox" onclick="showPassword()">Show Password
                    </div>
                </div>
                <button class="click" type="submit">Log In</button>
                <p>Don't have an account? <a href="/notekeeper/notekeeper/client/php/note-signup.php">Sign up</a> now!</p>
            </form>
        </div>
    </div>
</body>
</html>