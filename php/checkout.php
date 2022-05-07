<?php
    require './dbaccess.php';
    require './essentials.php';
    if(isset($_POST['sub_order'])){
        if(isset($_POST['regulamin'])&&$_POST['regulamin']==true&&isset($_POST['privacy'])&&$_POST['privacy']==true){
            if(isLoggedIn()){
                $uwagi = isset($_POST['comment'])? htmlentities($_POST['comment'],ENT_QUOTES) : '';
                $fullPrice = 0;
                $zawartosc = [];
                $conn = new mysqli($adr,$usr,$pwd,$db);
                $conn->set_charset("utf8mb4");
                $id_k = $conn->query("SELECT `id` FROM `klienci` WHERE `login`='".htmlentities($_SESSION['login'],ENT_QUOTES)."' AND `haslo`=PASSWORD('".htmlentities($_SESSION['password'],ENT_QUOTES)."')")->fetch_object()->id;
                $res = $conn->query("SELECT * FROM `koszyk` WHERE `id_k`=$id_k");
                if($res->num_rows==0){
                    header("Location: ../basket.php?msg=Koszyk jest pusty!");
                    $conn->close();
                    exit();
                }else{    
                    while($koszyk = $res->fetch_object()){
                        if($koszyk->ilosc < 0){
                            break;
                        }
                        $res2 = $conn->query("SELECT * FROM `produkty` WHERE `id`=$koszyk->id_p");
                        if($res2->num_rows==0){
                            break;
                        }
                        $prod = $res2->fetch_object();
                        if($prod->promocja > 0){
                            $prod->cena = $prod->cena - $prod->cena*(0.01*$prod->promocja);
                        }else{
                            $prod->cena = $prod->cena;
                        }
                        if($koszyk->ilosc > $prod->zapas){
                            header("Location: ../basket.php?msg=Wystąpił problem. Nie mamu wystarczająco produktu $prod->nazwa na składzie (mamy tylko $prod->zapas).");
                            exit();
                        }
                        array_push($zawartosc,[[$koszyk->id_p],[$koszyk->ilosc]]);

                        $price = $prod->cena*$koszyk->ilosc;
                        $fullPrice = $fullPrice+$price;

                    }
                    
                    $conn->query("INSERT INTO `zamowienia`(`id_k`, `data`, `odebrano`, `anulowano`, `uwagi`,`koszt`) VALUES ($id_k,CURRENT_DATE(),'nie','nie','$uwagi',$fullPrice)");
                    $id_z = $conn->query("SELECT LAST_INSERT_ID() AS `id`")->fetch_object()->id;
                    foreach($zawartosc as $value){
                        $id_p = $value[0][0];
                        $ilosc = $value[1][0];
                        $conn->query("INSERT INTO `zawartosc`(`id_z`,`id_p`,`ilosc`) VALUES ($id_z,$id_p,$ilosc)");
                        $conn->query("UPDATE `produkty` SET `zapas`=`zapas`-$ilosc WHERE `id`=$id_p");
                    };
                    $conn->query("DELETE FROM `koszyk` WHERE `id_k`");

                }
                $conn->close();
                header("Location: ../basket.php?msg=Złożono zamówienie pomyślnie!");
                exit();

            }else{
                header('Location: ../basket.php?msg=Zaloguj się wpierw');
                exit();
            }
        }else{
            header('Location: ../basket.php?msg=Zaakceptuj regulamin i politykę prywatności.');
            exit();
        }
    }else{
        header('Location: ../basket.php');
        exit();
    }
?>