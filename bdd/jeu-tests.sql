-- Statuts
INSERT INTO statut VALUES ('1', 'Administrateur', 'Administrateur du site');
INSERT INTO statut VALUES ('2', 'Utilisateur', 'Utilisateur du site');
INSERT INTO statut VALUES ('3', 'Vendeur', 'Vendeur dun objet sur le site');

-- Utilisateurs
INSERT INTO utilisateur VALUES ('1', 'admin@gmail.com', 'Admin', 'Admin', '0102030405', 'upssitech', 'default.png','f865b53623b121fd34ee5426c792e5c33af8c227', '12423', '1');--MDP:admin123
INSERT INTO utilisateur VALUES ('2', 'user1@gmail.com', 'White', 'Elodie', '0103030405', 'rue de lu3', 'default.png','3b004ac6d8a602681f5ee3587c924855679e21d9', '12423', '2');--MDP:azerty123
INSERT INTO utilisateur VALUES ('3', 'user2@gmail.com', 'Marseau', 'Carine', '0802030405', 'avenue pinpon', 'default.png','3b004ac6d8a602681f5ee3587c924855679e21d9', '12423', '2');--MDP:azerty456
INSERT INTO utilisateur VALUES ('4', 'user3@gmail.com', 'Desilets', 'Gilles', '0102020405', 'chemin de terre', 'default.png','6aa414be8ed2c9a0273625a94ac70dd942b54149', '12423', '2');--MDP:azerty789'

-- Catégories
INSERT INTO categorie VALUES ('1', 'Véhicules', 'Catégorie voitures ou motos');
INSERT INTO categorie VALUES ('2', 'Informatique', 'Catégorie informatiques');
INSERT INTO categorie VALUES ('3', 'Jeux-vidéo', 'Catégorie jeux vidéo');
INSERT INTO categorie VALUES ('4', 'DVD', 'Catégorie DVD et films');
INSERT INTO categorie VALUES ('5', 'Bricolage', 'Catégorie bricolage');

--Annonces
INSERT INTO annonce VALUES ('1','Audi RS4','Vends Audi RS4 B7 TBE','25000','1000','1427903074','7776000','http://img.turbo.fr/04165116-photo-scoop-audi-rs4-avant-nouvelles-photos.jpg','2','1','12423'); --en cours-
INSERT INTO annonce VALUES ('2','Carte Graphique','Carte Graphique GTX980Ti neuve','550','50','1430899205','604800','http://www.syndrome-oc.net/wp-content/uploads/2015/03/gtx-980-ti-600x300.jpg','4','2','12423'); --FINI
INSERT INTO annonce VALUES ('3','Forza Motorsport 5','Forza Motorsport 5 sur Xbox One','30','5','1432653014','1209600','http://cdn-static.gamekult.com/gamekult-com/images/photos/30/50/16/39/forza-motorsport-5-jaquette-ME3050163904_2.jpg','4','3','12423');
INSERT INTO annonce VALUES ('4','Snatch','Film Snatch, en DVD','10','2','1425917414','1814400','http://fr.web.img4.acsta.net/pictures/14/08/20/12/54/429006.jpg','3','4','12423'); -- FINI
INSERT INTO annonce VALUES ('5','Pelle','Magnifique pelle','35','10','1432480214','604800','http://mfs3.cdnsw.com/fs/Root/normal/34drn-d6381d59_19c6_46ee_9c35_2fe540ae4100_thumb.jpeg','3','5','12423'); --GOOD
INSERT INTO annonce VALUES ('6','Z750','Kawasaki Z750, 5000kms','6500','500','1430493014','7776000','http://storage.kawasaki.eu/public/kawasaki.eu/en-EU/model/12ZR750M_40ABLKDRF00D_C%20edge90_001.png','2','1','12423'); --GOOD
INSERT INTO annonce VALUES ('7','Prise electrique','Multi prise electrique','10','1','1423902435','259200','http://kriissss.fr/photo.jpg','3','2','12423'); -- FINI-
INSERT INTO annonce VALUES ('8','Switch CISCO','Switch CISCO comme neuf','699','50','1432798035','604800','http://www.finchfieldit.co.uk/wp-content/uploads/2009/05/Switch-cables.jpg','4','2','12423'); --GOOD
INSERT INTO annonce VALUES ('9','Battlefield 4','Jeu Battlefield 4 sur PC','35','5','1419755235','259200','http://vignette1.wikia.nocookie.net/battlefield/images/e/ee/Battlefield_4_Cover.jpg','2','3','12423'); --FINI
INSERT INTO annonce VALUES ('10','Perceuse','Perceuse filaire, bon étant général','110','15','1399793235','1728000','http://i2.cdscdn.com/pdt2/5/0/0/1/700x700/0603128500/rw/bosch-perceuse-a-percussion-750w-psb-750-rce.jpg','3','5','12423'); --FINI
INSERT INTO annonce VALUES ('11','Clio 2 RS','Renault Clio 2 RS 182cv, 110 000kms','6500','500','1422698580','10368000','http://images.caradisiac.com/logos-ref/modele/modele--renault-clio-2-rs/S7-modele--renault-clio-2-rs.jpg','4','1','12423'); --GOOD
INSERT INTO annonce VALUES ('12','Compresseur','Compresseur 50L pression 10 bar','80','10','1397323455','1296000','http://i2.cdscdn.com/pdt2/8/6/0/1/700x700/mic8020119065860/rw/compresseur-100-litres-michelin-3-cv-10-bars.jpg','3','5','12423'); --FINI-
INSERT INTO annonce VALUES ('13','PC portable HP','PC portable HP pour pièce, non fonctionnel','50','5','1417385820','15552000','http://www.diltoo.com/Photos/17/17889-pc-portable-hp-nc6220-pm-1-6ghz-40go-xpp-dvd-wifi-1.jpg','4','2','12423');--GOOD
INSERT INTO annonce VALUES ('14','DVD Titanic collector','DVD du film Titanic edition collector','60','15','1431223625','2592000','http://www.gamecash.fr/medias/dvd-titanic-deluxe-coll-e13164.jpg','2','4','12423'); --GOOD-
INSERT INTO annonce VALUES ('15','Jeu Pokémon','Jeu Pokémon pour GameBoy','10','1','1425265625','1296000','http://pmcdn.priceminister.com/photo/Pokemon-Rouge-Jeu-Game-Boy-Color-598123332_ML.jpg','3','3','12423'); --FINI-
INSERT INTO annonce VALUES ('16','Transformer','Film Transformer','15','2','1431425643','1555200','http://ecx.images-amazon.com/images/I/51xbz6iJJ9L.jpg','4','4','12423');--GOOD
INSERT INTO annonce VALUES ('17','Yamaha 125 cross','Yamaha 125 YZ 2012','3000','500','1431958443','5184000','http://www.kutvek-kitgraphik.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/h/a/hangtown-125-250-yz.jpg','4','1','12423'); --GOOD
INSERT INTO annonce VALUES ('18','Ipad','Tablette Ipad 16Go acheté en septembre 2015, peu servit','300','15','1428156843','259200','http://i2.cdscdn.com/pdt2/9/4/2/1/700x700/auc2009969129942/rw/etui-coque-cover-pour-ipad-mini-couleur-rouge.jpg','2','2','12423'); --FINI-
INSERT INTO annonce VALUES ('19','Lot de tournevis','Lots de 6 tournevis plats et cruciformes','7','2','1432376043','1728000','http://download.compas-market.fr/images/5/lot-de-6-tournevis-bahco-1.jpg','4','5','12423'); --GOOD
INSERT INTO annonce VALUES ('20','Coffret Louis De Funes','Coffret avec tous les films de Louis De Funes','50','8','1430820843','2073600','http://www.martinmusique.fr/boutique/525-826-thickbox/l-essentiel-de-louis-de-funes-coffret-8-dvd-coffret-de-8-dvd-.jpg','3','4','12423'); --GOOD



--Encheres
INSERT INTO encherir VALUES ('4','1','26000','1429514835'); --rs4
INSERT INTO encherir VALUES ('3','12','90','1397527808'); --compresseur
INSERT INTO encherir VALUES ('2','7','11','1423930576'); --prise
INSERT INTO encherir VALUES ('2','12','100','1397635418'); --compresseur
INSERT INTO encherir VALUES ('3', '1', '27000', '1431923694'); --rs4
INSERT INTO encherir VALUES ('3', '14', '75', '1431961392'); --titanic
INSERT INTO encherir VALUES ('4', '15', '11', '1425657720'); --pokemon
INSERT INTO encherir VALUES ('2', '15', '50', '1425690002'); --pokemon
INSERT INTO encherir VALUES ('4', '10', '125', '1426252094'); --perceuse
INSERT INTO encherir VALUES ('4','18','315','1428196443'); --ipad
