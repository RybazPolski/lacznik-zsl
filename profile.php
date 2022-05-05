<?php $phpPath='./php'; ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Łącznik Online - strona Twojego profilu</title>
</head>
<body>
    <div class="main">
        <div class="baner">
        <img src="zsl-logo.png" class="logo">
        <img src="bufet-lacznik-blue.png" class="logo2">
            <h1>Bufet "Łącznik" - Twój profil</h1>
        </div>
        <div class="main_menu">
            <div class="menu"><a class="napis" href="index.php">Strona główna</a></div>
            <div class="menu"><a href="menu.php">Nasze menu</a></div>
            <div class="menu"><a href="products.php">Nasze produkty</a></div>
            <div class="menu"><a href="basket.php">Koszyk</a></div>
            <?php include "$phpPath/profileOrLogin.php"; 
            if(!isLoggedIn()){
                header('Location: user.php');
            }?>
        </div>
        <br><br><div class="left" style="clear: both;">
        <h3><a href="./php/logoff.php">Wyloguj</a></h3>
        <h2>Witaj <span name="username"><?php
            require './php/dbaccess.php';
            $conn = new mysqli($adr,$usr,$pwd,$db);
            echo $conn->query("SELECT `nazwa` FROM `klienci` WHERE `login`='".$_SESSION['login']."' AND `haslo`=PASSWORD('".$_SESSION['password']."')")->fetch_object()->nazwa;
            $conn->close();
            ?></span> <sub name="login">(<?php echo $_SESSION['login']?>)</sub></h2>
            <h3>Ustawienia:</h3>
            <h4>Zmiana hasła użytkownika:</h4>
            <form action="profile.php" method="POST">
                <p>Podaj stare hasło: </p><input type="text" class="pass" name="current_password">
                <p>Podaj nowe hasło: </p><input type="text" class="pass" name="new_password1">
                <p>Potwierdź nowe hasło: </p><input type="text" class="pass" name="new_password2">
                <p><input type="submit" class="button" name="change_password" value="Zmień hasło"></p>
            </form>
        </div>
        <div class="right">
            <h3>Lista dokonanych zamówień/zakupów w naszym przedsiębiorstwie dla konta: <span name="username"></span></h3>
            <ul>
                <li></li>
            </ul>
        </div>
        <div class="footer">
            <h4>Autorzy:</h4>
            <ul>
                <li>Julian Rybarczyk</li>
                <li>Piotr Gierba</li>
                <li>Jacek Jędra</li>
                <li>Renata Sakhnevych</li>
            </ul>
            <h4>Źródła (dla strony o profilu):</h4>
            <ul>

            </ul>
        </div>
    </div>
    <marquee behavior="scroll" direction="right" class="plywtekst"><p>lacznik-zsl.pl</p></marquee>
</body>
</html>