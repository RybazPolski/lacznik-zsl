<?php $phpPath='./php'; ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Łącznik Online - strona naszego menu</title>
</head>
<body>
    <div class="main">
        <div class="baner">
        <img src="zsl-logo.png" class="logo">
        <img src="bufet-lacznik-blue.png" class="logo2">
            <h1>Bufet "Łącznik" - nasze menu</h1>
            <h3 id="dateParagraph"></h3>
            <script src="js/date.js"></script>
        </div>
        <div class="main_menu">
            <div class="menu"><a class="napis" href="index.php">Strona główna</a></div>
            <div class="menu"><a href="menu.php">Nasze menu</a></div>
            <div class="menu"><a href="products.php">Nasze produkty</a></div>
            <div class="menu"><a href="basket.php">Koszyk</a></div>
            <?php require "$phpPath/profileOrLogin.php"; ?>
        </div>
        <br><br><div class="left" style="clear: both;">
            <form action="menu.php" method="POST">
                <p>Wpisz wyszukiwany produkt z menu: <input type="text" name="menuQuery"></p>
                <input type="submit" value="Szukaj">
            </form>
            <?php require './php/displayMenu.php' ?>

            <!-- <h3>Nasze menu</h3>
            <h4>Kotlet mielony z ziemniakami</h4>
            <img src="" alt="Kotlet mielony z ziemniakami">
            <p>(...)</p>
            <h4>Domowy rosołek (jak od babci!)</h4>
            <img src="" alt="Rosół">
            <p>(...)</p>
            <h4>Spaghetti bolognese</h4>
            <img src="" alt="Spaghetti bolognese">
            <p>(...)</p>
            <h4>Panierowany filet z kurczaka z ziemniakami</h4>
            <img src="" alt="Panierowany filet z kurczaka z ziemniakami">
            <p>(...)</p>
        </div>
        <div class="right">
            <h3>Aktualnie w promocji!</h3>
            <h4>(...)</h4>
            <img src="" alt="(...)">
            <p>(...)</p>
        </div> -->
        <div class="footer">
            <h4>Autorzy:</h4>
            <ul>
                <li>Julian Rybarczyk</li>
                <li>Piotr Gierba</li>
                <li>Jacek Jędra</li>
                <li>Renata Sakhnevych</li>
            </ul>
            <h4>Źródła (dla strony menu):</h4>
            <ul>

            </ul>
        </div>
    </div>
    <marquee behavior="scroll" direction="right" class="plywtekst"><p>lacznik-zsl.pl</p></marquee>
</body>
</html>