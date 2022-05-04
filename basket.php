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
        </div>
        <div class="main_menu">
            <div class="menu"><a href="index.php">Strona główna</a></div>
            <div class="menu"><a href="user.php">Logowanie/Rejestracja</a></div>
            <div class="menu"><a href="basket.php">Koszyk</a></div>
            <div class="menu"><a href="profile.php">Twój profil</a></div>
            <div class="menu"><a href="products.php">Nasze produkty</a></div>
            <div class="menu"><a href="menu.php">Nasze menu</a></div>
        </div>
        <div class="left">
            <h3>Zawartość Twojego koszyka</h3>
            <form action="" method="">
            <ol>
                <li></li><input class="pass" type="number" name="amount1" min="1">
                <li></li><input class="pass" type="number" name="amount2" min="1">
                <li></li><input class="pass" type="number" name="amount3" min="1">
            </ol>
            <p>Suma do zapłaty: <span name="payment"></span></p>
            <h3>Wybierz metodę płatności</h3>
            <p>Przy odbiorze<input type="radio" class="radio" name="paymentMethod" class="collection"></p>
            <p>Przelew tradycyjny<input type="radio" class="radio" name="paymentMethod" class="bankTransfer"></p>
            <p>BLIK<input type="radio" name="paymentMethod" class="radio" class="blik"></p>
            <p>Pole do wprowadzania ewentualnych uwag do zamówienia <input type="text" class="pass" name="comment"> (pole opcjonalne)</p>
            <input type="submit" class="button" value="Złóż zamówienie!" name="sub_order">
            </form>
        </div>
        <div class="right">
            <h3>(...)</h3>
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
    <marquee behavior="scroll" direction="right" class="plywtekst">bufet.zsl.pl</marquee>
</body>
</html>