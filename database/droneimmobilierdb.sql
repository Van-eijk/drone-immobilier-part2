DROP DATABASE IF EXISTS droneimmobilierdb;

CREATE DATABASE droneimmobilierdb CHARACTER SET utf8;
USE droneimmobilierdb;

ALTER DATABASE droneimmobilierdb CHARACTER SET utf8 COLLATE utf8_general_ci ;


/* table visiteur */

CREATE TABLE IF NOT EXISTS visiteur(
id_visiteur INT NOT NULL AUTO_INCREMENT,
adresse_ip VARCHAR(250) NULL,
datevisiteur TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
CONSTRAINT pk_visiteur PRIMARY KEY(id_visiteur))
ENGINE = INNODB;

/* table membre */

CREATE TABLE IF NOT EXISTS membre(
id_membre INT NOT NULL AUTO_INCREMENT,
id_visiteur_FK INT NOT NULL,
nom_membre VARCHAR(50) NOT NULL,
prenom_membre VARCHAR(50) NULL,
phone_membre VARCHAR(25) NOT NULL,
email_membre VARCHAR(100) NOT NULL,
pays_membre VARCHAR(100) NOT NULL,
ville_membre VARCHAR(100) NOT NULL,
mdp_membre VARCHAR(255) NOT NULL,
CONSTRAINT pk_membre PRIMARY KEY(id_membre),
CONSTRAINT fk_membre FOREIGN KEY(id_visiteur_FK)REFERENCES visiteur(id_visiteur))
ENGINE = INNODB;


/* table admin */

/* la colonne "POSTE" peut prendre 2 valeurs : "admin" ou "adjoint" */

CREATE TABLE IF NOT EXISTS admin(
id_admin INT NOT NULL AUTO_INCREMENT,
id_membreFK INT NOT NULL,
poste ENUM('admin','adjoint') DEFAULT 'adjoint',
CONSTRAINT pk_admin PRIMARY KEY(id_admin),
CONSTRAINT fk_admin FOREIGN KEY(id_membreFK)
REFERENCES membre(id_membre))
ENGINE = INNODB;


/* table Bien */

CREATE TABLE IF NOT EXISTS bien(
id_Bien INT NOT NULL AUTO_INCREMENT,
id_adminFK INT NOT NULL,
reference_bien VARCHAR(150) NOT NULL,
titre_bien VARCHAR(250) NOT NULL,
description_bien TEXT NOT NULL,
location_vente ENUM('location','vente') DEFAULT 'location',
prix_bien FLOAT NOT NULL,
pays_bien VARCHAR(250) NOT NULL,
ville_bien VARCHAR(250) NOT NULL,
date_time_bien TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
lien_photo1 VARCHAR(255) NULL,
lien_photo2 VARCHAR(255) NULL,
lien_photo3 VARCHAR(255) NULL,
lien_photo4 VARCHAR(255) NULL,
lien_photo5 VARCHAR(255) NULL,
lien_photo6 VARCHAR(255) NULL,
lien_photo7 VARCHAR(255) NULL,
lien_photo8 VARCHAR(255) NULL,
CONSTRAINT pk_bien PRIMARY KEY(id_bien),
CONSTRAINT fk_bien FOREIGN KEY(id_adminFK)
REFERENCES admin(id_admin))
ENGINE=INNODB;


/* Table favoris */

CREATE TABLE IF NOT EXISTS favoris(
id_favoris INT NOT NULL AUTO_INCREMENT,
id_bienFK INT NOT NULL,
id_membreFK INT NOT NULL,
date_time_favoris TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
CONSTRAINT pk_favoris PRIMARY KEY(id_favoris),
CONSTRAINT fk_favoris_bien FOREIGN KEY(id_bienFK)
REFERENCES bien(id_bien),
CONSTRAINT fk_favoris_membre FOREIGN KEY(id_membreFK)
REFERENCES membre(id_membre))
ENGINE=INNODB;

/* table terrain */

CREATE TABLE IF NOT EXISTS terrain(
id_terrain INT NOT NULL AUTO_INCREMENT,
id_bienFK INT NOT NULL,
superficie_terrain FLOAT NOT NULL,
CONSTRAINT pk_terrain PRIMARY KEY(id_terrain),
CONSTRAINT fk_terrain FOREIGN KEY(id_bienFK)
REFERENCES bien(id_bien))
ENGINE = INNODB;

/* table magasin */

CREATE TABLE IF NOT EXISTS magasin(
id_magasin INT NOT NULL AUTO_INCREMENT,
id_bienFK INT NOT NULL,
superficie_magasin FLOAT NOT NULL,
nombre_piece_magasin INT NOT NULL,
CONSTRAINT pk_magasin PRIMARY KEY(id_magasin),
CONSTRAINT fk_magasin FOREIGN KEY(id_bienFK)
REFERENCES bien(id_bien))
ENGINE = INNODB;

/* table immeuble */

CREATE TABLE IF NOT EXISTS immeuble(
id_immeuble INT NOT NULL AUTO_INCREMENT,
id_bienFK INT NOT NULL,
superficie_terrain_immeuble FLOAT NOT NULL DEFAULT 0,
nbre_etage INT NOT NULL,
CONSTRAINT pk_immeuble PRIMARY KEY(id_immeuble),
CONSTRAINT fk_immeuble FOREIGN KEY (id_bienFK)
REFERENCES bien(id_bien))
ENGINE=INNODB;

/* table chambre */

CREATE TABLE IF NOT EXISTS chambre(
id_chambre INT NOT NULL AUTO_INCREMENT,
id_bienFK INT NOT NULL,
superficie_chambre FLOAT NULL,
moderne_chambre ENUM('OUI','NON') DEFAULT 'OUI',
CONSTRAINT pk_chambre PRIMARY KEY(id_chambre),
CONSTRAINT fk_chambre FOREIGN KEY(id_bienFK)
REFERENCES bien(id_bien))
ENGINE=INNODB;

/* table studio */

CREATE TABLE IF NOT EXISTS maison(
id_maison INT NOT NULL AUTO_INCREMENT,
id_bienFK INT NOT NULL,
nbre_piece INT NOT NULL DEFAULT 0,
nbre_chambre INT NOT NULL DEFAULT 0,
nbre_cuisine INT NOT NULL DEFAULT 0,
nbre_salon INT NOT NULL DEFAULT 0,
nbre_douche INT NOT NULL DEFAULT 0,
type_maison ENUM('studio','appartement','maison','villa'),
superficie_terrain FLOAT DEFAULT 0,
CONSTRAINT pk_maison PRIMARY KEY(id_maison),
CONSTRAINT fk_maison FOREIGN KEY(id_bienFK)
REFERENCES bien(id_bien))
ENGINE=INNODB;




/* table service */

CREATE TABLE IF NOT EXISTS service(
id_service INT NOT NULL AUTO_INCREMENT,
id_adminFK INT NOT NULL,
reference_service VARCHAR(200) NOT NULL,
titre_service VARCHAR(250) NULL,
description_service TEXT NULL,
lien_photo_service VARCHAR(255) NULL,
categorie_service VARCHAR(200) NOT NULL,
date_time_service TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
CONSTRAINT pk_service PRIMARY KEY(id_service),
CONSTRAINT fk_service FOREIGN KEY(id_adminFK)
REFERENCES admin(id_admin))
ENGINE = INNODB; 


/* insertion des valeurs */

INSERT INTO visiteur(adresse_ip) VALUES('192.168.10.178'),('192.168.10.179'),('192.168.10.180'),('192.168.10.181'),('192.168.10.182');

INSERT INTO membre(id_visiteur_FK,nom_membre,prenom_membre,phone_membre,email_membre,pays_membre,ville_membre,mdp_membre)
VALUES(1,'van','vanprenom',+237653695347,'van2021@outloo.fr','canada','montreal','azerty'),
(2,'bobo','boboprenom',+237695740639,'bobo2021@outloo.fr','usa','newyork','azerty'),
(3,'junior','juniorprenom',+237651006953,'junior2021@outloo.fr','mboa','yaounde','azerty'),
(4,'alice','aliceprenom',+237656857450,'alice2021@outloo.fr','belgique','bruxelle','azerty');

INSERT INTO admin(id_membreFK,poste) VALUES(1,'admin'),(2,'adjoint');

INSERT INTO service(id_adminFK,reference_service,titre_service,description_service,lien_photo_service,categorie_service)
VALUES(1,'service05112023','Voyage pour le canada','Nous nous engageons à vous faire voyager pour le canada','lien photo flyer canada','recrutement etranger et tourisme'),
(2,'service051120231157','Conteneur à vendre','Votre conteneur de 40 pieds disponible','lien photo conteneur','commerce general'),
(1,'service051120231201','Agent d\' entretien disponible','Nous mettons à votre disposition des personnes pour prendre soin de vos bien','lien photo guide besoin','guide besoin'),
(2,'service051120231207','prestation de service','Confiez nous la construction de votre chantier et vous serrez satisfait','lien photo prestation service','construction & preservation');


INSERT INTO bien(id_adminFK,reference_bien,titre_bien,description_bien,location_vente,prix_bien,pays_bien,ville_bien,lien_photo1)
VALUES(2,'bien051120231216','terrain à vendre 500 m²','terrain terrassé situé au centre ville','vente',500000,'cameroun','Yaounde','lien photo terrain'),
(1,'bien051120231222','Bureau à louer','Bureau situé au centre ville','location',50000,'cameroun','Douala','lien photo bureau'),
(2,'bien051120231225','immeuble à vendre ','immeuble situé au centre ville','vente',1500000,'cameroun','Bafoussam','lien photo immeuble'),
(2,'bien051120231229','chambre à louer 50 m²','chambre situé au centre ville','location',25000,'cameroun','Douala','lien photo chambre'),
(1,'bien051120231230','studio à louer','studio situé au centre ville','location',50000,'cameroun','Maroua','lien photo studio'),
(1,'bien051120231230','appartement à louer','appartement situé au centre ville','location',70000,'cameroun','Ebolowa','lien photo appartement'),
(2,'bien051120231237','maison à vendre','maison situé au centre ville','vente',1800000,'cameroun','Obala','lien photo maison'),
(1,'bien051120231236','Villa à vendre','Villa situé au centre ville','vente',1700000,'cameroun','Obala','lien photo villa');



INSERT INTO terrain(id_bienFK,superficie_terrain) VALUES(1,500);
INSERT INTO magasin(id_bienFK,superficie_magasin,nombre_piece_magasin) VALUES(2,80,2);
INSERT INTO immeuble(id_bienFK,superficie_terrain_immeuble,nbre_etage)VALUES(3,1000,5);
INSERT INTO chambre(id_bienFK,superficie_chambre,moderne_chambre) VALUES(4,40,'OUI');

INSERT INTO maison(id_bienFK,nbre_piece,nbre_chambre,nbre_cuisine,nbre_salon,nbre_douche,type_maison,superficie_terrain)
VALUES(5,3,1,1,1,1,'studio',50);

INSERT INTO maison(id_bienFK,nbre_piece,nbre_chambre,nbre_cuisine,nbre_salon,nbre_douche,type_maison,superficie_terrain)
VALUES(6,3,1,1,1,1,'appartement',150);

INSERT INTO maison(id_bienFK,nbre_piece,nbre_chambre,nbre_cuisine,nbre_salon,nbre_douche,type_maison,superficie_terrain)
VALUES(7,3,1,1,1,1,'maison',500);

INSERT INTO maison(id_bienFK,nbre_piece,nbre_chambre,nbre_cuisine,nbre_salon,nbre_douche,type_maison,superficie_terrain)
VALUES(8,3,1,1,1,1,'villa',5000);



INSERT INTO favoris(id_bienFK, id_membreFK) VALUES(8,4),(6,3),(1,4);





SELECT * FROM visiteur;
SELECT * FROM membre;
SELECT * FROM admin;
SELECT * FROM bien;
SELECT * FROM favoris;
SELECT * FROM terrain ;
SELECT * FROM magasin ;
SELECT * FROM immeuble ;
SELECT * FROM chambre ;
SELECT * FROM maison ;
SELECT * FROM service ;









/* Afficher la liste des visiteurs */

SELECT * FROM visiteur ;

/* afficher la liste des membres (adresse ip et noms) */

 SELECT visiteur.adresse_ip, visiteur.datevisiteur, membre.nom_membre, membre.phone_membre, membre.email_membre, membre.pays_membre, membre.ville_membre FROM visiteur
INNER JOIN membre
ON visiteur.id_visiteur = membre.id_visiteur_FK ;




/* afficher la liste des admin (adresse ip, nom et poste)*/

SELECT visiteur.adresse_ip, visiteur.datevisiteur, membre.id_membre, membre.nom_membre, membre.phone_membre, membre.email_membre, membre.pays_membre, membre.ville_membre, admin.poste FROM visiteur
INNER JOIN membre
ON visiteur.id_visiteur = membre.id_visiteur_FK 
INNER JOIN admin
ON membre.id_membre = admin.id_membreFK;
SELECT * FROM admin ;

/* afficher la liste des services liés aux admins qui ont publié */


SELECT visiteur.adresse_ip, 
membre.nom_membre, membre.prenom_membre, membre.phone_membre, membre.email_membre, membre.pays_membre, membre.ville_membre, 
admin.poste, 
service.reference_service, service.titre_service, service.description_service, service.lien_photo_service, service.categorie_service, service.date_time_service 
FROM visiteur
INNER JOIN membre
ON visiteur.id_visiteur = membre.id_visiteur_FK
INNER JOIN admin
ON membre.id_membre = admin.id_membreFK
INNER JOIN service
ON admin.id_admin = service.id_adminFK ;



/* Afficher la liste des biens liés aux admins qui les ont publiés */

SELECT visiteur.adresse_ip, 
membre.nom_membre, membre.prenom_membre, membre.phone_membre, membre.email_membre, membre.pays_membre, membre.ville_membre, 
admin.poste, 
bien.reference_bien, bien.titre_bien, bien.description_bien, bien.location_vente, bien.prix_bien, bien.pays_bien, bien.ville_bien, bien.date_time_bien, bien.lien_photo1, bien.lien_photo2, bien.lien_photo3, bien.lien_photo4, bien.lien_photo5, bien.lien_photo6, bien.lien_photo7, bien.lien_photo8

FROM visiteur
INNER JOIN membre
ON visiteur.id_visiteur = membre.id_visiteur_FK
INNER JOIN admin
ON membre.id_membre = admin.id_membreFK
INNER JOIN bien
ON admin.id_admin = bien.id_adminFK ;


/* Afficher la liste des terrains liés aux admins qui les ont publiés */ 



SELECT visiteur.adresse_ip,
membre.nom_membre, membre.prenom_membre, membre.phone_membre, membre.email_membre, membre.pays_membre, membre.ville_membre,
admin.poste, 
bien.reference_bien, bien.titre_bien, bien.description_bien, bien.location_vente, bien.prix_bien, bien.pays_bien, bien.ville_bien, bien.date_time_bien, bien.lien_photo1, bien.lien_photo2, bien.lien_photo3, bien.lien_photo4, bien.lien_photo5, bien.lien_photo6, bien.lien_photo7, bien.lien_photo8,
terrain.superficie_terrain
FROM visiteur
INNER JOIN membre
ON visiteur.id_visiteur = membre.id_visiteur_FK
INNER JOIN admin
ON membre.id_membre = admin.id_membreFK
INNER JOIN bien
ON admin.id_admin = bien.id_adminFK
INNER JOIN terrain
ON bien.id_bien = terrain.id_bienFK ;




/* Afficher la liste des magasins liés aux admins qui les ont publiés */ 

SELECT visiteur.adresse_ip,
membre.nom_membre, membre.prenom_membre, membre.phone_membre, membre.email_membre, membre.pays_membre, membre.ville_membre,
admin.poste, 
bien.reference_bien, bien.titre_bien, bien.description_bien, bien.location_vente, bien.prix_bien, bien.pays_bien, bien.ville_bien, bien.date_time_bien, bien.lien_photo1, bien.lien_photo2, bien.lien_photo3, bien.lien_photo4, bien.lien_photo5, bien.lien_photo6, bien.lien_photo7, bien.lien_photo8,
magasin.superficie_magasin, magasin.nombre_piece_magasin
FROM visiteur
INNER JOIN membre
ON visiteur.id_visiteur = membre.id_visiteur_FK
INNER JOIN admin
ON membre.id_membre = admin.id_membreFK
INNER JOIN bien
ON admin.id_admin = bien.id_adminFK
INNER JOIN magasin
ON bien.id_bien = magasin.id_bienFK ;



/* Afficher la liste des immeubles liés aux admins qui les ont publiés */ 

SELECT visiteur.adresse_ip,
membre.nom_membre, membre.prenom_membre, membre.phone_membre, membre.email_membre, membre.pays_membre, membre.ville_membre,
admin.poste, 
bien.reference_bien, bien.titre_bien, bien.description_bien, bien.location_vente, bien.prix_bien, bien.pays_bien, bien.ville_bien, bien.date_time_bien, bien.lien_photo1, bien.lien_photo2, bien.lien_photo3, bien.lien_photo4, bien.lien_photo5, bien.lien_photo6, bien.lien_photo7, bien.lien_photo8,
immeuble.superficie_terrain_immeuble, immeuble.nbre_etage
FROM visiteur
INNER JOIN membre
ON visiteur.id_visiteur = membre.id_visiteur_FK
INNER JOIN admin
ON membre.id_membre = admin.id_membreFK
INNER JOIN bien
ON admin.id_admin = bien.id_adminFK
INNER JOIN immeuble
ON bien.id_bien = immeuble.id_bienFK ;



/* Afficher la liste des chambres liées aux admins qui les ont publiés */ 

SELECT visiteur.adresse_ip,
membre.nom_membre, membre.prenom_membre, membre.phone_membre, membre.email_membre, membre.pays_membre, membre.ville_membre,
admin.poste, 
bien.reference_bien, bien.titre_bien, bien.description_bien, bien.location_vente, bien.prix_bien, bien.pays_bien, bien.ville_bien, bien.date_time_bien, bien.lien_photo1, bien.lien_photo2, bien.lien_photo3, bien.lien_photo4, bien.lien_photo5, bien.lien_photo6, bien.lien_photo7, bien.lien_photo8,
chambre.superficie_chambre, chambre.moderne_chambre
FROM visiteur
INNER JOIN membre
ON visiteur.id_visiteur = membre.id_visiteur_FK
INNER JOIN admin
ON membre.id_membre = admin.id_membreFK
INNER JOIN bien
ON admin.id_admin = bien.id_adminFK
INNER JOIN chambre
ON bien.id_bien = chambre.id_bienFK ;



/* Afficher la liste des maisons confondues liées aux admins qui les ont publiés */ 

SELECT visiteur.adresse_ip,
membre.nom_membre, membre.prenom_membre, membre.phone_membre, membre.email_membre, membre.pays_membre, membre.ville_membre,
admin.poste, 
bien.reference_bien, bien.titre_bien, bien.description_bien, bien.location_vente, bien.prix_bien, bien.pays_bien, bien.ville_bien, bien.date_time_bien, bien.lien_photo1, bien.lien_photo2, bien.lien_photo3, bien.lien_photo4, bien.lien_photo5, bien.lien_photo6, bien.lien_photo7, bien.lien_photo8,
maison.type_maison, maison.superficie_terrain, maison.nbre_salon, maison.nbre_cuisine, maison.nbre_chambre, maison.nbre_douche, maison.nbre_piece
FROM visiteur
INNER JOIN membre
ON visiteur.id_visiteur = membre.id_visiteur_FK
INNER JOIN admin
ON membre.id_membre = admin.id_membreFK
INNER JOIN bien
ON admin.id_admin = bien.id_adminFK
INNER JOIN maison
ON bien.id_bien = maison.id_bienFK ;


/* Afficher la liste des studios liées aux admins qui les ont publiés */ 

SELECT visiteur.adresse_ip,
membre.nom_membre, membre.prenom_membre, membre.phone_membre, membre.email_membre, membre.pays_membre, membre.ville_membre,
admin.poste, 
bien.reference_bien, bien.titre_bien, bien.description_bien, bien.location_vente, bien.prix_bien, bien.pays_bien, bien.ville_bien, bien.date_time_bien, bien.lien_photo1, bien.lien_photo2, bien.lien_photo3, bien.lien_photo4, bien.lien_photo5, bien.lien_photo6, bien.lien_photo7, bien.lien_photo8,
maison.type_maison, maison.superficie_terrain, maison.nbre_salon, maison.nbre_cuisine, maison.nbre_chambre, maison.nbre_douche, maison.nbre_piece
FROM visiteur
INNER JOIN membre
ON visiteur.id_visiteur = membre.id_visiteur_FK
INNER JOIN admin
ON membre.id_membre = admin.id_membreFK
INNER JOIN bien
ON admin.id_admin = bien.id_adminFK
INNER JOIN maison
ON bien.id_bien = maison.id_bienFK 
WHERE maison.type_maison = 'studio';


/* Afficher la liste des appartements liées aux admins qui les ont publiés */ 

SELECT visiteur.adresse_ip,
membre.nom_membre, membre.prenom_membre, membre.phone_membre, membre.email_membre, membre.pays_membre, membre.ville_membre,
admin.poste, 
bien.reference_bien, bien.titre_bien, bien.description_bien, bien.location_vente, bien.prix_bien, bien.pays_bien, bien.ville_bien, bien.date_time_bien, bien.lien_photo1, bien.lien_photo2, bien.lien_photo3, bien.lien_photo4, bien.lien_photo5, bien.lien_photo6, bien.lien_photo7, bien.lien_photo8,
maison.type_maison, maison.superficie_terrain, maison.nbre_salon, maison.nbre_cuisine, maison.nbre_chambre, maison.nbre_douche, maison.nbre_piece
FROM visiteur
INNER JOIN membre
ON visiteur.id_visiteur = membre.id_visiteur_FK
INNER JOIN admin
ON membre.id_membre = admin.id_membreFK
INNER JOIN bien
ON admin.id_admin = bien.id_adminFK
INNER JOIN maison
ON bien.id_bien = maison.id_bienFK 
WHERE maison.type_maison = 'appartement';



/* Afficher la liste des maisons liées aux admins qui les ont publiés */ 

SELECT visiteur.adresse_ip,
membre.nom_membre, membre.prenom_membre, membre.phone_membre, membre.email_membre, membre.pays_membre, membre.ville_membre,
admin.poste, 
bien.reference_bien, bien.titre_bien, bien.description_bien, bien.location_vente, bien.prix_bien, bien.pays_bien, bien.ville_bien, bien.date_time_bien, bien.lien_photo1, bien.lien_photo2, bien.lien_photo3, bien.lien_photo4, bien.lien_photo5, bien.lien_photo6, bien.lien_photo7, bien.lien_photo8,
maison.type_maison, maison.superficie_terrain, maison.nbre_salon, maison.nbre_cuisine, maison.nbre_chambre, maison.nbre_douche, maison.nbre_piece
FROM visiteur
INNER JOIN membre
ON visiteur.id_visiteur = membre.id_visiteur_FK
INNER JOIN admin
ON membre.id_membre = admin.id_membreFK
INNER JOIN bien
ON admin.id_admin = bien.id_adminFK
INNER JOIN maison
ON bien.id_bien = maison.id_bienFK 
WHERE maison.type_maison = 'maison';


/* Afficher la liste des villas liées aux admins qui les ont publiés */ 

SELECT visiteur.adresse_ip,
membre.nom_membre, membre.prenom_membre, membre.phone_membre, membre.email_membre, membre.pays_membre, membre.ville_membre,
admin.poste, 
bien.reference_bien, bien.titre_bien, bien.description_bien, bien.location_vente, bien.prix_bien, bien.pays_bien, bien.ville_bien, bien.date_time_bien, bien.lien_photo1, bien.lien_photo2, bien.lien_photo3, bien.lien_photo4, bien.lien_photo5, bien.lien_photo6, bien.lien_photo7, bien.lien_photo8,
maison.type_maison, maison.superficie_terrain, maison.nbre_salon, maison.nbre_cuisine, maison.nbre_chambre, maison.nbre_douche, maison.nbre_piece
FROM visiteur
INNER JOIN membre
ON visiteur.id_visiteur = membre.id_visiteur_FK 
INNER JOIN admin 
ON membre.id_membre = admin.id_membreFK
INNER JOIN bien
ON admin.id_admin = bien.id_adminFK
INNER JOIN maison
ON bien.id_bien = maison.id_bienFK 
WHERE maison.type_maison = 'villa';




/* afficher la liste des favoris et leurs auteurs */


SELECT membre.nom_membre, membre.prenom_membre, membre.phone_membre, membre.email_membre, membre.pays_membre, membre.ville_membre,
bien.reference_bien, bien.titre_bien, bien.description_bien, bien.location_vente, bien.prix_bien, bien.pays_bien, bien.ville_bien, bien.date_time_bien, bien.lien_photo1, bien.lien_photo2, bien.lien_photo3, bien.lien_photo4, bien.lien_photo5, bien.lien_photo6, bien.lien_photo7, bien.lien_photo8,
favoris.date_time_favoris
FROM membre
INNER JOIN favoris
ON membre.id_membre = favoris.id_membreFK
INNER JOIN bien
ON bien.id_bien = favoris.id_bienFK ;




/************************************************** END ***************************************************** */








