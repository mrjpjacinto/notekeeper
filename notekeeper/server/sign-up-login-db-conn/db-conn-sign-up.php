<?php
    include 'db-conn.php'

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $passwd = password_hash($_POST['passwd'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (fname, lname, uname, passwd) VALUES ('$fname, $lname, $uname, $email, $passwd')";

        if($conn->query($sql) === TRUE) {
            echo"Registration successful";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>