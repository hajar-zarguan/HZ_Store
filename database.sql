drop table categorie;
CREATE TABLE `categorie` (
  `id` int(11) auto_increment NOT NULL primary key,
  `name` varchar(45) not NULL
);

drop table produit;
CREATE TABLE `produit` (
  `sku` int(45) NOT NULL auto_increment primary key,
  `name` varchar(45) NOT NULL,
  `type` varchar(45) not NULL,
  `price` float(45) not NULL,
  `upc` varchar(45) not NULL,
  `category` int not NULL,
  `shipping` float(45) not NULL,
  `description` varchar(45) not NULL,
  `manufacturer` varchar(45) not NULL,
  `model` varchar(45) not NULL,
  `url` text not NULL,
  `image` text not NULL,
 FOREIGN KEY (category) REFERENCES categorie(id)
  
);

CREATE TABLE `utilisateur` (
  `ID_USER` int(11) NOT NULL primary key,
  `USERNAME` varchar(45) not NULL,
  `FULL_NAME` varchar(45) not NULL,
  `EMAIL` varchar(45) not NULL,
  `TELEPHONE` varchar(45) not NULL,
  `ROLE` varchar(45) not NULL,
  `DATE_NAISSANCE` date not NULL,
  `CREATED_AT_U` datetime not NULL,
  `UPDATED_AT_U` datetime not NULL
) ;

CREATE TABLE `carte` (
  `ID_CARTE` int(11) NOT NULL auto_increment primary key,
  `ID_USER_c` int(11) NOT NULL,
  FOREIGN KEY (ID_USER_c) REFERENCES utilisateur(ID_USER)
);

CREATE TABLE `contient` (
  `ID_PRODUIT` int(10) NOT NULL,
  `ID_CARTE` int(11) NOT NULL,
  PRIMARY KEY (ID_PRODUIT,ID_CARTE),
  FOREIGN KEY (ID_PRODUIT) REFERENCES produit(sku),
  FOREIGN KEY (ID_CARTE) REFERENCES carte(ID_CARTE)
) ;



CREATE TABLE `ordre` (
  `ID_ORDRE` int(11) NOT NULL auto_increment primary key,
  `ID_USER` int(11) NOT NULL,
  `QUANTITE_ORDRE` int(11) not NULL,
  `EST_LIVREE` tinyint(1) not NULL,
  `FULLNAME` varchar(45) not NULL,
  `ADRESS` varchar(45) not NULL,
  `VILLE` varchar(45) not NULL,
  `PAYS` varchar(45) not NULL,
  `CODE_POSTALE` int(11) not NULL,
  `TELEPHONE` varchar(45) not NULL,
 FOREIGN KEY (ID_USER) REFERENCES utilisateur(ID_USER)
  );


CREATE TABLE `ordreproduct` (
  `ID_ORDRE` int(11) NOT NULL,
  `ID_PRODUIT` char(10) NOT NULL,
  `CREATED_AT_` datetime not NULL,
  `UPDATED_AT_` datetime DEFAULT NULL,
   PRIMARY KEY (ID_PRODUIT,ID_ORDRE),
  FOREIGN KEY (ID_PRODUIT) REFERENCES produit(sku),
  FOREIGN KEY (ID_ORDRE) REFERENCES ordre(ID_ORDRE)
) ;


