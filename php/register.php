<?php

require "./essentials.php";

if(checkInput('login','POST')&&checkInput('pass','POST')&&checkInput('pass2','POST')){

    if(preg_match_all('/[^A-Za-z0-9_]/', $_POST['login'])){
        header('Location: ../user.php?registerError=Nazwa może zawierać tylko litery, cyfry oraz "_"!');
        exit();
    };
    if(strlen($_POST['pass'])<8){
        header("Location: ../user.php?registerError=Za krótkie hasło! (min 8 znaków)");
        exit();
    };
    if(strlen($_POST['pass'])>32){
        header("Location: ../user.php?registerError=Ustaw hasło nie dłuższe niż 32 znaków");
        exit();
    };
    if(!preg_match('/[a-z]/', $_POST['pass'])||!preg_match('/[A-Z]/', $_POST['pass'])||!preg_match('/[0-9]/', $_POST['pass'])){
        header("Location: ../user.php?registerError=Hasło musi zawierać minimum jedną dużą i małą literę oraz cyfrę");
        exit();
    };
    
    if($_POST['pass']!=$_POST['pass2']){
        header("Location: ../user.php?registerError=Hasła nie są takie same!");
        exit();
    };
    
    if(strlen($_POST['login'])<3){
        header("Location: ../user.php?registerError=Za długi login! (min 3 znaki)");
        exit();
    };
    if(strlen($_POST['login'])>16){
        header("Location: ../user.php?registerError=Za długi login! (max 16 znaków)");
        exit();
    };
    if(preg_match_all('/[^A-Za-z0-9_]/', $_POST['login'])){
        header('Location: ../user.php?registerError=Nazwa może zawierać tylko litery, cyfry oraz "_"! (bez polskich znaków)');
        exit();
    };

    require "dbaccess.php";
    $conn = new mysqli($adr,$usr,$pwd,$db);
    
    $login = htmlentities($_POST['login'], ENT_QUOTES);
    $q = "SELECT * FROM `klienci` WHERE `login`='$login'";
    
    $res = $conn->query($q);
    if($res->num_rows!=1){
        $pass = htmlentities($_POST['pass'], ENT_QUOTES);
        $username = checkInput("username","POST") ? htmlentities($_POST['username'], ENT_QUOTES) : $login; 
        echo "<br>$login<br>$username<br>$pass<br>";
        $pass = hash("md5",$pass);
        
        if(session_status()!=PHP_SESSION_ACTIVE)session_start();
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $pass;
        $_SESSION['authorized'] = true;

        $q = "INSERT INTO `klienci`(`login`,`nazwa`,`haslo`) VALUES ('$login','$username',PASSWORD('$pass'))";
        if($conn->query($q)){
            $conn->close();
            header("Location: ../profile.php");
        }else{
            $conn->close();
            header("Location: ../user.php?registerError=Wystąpił błąd. Spróbuj ponownie później.");
        }
        exit();
    }else{
        $conn->close();
        header("Location: ../user.php?registerError=Ten login jest już zajęty!");
        exit();
    };
    
    
}
?>