DROP TABLE IF EXISTS encherir ;
DROP TABLE IF EXISTS annonce ; 
DROP TABLE IF EXISTS categorie ; 
DROP TABLE IF EXISTS utilisateur ; 
DROP TABLE IF EXISTS statut ;
DROP TABLE IF EXISTS ville ; 
 
CREATE TABLE ville (
  idVille SERIAL NOT NULL PRIMARY KEY,
  nomVille VARCHAR(4096) NOT NULL,
  codePostalVille VARCHAR(4096) NOT NULL
);  
 
CREATE TABLE statut (
	idStatut SERIAL NOT NULL PRIMARY KEY,
	nomStatut VARCHAR(4096) NOT NULL,
	descriptionStatut VARCHAR(4096)
) ;

CREATE TABLE utilisateur (
	idUtilisateur SERIAL NOT NULL PRIMARY KEY,
	emailUtilisateur VARCHAR(4096) NOT NULL, 
	nomUtilisateur VARCHAR(4096) NOT NULL, 
	prenomUtilisateur VARCHAR(4096) NOT NULL, 
	telephoneUtilisateur VARCHAR(4096) NOT NULL, 
	adresseUtilisateur VARCHAR(4096), 
	urlPhotoUtilisateur VARCHAR(4096), 
	mdpUtilisateur VARCHAR(4096) NOT NULL, 
	idVille SERIAL NOT NULL, 
	idStatut SERIAL NOT NULL,

	CONSTRAINT FK_utilisateur_idVille FOREIGN KEY (idVille) REFERENCES ville (idVille),
	CONSTRAINT FK_utilisateur_nomStatut FOREIGN KEY (idStatut) REFERENCES statut (idStatut)
); 

CREATE TABLE categorie (
	idCategorie SERIAL NOT NULL PRIMARY KEY,
	nomCategorie VARCHAR(4096) NOT NULL,
	descriptionCategorie VARCHAR(4096)
) ;    


CREATE TABLE annonce (
	idAnnonce SERIAL NOT NULL PRIMARY KEY, 
	nomAnnonce VARCHAR(4096) NOT NULL, 
	descriptionAnnonce VARCHAR(4096) NOT NULL, 
	prixDepartAnnonce FLOAT NOT NULL CHECK (prixDepartAnnonce >=0), 
	pasAnnonce FLOAT NOT NULL CHECK (pasAnnonce >=0), 
	dateAnnonce DATE NOT NULL , 
	dureeAnnonce INT NOT NULL CHECK (dureeAnnonce >=0), 
	urlPhotoAnnonce VARCHAR(4096), 
	idUtilisateur SERIAL NOT NULL, 
	idCategorie SERIAL NOT NULL, 
	idVille SERIAL NOT NULL,

	CONSTRAINT FK_annonce_emailUtilisateur FOREIGN KEY (idUtilisateur) REFERENCES utilisateur (idUtilisateur),
	CONSTRAINT FK_annonce_nomCategorie FOREIGN KEY (idCategorie) REFERENCES categorie (idCategorie),
	CONSTRAINT FK_annonce_idVille FOREIGN KEY (idVille) REFERENCES ville (idVille) 

);  

CREATE TABLE encherir (
	idUtilisateur SERIAL NOT NULL, 
	idAnnonce SERIAL NOT NULL, 
	prixEnchere FLOAT CHECK (prixEnchere >=0),
	dateEnchere DATE NOT NULL, 

	CONSTRAINT PK_encherir PRIMARY KEY (idUtilisateur,  idAnnonce),
	CONSTRAINT FK_encherir_emailUtilisateur FOREIGN KEY (idUtilisateur) REFERENCES utilisateur (idUtilisateur),
	CONSTRAINT FK_encherir_idAnnonce FOREIGN KEY (idAnnonce) REFERENCES annonce (idAnnonce)
) ;  