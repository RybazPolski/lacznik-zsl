<?php
    require "./dbaccess.php";
    $conn = new mysqli($adr,$usr,$pwd,$db);
    session_start();
    $id_k = $conn->query("SELECT `id` FROM `klienci` WHERE `login`='".$_SESSION['login']."' AND `haslo`=PASSWORD('".$_SESSION['password']."')")->fetch_object()->id;            
    
    $id = htmlentities($_POST['id'],ENT_QUOTES);
    $newVal = htmlentities($_POST['newVal'],ENT_QUOTES);

    if($newVal < 0){
        $conn->query("DELETE FROM `koszyk` WHERE `id_p`=$id AND `id_k`=$id_k");
        echo json_encode([
            'success' => false,
            'error' => "EJEJEJ! Liczba produktów nie może być ujemna. To Ty nam płacisz, a nie my Tobie! :P",
            'newAmount' => 0,
            'newPrice' => 0
        ]);
        $conn->close();
        exit();
    }else{
        if($res = $conn->query("SELECT `cena`,`zapas`,`promocja` FROM `produkty` WHERE `id`=$id")->fetch_object()){
            if($res->promocja > 0){
                $res->cena = $res->cena - $res->cena*(0.01*$res->promocja);
            }else{
                $res->cena = $res->cena;
                
            }
            $price = $res->cena;
            $zapas = $res->zapas;
            if($conn->query("SELECT * FROM `koszyk` WHERE `id_p`=$id AND `id_k`=$id_k")->num_rows==1){
                if($newVal==0){
                    if($conn->query("DELETE FROM `koszyk` WHERE `id_p`=$id AND `id_k`=$id_k")){
                        echo json_encode([
                            'price' => $price,
                            'success' => true,
                            'newAmount' => $newVal,
                            'newPrice' => $price*$newVal,
                            'newPayment' => 'Cena'
                        ]);
                        $conn->close();
                        exit();
                    }else{
                        echo json_encode([
                            'success' => false,
                            'error' => "Coś poszło nie tak. Spróbuj ponownie później.",
                            'newAmount' => $zapas,
                            'newPrice' => $price*$zapas
                        ]);
                        $conn->close();
                        exit();
                    };
                }else{
                    if($newVal<=$zapas){
                        if($conn->query("UPDATE `koszyk` SET `ilosc`=$newVal WHERE `id_p`=$id AND `id_k`=$id_k")){
                            echo json_encode([
                                'price' => $price,
                                'success' => true,
                                'newAmount' => $newVal,
                                'newPrice' => $price*$newVal,
                                'newPayment' => 'Cena'
                            ]);
                            $conn->close();
                            exit();
                        }else{
                            echo json_encode([
                                'success' => false,
                                'error' => "Coś poszło nie tak. Spróbuj ponownie później.",
                                'newAmount' => $zapas,
                                'newPrice' => $price*$zapas
                            ]);
                            $conn->close();
                            exit();
                        };

                    }else{
                        echo json_encode([
                            'success' => false,
                            'newAmount' => $zapas,
                            'newPrice' => $price*$zapas,
                            'error' => "Brak wystarczającej ilości produktów. Zapas wynosi $zapas sztuk."
                        ]);
                        $conn->close();
                        exit();
                    }
                }
            }else{
                if($conn->query("SELECT * FROM `koszyk` WHERE `id_p`=$id AND `id_k`=$id_k")->num_rows==0){
                    if($conn->query("INSERT INTO `koszyk`(`id_k`,`id_p`,`ilosc`) VALUES ($id_k,$id,$newVal)")){
                        echo json_encode([
                            'price' => $price,
                            'success' => true,
                            'newAmount' => $newVal,
                            'newPrice' => $price*$newVal,
                            'newPayment' => 'Cena'
                        ]);
                        $conn->close();
                        exit();
                    }else{
                        echo json_encode([
                            'success' => false,
                            'error' => "Coś poszło nie tak. Spróbuj ponownie później.",
                            'newAmount' => $zapas,
                            'newPrice' => $price*$zapas
                        ]);
                        $conn->close();
                        exit();
                    }
                }else{
                    echo json_encode([
                        'success' => false,
                        'error' => "Coś poszło nie tak. Spróbuj ponownie później.",
                        'newAmount' => $zapas,
                        'newPrice' => $price*$zapas
                    ]);
                    $conn->close();
                    exit();
                }
            };
        }else{
            echo json_encode([
                'success' => false,
                'error' => "Nie znaleziono produktu.",
                'newAmount' => "2137",
                'newPrice' => "N/A"
            ]);
            $conn->close();
            exit();
        };
    }
?>