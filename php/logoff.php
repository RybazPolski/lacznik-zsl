<?php
    if(session_status()!=PHP_SESSION_ACTIVE)session_start();
    session_unset();
    $_SESSION['authorized']=false;
    unset($_SESSION['login']);
    unset($_SESSION['password']);
    setcookie('remember', false, time()-1000, '/');
    setcookie('login', '', time()-1000, '/');
    setcookie('password', '', time()-1000, '/');
    header('Location: ../index.php');
    exit();
?>