#Cahier des charges

##Introduction/présentation

##Exemple de systèmes comparables

##Profils/rôles d’utilisateurs

##Fonctionnalités

###Modules/sous-parties du site (et leurs fonctionnalités)
- page d'accueil avec nouveautés
- inscription
- connexion
- gestion de compte
- gestion des ventes
- gestion du site
- gestion utilisateurs
- système de backup dans l'interface administrateur
- commentaires
- note sur profil utilisateur
- suivre un vendeur
- historique des actions sur une enchère
- historique des ventes
- affichage des enchères en liste et/ou vignettes au choix
- recherche par nom, vendeur, type, ...
- affichage des enchères, avec prix, vendeur

###Croquis illustrant certaines pages

###Droits relatifs à ces fonctionnalités et accès des profils/rôles d’utilisateur à ces droits
- inconnus
    - inscription

- utilisateurs
    - connexion
    - gestion de compte
    - commentaires
    - note sur profil utilisateur
    - suivre un vendeur
    - historique des actions sur une enchère
    - historique des ventes
    - affichage des enchères en liste et/ou vignettes au choix
    - recherche par nom, vendeur, type, ...
    - affichage des enchères, avec prix, vendeur

- vendeur
    - tout les droits utilisateur
    - gestion des ventes

- administrateur
    - tout les droits d'un vendeur
    - gestion du site
    - gestion utilisateurs
    - système de backup dans l'interface administrateur

##Contraintes

##Scénario d’utilisation





-affichage des enchères, avec prix, vendeur
--vente par région
--vente par catégorie
-connexion pas adresse mail
-différents types de compte ( acheteur, vendeur, admin )
-rajout de 15min si moins de 15min restante


-AJAX/Web socket ( utilisation de Jquery, contrôle de saisie )
--notification
---enchère supérieurs effectuer
---fin d'enchère, où l'on a participé ou si l'on est vendeur
---nouveau commentaire sur sont profil, ou sur commentaire d'une enchère où l'on a commenté
-responsive ( bootstrap)
-(diaspora) ez?
-système d'enchère avec un pas : lorsqu'une enchère est faite, le prix affiché est de l'ancien prix + le pas, l'enchère max de l'utilisateurs est retenu.



vendeur rentre RIB
gestion des paiement par affichage du rib, et validation du paiement par l'acheteur.




INFORMATION D'un compte
nom
prenom
adresse
mail
telephone
photo de profil facultatif
commentaire sur un profil


INFORMATION d'une enchere
titre
quantité
description
catégorie
prix de départ
une ou plusieurs photos
historique de l'enchere
prix actuel
temps restant
état objet
commentaire sur l'enchére
lieu
méthode de livraison


CATEGORIES :
titre
description

possibilité de sous catégorie




spec technique imposé par le sujet :
-PHP avec objet ( PDO )
-postgreSQL
-js
-html
-css



