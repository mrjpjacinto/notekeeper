<?php
session_start(); // Start the session at the beginning

include '../db-conn.php'; // Include the database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if both username and password are provided
    if (isset($_POST['uname']) && isset($_POST['passwd'])) {
        $uname = $_POST['uname']; // Retrieve the username from POST data
        $passwd = $_POST['passwd']; // Retrieve the password from POST data

        // Prepare SQL statement to select user with the given username
        $sql = "SELECT * FROM user WHERE uname=?";
        if ($stmt = $conn->prepare($sql)) { // Prepare the SQL statement
            $stmt->bind_param("s", $uname); // Bind the username parameter to the SQL statement

            if ($stmt->execute()) { // Execute the SQL statement
                $result = $stmt->get_result(); // Get the result set from the executed statement

                if ($result->num_rows > 0) { // Check if any user was found
                    $row = $result->fetch_assoc(); // Fetch the user data from the result set
                    
                    if (password_verify($passwd, $row['passwd'])) { // Verify the password
                        $_SESSION['id'] = $row['id']; // Store the user ID in the session
                        $_SESSION['uname'] = $row['uname']; // Store the username in the session

                        header("Location: /notekeeper/client/php/note-home-list.php"); // Redirect to the home page
                        exit(); // Stop further script execution
                    } else {
                        $_SESSION['error'] = "Invalid password"; // Store error message in session
                    }
                } else {
                    $_SESSION['error'] = "No user found with this username"; // Store error message in session
                }
            } else {
                $_SESSION['error'] = "Error executing query: " . $stmt->error; // Store error message in session
            }

            $stmt->close(); // Close the prepared statement
        } else {
            $_SESSION['error'] = "Error preparing statement: " . $conn->error; // Store error message in session
        }
    } else {
        $_SESSION['error'] = "Required fields are missing."; // Store error message in session
    }
}

$conn->close(); // Close the database connection
header("Location: /notekeeper/client/php/note-login.php"); // Redirect back to the login page
exit();
?>
