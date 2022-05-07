<?php
    session_start();
    require 'dbaccess.php';
    
    if(preg_match_all('/[^A-Za-z0-9_]/', $_POST['new_login'])){
        header('Location: ../profile.php?loginChangeError=Login może zawierać tylko litery, cyfry oraz "_"!');
        exit();
    };
    if(strlen($_POST['new_login'])<3){
        header("Location: ../profile.php?loginChangeError=Za długi login! (min 3 znaki)");
        exit();
    };
    if(strlen($_POST['new_login'])>16){
        header("Location: ../profile.php?loginChangeError=Za długi login! (max 16 znaków)");
        exit();
    };
    
    $pass = hash("md5",htmlentities($_POST['current_password'],ENT_QUOTES));
    $oldLogin = htmlentities($_POST['old_login'],ENT_QUOTES);
    $newLogin = htmlentities($_POST['new_login'],ENT_QUOTES);
    $conn = new mysqli($adr,$usr,$pwd,$db);
    $conn->set_charset("utf8mb4");
    if($conn->query("SELECT * FROM `klienci` WHERE `login`='$newLogin'")->num_rows>0){
        $conn->close();
        header("Location: ../profile.php?loginChangeError=Ten login jest już zajęty!");
        exit();
    };

    $id_k = $conn->query("SELECT `id` FROM `klienci` WHERE `login`='".htmlentities($_SESSION['login'],ENT_QUOTES)."' AND `haslo`=PASSWORD('".htmlentities($_SESSION['password'],ENT_QUOTES)."')")->fetch_object()->id;            
    if($id_k == $conn->query("SELECT `id` FROM `klienci` WHERE `login`='$oldLogin' AND `haslo`=PASSWORD('$pass')")->fetch_object()->id){
       if($conn->query("UPDATE `klienci` SET `login`='$newLogin' WHERE `id`=$id_k")){
           $conn->close();
           header('Location: logoff.php');
           exit();
       }else{
           $conn->close();
           header("Location: ../profile.php?loginChangeError=Wystąpił błąd. Spróbuj ponownie później.");
           exit();
       } 
    }else{
        $conn->close();
        header("Location: ../profile.php?loginChangeError=Niewłaściwy login/hasło.");
        exit();
    }
    $conn->close();
    header("Location: ../profile.php?loginChangeError=Wystąpił błąd przez niedopatrzenie programisty. Spróbuj ponownie później.");
    exit();


?>