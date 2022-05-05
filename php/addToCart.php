<?php
    include './essentials.php';
    session_start();
    if(isLoggedIn()){
        $login = $_SESSION['login'];
    }else{
        echo json_encode([
            'success' => false,
            'error' => "Zaloguj się aby dodać coś do koszyka."
        ]);
        exit();
    }

    $id_p = htmlentities($_POST['id'],ENT_QUOTES);
    $n =  htmlentities($_POST['n'],ENT_QUOTES);

    include './dbaccess.php';
    $conn = new mysqli($adr,$usr,$pwd,$db);
    
    $res = $conn->query("SELECT `id` FROM `klienci` WHERE `login`='".$_SESSION['login']."' AND `haslo`=PASSWORD('".$_SESSION['password']."')");
    $id_k = $res->fetch_object()->id;


    $res = $conn->query("SELECT * FROM `koszyk` WHERE `id_p`=$id_p AND `id_k`=$id_k");
    $howMuchInBasket = ($obj = $res->fetch_object())? $obj->ilosc : 0;
    
    if($howMuchInBasket==0){
        $q = "INSERT INTO `koszyk`(`id_k`,`id_p`,`ilosc`) VALUES ($id_k,$id_p,$n)";
    }else{
        $q = "UPDATE `koszyk` SET `ilosc`=$howMuchInBasket+$n WHERE `id_k`=$id_k AND `id_p`=$id_p";
    }

    $res = $conn->query("SELECT * FROM `produkty` WHERE `id`=$id_p");
    $obj = $res->fetch_object();
    $produkt = $obj->nazwa;
    $zapas = $obj->zapas;
    
    if($n+$howMuchInBasket>$zapas){
        echo json_encode([
            'success' => false,
            'error' => "Nie mamy tylu produktów. Nasz zapas wynosi $zapas, w koszyku już masz $howMuchInBasket produktów, a chcesz dodać jeszcze $n."
        ]);
        $conn->close();
        exit();
    }

    if($conn->query($q)){    
        echo json_encode([
            'success' => true,
            'msg' => "Dodano do koszyka $n sztuk $produkt."
        ]);
        $conn->close();
        exit();
    }else{
        echo json_encode([
            'success' => false,
            'error' => "Coś poszło nie tak. Spróbuj ponownie później."
        ]);
        $conn->close();
        exit();
    }
    
?>