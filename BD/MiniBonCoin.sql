CREATE DATABASE IF NOT EXISTS `mini_bon_coin` DEFAULT CHARACTER
SET
   utf8mb4 COLLATE utf8mb4_0900_ai_ci;

USE `mini_bon_coin`;

DROP TABLE IF EXISTS UTILISATEUR;

CREATE TABLE
   IF NOT EXISTS UTILISATEUR (
      Id_Utilisateur INT AUTO_INCREMENT,
      pseudo VARCHAR(50) NOT NULL,
      password VARCHAR(50) NOT NULL,
      email VARCHAR(50) NOT NULL,
      date_inscrit DATETIME NOT NULL,
      PRIMARY KEY (Id_Utilisateur),
      UNIQUE (email)
   ) ENGINE = InnoDB;

DROP TABLE IF EXISTS CATEGORY;

CREATE TABLE
   IF NOT EXISTS CATEGORY (
      Id_category INT AUTO_INCREMENT,
      nom_category VARCHAR(50) NOT NULL,
      PRIMARY KEY (Id_category),
      UNIQUE (nom_category)
   ) ENGINE = InnoDB;

DROP TABLE IF EXISTS ANNONCE;

CREATE TABLE
   IF NOT EXISTS ANNONCE (
      Id_ANNONCE INT AUTO_INCREMENT,
      titre VARCHAR(50) NOT NULL,
      description VARCHAR(50),
      prix DECIMAL(16, 2) NOT NULL,
      photo VARCHAR(100),
      date_public DATETIME NOT NULL,
      Id_category INT NOT NULL,
      Id_Utilisateur INT,
      PRIMARY KEY (Id_ANNONCE),
      UNIQUE (photo),
      FOREIGN KEY (Id_category) REFERENCES CATEGORY (Id_category),
      FOREIGN KEY (Id_Utilisateur) REFERENCES UTILISATEUR (Id_Utilisateur)
   ) ENGINE = InnoDB;

INSERT INTO
   CATEGORY (Id_category, nom_category)
VALUES
   (1, 'Véhicules'),
   (2, 'Mode'),
   (3, 'Électronique'),
   (4, 'Autres');

INSERT INTO
   UTILISATEUR (pseudo, password, email, date_inscrit)
VALUES
   (
      'Ivan',
      '123456qwer',
      'ivan@hotmail.com',
      STR_TO_DATE ('1-11-2022', '%d-%m-%Y')
   ),
   (
      'Dima',
      'qwer123456',
      'dima.hotmail.com',
      STR_TO_DATE ('25-12-2024', '%d-%m-%Y')
   ),
   (
      'Damien',
      'rewq654321',
      'damien@hotmail.com',
      STR_TO_DATE ('10-05-2023', '%d-%m-%Y')
   ),
   (
      'Jerome',
      '654321rewq',
      'jerome.hotmail.com',
      STR_TO_DATE ('6-08-2022', '%d-%m-%Y')
   ),
   (
      'Kidny',
      'rewq123456',
      'kidny.hotmail.com',
      STR_TO_DATE ('12-01-2025', '%d-%m-%Y')
   ),
   (
      'Kate',
      '123456rewq',
      'kate.hotmail.com',
      STR_TO_DATE ('15-11-2020', '%d-%m-%Y')
   );

INSERT INTO
   ANNONCE (
      titre,
      description,
      prix,
      photo,
      date_public,
      Id_category,
      Id_Utilisateur
   )
VALUES
   -- Ivan (registered 2022-11-01)
   (
      'Peugeot 208',
      'Voiture en bon état',
      8500.00,
      'peugeot208.jpg',
      '2023-01-10 10:30:00',
      1,
      1
   ),
   (
      'Veste cuir',
      'Taille M',
      150.00,
      'veste_cuir.jpg',
      '2023-02-01 11:00:00',
      2,
      1
   ),
   (
      'iPhone 12',
      '128GB débloqué',
      480.00,
      'iphone12.jpg',
      '2023-03-01 09:00:00',
      3,
      1
   ),
   (
      'Table bois',
      'Table de salon',
      130.00,
      'table_bois.jpg',
      '2023-04-01 10:10:00',
      4,
      1
   ),
   (
      'Tablette Samsung',
      '10 pouces',
      250.00,
      'tablette1.jpg',
      '2023-05-05 16:20:00',
      3,
      1
   ),
   -- Dima (registered 2024-12-25)
   (
      'Renault Clio',
      'Faible kilométrage',
      9200.00,
      'clio.jpg',
      '2025-01-05 09:15:00',
      1,
      2
   ),
   (
      'Chaussures Nike',
      'Pointure 42',
      80.00,
      'nike42.jpg',
      '2025-01-10 11:30:00',
      2,
      2
   ),
   (
      'Samsung TV',
      'Smart TV 55 pouces',
      600.00,
      'tv_samsung.jpg',
      '2025-01-15 10:20:00',
      3,
      2
   ),
   (
      'Chaise bureau',
      'Ergonomique',
      90.00,
      'chaise_bureau.jpg',
      '2025-01-18 11:45:00',
      4,
      2
   ),
   (
      'Micro-ondes',
      'Fonctionnel',
      60.00,
      'micro_onde.jpg',
      '2025-01-20 17:50:00',
      4,
      2
   ),
   -- Damien (registered 2023-05-10)
   (
      'Yamaha Scooter',
      'Scooter 125cc',
      2300.00,
      'yamaha125.jpg',
      '2023-06-01 14:00:00',
      1,
      3
   ),
   (
      'Montre homme',
      'Marque Fossil',
      120.00,
      'montre_fossil.jpg',
      '2023-06-10 15:10:00',
      2,
      3
   ),
   (
      'PC portable HP',
      '16GB RAM SSD',
      750.00,
      'hp_laptop.jpg',
      '2023-07-01 14:30:00',
      3,
      3
   ),
   (
      'Lampe LED',
      'Faible consommation',
      35.00,
      'lampe_led.jpg',
      '2023-07-15 13:30:00',
      4,
      3
   ),
   (
      'Casque Bluetooth',
      'Réduction de bruit',
      110.00,
      'casque_bt.jpg',
      '2023-08-01 16:10:00',
      3,
      3
   ),
   -- Jerome (registered 2022-08-06)
   (
      'BMW Serie 3',
      'Très bon état général',
      15500.00,
      'bmw3.jpg',
      '2022-09-10 16:45:00',
      1,
      4
   ),
   (
      'Sac à main',
      'Très peu utilisé',
      95.00,
      'sac_main.jpg',
      '2022-10-01 13:40:00',
      2,
      4
   ),
   (
      'Console PS4',
      'Très bon état',
      220.00,
      'ps4.jpg',
      '2022-10-15 18:00:00',
      3,
      4
   ),
   (
      'Tapis salon',
      'Bon état',
      70.00,
      'tapis.jpg',
      '2022-11-01 15:15:00',
      4,
      4
   ),
   (
      'Canapé 3 places',
      'Confortable',
      300.00,
      'canape.jpg',
      '2022-11-20 14:00:00',
      4,
      4
   ),
   -- Kidny (registered 2025-01-12)
   (
      'Vélo électrique',
      'Batterie neuve',
      1200.00,
      'velo_elec.jpg',
      '2025-02-01 11:20:00',
      1,
      5
   ),
   (
      'Pull hiver',
      'Chaud et confortable',
      45.00,
      'pull_hiver.jpg',
      '2025-02-05 17:00:00',
      2,
      5
   ),
   (
      'Casque gaming',
      'Son surround',
      95.00,
      'casque_gaming.jpg',
      '2025-02-10 16:00:00',
      3,
      5
   ),
   (
      'Lampe bureau',
      'LED réglable',
      40.00,
      'lampe_bureau.jpg',
      '2025-02-12 14:30:00',
      4,
      5
   ),
   (
      'Micro USB',
      'Pour streaming',
      70.00,
      'micro_usb.jpg',
      '2025-02-15 18:00:00',
      3,
      5
   ),
   -- Bonus (10 more)
   (
      'Citroën C3',
      'Économique',
      7800.00,
      'c3.jpg',
      '2025-05-01 09:20:00',
      1,
      6
   ),
   (
      'Blouson hiver',
      'Taille L',
      85.00,
      'blouson.jpg',
      '2025-05-02 10:30:00',
      2,
      6
   ),
   (
      'MacBook Air',
      'M1 256GB',
      900.00,
      'macbook_air.jpg',
      '2025-05-03 11:45:00',
      3,
      6
   ),
   (
      'Canapé 3 places',
      'Confortable',
      300.00,
      'canape2.jpg',
      '2025-05-04 14:00:00',
      4,
      6
   ),
   (
      'Tablette Samsung',
      '10 pouces',
      250.00,
      'tablette.jpg',
      '2025-05-05 16:20:00',
      3,
      1
   );

-- INSERT INTO ANNONCE
-- (titre, description, prix, photo, date_public, Id_category, Id_Utilisateur)
-- VALUES
-- -- Véhicules
-- ('Peugeot 208', 'Voiture en bon état', 8500.00, 'peugeot208.jpg', '2024-01-10 10:30:00', 1, 1),
-- ('Renault Clio', 'Faible kilométrage', 9200.00, 'clio.jpg', '2024-01-12 09:15:00', 1, 2),
-- ('Yamaha Scooter', 'Scooter 125cc', 2300.00, 'yamaha125.jpg', '2024-01-15 14:00:00', 1, 3),
-- ('BMW Serie 3', 'Très bon état général', 15500.00, 'bmw3.jpg', '2024-01-18 16:45:00', 1, 4),
-- ('Vélo électrique', 'Batterie neuve', 1200.00, 'velo_elec.jpg', '2024-01-20 11:20:00', 1, 5),
-- -- Mode
-- ('Veste cuir', 'Taille M', 150.00, 'veste_cuir.jpg', '2024-02-01 10:00:00', 2, 1),
-- ('Chaussures Nike', 'Pointure 42', 80.00, 'nike42.jpg', '2024-02-02 11:30:00', 2, 2),
-- ('Montre homme', 'Marque Fossil', 120.00, 'montre_fossil.jpg', '2024-02-03 15:10:00', 2, 3),
-- ('Sac à main', 'Très peu utilisé', 95.00, 'sac_main.jpg', '2024-02-04 13:40:00', 2, 4),
-- ('Pull hiver', 'Chaud et confortable', 45.00, 'pull_hiver.jpg', '2024-02-05 17:00:00', 2, 5),
-- -- Électronique
-- ('iPhone 12', '128GB débloqué', 480.00, 'iphone12.jpg', '2024-03-01 09:00:00', 3, 1),
-- ('Samsung TV', 'Smart TV 55 pouces', 600.00, 'tv_samsung.jpg', '2024-03-02 10:20:00', 3, 2),
-- ('PC portable HP', '16GB RAM SSD', 750.00, 'hp_laptop.jpg', '2024-03-03 14:30:00', 3, 3),
-- ('Casque Bluetooth', 'Réduction de bruit', 110.00, 'casque_bt.jpg', '2024-03-04 16:10:00', 3, 4),
-- ('Console PS4', 'Très bon état', 220.00, 'ps4.jpg', '2024-03-05 18:00:00', 3, 5),
-- -- Autres
-- ('Table bois', 'Table de salon', 130.00, 'table_bois.jpg', '2024-04-01 10:10:00', 4, 1),
-- ('Chaise bureau', 'Ergonomique', 90.00, 'chaise_bureau.jpg', '2024-04-02 11:45:00', 4, 2),
-- ('Lampe LED', 'Faible consommation', 35.00, 'lampe_led.jpg', '2024-04-03 13:30:00', 4, 3),
-- ('Tapis salon', 'Bon état', 70.00, 'tapis.jpg', '2024-04-04 15:15:00', 4, 4),
-- ('Micro-ondes', 'Fonctionnel', 60.00, 'micro_onde.jpg', '2024-04-05 17:50:00', 4, 5),
-- -- Bonus (10 more)
-- ('Citroën C3', 'Économique', 7800.00, 'c3.jpg', '2024-05-01 09:20:00', 1, 6),
-- ('Blouson hiver', 'Taille L', 85.00, 'blouson.jpg', '2024-05-02 10:30:00', 2, 6),
-- ('MacBook Air', 'M1 256GB', 900.00, 'macbook_air.jpg', '2024-05-03 11:45:00', 3, 6),
-- ('Canapé 3 places', 'Confortable', 300.00, 'canape.jpg', '2024-05-04 14:00:00', 4, 6),
-- ('Tablette Samsung', '10 pouces', 250.00, 'tablette.jpg', '2024-05-05 16:20:00', 3, 1);