<?php $phpPath='./php'; ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Łącznik Online - lista naszych produktów</title>
</head>
<body>
    <div class="main">
        <div class="baner">
        <img src="zsl-logo.png" class="logo">
        <img src="bufet-lacznik-blue.png" class="logo2">
            <h1>Bufet "Łącznik" - nasze produkty</h1>
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
            <form action="products.php" method="GET">
                <p>Wpisz wyszukiwany produkt: <input type="text" name="productQuery" value="<?php
                if(isset($_GET['productQuery'])&&!empty($_GET['productQuery'])) echo htmlentities($_GET['productQuery'],ENT_QUOTES);
                ?>"></p>
                <input class="button" type="submit" value="Szukaj">
            </form>
            <h2>Aktualnie w promocji!</h2>
            <?php require './php/displayPromo.php' ?>    
        </div>
        <div class="right">
            <h2>Wszystkie produkty</h2>
            <?php require './php/displayProducts.php' ?>
        </div>
        <div class="footer">
            <h4>Autorzy:</h4>
            <ul>
                <li>Julian Rybarczyk</li>
                <li>Piotr Gierba</li>
                <li>Jacek Jędra</li>
                <li>Renata Sakhnevych</li>
            </ul>
            <h4>Źródła (dla strony produkty):</h4>
            <ul>

            </ul>
        </div>
    </div>
    <marquee behavior="scroll" direction="right" class="plywtekst"><p>lacznik-zsl.pl</p></marquee>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/addToCart.js"></script>
</body>
</html>