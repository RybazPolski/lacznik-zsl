<?php
    require './php/dbaccess.php';
    $fullPrice = 0;
    $conn = new mysqli($adr,$usr,$pwd,$db);
    $conn->set_charset("utf8mb4");
    $id_k = $conn->query("SELECT `id` FROM `klienci` WHERE `login`='".htmlentities($_SESSION['login'],ENT_QUOTES)."' AND `haslo`=PASSWORD('".htmlentities($_SESSION['password'],ENT_QUOTES)."')")->fetch_object()->id;            
    $res = $conn->query("SELECT * FROM `koszyk` WHERE `id_k`=$id_k");
    if($res->num_rows==0){
        echo "Twój koszyk jest pusty.<br><a href='./products.php' style='color:black'>Zmieńmy to!</a>";
    }else{
        echo "<form action='./php/checkout.php' method='POST'><ul>";
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
            echo "<li id='product$prod->id'>$prod->nazwa x<input type='number' value='$obj->ilosc' style='width:2.5%' min='0' max='$prod->zapas' id='amount$prod->id' onchange='updateCart($prod->id)'> - <span id='price$prod->id' class='partPrice'>$price</span>zł</li>";
        }
        echo "</ul>";
?>

<p style='text-decoration:underline;'>Suma do zapłaty: <strong id='payment'><?php echo $fullPrice."zł" ?></strong></p>
<p>Pole do wprowadzania ewentualnych uwag do zamówienia:<br><input type="text" class="pass" name="comment"> (pole opcjonalne)</p>
<input type="checkbox" name="regulamin" required><label for="regulamin"> Przeczytałem/am i akceptuję <a href="./docs/regulamin.pdf">regulamin</a><span style="color:red;">*</span></label><br>
<input type="checkbox" name="privacy" required><label for="privacy"> Zapoznałem/am się z <a href="./docs/politykaPrywatnosci.pdf">&bdquo;Polityka prywatności&rdquo;</a><span style="color:red;">*</span></label><br>
<br><input type="submit" class="button" value="Złóż zamówienie!" name="sub_order">

<?php
        echo "</form>";    
    }
    $conn->close();
?>