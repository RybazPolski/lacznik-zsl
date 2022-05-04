<?php
    if(!isset($phpPath)){$phpPath = ".";}
    include "$phpPath/essentials.php";
    if(isLoggedIn()){
        echo '<div class="menu"><a href="profile.php">Twój profil</a></div>';
    }else{
        echo '<div class="menu"><a href="user.php">Logowanie/Rejestracja</a></div>';
    }
?>