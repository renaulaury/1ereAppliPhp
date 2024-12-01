<?php
session_start();


if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "add":
            if (isset($_POST['submit'])) { //vérif de la clé submit dans le tableau post du formulaire si elle existe elle enverra vraie
                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

                if ($name && $price && $qtt) { //Vérification parametre valides
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
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']); //converti en int
                // unset($_SESSION['products'][$id]);

                // Vérifie si le produit avec l'ID existe dans la session
                if (isset($_SESSION['products'][$id])) {
                    unset($_SESSION['products'][$id]); // Supprime le produit
                    $_SESSION['products'] = array_values($_SESSION['products']); // Réindexe le tableau
                }
            }
            break;

        case "clear":
            /* quand je clic ca supprime toutes les lignes*/
            $_SESSION['products'] = [];
            break;

        case "up-qtt":
            /*quand je clic ca ajoute 1*/
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);  // Récupère l'ID passé en URL

                if (isset($_SESSION['products'][$id])) {
                    $_SESSION['products'][$id]['qtt']++;  // Augmente la quantité de 1
                    $_SESSION['products'][$id]['total'] = $_SESSION['products'][$id]['price'] * $_SESSION['products'][$id]['qtt'];  // Recalcule le total
                }
            }
            break;

        case "down-qtt":
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);  // Récupère l'ID passé dans l'URL

                if (isset($_SESSION['products'][$id])) {
                    $_SESSION['products'][$id]['qtt']--;  // Diminue la quantité de 1
                    if ($_SESSION['products'][$id]['qtt'] <= 0) {
                        // Si la quantité est inférieure ou égale à 0, on supprime le produit
                        unset($_SESSION['products'][$id]);
                        $_SESSION['products'] = array_values($_SESSION['products']);  // Réindexe les produits après suppression
                    } else {
                        // Sinon, on met à jour le total
                        $_SESSION['products'][$id]['total'] = $_SESSION['products'][$id]['price'] * $_SESSION['products'][$id]['qtt'];
                    }
                }
            }
            break;
    }
}

header("location:recap.php");
