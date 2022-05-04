<?php
session_start();
require "essentials.php";

if(checkInput('login','POST')&&checkInput('pass','POST')){
    $login = htmlentities($_POST['login'], ENT_QUOTES);
    $pass = htmlentities($_POST['pass'], ENT_QUOTES);
    echo $login."<br>".$pass."<br>";
    $pass = hash("md5",$pass);
    

    require "dbaccess.php";
    $conn = new mysqli($adr,$usr,$pwd,$db);
    $q = "SELECT * FROM `klienci` WHERE `login`='$login' AND `haslo`=PASSWORD('$pass')";
    // echo $q;
    $res = $conn->query($q);
    if($res->num_rows==1){
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $pass;
        $_SESSION['authorized'] = true;
        if($_POST['remember']==true){
            setcookie('remember',true, time() + (86400 * 365), "/");
            setcookie('login',$login, time() + (86400 * 365), "/");
            setcookie('password',$password, time() + (86400 * 365), "/");
        }
        $conn->close();
        header("Location: ../index.php");
        exit();
    }else{
        $conn->close();
        header("Location: ../user.php?loginError=Błędne dane");
        exit();
    };
    
}else{
    header("Location: ../user.php?loginError=Podaj wszystkie dane");
    exit();
};

?>