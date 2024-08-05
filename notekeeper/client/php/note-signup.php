<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="/notekeeper/notekeeper/server/style/note-signup.css">
    <script src="/notekeeper/server/script/note-signup.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="main-container">
        <div class="signup">
            <img src="/notekeeper/notekeeper/client/assets/note-app-logo.png">
            <h2>Sign Up</h2>
            <form>
                <div class="input-name">
                    <div class="input">
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="fname" required> 
                    </div>
                    <div class="input">
                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" name="lname" required> 
                    </div>
                </div>
                <div class="input-uname">
                    <div class="input">
                        <label for="uname">Username</label>
                        <input type="text" id="uname" name="uname" required> 
                    </div>
                    <div class="input">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required> 
                    </div>
                </div>
                <div class="input">
                    <label for="psword">Password</label>
                    <input type="password" id="psword" name="psword" required>
                    <div class="show-password">
                        <input type="checkbox" onclick="showPassword()">Show Password
                    </div>
                </div>
                <div class="input">
                    <label for="c-psword">Confirm Password</label>
                    <input type="password" id="c-psword" name="c-psword" required>
                    <div class="show-password">
                        <input type="checkbox" onclick="showConfirmPassword()">Show Password
                    </div>
                </div>
                <button class="click" type="submit">Sign Up</button>
                <p>Already have an account? <a href="/notekeeper/notekeeper/client/php/note-login.php">Log in!</a></p>
            </form>
        </div>
    </div>
</body>
</html>