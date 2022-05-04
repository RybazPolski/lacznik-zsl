<?php
    include './php/dbaccess.php';
    $conn = new mysqli($adr,$usr,$pwd,$db);
    $res = $conn->query("SELECT * FROM `menu` WHERE `danie`=1");
    echo "<h2>Zupy</h2><ul>";
    while($obj = $res->fetch_object()){
        echo "<li>$obj->nazwa</li>";
    }
    $res = $conn->query("SELECT * FROM `menu` WHERE `danie`=2");
    echo "</ul><h2>Dania główne</h2><ul>";
    while($obj = $res->fetch_object()){
        echo "<li>$obj->nazwa</li>";
    }
    echo "</ul>";

    $conn->close();
    ?>
