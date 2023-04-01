create database if not exists aremo;

use aremo ;

CREATE TABLE produits (
  id_produit INT PRIMARY KEY  NOT NULL AUTO_INCREMENT,
  nom_produit VARCHAR(255),
  catégorie_produit VARCHAR(255),
  prix_produit FLOAT
);


CREATE TABLE commandes (
  id_commande INT  PRIMARY KEY  NOT NULL AUTO_INCREMENT,
  id_produit INT,
  date_commande DATE,
  total_commande FLOAT,
  numero_telephone INT,
  FOREIGN KEY (id_produit) REFERENCES produits(id_produit)
);

CREATE TABLE utilisateurs (
  id_utilisateur INT PRIMARY KEY  NOT NULL AUTO_INCREMENT,
  login VARCHAR(255),
  email VARCHAR(255),
  role VARCHAR(255),
  etat int(1),
  pwd varchar(255)
);


INSERT INTO produits (nom_produit, catégorie_produit, prix_produit)

VALUES ( 'T-shirt', 'les t-shirts', 19.99),
('nikeair', 'les chaussures', 19.99),
('complet', 'les classes', 19.99),
('bracelet', 'les accessoires', 19.99) ,
('polo', 'les t-shirts', 19.99),
( 'airmax', 'les chaussures', 19.99),
('monteaulong', 'les classes', 19.99),
( 'montre', 'les accessoires', 19.99),
( 'T-shirt', 'les t-shirts', 19.99),
('nikeair', 'les chaussures', 19.99),
('complet', 'les classes', 19.99),
('bracelet', 'les accessoires', 19.99) ,
('polo', 'les t-shirts', 19.99),
( 'airmax', 'les chaussures', 19.99),
('monteaulong', 'les classes', 19.99),
( 'montre', 'les accessoires', 19.99) ,
( 'T-shirt', 'les t-shirts', 19.99),
('nikeair', 'les chaussures', 19.99),
('complet', 'les classes', 19.99),
('bracelet', 'les accessoires', 19.99) ,
('polo', 'les t-shirts', 19.99),
( 'airmax', 'les chaussures', 19.99),
('monteaulong', 'les classes', 19.99),
( 'montre', 'les accessoires', 19.99) ;



INSERT INTO utilisateurs (login,email,role,etat,pwd)
VALUES ('admin', 'artegatizar6@gmail.com', 'ADMIN',1,123),
('user1', 'houssam@gmail.com', 'VISITEUR',0,123),
('user2', 'idriss@gmail.com', 'VISITEUR',1,123) ;


INSERT INTO commandes (id_commande,id_produit ,date_commande ,total_commande , nom_proprietaire_commande , numero_telephone, adresse_comm) 
VALUES (1 , 2022-11-11 , 4,'yassine' , 0624895675 ,'res elhouda' ),
(2 , 2021-11-11 , 255 ,'omar',0624895675),
(1 , 2003-11-11 , 255,'salman',0624895675 ),
(4 , 2004-11-11 , 255 ,'ayoub',0624895675),
(1 , 2005-11-11 , 255 ,'simo',0624895675),
(1 , 2022-11-11 , 255,'malika',0624895675 ),
(4 , 2022-11-11 , 255,'zakaria' ,0624895675),
(1 , 2022-11-11 , 255,'nour',0624895675 ),
(3 , 2022-11-11 , 255,'houssam',0624895675 ),
(1 , 2022-11-11 , 255,'lolita',0624895675 ),
(1 , 2022-11-11 , 255 ,'amiratqalbi',0624895675),
(2 , 2022-11-11 , 255,'rabie',0624895675 ),
(1 , 2022-11-11 , 255 ,'skali',0624895675),
(1 , 2022-11-11 , 255,'anas',0624895675 ),
(2 , 2022-11-11 , 255 ,'ahlam',0624895675),
(1 , 2022-11-11 , 255 ,'ilyass',0624895675),
(3 , 2022-11-11 , 255 ,'souhaib',0624895675),
(4 , 2022-11-11 , 255 ,'mostafa',0624895675),
(4 , 2022-11-11 , 255 ,'brahim',0624895675) ;


select * from produits;
select * from utilisateurs ;
select * from commandes ;






