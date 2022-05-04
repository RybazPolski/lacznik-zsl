<?php
    include "$phpPath/dbaccess.php";
    $conn = new mysqli($adr,$usr,$pwd,$db);
    $res = $conn->query("SELECT * FROM `produkty` WHERE `promocja`>0");
    while($obj = $res->fetch_object()){
        
        if($obj->promocja > 0){
            $obj->cena = $obj->cena - $obj->cena*(0.01*$obj->promocja);
            $obj->cena = $obj->cena."zł (-$obj->promocja%)";
        }else{
            $obj->cena = $obj->cena."zł";

        }
        
        echo "
            <div class='product' style='width:25vw; display:inline-block; margin:0 2.5vw'>
                <div class='imageDiv'>
                    <img class='productImage' src='./graphics/$obj->zdjecie.png' style='width:25vw'>
                </div>
                <table class='priceANDstock'>
                    <tr>
                        <td class='nameTd' style='width:12.5vw; text-align:left;'>$obj->nazwa</td>
                        <td class='buttonTd' style='width:12.5vw; text-align:right;'>";
                        if(isLoggedIn()){
                            echo "<button class='addToCartButton' onclick='addToCart($obj->id)'>Dodaj do koszyka</button>";
                        }else{
                            echo "<button class='addToCartButton' disabled>Zaloguj się aby dodać do koszyka</button>";
                        }
                        
                        echo "</td>
                    </tr>
                    <tr>
                        <td class='priceTd' style='width:12.5vw; text-align:left;'>$obj->cena</td>
                        <td class='stockTd' style='width:12.5vw; text-align:right;'>Pozostało $obj->zapas sztuk</td>
                    </tr>
                </table>
            </div>
        ";
    }
    $conn->close();
?>
