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
    <div id="main">
        <div id="baner">
            <img src="zsl-logo.png" id="logo">
            <img src="bufet-lacznik-blue.png" id="logo2">
            <h1>Bufet "Łącznik" - Twój koszyk</h1>
        </div>
        <div id="main_menu">
            <div id="menu"><a href="index.php">Strona główna</a></div>
            <div id="menu"><a href="user.php">Logowanie/Rejestracja</a></div>
            <div id="menu"><a href="basket.php">Koszyk</a></div>
            <div id="menu"><a href="profile.php">Twój profil</a></div>
            <div id="menu"><a href="products.php">Nasze produkty</a></div>
            <div id="menu"><a href="menu.php">Nasze menu</a></div>
        </div>
        <div id="left">
            <h3>Zawartość Twojego koszyka</h3>
            <form action="" method="">
            <ol>
                <li></li><input id="pass" type="number" name="amount1" min="1">
                <li></li><input id="pass" type="number" name="amount2" min="1">
                <li></li><input id="pass" type="number" name="amount3" min="1">
            </ol>
            <p>Suma do zapłaty: <span name="payment"></span></p>
            <h3>Wybierz metodę płatności</h3>
            <p>Przy odbiorze<input type="radio" id="radio" name="paymentMethod" id="collection"></p>
            <p>Przelew tradycyjny<input type="radio" id="radio" name="paymentMethod" id="bankTransfer"></p>
            <p>BLIK<input type="radio" name="paymentMethod" id="radio" id="blik"></p>
            <p>Pole do wprowadzania ewentualnych uwag do zamówienia <input type="text" id="pass" name="comment"> (pole opcjonalne)</p>
            <input type="submit" id="button" value="Złóż zamówienie!" name="sub_order">
            </form>
        </div>
        <div id="right">
            <h3>(...)</h3>
        </div>
        <div id="footer">
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
    <marquee behavior="scroll" direction="right" id="plywtekst">bufet.zsl.pl</marquee>
</body>
</html>