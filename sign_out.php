<?php
    session_start();
    setcookie('user_login',null,-1);
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    header('location:index.php');