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
                'error' => "Nie można anulować. To zamówienie już zostało anulowane."
            ]);
            $conn->close();
            exit();
        }elseif($order->odebrano!="nie"){
            echo json_encode([
                'success' => false,
                'error' => "Nie można anulować. To zamówienie zostało już odebrane."
            ]);
            $conn->close();
            exit();
        }else{


            $res2 = $conn->query("SELECT * FROM `zawartosc` WHERE `id_z`=$order->id");
            while($prod = $res2->fetch_object()){
                if(!$conn->query("UPDATE `produkty` SET `zapas`=`zapas`+$prod->ilosc WHERE `id`=$prod->id_p")){
                    echo json_encode([
                        'success' => false,
                        'error' => "Coś poszło nie tak."
                    ]);
                    $conn->close();
                    exit(); 
                }
            }
            if(!$conn->query("UPDATE `zamowienia` SET `anulowano`='tak' WHERE `id`=$id_z AND `id_k`=$id_k")){
                echo json_encode([
                    'success' => false,
                    'error' => "Coś poszło nie tak."
                ]);
                $conn->close();
                exit(); 
            }else{
                echo json_encode([
                    'success' => true,
                    'msg' => "Pomyślnie anulowano zamówienie. Zwrot środków nastąpi do końca następnego dnia roboczego."
                ]);
                
                $conn->close();
                exit(); 
            };


        }

    }elseif($res->num_rows==0){
        echo json_encode([
            'success' => false,
            'error' => "Nie można anulować. Nie znaleziono tego zamówienia na Twoim koncie."
        ]);
        $conn->close();
        exit();
    }else{
        echo json_encode([
            'success' => false,
            'error' => "Wystąpił błąd z anulowaniem zamówienia. Skontaktuj się z administracją!"
        ]);
        $conn->close();
        exit();
    }

    echo json_encode([
        'success' => false,
        'error' => "Programista czegoś nie dopatrzył i wystąpił błąd z anulowaniem zamówienia. Skontaktuj się z administracją!"
    ]);
    exit();

?>