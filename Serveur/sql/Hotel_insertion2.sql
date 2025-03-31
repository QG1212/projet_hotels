insert into Classe(denomination) values ('*'), ('**'), ('***');
insert into Localisation(id_localisation,denomination) values
                                                           (1,"Siege"),
                                                    (2,"Caen"),
                                                    (3,"Paris"),
                                                    (4,"Nantes"),
                                                    (5,"Brest");

insert into Categorie(denomination) values ('Simple'), ('Double'), ('Double avec salle de bain');

INSERT INTO Client(email,nom,prenom,fleure,tel) values
                                                    ('caen_secretary@gmail.com','caen','secretary','$2y$10$yeJoaQaPnsuiRibgSAE/IeUQkqDfJm4CPMMzGaIcdLmMrJuWl4Y26','021408099'),
                                                    ('nantes_secretary@hotmail.com','nantes','secretary','$2y$10$iaC3DUq60Ph5VWphPj/iGuWtmvj.9g3yNm5e3tt4Ok3SbwK0XIgMW','024450151'),
                                                    ('brest_secretary@gmail.com','brest','secretary','$2y$10$Q0Dwfh5AlkAgkasHT4J17O5L9mUYBgFlIr7RuV9ciABbnpsdZBvS.','022930878'),
                                                    ('paris_secretary@gmail.com','paris','secretary','$2y$10$rdeELM94Fqll6PxLMzzboeYO.tYGSHT3xqrXCZeRFe3B6vW2Zp46u','017573186'),
                                                    ('hotel_admin@gmail.com','hotel','admin','$2y$10$uxnDjDxAvolv61t/hEJ79uOHIoEXBUScAoQDP7OLgqGhC.bn.tgsS','017525159');;

insert into Client(email,nom,prenom,fleure,tel) values 
('jean-dupond@gmail.com','dupond','jean','$2y$10$ye91quGnMYKhCQz4S93F7uADqWY.KW3tRI3kIrxA9qx2dqwTMLJGq','0607080990'),
('tom_cabane@hotmail.com','cabanau','tom','$2y$10$vQnMth9coGt/43lmCT0CXeEeOV851ZrRWu.QozEuO4HGxpadbTs.G','0785501051'),
('quentino_vibes@gmail.com','vibes','quentin','$2y$10$Q0Dwfh5AlkAgkasHT4J17O5L9mUYBgFlIr7RuV9ciABbnpsdZBvS.','0769300878');

insert into Prix_chambre(id_classe, id_categorie, prix) values
(1, 1, 39), (1, 2, 59), (1, 3, 69),
(2, 1, 59), (2, 2, 89), (2, 3, 99),
(3, 1, 69), (3, 2, 99), (3, 3, 109);

insert into Hotel(nom, id_classe,id_localisation) values
('Hotel de Caen', 1,2),
('Hotel de Brest', 1,5),
('Hotel de Paris', 2,3),
('Hotel de Nantes', 2,4);

insert into Conso(denomination)
values ('Petit déjeuner'),
       ('Soda'),
       ('Eau minérale'),
       ('Pression'),
       ('Plat du jour');


insert into Prix_conso(id_hotel, id_conso, prix)
values (1, 1, 5.99),
       (1, 2, 2.99),
       (1, 3, 1.99),
       (1, 4, 3.50),
       (1, 5, 9.99);
insert into Prix_conso(id_hotel, id_conso, prix)
SELECT 2, id_conso, prix+1 FROM Prix_conso WHERE id_hotel = 1;
insert into Prix_conso(id_hotel, id_conso, prix)
SELECT 3, id_conso, prix+2 FROM Prix_conso WHERE id_hotel = 1;
insert into Prix_conso(id_hotel, id_conso, prix)
values (4, 1, 8),
       (4, 2, 4),
       (4, 5, 15.99);

insert into Chambre(id_hotel, id_categorie, numero_chambre)
values(1, 3, 1),
      (1, 3, 2),
      (1, 3, 3),
      (1, 3, 4),
      (1, 2, 5),
      (1, 2, 6),
      (1, 2, 7),
      (1, 2, 8),
      (1, 2, 9),
      (1, 1, 101),
      (1, 1, 102),
      (1, 1, 103),
      (1, 1, 104),
      (1, 1, 105),
      (1, 1, 106),
      (1, 1, 107),
      (1, 1, 108),
      (2, 3, 1),
      (2, 3, 2),
      (2, 2, 3),
      (2, 2, 4),
      (2, 1, 5),
      (2, 1, 6),
      (2, 1, 7),
      (2, 1, 8),
      (2, 1, 9);
insert into Chambre(id_hotel, id_categorie, numero_chambre)
select id_hotel+2, id_categorie,numero_chambre from Chambre;

insert into Reservation(id_chambre, date_debut, date_fin, date_arrivee, id_client, paiement) values
(1,'2022-02-01', '2022-02-12', '2022-02-01', 6, NULL),
(1,'2022-02-12', '2022-02-13', '2022-02-12', 6, NULL),
(1,'2022-02-15', '2022-02-21', NULL, 6, NULL),
(1,'2022-02-25', '2022-02-26', NULL, 6, NULL),
(1,'2022-02-27', '2022-02-28', NULL, 6, NULL),
(2,'2022-02-15', '2022-02-18', NULL, 6, NULL),
(2,'2022-02-20', '2022-02-25', NULL, 6, NULL),
(2,'2022-02-25', '2022-02-28', NULL, 6, NULL),
(3,'2022-02-20', '2022-02-27', NULL, 6, NULL),

(4,'2022-02-15', '2022-02-16', NULL, 7, NULL),
(4,'2022-02-16', '2022-02-22', NULL, 7, NULL),
(4,'2022-02-27', '2022-02-28', NULL, 7, NULL),
(5,'2022-02-16', '2022-02-18', NULL, 7, NULL),
(5,'2022-02-19', '2022-02-21', NULL, 7, NULL),
(5,'2022-02-22', '2022-02-23', NULL, 7, NULL),
(5,'2022-02-27', '2022-02-28', NULL, 6, NULL),
(6,'2022-02-05', '2022-02-15', '2022-02-05', 7, NULL),
(6,'2022-02-16', '2022-02-22', NULL, 6, NULL),
(6,'2022-02-24', '2022-02-26', NULL, 7, NULL),
(6,'2022-02-27', '2022-02-28', NULL, 8, NULL),
(7,'2022-02-15', '2022-02-20', NULL, 8, NULL),

(8,'2022-02-01', '2022-02-12', '2022-02-01', 8, NULL),
(8,'2022-02-16', '2025-01-31', '2022-02-16', 8, NULL);

INSERT INTO Conso_client(id_sejour, id_conso, date_conso, nombre) VALUES
(1, 1, '2022-02-02', 2),
(1, 2, '2022-02-02', 1),
(1, 4, '2022-02-02', 1),
(1, 3, '2022-02-02', 1),
(1, 3, '2022-02-02', 1),
(1, 3, '2022-02-02', 1),
(1, 1, '2022-02-03', 2),
(1, 5, '2022-02-03', 2),
(1, 1, '2022-02-04', 1),
(1, 5, '2022-02-04', 1),
(1, 1, '2022-02-05', 2),
(1, 4, '2022-02-05', 3),
(1, 5, '2022-02-05', 2),
(1, 1, '2022-02-06', 2),
(22, 1, '2022-02-02', 2),
(22, 2, '2022-02-02', 1),
(22, 4, '2022-02-02', 1),
(22, 3, '2022-02-02', 1),
(22, 3, '2022-02-02', 1),
(22, 1, '2022-02-03', 2),
(22, 5, '2022-02-03', 2),
(22, 1, '2022-02-04', 1),
(22, 5, '2022-02-04', 1),
(22, 1, '2022-02-05', 2),
(22, 4, '2022-02-05', 3),
(22, 5, '2022-02-05', 2),
(22, 1, '2022-02-06', 2);

