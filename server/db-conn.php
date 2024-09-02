<?php
    //db_config
    $servername = "db";
    $username = "root";
    $password = "comfac123";
    $dbname = "notepad_db";

    //to create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    //to check the connection
    if($conn->connect_error) {
        die ("Connection failed: " . $conn->connect_error);
    }
?>