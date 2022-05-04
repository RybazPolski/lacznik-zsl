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
            <h3>Twoje dane:</h3>
            <p>Login i nazwa:<span name="login"></span> <span name="username"></span></p>
            <h4>Zmiana nazwy użytkownika:</h4>
            <form action="profile.php" method="">
                <p>Podaj starą nazwę użytkownika: </p><input type="text" class="pass" name="old_username">
                <p>Podaj hasło: </p><input type="text" class="pass" name="current_password">
                <p>Podaj nową nazwę użytkownika: </p><input type="text" class="pass" name="new_username">
                <p><input type="submit" class="button" name="change_username" value="Zmień nazwę użytkownika"></p>
            </form>
            <h4>Zmiana hasła użytkownika:</h4>
            <form action="profile.php" method="">
                <p>Podaj nazwę użytkownika: </p><input type="text"id="pass" name="username">
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
            <h3>Usuwanie konta</h3>
            <form action="profile.php" method="">
                <p>Podaj nazwę użytkownika: </p><input type="text" class="pass" name="username">
                <p>Podaj hasło: </p><input type="text" class="pass" name="current_password1">
                <p>Podaj ponownie hasło: </p><input type="text" class="pass" name="current_password2">
                <p>Potwierdź chęć usunięcia konta: </p><input type="checkbox" name="confirm_deleting_account">
                <h4>UWAGA! Tej operacji <b>NIE DA SIĘ</b> cofnąć!!!</h4>
                <p><input type="submit" class="button" name="delete_account" value="Usuń bezpowrotnie konto"></p>
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
            <h4>Źródła (dla strony o profilu):</h4>
            <ul>

            </ul>
        </div>
    </div>
    <marquee behavior="scroll" direction="right" class="plywtekst"><p>lacznik-zsl.pl</p></marquee>
</body>
</html>