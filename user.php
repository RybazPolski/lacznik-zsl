<?php $phpPath='./php'; ?>
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
    <div class="main">
        <div class="baner">
        <img src="zsl-logo.png" class="logo">
        <img src="bufet-lacznik-blue.png" class="logo2">
            <h1>Bufet "Łącznik" - Logowanie i rejestracja</h1>
        </div>
        <div class="main_menu">
            <div class="menu"><a class="napis" href="index.php">Strona główna</a></div>
            <div class="menu"><a href="menu.php">Nasze menu</a></div>
            <div class="menu"><a href="products.php">Nasze produkty</a></div>
            <div class="menu"><a href="basket.php">Koszyk</a></div>
            <?php include "$phpPath/profileOrLogin.php"; 
                if(isLoggedIn()){
                    header('Location: profile.php');
                }
            ?>
        </div>
        <br><br><div class="left" style="clear: both;">
            <h3>Logowanie:</h3>
            <form action="./php/login.php" method="POST">
                <label for="login">Login: </label><input type="text" class="pass" name="login" required><br>
                <label for="pass">Hasło: </label><input type="password" class="pass" name="pass" required><br>
                <input type="checkbox" name="remember"> <label for="remember">Nie wylogowuj mnie</label><br>
                <span style="color:red;" class="error"><?php displayFromGET('loginError'); ?></span><br>
                <input type="submit" class="button" value="Zaloguj" name="submitLogin">
            </form>
        </div>
        <div class="right">
            <h3>Rejestracja nowego konta:</h3>
            <form action="./php/register.php" method="POST">
                <label for="login">Login:<span style="color:red;">*</span> </label><br><input type="text" class="pass" name="login" required><br>
                <label for="username">Nazwa profilu:<sub>(możesz później ją zmienić)</sub></label><br><input type="text" class="pass" name="username"><br>
                <label for="pass">Hasło:<span style="color:red;">*</span> </label><br><input type="password" name="pass" class="pass" required><br>
                <label for="pass2">Powtórz hasło:<span style="color:red;">*</span><sub>(wiem, irytujące ale trzeba)</sub> </label><br><input type="password" class="pass" name="pass2" required><br>
                <span style="color:red;" class="error"><?php displayFromGET('registerError'); ?></span><br>
                <input type="submit" class="button" value="Zarejestruj" name="submitRegister">
             </form>
        </div>
        <div class="footer">
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
    <marquee behavior="scroll" direction="right" class=""><p> lacznik-zsl.pl</p></marquee>
</body>
</html>