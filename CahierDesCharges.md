#Cahier des charges<br/>Plateforme d'enchère distribuées

Groupe :
* Guillaume Boulic
* Robin Degironde
* Thomas Maury
* Emeric Tosi
* Rémi Barbaste

##Introduction
Nous souhaitons réaliser une plateforme d'enchère distribuée dans laquelle il sera possible à des particuliers de mettre en vente des produits au enchères. Ce document est réalisé afin de renseigner l'ensemble des fonctionnalités et contraintes qui devront être prise en compte lors de la réalisation de ce projet.

##Exemple de systèmes comparables
###Site(s) existant(s)
- Ebay

###CMS e-commerce
- Open-Sources
    - https://www.prestashop.com/
    - http://www.seotoaster.com/
    - http://www.oscmax.com/
    - http://alegrocart.com/
    - http://www.zen-cart.com/
    - http://www.opencart.com/
    - https://onxshop.com/
    - http://www.oscommerce.com/
    - http://magento.com/

- Autres
    - https://www.phpprobid.com/
    - https://www.bigcommerce.com/


##Profils/rôles d’utilisateurs
###Inconnu
C'est un visiteur non authentifié sur le site, il peut s'inscrire, ou s'il a déjà un compte, se connecter pour devenir un *utilisateur*.

###Utilisateur
C'est un utilisateur lambda, connecté et donc authentifié grâce a un compte valide.

###Vendeur
C'est un *utilisateur* qui peut vendre. Il gagne ce droit après validation de son compte par un *administrateur*.

###Administrateur
C'est un *utilisateur* qui en plus de tous les droits de *vendeur*, a tous les pouvoirs sur le site. Il peut par exemple supprimer un compte utilisateur ou supprimer une enchère.

##Fonctionnalités

###Modules/Sous-parties du site (et leurs fonctionnalités)
- Page d'accueil avec affichage des nouveautés
- Inscription
- Connexion
- Gestion du compte
- Gestion des ventes
- Gestion du site
- Gestion d'utilisateurs
- Système de backup dans l'interface administrateur
- Commentaires
- Note associée au profil utilisateur
- Suivre un vendeur
- Historique des actions sur une enchère
- Historique des ventes
- Affichage des enchères en liste et/ou vignettes au choix
- Recherche par nom, vendeur, type, ...
- Affichage des enchères, avec description, prix, vendeur

###Croquis illustrant certaines pages

###Droits relatifs à ces fonctionnalités et accès des profils/rôles d’utilisateur à ces droits
- inconnus
    - inscription

- utilisateurs
    - connexion
    - gestion du compte
    - commentaires
    - note sur profil utilisateur
    - suivre un vendeur
    - historique des actions sur une enchère
    - historique des ventes
    - affichage des enchères en liste et/ou vignettes au choix
    - recherche par nom, vendeur, type, ...
    - affichage des enchères, avec description, prix, vendeur

- vendeur
    - tous les droits d'utilisateur
    - gestion de ses ventes

- administrateur
    - tous les droits d'un vendeur
    - gestion utilisateurs
    - gestion vendeurs
    - gestion ventes
    - gestion commentaires
    - gestion historiques
    - système de backup dans l'interface administrateur
    - gestion totale du site

##Contraintes
###Techniques
- PHP
- PostgreSQL
- JavaScript
- HTML
- CSS

###Autres
Echéancier :
- Cahier des charges : dimanche 29 mars 2015
- Dossier de conception : jeudi 30 avril 2015
- Developpement : jusqu'au mois de mai

##Scénario d’utilisation

###Création d'un nouveau compte

L'utilisateur commence par saisir les informations utiles afin de créer son compte, comme par exemple son adresse mail, son nom, son prenom, son mot de passe... puis une fois les informations vérifiée (comme le fait que l'adresse mail n'est pas déjà utilisée), l'utilisateur peut déposer une enchère sur une des ventes existante.

###Mise en vente d'un objet

Afin de mettre en vente un objet, il faut être identifié et être reconnu comme vendeur. Ensuite il y a un formulaire à remplir dans lequel on renseigne par exemple un nom, une description, des photographies, le prix de départ, le pas de l'enchère, la durée... 

###Enchérir sur un objet

Une fois l'enchère sélectionnée, pour enchérir, il faut être identifié. Il suffit ensuite de saisir le prix que l'on souhaite mettre sur le produit et de valider pour que l'enchère soit prise en compte.



-affichage des enchères, avec description, prix, vendeur
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




INFORMATION d'un compte
nom
prenom
adresse
mail
téléphone
photo de profil (facultative)
commentaire sur un profil


INFORMATION d'une enchere
titre
quantité
description
catégorie
prix de départ
une ou plusieurs photos
historique de l'enchère
prix actuel
temps restant
état objet
commentaire sur l'enchère
lieu
méthode de livraison


CATEGORIES :
titre
description

possibilité de sous-catégorie







