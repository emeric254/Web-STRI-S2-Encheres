-- Statuts
INSERT INTO statut VALUES ('1', 'Administrateur', 'Administrateur du site');
INSERT INTO statut VALUES ('2', 'Utilisateur', 'Utilisateur du site');
INSERT INTO statut VALUES ('3', 'Vendeur', 'Vendeur dun objet sur le site');

-- Utilisateurs
INSERT INTO utilisateur VALUES ('1', 'admin@gmail.com', 'Admin', 'Admin', '0102030405', 'upssitech', 'http://default.png','admin123', '12423', '1');
INSERT INTO utilisateur VALUES ('2', 'user1@gmail.com', 'White', 'Elodie', '0103030405', 'rue de lu3', 'http://default.png','azerty123', '12423', '2');
INSERT INTO utilisateur VALUES ('3', 'user2@gmail.com', 'Marseau', 'Carine', '0802030405', 'avenue pinpon', 'http://default.png','azerty456', '12423', '2');
INSERT INTO utilisateur VALUES ('4', 'user3@gmail.com', 'Desilets', 'Gilles', '0102020405', 'chemin de terre', 'http://default.png','azerty789', '12423', '2');

-- Catégories
INSERT INTO categorie VALUES ('1', 'Véhicules', 'Catégorie voitures ou motos');
INSERT INTO categorie VALUES ('2', 'Informatique', 'Catégorie informatiques');
INSERT INTO categorie VALUES ('3', 'Jeux-vidéo', 'Catégorie jeux vidéo');
INSERT INTO categorie VALUES ('4', 'DVD', 'Catégorie DVD et films');
INSERT INTO categorie VALUES ('5', 'Bricolage', 'Catégorie bricolage');

--Annonces
INSERT INTO annonce VALUES ('1','Audi RS4','Vends Audi RS4 B7 TBE','25000','1000','1427903074','7776000','http://default.png','2','1','12423'); --en cours
INSERT INTO annonce VALUES ('2','Carte Graphique','Carte Graphique GTX980Ti neuve','550','50','1430899205','604800','http://default.png','4','2','12423');
INSERT INTO annonce VALUES ('3','Forza Motorsport 5','Forza Motorsport 5 sur Xbox One','30','5','1432653014','1209600','http://default.png','4','3','12423');
INSERT INTO annonce VALUES ('4','Snatch','Film Snatch, en DVD','10','2','1425917414','1814400','http://default.png','3','4','12423');
INSERT INTO annonce VALUES ('5','Pelle','Magnifique pelle','35','10','1432480214','604800','http://default.png','3','5','12423');
INSERT INTO annonce VALUES ('6','Z750','Kawasaki Z750, 5000kms','6500','500','1430493014','7776000','http://default.png','2','1','12423');
INSERT INTO annonce VALUES ('7','Prise electrique','Multi prise electrique','10','1','1423902435','259200','http://default.png','3','2','12423');
INSERT INTO annonce VALUES ('8','Switch CISCO','Switch CISCO comme neuf','699','50','1432798035','604800','http://default.png','4','2','12423');
INSERT INTO annonce VALUES ('9','Battlefield 4','Jeu Battlefield 4 sur PC','35','5','1419755235','259200','http://default.png','2','3','12423');
INSERT INTO annonce VALUES ('10','Perceuse','Perceuse filaire, bon étant général','110','15','1399793235','1728000','http://default.png','3','5','12423');
INSERT INTO annonce VALUES ('11','Clio 2 RS','Renault Clio 2 RS 182cv, 110 000kms','6500','500','1396805055','10368000','http://default.png','4','1','12423');
INSERT INTO annonce VALUES ('12','Compresseur','Compresseur 50L pression 10 bar','80','10','1397323455','1296000','http://default.png','3','5','12423');
INSERT INTO annonce VALUES ('13','PC portable HP','PC portable HP pour pièce, non fonctionnel','50','5','1392779225','15552000','http://default.png','4','2','12423');
INSERT INTO annonce VALUES ('14','DVD Titanic collector','DVD du film Titanic edition collector','60','15','1431223625','2592000','http://default.png','2','4','12423');
INSERT INTO annonce VALUES ('15','Jeu Pokémon','Jeu Pokémon pour GameBoy','10','1','1425265625','1296000','http://default.png','3','3','12423');
INSERT INTO annonce VALUES ('16','Transformer','Film Transformer','15','2','1428631625','1555200','http://default.png','4','4','12423');
INSERT INTO annonce VALUES ('17','Yamaha 125 cross','Yamaha 125 YZ 2012','3000','500','1431958443','5184000','http://default.png','4','1','12423');
INSERT INTO annonce VALUES ('18','Ipad','Tablette Ipad 16Go acheté en septembre 2015, peu servit','300','15','1428156843','259200','http://default.png','2','2','12423');
INSERT INTO annonce VALUES ('19','Lot de tournevis','Lots de 6 tournevis plats et cruciformes','7','2','1432649643','1728000','http://default.png','4','5','12423');
INSERT INTO annonce VALUES ('20','Coffret Louis De Funes ','Coffret avec tous les films de Louis De Funes','50','8','1420211643','2073600','http://default.png','3','4','12423');



--Encheres
INSERT INTO encherir VALUES ('4','1','26000','1429514835'); --rs4
INSERT INTO encherir VALUES ('3','12','90','1397527808'); --compresseur
INSERT INTO encherir VALUES ('2','7','11','1423930576'); --prise
INSERT INTO encherir VALUES ('2','12','100','1397635418'); --compresseur
INSERT INTO encherir VALUES ('3', '1', '27000', '1431923694'); --rs4
INSERT INTO encherir VALUES ('3', '14', '75', '1431961392'); --titanic
INSERT INTO encherir VALUES ('4', '15', '11', '1425657720'); --pokemon
INSERT INTO encherir VALUES ('2', '15', '11', '1425690002'); --pokemon
INSERT INTO encherir VALUES ('4', '10', '125', '1426252094'); --perceuse
INSERT INTO encherir VALUES ('4','18','315','1428196443'); --ipad
