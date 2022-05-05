<?php

    if(!isset($phpPath)){$phpPath = ".";}

    function checkInput($input_name,$method)
    {
        if($method=='GET'){
            if(isset($_GET[$input_name])&&!empty($_GET[$input_name])){
                return true;
            }
        }elseif($method=='POST'){
            if(isset($_POST[$input_name])&&!empty($_POST[$input_name])){
                return true;
            }
        }else{
            return false;
        }
    }
    function displayFromGET($key){
        if(checkInput($key,'GET')){
            echo $_GET[$key];
        }
    }

    function findUnallowed($string,$allowedCharacters=['0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','_']){
        // $allowedCharacters = ['0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','_'];
        foreach($allowedCharacters as $character){
            echo $character;
            if(strpos($string,$character)===false){
                return false;
            }
        };
        return true;
    }

    function isLoggedIn(){
        require "dbaccess.php";
        if(session_status()!=PHP_SESSION_ACTIVE)session_start();
        if(isset($_SESSION['authorized'])&&$_SESSION['authorized']){

            $login = htmlentities($_SESSION['login'], ENT_QUOTES);
            $pass = htmlentities($_SESSION['password'], ENT_QUOTES);    
            $q = "SELECT * FROM `klienci` WHERE `login`='$login' AND `haslo`=PASSWORD('$pass')";
        
            if(!isset($phpPath)){$phpPath = ".";}
            $conn = new mysqli($adr,$usr,$pwd,$db);
            $res = $conn->query($q);
            if($res->num_rows==1){
                $conn->close();
                return true;
            }else{
                if(isset($_COOKIE['remember'])&&$_COOKIE['remember']){
                    $login = htmlentities($_COOKIE['login'], ENT_QUOTES);
                    $pass = htmlentities($_COOKIE['password'], ENT_QUOTES);    
                    $q = "SELECT * FROM `klienci` WHERE `login`='$login' AND `haslo`=PASSWORD('$pass')";

                    $res = $conn->query($q);
                    $conn->close();
                    if($res->num_rows==1){
                        $_SESSION['authorized'] = true;
                        $_SESSION['login'] = $login;
                        $_SESSION['password'] = $pass;
                        return true;
                    }else{
                        return false;
                    }

                }
                return false;
            };
            
        }else{
            if(isset($_COOKIE['remember'])&&$_COOKIE['remember']){
                $login = htmlentities($_COOKIE['login'], ENT_QUOTES);
                $pass = htmlentities($_COOKIE['password'], ENT_QUOTES);    
                $q = "SELECT * FROM `klienci` WHERE `login`='$login' AND `haslo`=PASSWORD('$pass')";

                $conn = new mysqli($adr,$usr,$pwd,$db);
                $res = $conn->query($q);
                $conn->close();
                if($res->num_rows==1){
                    $_SESSION['authorized'] = true;
                    $_SESSION['login'] = $login;
                    $_SESSION['password'] = $pass;
                    return true;
                }else{
                    return false;
                }

            }
        };
    }

?>