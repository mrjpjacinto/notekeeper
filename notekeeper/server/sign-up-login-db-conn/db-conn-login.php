<?php
    include 'db-conn.php';

    if($_SERVER["REQUEST_METHOD"] ==  "POST") {
        $uname = $_POST['uname'];
        $passwd = $_POST['passwd'];

        $sql = "SELECT * FROM user WHERE uname='$uname'";
        $result = $conn->query($sql);

       if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if(password_verify($passwd, $row['passwd'])) {
            session_start();
            $_SESSION['id'] = $row['id'];
            echo "Login Successfull";
        } else {
            echo"Invalid password";
        }
       } else {
        echo"No user found with this username";
       }
    }
?>