<?php
    if(session_status()!=PHP_SESSION_ACTIVE){
        session_start();
    }
    session_destroy();
    // $_SESSION['authorized'] = false;
    // $_SESSION['login'] = null;
    // $_SESSION['password'] = null;
    setcookie('remember', false, time()-1000, '/');
    setcookie('login', null, time()-1000, '/');
    setcookie('password', null, time()-1000, '/');
    header('Location: ../user.php?loginError=Wylogowano. Zaloguj się ponownie');
    exit();
?>