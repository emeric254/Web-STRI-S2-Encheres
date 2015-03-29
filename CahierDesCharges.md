#Plate-forme d'enchère E-commerce
#Cahier des charges

Groupe :
* Rémi Barbaste
* Guillaume Boulic
* Robin Degironde
* Thomas Maury
* Émeric Tosi


##Introduction
Nous souhaitons réaliser une plate-forme d'enchères dans laquelle il sera possible à des particuliers de mettre en vente des produits aux enchères.
Ce document est réalisé afin de renseigner l'ensemble des fonctionnalités et contraintes qui devront être prises en compte lors de la réalisation de ce projet.


##Exemples de systèmes comparables
###Sites existants
- Ebay
- Amazon Market-places
- ...

###CMS E-commerce
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
    - ...

- Autres
    - https://www.phpprobid.com/
    - https://www.bigcommerce.com/
    - ...


##Profils/rôles d’utilisateurs
###Inconnu
C'est un visiteur non authentifié sur le site, il peut s'inscrire, et/ou s'il a un compte, se connecter pour devenir un *utilisateur*.
Il a également la possibilité de consulter et rechercher le profil d'un utilisateur ou une vente.

###Utilisateur
C'est un utilisateur lambda, connecté et donc authentifié grâce à un compte valide.

###Vendeur
C'est un *utilisateur* qui peut vendre.
Il gagne ce droit après validation de son compte par un *administrateur*.

###Administrateur
C'est un *utilisateur* qui, en plus de tous les droits de *vendeur*, a tous les pouvoirs sur le site.
Il peut par exemple supprimer un compte utilisateur ou supprimer une enchère.


##Fonctionnalités
###Modules/Sous-parties du site (et leurs fonctionnalités)
- Accueil avec affichage des nouveautés
- Inscription
- Connexion
- Recherche par nom, vendeur, type, ...
- Affichage des enchères en liste et/ou vignettes au choix
- Affichage des enchères, avec description, prix, vendeur
- Historique des actions sur une enchère
- Historique des ventes
- Système de commentaires
- Suivre un vendeur
- Note associée au profil utilisateur
- Gestion du compte
- Gestion des ventes
- Gestion du site
- Gestion des utilisateurs
- Système de backup dans l'interface administrateur

###Croquis illustrant certaines pages

###Droits relatifs à ces fonctionnalités et accès des profils/rôles d’utilisateur à ces droits
- inconnus
    - inscription
	- voir des enchères

- utilisateurs
    - connexion
    - gestion de son compte
    - voir et poster des commentaires
    - voir et poster des enchères sur des ventes
    - voir et poster des notes sur les profils utilisateurs
    - suivre des vendeurs
    - consulter l'historique des enchères sur les ventes
    - consulter l'historique des ventes qu'il a effectué
    - affichage des enchères en liste et/ou vignettes au choix
    - recherche par nom, vendeur, type, ...
    - affichage des enchères, avec description, prix, vendeur

- vendeur
    - tous les droits d'un *utilisateur*
    - gestion de ses ventes

- administrateur
    - tous les droits d'un *vendeur*
    - gestion des *utilisateurs* (et donc gestion des *vendeurs*)
    - gestion des différentes ventes
    - gestion des différents commentaires
    - gestion des différents historiques
    - système de backup dans l'interface administrateur
    - gestion totale du site


##Contraintes
###Techniques
- PHP
- PostgreSQL
- JavaScript
- HTML
- CSS

###Échéancier :
- Cahier des charges : dimanche 29 mars 2015
- Dossier de conception : jeudi 30 avril 2015
- Développement : jusqu'au mois de mai


##Scénario d’utilisation
###Création d'un nouveau compte
L'utilisateur commence par saisir les informations utiles afin de créer son compte, comme par exemple son adresse mail, son nom, son prenom, son mot de passe... puis une fois les informations vérifiée (comme le fait que l'adresse mail n'est pas déjà utilisée), l'utilisateur peut déposer une enchère sur une des ventes existante.

###Mise en vente d'un objet
Afin de mettre en vente un objet, il faut être identifié et être reconnu comme vendeur. Ensuite il y a un formulaire à remplir dans lequel on renseigne par exemple un nom, une description, des photographies, le prix de départ, le pas de l'enchère, la durée...

###Enchérir sur un objet
Une fois l'enchère sélectionnée, pour enchérir, il faut être identifié. Il suffit ensuite de saisir le prix que l'on souhaite mettre sur le produit et de valider pour que l'enchère soit prise en compte.
