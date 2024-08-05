<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="/style/note-signup.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="main-container">
        <div class="signup">
            <img src="/assets/note-app-logo.png">
            <h2>Sign Up</h2>
            <form>
                <div class="input">
                    <label for="uname">Username</label>
                    <input type="text" id="uname" name="uname" required>
                </div>
                <div class="input">
                    <label for="psword">Password</label>
                    <input type="text" id="psword" name="psword" required>
                </div>
                <div class="input">
                    <label for="psword">Confirm Password</label>
                    <input type="text" id="psword" name="psword" required>
                </div>
                <button type="submit">Sign Up</button>
                <p>Already have an account? <a href="/html/note-login.html">Log in!</a></p>
            </form>
        </div>
    </div>
</body>
</html>