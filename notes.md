doit permettre a un user de renseigner différents produits par le biais d'un formulaire
produits consultables sur une page récapitulative

> enregistrement en session pour chaque produit

--- index.php
> nom produit
> prix
> quantité

---traitement.php
>traitera requete de index.php
> ajoute produit avec nom, prix, quantité et total calculé en session 

--- recap.php
> affichera tous les produits en session et en détail
> présentera le total général de tous les produits ajoutés


session_start() : 
- demarrer une session sur le serveur pour le user 
- recup sa session grace qu cookie PHPESSID (un cookie expire apres fermeture du nav)
