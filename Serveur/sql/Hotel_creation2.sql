
drop table if exists Classe CASCADE ;
create table Classe
(
	id_classe SERIAL,
	denomination varchar(50) not null,
PRIMARY KEY(id_classe)
);

drop table if exists Localisation CASCADE ;
create table Localisation
(
    id_localisation int not null UNIQUE ,
    denomination varchar(50) not null,
    PRIMARY KEY(id_localisation)
);

drop table if exists Categorie CASCADE ;
create table Categorie
(
	id_categorie SERIAL,
	denomination varchar(50) not null,
PRIMARY KEY(id_categorie)
);

drop table if exists Prix_chambre CASCADE ;
create table Prix_chambre
(
	id_classe int not null,
	id_categorie int not null,
	prix numeric(7,2) not null,
PRIMARY KEY(id_classe, id_categorie),
FOREIGN KEY (id_classe) REFERENCES Classe (id_classe),
FOREIGN KEY (id_categorie) REFERENCES Categorie (id_categorie)
);


drop table if exists Hotel CASCADE ;
create table Hotel
(
	id_hotel SERIAL,
	nom varchar(50) not null,
	id_classe int not null,
    id_localisation int not null,
PRIMARY KEY(id_hotel),
FOREIGN KEY (id_classe) REFERENCES Classe (id_classe),
FOREIGN KEY (id_localisation) REFERENCES Localisation (id_localisation)
);


drop table if exists Chambre CASCADE ;
create table Chambre
(
	id_chambre SERIAL,
	id_hotel int not null,
	id_categorie int not null,
	numero_chambre int not null,
PRIMARY KEY(id_chambre),
FOREIGN KEY (id_hotel) REFERENCES Hotel (id_hotel),
FOREIGN KEY (id_categorie) REFERENCES Categorie (id_categorie)
);


drop table if exists Client CASCADE;
create table Client 
(	
	id_client SERIAL,
	email varchar(320) not null UNIQUE,
	CHECK (email ~* '^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$'),
	nom varchar(100) not null,
	prenom varchar(100) not null,
	fleure varchar(255) not null,
	tel varchar(20),
PRIMARY KEY(id_client)
);
	
drop table if exists Reservation CASCADE ;
create table Reservation
(
	id_sejour SERIAL,
	id_chambre int not null,
	date_debut date not null,
	date_fin date not null,
	date_arrivee date,
	paiement numeric(8,2),
	id_client int not null,
PRIMARY KEY(id_sejour),
FOREIGN KEY (id_chambre) REFERENCES Chambre (id_chambre),
FOREIGN KEY (id_client) REFERENCES Client (id_client)
);


drop table if exists Conso CASCADE ;
create table Conso
(
    id_conso SERIAL,
    denomination varchar(50) not null,
    PRIMARY KEY(id_conso)
);

drop table if exists Prix_conso CASCADE ;
create table Prix_conso
(
    id_conso int not null,
    id_hotel int not null,
    prix numeric(7,2) not null,
    PRIMARY KEY(id_conso, id_hotel),
    FOREIGN KEY (id_conso) REFERENCES Conso (id_conso),
    FOREIGN KEY (id_hotel) REFERENCES Hotel (id_hotel)
);


drop table if exists Conso_client CASCADE ;
create table Conso_client
(
    id_cc SERIAL,
    id_conso int not null,
	id_sejour int not null,
	date_conso date not null,
	nombre int not null,
PRIMARY KEY(id_cc),
FOREIGN KEY (id_conso) REFERENCES Conso (id_conso),
FOREIGN KEY (id_sejour) REFERENCES Reservation (id_sejour)
);

drop table if exists Employe CASCADE ;
create table Employe
(
    id_employe SERIAL,
    email varchar(320) not null UNIQUE,
    CHECK (email ~* '^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$'),
	metier varchar(100) not null,
	id_localisation in not null,
	fleure varchar(255) not null,
	tel varchar(20),
PRIMARY KEY(id_client),
FOREIGN KEY (id_localisation) REFERENCES Localisation (id_localisation)
);

drop table if exists Perm CASCADE ;
create table Perm
(
    id_perm SERIAL,
    denomination varchar(320) not null UNIQUE,
PRIMARY KEY(id_perm)
);

drop table if exists employe_perm CASCADE;
create table  employe_perm
(
    id_perm int not null,
    id_employe int not null,
PRIMARY KEY(id_perm,id_employe)
);

drop table if exists metier CASCADE;
create table  metier
(
    id_metier SERIAL,
    denomination varchar(50) not null,
    PRIMARY KEY(id_metier)
);