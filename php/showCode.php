<?php
    require './essentials.php';
    require './dbaccess.php';
    session_start();
    if(isLoggedIn()){
        $login = $_SESSION['login'];
    }else{
        echo json_encode([
            'success' => false,
            'error' => "Najpierw się zaloguj."
        ]);
        exit();
    }

    $id_z = htmlentities($_POST['id'],ENT_QUOTES);
    $conn = new mysqli($adr,$usr,$pwd,$db);
    $conn->set_charset("utf8mb4");
    $id_k = $conn->query("SELECT `id` FROM `klienci` WHERE `login`='".htmlentities($_SESSION['login'],ENT_QUOTES)."' AND `haslo`=PASSWORD('".htmlentities($_SESSION['password'],ENT_QUOTES)."')")->fetch_object()->id;            
    $res = $conn->query("SELECT * FROM `zamowienia` WHERE `id`=$id_z AND `id_k`=$id_k");
    if($res->num_rows==1){
        $order = $res->fetch_object();

        if($order->anulowano!="nie"){
            echo json_encode([
                'success' => false,
                'error' => "Nie można pokazać kodu. To zamówienie zostało anulowane."
            ]);
            $conn->close();
            exit();
        }elseif($order->odebrano!="nie"){
            echo json_encode([
                'success' => false,
                'error' => "Nie można pokazać kodu. To zamówienie już zostało odebrane."
            ]);
            $conn->close();
            exit();
        }else{
            echo json_encode([
                'success' => true,
                'code' => $order->kod_odbioru
            ]);
            $conn->close();
            exit();
        }

    }elseif($res->num_rows==0){
        echo json_encode([
            'success' => false,
            'error' => "Nie można pokazać kodu. Nie znaleziono tego zamówienia na Twoim koncie."
        ]);
        $conn->close();
        exit();
    }else{
        echo json_encode([
            'success' => false,
            'error' => "Nie można pokazać kodu. Skontaktuj się z administracją!"
        ]);
        $conn->close();
        exit();
    }

    echo json_encode([
        'success' => false,
        'error' => "Programista czegoś nie dopatrzył i wystąpił błąd z pokazaniem kodu. Skontaktuj się z administracją!"
    ]);
    exit();

?>