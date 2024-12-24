<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/styles.css">
    <title>Récap des produits</title>
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

    <main id="recap">
        <h1>Récapitulatif de commande</h1>

        <div class="commande">

            <?php
            if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
                echo "<p>Aucun produit en session...</p>";
            } else {
                echo "<table>",
                "<thead class='entete'>",
                "<tr>",
                "<th>#</th>",
                "<th>Nom</th>",
                "<th>Prix</th>",
                "<th>Quantité</th>",
                "<th>Total</th>",
                "</tr>",
                "</thead>",
                "<tbody>";

                $totalGeneral = 0;

                foreach ($_SESSION['products'] as $index => $product) {
                    echo "<tr>",
                    "<td>" . $index . "</td>",
                    "<td>" . $product['name'] . "</td>",
                    "<td>" . number_format($product['price'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
                    // "<td>".$product['price']."</td>",
                    "<td><a class='lien' href='traitement.php?action=up-qtt&id=$index'>+</a>" . $product['qtt'] . "<a class='lien' href='traitement.php?action=down-qtt&id=$index'>-</a></td>",
                    "<td>" . number_format($product['total'], 2, ",", "&nbsp;") . "&nbsp;€</td>",
                    // "<td>".$product['total']."</td>",
                    "<td class='col'><a class='lien' href='traitement.php?action=delete&id=$index'><i class='fa-solid fa-trash'></i></td>",
                    "</tr>";
                    $totalGeneral += $product['total'];
                }

                echo "<tr class='tot'>",
                "<td colspan=4 class='total'>Total Général : </td>",
                "<td><strong>" . number_format($totalGeneral, 2, ",", "&nbsp"), "&nbsp;€</strong></td>",
                "<td class='col'><a class='lien' href='traitement.php?action=clear'><i class='fa-solid fa-dumpster-fire'></i></td>",
                "</tr>",
                "</tbody>",
                "</table>";
            }

            ?>
        </div>
    </main>


</body>

</html>