<?php $phpPath='./php'; ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Łącznik Online - strona główna</title>
</head>
<body>
    <div class="main">
        <div class="baner">
        <img src="zsl-logo.png" class="logo">
        <img src="bufet-lacznik-blue.png" class="logo2">
            <div class="title"><b>Bufet "Łącznik" w Zespole Szkół Łączności im. Mikołaja Kopernika w Poznaniu</b></div>
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
            <h3>O nas:</h3>
            <p>(...)</p>
            <h4>Lokalizacja naszego bufetu na mapie:</h4>
            <iframe width="385" height="320" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=16.943618953228%2C52.42406212235238%2C16.94887608289719%2C52.42612298594392&amp;layer=mapnik" style="border: 1px solid black"></iframe>
            <br/><small><a href="https://www.openstreetmap.org/#map=19/52.42509/16.94625">Wyświetl większą mapę</a></small>
            <h4>Możliwości dojazdu do naszego bufetu: </h4>
            <ul>
                <li>Linie autobusowe: 167, 174, 190, 911</li>
                <li>Linia tramwajowa: 10</li>
            </ul>
        </div>
        <div class="right">
            <h3>Informacje o naszej firmie:</h3>
            <p>(...)</p>
        </div>
        <div class="footer">
            <h4>Autorzy:</h4>
            <ul>
                <li>Julian Rybarczyk</li>
                <li>Piotr Gierba</li>
                <li>Jacek Jędra</li>
                <li>Renata Sakhnevych</li>
            </ul>
            <h4>Źródła (dla strony głównej):</h4>
            <ul>

            </ul>
        </div>
    </div>
    <marquee behavior="scroll" direction="right" class="plywtekst"><p>lacznik-zsl.pl</p></marquee>
</body>
</html>