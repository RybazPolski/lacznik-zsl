<?php
    require 'dbaccess.php';
    $conn = new mysqli($adr,$usr,$pwd,$db);
    $conn->set_charset("utf8mb4");
    session_start();

    $pass = hash("md5",htmlentities($_POST['current_password'],ENT_QUOTES));
    $login = htmlentities($_SESSION['login'], ENT_QUOTES);

    $conn = new mysqli($adr,$usr,$pwd,$db);
    $conn->set_charset("utf8mb4");
    if($conn->query("SELECT * FROM `klienci` WHERE `login`='$login' AND `haslo`=PASSWORD('$pass')")->num_rows!=1){
        $conn->close();
        header("Location: ../profile.php?passError=Nieprawidłowe hasło!");
        exit();
    }

    if(strlen($_POST['new_password1'])<8){
        header("Location: ../profile.php?passError=Za krótkie hasło! (min 8 znaków)");
        exit();
    };
    if(strlen($_POST['new_password1'])>32){
        header("Location: ../profile.php?passError=Ustaw hasło nie dłuższe niż 32 znaków");
        exit();
    };
    if(!preg_match('/[a-z]/', $_POST['new_password1'])||!preg_match('/[A-Z]/', $_POST['new_password1'])||!preg_match('/[0-9]/', $_POST['new_password1'])){
        header("Location: ../profile.php?passError=Hasło musi zawierać minimum jedną dużą i małą literę oraz cyfrę");
        exit();
    };
    if($_POST['new_password1']!=$_POST['new_password2']){
        header("Location: ../profile.php?passError=Hasła nie są takie same!");
        exit();
    };

    $id_k = $conn->query("SELECT `id` FROM `klienci` WHERE `login`='".htmlentities($_SESSION['login'],ENT_QUOTES)."' AND `haslo`=PASSWORD('".htmlentities($_SESSION['password'],ENT_QUOTES)."')")->fetch_object()->id;
    $newPass = hash("md5",htmlentities($_POST['new_password1'],ENT_QUOTES));
    if($conn->query("UPDATE `klienci` SET `haslo`=PASSWORD('$newPass') WHERE `login`='$login' AND `haslo`=PASSWORD('$pass') AND `id`=$id_k")){
        $conn->close();
        header('Location: logoff.php');
        exit();
    }else{
        $conn->close();
        header("Location: ../profile.php?passError=Wystąpił błąd. Spróbuj ponownie później.");
        exit();
    } 
    $conn->close();
    header("Location: ../profile.php?passError=Wystąpił błąd przez niedopatrzenie programisty. Spróbuj ponownie później.");
    exit();
?>