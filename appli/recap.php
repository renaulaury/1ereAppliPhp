<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./styles.css" rel="stylesheet">
    <title>Récap des produits</title>
</head>
<body>
<?php 
    if(!isset($_SESSION['products']) || empty($_SESSION['products'])) {
        echo "<p>Aucun produit en session...</p>";
    }  else {
        echo "<table>",
            "<thead>",
                "<tr>",
                    "<th>#</th>",
                    "<th>Nom</th>",
                    "<th>Prix</th>",
                    "<th>Quantité</th>",
                    "<th>Total</th>",
                "</tr>",
            "</thead>",
        "<tbody>";

        foreach($_SESSION['products'] as $index => $product) {
            echo "<tr>",
                    "<td>".$index."<td>",
                    "<td>".$product['name']."<td>",
                    "<td>".$product['price']."<td>",
                    "<td>".$product['qtt']."<td>",
                    "<td>".$product['total']."<td>",
                 "<tr>";
        }

        echo "</table>",
        "</tbody>";
    }
?>


</body>
</html>