<?php
    session_start();
    foreach($_SESSION as $key => $val){
        echo "Session $key => $val<br>";
    };
    foreach($_COOKIE as $key => $val){
        echo "Cookie $key => $val<br>";
    };

?>