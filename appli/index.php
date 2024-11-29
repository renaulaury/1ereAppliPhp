<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Ajout produit</title>
</head>

<body>
    <header>
        <nav id="navbar">
            <ul>
                <li><a href="./index.php">Index</a></li>
                <li><a href="./recap.php">Recap</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <h1>Ajouter un produit</h1>

        <div class="formulaire">
            <form action="traitement.php" method="post">                

                <p class='panier'>Produits dans le panier :
                <?php   
                        $totalQtt = 0;
                        if(!isset($_SESSION['products']) ||  empty($_SESSION['products'])) {
                            echo $totalQtt;
                        } else {
                            //tu m affiches la quantité x nb de lignes                        
                            foreach($_SESSION['products'] as $product) {
                                $totalQtt += $product['qtt'];
                            }
                            echo $totalQtt;
                            // var_dump($_SESSION['products']);
}               ?>
                </p>
                
                <p>
                    <label>Nom du produit :
                        <input type="text" name="name">
                    </label>
                </p>

                <p>
                    <label>Prix du produit :
                        <input type="number" step="any" name="price">
                    </label>
                </p>

                <p>
                    <label>Quantité désirée :                   
                        <input type="number" name="qtt" value="1">
                    </label>
                </p>

                <p>
                    <input type="submit" name="submit" value="Ajouter le produit">
                </p>
            </form>
        </div>
    </main>

</body>

</html>