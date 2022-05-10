<?php
    require './php/dbaccess.php';
    $conn = new mysqli($adr,$usr,$pwd,$db);
    $conn->set_charset("utf8mb4");
    $and = (isset($_GET['menuQuery'])&&!empty($_GET['menuQuery'])) ? " AND `nazwa` LIKE '%".htmlentities(convertSpecialChars($_GET['menuQuery']),ENT_QUOTES)."%'"  : "";
    $res = $conn->query("SELECT * FROM `menu` WHERE `danie`=1$and");
    echo "<h2>Zupy</h2><ul>";
    if($res->num_rows==0){
        echo "Nie znaleziono dania.";
    }else{
        while($obj = $res->fetch_object()){
            echo "<li>$obj->nazwa</li>";
        }
    }
    $res = $conn->query("SELECT * FROM `menu` WHERE `danie`=2$and");
    echo "</ul><h2>Dania główne</h2><ul>";
    if($res->num_rows==0){
        echo "Nie znaleziono dania.";
    }else{
        while($obj = $res->fetch_object()){
            echo "<li>$obj->nazwa</li>";
        }
    }
    echo "</ul>";

    $conn->close();
    ?>
