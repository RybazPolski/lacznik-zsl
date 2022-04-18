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
            <h1>Bufet "Łącznik" - Twój koszyk</h1>
        </div>
        <div id="main_menu">
            <div id="menu"><a href="user.html">Logowanie/Rejestracja</a></div>
            <div id="menu"><a href="basket.html">Koszyk</a></div>
            <div id="menu"><a href="profile.html">Twój profil</a></div>
            <div id="menu"><a href="products.html">Nasze produkty</a></div>
            <div id="menu"><a href="menu.html">Nasze menu</a></div>
        </div>
        <div id="left">
            <h3>Zawartość Twojego koszyka</h3>
            <form action="" method="">
            <ol>
                <li></li><input type="number" name="amount1" min="1">
                <li></li><input type="number" name="amount2" min="1">
                <li></li><input type="number" name="amount3" min="1">
            </ol>
            <p>Suma do zapłaty: <span name="payment"></span></p>
            <h3>Wybierz metodę płatności</h3>
            <p>Przy odbiorze<input type="radio" name="paymentMethod" id="collection"></p>
            <p>Przelew tradycyjny<input type="radio" name="paymentMethod" id="bankTransfer"></p>
            <p>BLIK<input type="radio" name="paymentMethod" id="blik"></p>
            <p>Pole do wprowadzania ewentualnych uwag do zamówienia <input type="text" name="comment"> (pole opcjonalne)</p>
            <input type="submit" value="Złóż zamówienie!" name="sub_order">
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
            <h4>Źródła (dla strony głównej):</h4>
            <ul>

            </ul>
        </div>
    </div>
</body>
</html>