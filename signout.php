<?php 
    session_start();
    unset($_SESSION['manager_id']);
    session_destroy();
    header("Location: index.php");
?>