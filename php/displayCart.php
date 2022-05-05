<?php
    require './php/dbaccess.php';
    $fullPrice = 0;
    $conn = new mysqli($adr,$usr,$pwd,$db);
    $id_k = $conn->query("SELECT `id` FROM `klienci` WHERE `login`='".$_SESSION['login']."' AND `haslo`=PASSWORD('".$_SESSION['password']."')")->fetch_object()->id;            
    $res = $conn->query("SELECT * FROM `koszyk` WHERE `id_k`=$id_k");
    if($res->num_rows==0){
        echo "Koszyk jest pusty.";
    }else{
        echo "<ul>";
        while($obj = $res->fetch_object()){
            $res2 = $conn->query("SELECT * FROM `produkty` WHERE `id`=$obj->id_p");
            if($res2->num_rows==0){
                break;
            }
            $prod = $res2->fetch_object();
            $price = $prod->cena*$obj->ilosc;
            $fullPrice = $fullPrice+$price;
            echo "<li>$prod->nazwa <input type='number' value='$obj->ilosc' style='width:2.5%' min='1' max='$prod->zapas'> ($price zł)</li>";
        }
        echo "</ul>";
        echo "<p>Suma do zapłaty: <span class='payment'>$fullPrice zł</span></p>";
    }
    $conn->close();
?>