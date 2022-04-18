<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Łącznik Online - strona logowania i rejestracji</title>
</head>
<body>
    <div id="main">
        <div id="baner">
            <h1>Bufet "Łącznik" - Logowanie i rejestracja</h1>
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
            <h3>Logowanie:</h3>
            <form action="./php/login.php" method="POST">
                <label for="login">Login: </label><input type="text" name="login" required><br>
                <label for="pass">Hasło: </label><input type="password" name="pass" required><br>
                <input type="submit" name="submitLogin">
            </form>
        </div>
        <div id="right">
            <h3>Rejestracja nowego konta:</h3>
            <form action="./php/register.php" method="POST">
                <label for="login">Login: </label><br><input type="text" name="login" required><br>
                <label for="username">Nazwa profilu:<sub>(możesz później ją zmienić)</sub></label><br><input type="text" name="username"><br>
                <label for="pass">Hasło: </label><br><input type="password" name="pass" required><br>
                <label for="pass2">Powtórz hasło:<sub>(wiem, irytujące ale trzeba)</sub> </label><br><input type="password" name="pass2" required><br>
                <input type="submit" name="submitRegister">
             </form>
        </div>
        <div id="footer">
            <h4>Autorzy:</h4>
            <ul>
                <li>Julian Rybarczyk</li>
                <li>Piotr Gierba</li>
                <li>Jacek Jędra</li>
                <li>Renata Sakhnevych</li>
            </ul>
            <h4>Źródła (dla strony logowania i rejestracji):</h4>
            <ul>

            </ul>
        </div>
    </div>
</body>
</html>