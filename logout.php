<?php
    session_start();
    unset($_SESSION['acc_type']);
    header("Location: index.php");
    exit();
?>
