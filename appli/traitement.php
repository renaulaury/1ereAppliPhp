<?php
session_start();
 
         
if(isset($_GET['action'])) {
    switch($_GET['action']) {
        case "add":
            if (isset($_POST['submit'])) { //vérif de la clé submit dans le tableau post du formulaire si elle existe elle enverra vraie
                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
            
                if($name && $price && $qtt) { //Vérification parametre valides
                    $product = [
                        "name" => $name,
                        "price" => $price,
                        "qtt" => $qtt,
                        "total" => $price * $qtt
                    ];
                    $_SESSION['products'][] = $product;
                }
            }    
            
            header("location:index.php"); //si non renvoie index.php  
            break;  

        case "delete":
            /* quand je clique ca supprime l'index */
            // $product[$index] = [];
           
            break;

        case "clear":
            /* quand je clic ca supprime toutes les lignes*/
                $_SESSION['products'] = [];
            break;

        case "up-qtt":
            /*quand je clic ca ajoute 1*/

            // $product['qtt'] = $product['qtt'] + 1;
           
            break;

        case "down-qtt":

            break;
    }
}

header("location:recap.php"); 




