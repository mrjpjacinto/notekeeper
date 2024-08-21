<?php
session_start(); 

include '../db-conn.php'; 

// Define the upload directory using the absolute path
$uploadDir = '/xampp/htdocs/notekeeper/client/assets/'; // Set the absolute path to your assets folder

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['uname']) && isset($_POST['email']) && isset($_POST['passwd'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $uname = $_POST['uname']; 
        $email = $_POST['email'];
        $passwd = password_hash($_POST['passwd'], PASSWORD_BCRYPT);

         // Handle image upload
        $imgPath = null;
        if (isset($_FILES['img']) && $_FILES['img']['error'] == UPLOAD_ERR_OK) {
            $img = $_FILES['img'];
            $imgName = basename($img['name']);
            $imgPath = $uploadDir . $imgName;

            // Move uploaded file to the upload directory
            if (move_uploaded_file($img['tmp_name'], $imgPath)) {
                $imgPath = $imgName;
            } else {
                $_SESSION['error'] = "Error uploading image.";
                header("Location: /notekeeper/client/php/note-signup.php");
                exit();
            }
        }

        // Check if the username already exists
        $check_uname_sql = "SELECT id FROM user WHERE uname = ?";
        if ($check_uname_stmt = $conn->prepare($check_uname_sql)) {
            $check_uname_stmt->bind_param("s", $uname);
            $check_uname_stmt->execute();
            $check_uname_stmt->store_result();

            if ($check_uname_stmt->num_rows > 0) {
                $_SESSION['error'] = "Username is already taken.";
                $check_uname_stmt->close();
                header("Location: /notekeeper/client/php/note-signup.php");
                exit();
            }
            $check_uname_stmt->close();
        }

        // Check if the email already exists
        $check_email_sql = "SELECT id FROM user WHERE email = ?";
        if ($check_email_stmt = $conn->prepare($check_email_sql)) {
            $check_email_stmt->bind_param("s", $email);
            $check_email_stmt->execute();
            $check_email_stmt->store_result();

            if ($check_email_stmt->num_rows > 0) {
                $_SESSION['error'] = "Email is already taken.";
                $check_email_stmt->close();
                header("Location: /notekeeper/client/php/note-signup.php");
                exit();
            }
            $check_email_stmt->close();
        }

        // Proceed with the insertion if no duplicates were found
        $sql = "INSERT INTO user (fname, lname, uname, email, passwd, img) VALUES (?, ?, ?, ?, ?, ?)";
        if ($stmt = $conn->prepare($sql)) { 
            $stmt->bind_param("ssssss", $fname, $lname, $uname, $email, $passwd, $imgPath); 

            if ($stmt->execute()) { 
                $_SESSION['success'] = "Sign up successful!"; 
                $stmt->close();
                header("Location: /notekeeper/client/php/note-signup.php");
                exit(); 
            } else {
                $_SESSION['error'] = "Error executing query: " . $stmt->error; 
            }

            $stmt->close(); 
        } else {
            $_SESSION['error'] = "Error preparing statement: " . $conn->error; 
        }
    } else {
        $_SESSION['error'] = "Required fields are missing."; 
    }
}

$conn->close(); 
header("Location: /notekeeper/client/php/note-signup.php"); 
exit();
?>
