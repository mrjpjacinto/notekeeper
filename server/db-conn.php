<?php
    //db_config
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "notepad_db";

    //to create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    //to check the connection
    if($conn->connect_error) {
        die ("Connection failed: " . $conn->connect_error);
    }
?>