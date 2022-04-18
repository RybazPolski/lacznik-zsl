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
    <form action="./php/login.php" method="POST">
        <label for="login">Login: </label><input type="text" name="login" required><br>
        <label for="pass">Hasło: </label><input type="password" name="pass" required><br>
        <input type="submit" name="submitLogin">
    </form>
    <hr>
    <form action="./php/register.php" method="POST">
        <label for="login">Login: </label><br><input type="text" name="login" required><br>
        <label for="username">Nazwa profilu:<sub>(możesz później ją zmienić)</sub></label><br><input type="text" name="username"><br>
        <label for="pass">Hasło: </label><br><input type="password" name="pass" required><br>
        <label for="pass2">Powtórz hasło:<sub>(wiem, irytujące ale trzeba)</sub> </label><br><input type="password" name="pass2" required><br>
        <input type="submit" name="submitRegister">
    </form>
</body>
</html>