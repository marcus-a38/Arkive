<?php
    clearstatcache();
    session_start();
    unset($_SESSION['userid']);
    unset($_SESSION['username']);
    unset($_SESSION['usertype']);
    header("Location:index.php");
?>