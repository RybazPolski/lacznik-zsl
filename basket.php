<?php $phpPath='./php'; ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Łącznik Online - Twój koszyk</title>
</head>
<body>
    <div class="main">
        <div class="baner">
            <img src="zsl-logo.png" class="logo">
            <img src="bufet-lacznik-blue.png" class="logo2">
            <h1>Bufet "Łącznik" - Twój koszyk</h1>
            <h3 id="dateParagraph"></h3>
            <script src="js/date.js"></script>
        </div>
        <div class="main_menu">
        <div class="menu"><a class="napis" href="index.php">Strona główna</a></div>
            <div class="menu"><a href="menu.php">Nasze menu</a></div>
            <div class="menu"><a href="products.php">Nasze produkty</a></div>
            <div class="menu"><a href="basket.php">Koszyk</a></div>
            <?php require "$phpPath/profileOrLogin.php"; 
            if(!isLoggedIn()){
                header('Location: user.php?loginError=Zaloguj się aby dodać coś do koszyka!');
            }?>
        </div>
        <br><br><div class="left" style="clear: both;">
            <h3>Zawartość Twojego koszyka</h3>
            <?php require "./php/displayCart.php" ?>
        </div>
        <div class="footer">
            <h4>Autorzy:</h4>
            <ul>
                <li>Julian Rybarczyk</li>
                <li>Piotr Gierba</li>
                <li>Jacek Jędra</li>
                <li>Renata Sakhnevych</li>
            </ul>
            <h4>Źródła (dla strony koszyka):</h4>
            <ul>
            </ul>
        </div>
    </div>
    <marquee behavior="scroll" direction="right" class="plywtekst">lacznik-zsl.pl</marquee>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/updateCart.js"></script>
    <script>
        var msg = new URL(window.location.href).searchParams.get('msg')
        if(msg!=null){
            alert(msg)
        }
        

    </script>
</body>
</html>