<?php
include '../db-conn.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    if (isset($_POST['uname']) && isset($_POST['passwd'])) {
        $uname = $_POST['uname'];
        $passwd = $_POST['passwd'];

        
        $sql = "SELECT * FROM user WHERE uname=?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $uname);

            if ($stmt->execute()) {
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    
                    if (password_verify($passwd, $row['passwd'])) {
                        session_start();
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['uname'] = $row['uname']; 

                        
                        header("Location: /notekeeper/notekeeper/client/php/note-home.php");
                        exit(); 
                    } else {
                        echo "Invalid password";
                    }
                } else {
                    echo "No user found with this username";
                }
            } else {
                echo "Error executing query: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "Required fields are missing.";
    }
}

$conn->close();
?>
