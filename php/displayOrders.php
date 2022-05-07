<?php
    $conn = new mysqli($adr,$usr,$pwd,$db);
    $conn->set_charset("utf8mb4");
    $id_k = $conn->query("SELECT `id` FROM `klienci` WHERE `login`='".htmlentities($_SESSION['login'],ENT_QUOTES)."' AND `haslo`=PASSWORD('".htmlentities($_SESSION['password'],ENT_QUOTES)."')")->fetch_object()->id;            
    $res = $conn->query("SELECT * FROM `zamowienia` WHERE `id_k`=$id_k");

    echo "<ul>";
    while($order = $res->fetch_object()){
        echo "<li>
            Zamówienie z dnia <strong>$order->data</strong> o kwocie <strong>".$order->koszt."zł</strong>:<br>
            <ul>";
                $res2 = $conn->query("SELECT * FROM `zawartosc` INNER JOIN `produkty` ON `zawartosc`.`id_p`=`produkty`.`id` WHERE `id_z`=$order->id");
                while($prod = $res2->fetch_object()){
                    echo "<li>$prod->nazwa x$prod->ilosc (".$prod->cena*$prod->ilosc."zł)</li>";
                }
            echo "</ul><br>
            Czy odebrano?  <strong>$order->odebrano</strong>";
            if($order->anulowano=="nie"){
                echo " <button onclick='showCode($order->kod_odbioru)'>Pokaż kod odbioru</button><br>";
            }
            echo "Czy anulowano? <strong>$order->anulowano</strong>";
                if($order->anulowano=="nie"){
                    echo " <button onclick='cancel($order->id)'>Anuluj</button><br>";
                }
            echo "Uwagi: ";
            if(strlen($order->uwagi)==0){
                echo "Brak.";
            }else{
                echo "&#8222;$order->uwagi&#8221;";
            }
            echo "</li><br>";
    };
    echo "</ul>";
    $conn->close();
?>