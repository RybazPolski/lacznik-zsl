<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracja</title>
    <style>
        label, hr, input {
            color: #2b2d72;
        }
        .add {
            background-color: green;
            color: white;
        }
        .delete {
            background-color: red;
        }
        input {
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <h1>Strona administracji</h1>
    <form action="admin.php" method="POST">
        <h2>Zmiana/dodanie promocji:</h2><br>
        <label>Produkt: </label>
        <select name="sel">
            <?php 
                $conn = mysqli_connect('localhost','root','','lacznik');
                $wynik1 = $conn->query("SELECT nazwa FROM produkty");
                while($wiersz = $wynik1->fetch_assoc()){
                    echo "<option>";
                    echo $wiersz['nazwa'];
                    echo "</option>";
                }
                $conn->close();
            ?>
        </select><br>
        <label>Promocja: </label><input type="number" name="prom1"><br>
        <input type="submit" value="Wprowadź" class="add">
    </form><br><hr><br>
    <form action="admin.php" method="POST">
        <h2>Dodanie nowego produktu</h2>
        <label>Nazwa: </label><input type="text" name="nazwap"><br>
        <label>Cena: </label><input type="number" name="cena"><br>
        <label>Ilość w zapasie: </label><input type="number" name="zapas"><br>
        <label>Promocja: </label><input type="number" name="prom2"><br>
        <input type="submit" value="Wprowadź" class="add">
    </form><br><hr><br>
    <form action="admin.php" method="POST">
        <h2>Dodanie nowego dania do menu</h2>
        <label>Nazwa: </label><input type="text" name="nazwam"><br>
        <label>Dzień(1-5): </label><input type="number" name="dzien"><br>
        <label>Danie(1/2): </label><input type="number" name="danie"><br>
        <input type="submit" value="Wprowadź" class="add">
    </form><br><hr><br>
    <form action="admin.php" method="POST">
        <h2>Usunięcie produkt</h2>
        <label>Nazwa produktu: </label><select name="sel2">
            <?php 
                $conn = mysqli_connect('localhost','root','','lacznik');
                $wynik = $conn->query("SELECT nazwa FROM produkty");
                while($wiersz1 = $wynik->fetch_assoc()){
                    echo "<option>";
                    echo $wiersz1['nazwa'];
                    echo "</option>";
                }
                $conn->close();
            ?>
            </select><br>
            <input type="submit" value="Usuń" class="delete">
    </form><br><hr><br>
    <form action="admin.php" method="POST">
        <h2>Usunięcie danie z menu</h2>
        <label>Nazwa dania: </label><select name="sel3">
            <?php 
                $conn = mysqli_connect('localhost','root','','lacznik');
                $wynik2 = $conn->query("SELECT nazwa FROM menu");
                while($wiersz2 = $wynik2->fetch_assoc()){
                    echo "<option>";
                    echo $wiersz2['nazwa'];
                    echo "</option>";
                }
                $conn->close();
            ?>
            </select><br>
            <input type="submit" value="Usuń" class="delete">
    </form><br><hr><br>
    <form action="admin.php" method="POST">
        <h2>Dodanie nowego administratora</h2>
        <label>Login: </label><input type="text" name="login"><br>
        <label>Hasło: </label><input type="text" name="haslo"><br>
        <label>Imię: </label><input type="text" name="name"><br>
        <label>Nazwisko: </label><input type="text" name="surname"><br>
        <input type="submit" value="Wprowadź" class="add">
    </form>
    <?php 
        $conn = mysqli_connect('localhost','root','','lacznik');
        if(isset($_POST['sel']) && isset($_POST['prom1'])){
            $sel = $_POST['sel'];
            $prom1 = $_POST['prom1'];
            $q1 = "UPDATE produkty
            SET promocja = $prom1 WHERE nazwa LIKE '$sel';";
            $conn->query($q1);
        }
        if(isset($_POST['nazwap']) && isset($_POST['cena']) && isset($_POST['zapas']) && isset($_POST['prom2'])){
            $nazwap = $_POST['nazwap'];
            $cena = $_POST['cena'];
            $zapas = $_POST['zapas'];
            $prom2 = $_POST['prom2'];
            $a = 0;

            $wynik3 = $conn->query("SELECT * FROM produkty");
            while($wiersz3 = $wynik3->fetch_assoc()){
                if($nazwap == $wiersz3['nazwa']){
                    $a++;
                }
            }
            if($a == 0){
                $q2 = "INSERT INTO produkty(nazwa, cena, zapas, promocja)
                VALUES
                ('$nazwap','$cena','$zapas','$prom2');";
                $conn->query($q2);
            }
        }
        if(isset($_POST['nazwam']) && isset($_POST['dzien']) && isset($_POST['danie'])){
            $nazwam = $_POST['nazwam'];
            $dzien = $_POST['dzien'];
            $danie = $_POST['danie'];
            $b=0;

            $wynik4 = $conn->query("SELECT * FROM menu");


            while($wiersz4 = $wynik4->fetch_assoc()){
                if($nazwam == $wiersz4['nazwa']){
                    $b++;
                }
            }
            if($b==0){
                $q3 = "INSERT INTO menu(nazwa, dzien, danie)
            VALUES
            ('$nazwam','$dzien','$danie');";
            $conn->query($q3);
            } 
        }
        if(isset($_POST['sel2'])){
            $sel2 = $_POST['sel2'];
            $q4 = "DELETE FROM produkty WHERE nazwa LIKE '$sel2'";

            $conn->query($q4);
        }
        if(isset($_POST['sel3'])){
            $sel3 = $_POST['sel3'];
            $q5 = "DELETE FROM menu WHERE nazwa LIKE '$sel3'";

            $conn->query($q5);
        }
        if(isset($_POST['login']) && isset($_POST['haslo']) && isset($_POST['name']) && isset($_POST['surname'])){
            $login = $_POST['name'];
            $haslo = $_POST['haslo'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $c = 0;

            $q6 = "SELECT * FROM administracja";
            $wynik4 = $conn->query($q6);
            while($wiersz5 = $wynik5->fetch_assoc()){
                if($login == $wiersz5['login']){
                    $c++;
                }
                if($name == $wiersz5['imie']){
                    $c++;
                }
                if($surname == $wiersz5['nazwisko']){
                    $c++;
                }
            }
            if($a == 0){
                $q7 = "INSERT INTO administracja(login, haslo, imie, nazwisko)
                VALUES
                ('$login','$haslo','$name','$surname');";
                $conn->query($q7);
            }
        }
        $conn->close();
    ?>
</body>
</html>