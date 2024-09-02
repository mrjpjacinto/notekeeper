<?php
    session_start();

    session_unset();

    session_destroy();

    header("Location: /client/php/note-login.php");
    exit();
?>
