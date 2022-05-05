<?php
    require './php/dbaccess.php';
    $fullPrice = 0;
    $conn = new mysqli($adr,$usr,$pwd,$db);
    $conn->set_charset("utf8mb4");
    $id_k = $conn->query("SELECT `id` FROM `klienci` WHERE `login`='".$_SESSION['login']."' AND `haslo`=PASSWORD('".$_SESSION['password']."')")->fetch_object()->id;            
    $res = $conn->query("SELECT * FROM `koszyk` WHERE `id_k`=$id_k");
    if($res->num_rows==0){
        echo "Koszyk jest pusty.";
    }else{
        echo "<form action='' method=''><ul>";
        while($obj = $res->fetch_object()){
            $res2 = $conn->query("SELECT * FROM `produkty` WHERE `id`=$obj->id_p");
            if($res2->num_rows==0){
                break;
            }
            $prod = $res2->fetch_object();
            if($prod->promocja > 0){
                $prod->cena = $prod->cena - $prod->cena*(0.01*$prod->promocja);
            }else{
                $prod->cena = $prod->cena;
    
            }
            $price = $prod->cena*$obj->ilosc;
            $fullPrice = $fullPrice+$price;
            echo "<li>$prod->nazwa x<input type='number' value='$obj->ilosc' style='width:2.5%' min='0' max='$prod->zapas' id='amount$prod->id' onchange='updateCart($prod->id)'> - <span id='price$prod->id' class='partPrice'>$price</span>zł</li>";
        }
        echo "</ul>";
        echo "<p>Suma do zapłaty: <span id='payment'>$fullPrice</span> zł</p>";
        echo '<p>Pole do wprowadzania ewentualnych uwag do zamówienia <input type="text" class="pass" name="comment"> (pole opcjonalne)</p>
            <input type="submit" class="button" value="Złóż zamówienie!" name="sub_order"> (płatność przy użyciu Przelewy24)
            </form>';
    }
    $conn->close();
?>