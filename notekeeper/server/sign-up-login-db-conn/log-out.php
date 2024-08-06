<?php
    session_start();

    session_unset();

    session_destroy();

    header("Location: /notekeeper/notekeeper/client/php/note-login.php");
    exit();
?>
