-- Suppression des tables si elles existent
DROP TABLE IF EXISTS articles;
DROP TABLE IF EXISTS auteurs;
DROP TABLE IF EXISTS categories;


-- Création de la base de données
CREATE DATABASE minipress;

-- Utilisation de la base de données
USE minipress;

-- Création de la table "categories"
CREATE TABLE categories (
                            id INT PRIMARY KEY AUTO_INCREMENT,
                            nom VARCHAR(255) NOT NULL
);

-- Création de la table "auteurs"
CREATE TABLE auteurs (
                         id INT PRIMARY KEY AUTO_INCREMENT,
                         nom VARCHAR(255) NOT NULL
);

-- Création de la table "articles"
CREATE TABLE articles (
                          id INT PRIMARY KEY AUTO_INCREMENT,
                          titre VARCHAR(255) NOT NULL,
                          resume TEXT,
                          contenu TEXT NOT NULL,
                          date_creation DATETIME NOT NULL,
                          image_url VARCHAR(255),
                          categorie_id INT,
                          auteur_id INT,
                          FOREIGN KEY (categorie_id) REFERENCES categories(id),
                          FOREIGN KEY (auteur_id) REFERENCES auteurs(id)
);

-- Insertion de catégories
INSERT INTO categories (nom) VALUES
                                 ('Technologie'),
                                 ('Sport'),
                                 ('Mode');

-- Insertion d'auteurs
INSERT INTO auteurs (nom) VALUES
                              ('Auteur 1'),
                              ('Auteur 2');

-- Insertion d'articles
INSERT INTO articles (titre, resume, contenu, date_creation, image_url, categorie_id, auteur_id) VALUES
                                                                                                     ('Article 1', 'Résumé de l\'article 1', 'Contenu de l\'article 1...', '2023-06-01 10:00:00', 'https://exemple.com/image1.jpg', 1, 1),
                                                                                                     ('Article 2', 'Résumé de l\'article 2', 'Contenu de l\'article 2...', '2023-06-02 14:30:00', 'https://exemple.com/image2.jpg', 2, 1),
                                                                                                     ('Article 3', 'Résumé de l\'article 3', 'Contenu de l\'article 3...', '2023-06-03 16:45:00', 'https://exemple.com/image3.jpg', 3, 2),
                                                                                                     ('Article 4', 'Résumé de l\'article 4', 'Contenu de l\'article 4...', '2023-06-04 09:15:00', 'https://exemple.com/image4.jpg', 1, 2),
                                                                                                     ('Article 5', 'Résumé de l\'article 5', 'Contenu de l\'article 5...', '2023-06-05 11:30:00', 'https://exemple.com/image5.jpg', 2, 1),
                                                                                                     ('Article 6', 'Résumé de l\'article 6', 'Contenu de l\'article 6...', '2023-06-06 13:45:00', 'https://exemple.com/image6.jpg', 3, 2),
                                                                                                     ('Article 7', 'Résumé de l\'article 7', 'Contenu de l\'article 7...', '2023-06-07 15:00:00', 'https://exemple.com/image7.jpg', 1, 1),
                                                                                                     ('Article 8', 'Résumé de l\'article 8', 'Contenu de l\'article 8...', '2023-06-08 17:15:00', 'https://exemple.com/image8.jpg', 2, 2);
