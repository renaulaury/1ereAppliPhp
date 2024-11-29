<?php
session_start();

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

// header("location:index.php"); //si non renvoie index.php         
         

if(isset($_GET['action'])) {
    switch($_GET['action']) {
        case "add":
            //si je clique sur + qtt +1 
            $qtt = $qtt + 1;
           echo "<td><a class='lien' href='./traitement.php'>+</a>".$product['qtt']."<a class='lien' href='./traitement.php'>-</a></td>";
            
            // echo $qtt;
            break;
        case "delete"://sinon qtt -1
            echo "";
            break;
    }
}


header("location:traitement.php"); 




