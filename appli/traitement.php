<?php
session_start();

if (isset($_POST['submit'])) { //vérif de la clé submit dans le tableau post du formulaire
}                               // si elle existe elle enverra vraie

header("location:index.php"); //si non renvoie index.php
