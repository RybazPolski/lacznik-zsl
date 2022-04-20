<?php
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

?>