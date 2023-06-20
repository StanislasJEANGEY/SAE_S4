-- Suppression des tables si elles existent
DROP TABLE IF EXISTS articles;
DROP TABLE IF EXISTS auteurs;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS users;


-- Création de la base de données
CREATE DATABASE IF NOT EXISTS minipress;

-- Utilisation de la base de données
USE minipress;

-- Création de la table "users"
CREATE TABLE users
(
    id       INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) UNIQUE NOT NULL,
    email    VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255)        NOT NULL,
    role     INT                 NOT NULL
);

-- Création de la table "categories"
CREATE TABLE categories
(
    id  INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL
);

-- Création de la table "auteurs"
CREATE TABLE auteurs
(
    id      INT PRIMARY KEY AUTO_INCREMENT,
    nom     VARCHAR(255) NOT NULL,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES users (id)
);

-- Création de la table "articles"
CREATE TABLE articles
(
    id            INT PRIMARY KEY AUTO_INCREMENT,
    titre         VARCHAR(255) NOT NULL,
    resume        TEXT,
    contenu       TEXT         NOT NULL,
    date_creation DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    image_url     VARCHAR(255),
    categorie_id  INT,
    auteur_id     INT,
    publie        BOOLEAN      NOT NULL DEFAULT FALSE,
    FOREIGN KEY (categorie_id) REFERENCES categories (id),
    FOREIGN KEY (auteur_id) REFERENCES auteurs (id)
);


-- Insertion de catégories
INSERT INTO categories (nom)
VALUES ('Technologie'),
       ('Sport'),
       ('Mode');

-- Insertion d'utilisateurs
INSERT INTO users (username, email, password, role)
VALUES ('admin', 'admin@mail.com', '$2y$10$SdTtHv3a9giMTg8iQ3QOzufnmKWMwYkNV2Q8B9gdXsnpcX4WyKisS', 2);

-- Insertion d'auteurs
INSERT INTO auteurs (nom, user_id)
VALUES ('admin', 1);

-- Insertion d'articles
INSERT INTO articles (titre, resume, contenu, date_creation, image_url, categorie_id, auteur_id, publie)
VALUES (' Article 1', '## Résumé
Dans cet article, nous explorons les fonctionnalités de Markdown et comment les utiliser pour formater du contenu. Découvrez comment ajouter des titres, créer des listes, insérer des liens et des images, et bien plus encore !
', '
### Paragraphe 1
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam placerat massa eu ex aliquet, eget consequat nunc varius. Sed ac malesuada turpis. *Italique* et **gras** peuvent être utilisés pour mettre en valeur certaines parties du texte. Par exemple, vous pouvez créer une liste non ordonnée pour résumer vos points principaux :

- Fonctionnalité 1
- Fonctionnalité 2
- Fonctionnalité 3

### Paragraphe 2
Maecenas ac est malesuada, rutrum quam in, eleifend eros. Mauris sit amet enim eu lacus cursus efficitur. Vous pouvez également créer des liens vers des ressources externes. Par exemple, voici un [lien vers notre site Web](https://www.example.com) où vous pouvez en apprendre davantage sur ces fonctionnalités.

### Paragraphe 3
Vestibulum et aliquet massa, quis commodo nisl. Fusce tincidunt, risus in dignissim semper, leo eros accumsan nulla, at viverra tellus tellus sed odio. Vous pouvez insérer des images dans votre contenu en utilisant la syntaxe suivante :

', '2023-06-01 10:00:00','https://exemple.com/image1.jpg', 1, 1, 1),

(' Article 2', '## Résumé
Dans cet article, nous explorons les fonctionnalités de Markdown et comment les utiliser pour formater du contenu. Découvrez comment ajouter des titres, créer des listes, insérer des liens et des images, et bien plus encore !
', '
### Paragraphe 1
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam placerat massa eu ex aliquet, eget consequat nunc varius. Sed ac malesuada turpis. *Italique* et **gras** peuvent être utilisés pour mettre en valeur certaines parties du texte. Par exemple, vous pouvez créer une liste non ordonnée pour résumer vos points principaux :

- Fonctionnalité 1
- Fonctionnalité 2
- Fonctionnalité 3

### Paragraphe 2
Maecenas ac est malesuada, rutrum quam in, eleifend eros. Mauris sit amet enim eu lacus cursus efficitur. Vous pouvez également créer des liens vers des ressources externes. Par exemple, voici un [lien vers notre site Web](https://www.example.com) où vous pouvez en apprendre davantage sur ces fonctionnalités.

### Paragraphe 3
Vestibulum et aliquet massa, quis commodo nisl. Fusce tincidunt, risus in dignissim semper, leo eros accumsan nulla, at viverra tellus tellus sed odio. Vous pouvez insérer des images dans votre contenu en utilisant la syntaxe suivante :

', '2023-06-01 11:00:00','https://exemple.com/image2.jpg', 1, 1, 1),

(' Article 3', '## Résumé
Dans cet article, nous explorons les fonctionnalités de Markdown et comment les utiliser pour formater du contenu. Découvrez comment ajouter des titres, créer des listes, insérer des liens et des images, et bien plus encore !
', '
### Paragraphe 1
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam placerat massa eu ex aliquet, eget consequat nunc varius. Sed ac malesuada turpis. *Italique* et **gras** peuvent être utilisés pour mettre en valeur certaines parties du texte. Par exemple, vous pouvez créer une liste non ordonnée pour résumer vos points principaux :

- Fonctionnalité 1
- Fonctionnalité 2
- Fonctionnalité 3

### Paragraphe 2
Maecenas ac est malesuada, rutrum quam in, eleifend eros. Mauris sit amet enim eu lacus cursus efficitur. Vous pouvez également créer des liens vers des ressources externes. Par exemple, voici un [lien vers notre site Web](https://www.example.com) où vous pouvez en apprendre davantage sur ces fonctionnalités.

### Paragraphe 3
Vestibulum et aliquet massa, quis commodo nisl. Fusce tincidunt, risus in dignissim semper, leo eros accumsan nulla, at viverra tellus tellus sed odio. Vous pouvez insérer des images dans votre contenu en utilisant la syntaxe suivante :

', '2023-06-01 12:00:00','https://exemple.com/image3.jpg', 1, 1, 1),

(' Article 4', '## Résumé
Dans cet article, nous explorons les fonctionnalités de Markdown et comment les utiliser pour formater du contenu. Découvrez comment ajouter des titres, créer des listes, insérer des liens et des images, et bien plus encore !
', '
### Paragraphe 1
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam placerat massa eu ex aliquet, eget consequat nunc varius. Sed ac malesuada turpis. *Italique* et **gras** peuvent être utilisés pour mettre en valeur certaines parties du texte. Par exemple, vous pouvez créer une liste non ordonnée pour résumer vos points principaux :

- Fonctionnalité 1
- Fonctionnalité 2
- Fonctionnalité 3

### Paragraphe 2
Maecenas ac est malesuada, rutrum quam in, eleifend eros. Mauris sit amet enim eu lacus cursus efficitur. Vous pouvez également créer des liens vers des ressources externes. Par exemple, voici un [lien vers notre site Web](https://www.example.com) où vous pouvez en apprendre davantage sur ces fonctionnalités.

### Paragraphe 3
Vestibulum et aliquet massa, quis commodo nisl. Fusce tincidunt, risus in dignissim semper, leo eros accumsan nulla, at viverra tellus tellus sed odio. Vous pouvez insérer des images dans votre contenu en utilisant la syntaxe suivante :

', '2023-06-01 19:45:00','https://exemple.com/image98.jpg', 1, 1, 1),

(' Article 5', '## Résumé
Dans cet article, nous explorons les fonctionnalités de Markdown et comment les utiliser pour formater du contenu. Découvrez comment ajouter des titres, créer des listes, insérer des liens et des images, et bien plus encore !
', '
### Paragraphe 1
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam placerat massa eu ex aliquet, eget consequat nunc varius. Sed ac malesuada turpis. *Italique* et **gras** peuvent être utilisés pour mettre en valeur certaines parties du texte. Par exemple, vous pouvez créer une liste non ordonnée pour résumer vos points principaux :

- Fonctionnalité 1
- Fonctionnalité 2
- Fonctionnalité 3

### Paragraphe 2
Maecenas ac est malesuada, rutrum quam in, eleifend eros. Mauris sit amet enim eu lacus cursus efficitur. Vous pouvez également créer des liens vers des ressources externes. Par exemple, voici un [lien vers notre site Web](https://www.example.com) où vous pouvez en apprendre davantage sur ces fonctionnalités.

### Paragraphe 3
Vestibulum et aliquet massa, quis commodo nisl. Fusce tincidunt, risus in dignissim semper, leo eros accumsan nulla, at viverra tellus tellus sed odio. Vous pouvez insérer des images dans votre contenu en utilisant la syntaxe suivante :

', '2023-06-01 10:56:00','https://exemple.com/image1.jpg', 1, 1, 1),

('Article 6', '## Résumé
Dans cet article, nous explorons les fonctionnalités de Markdown et comment les utiliser pour formater du contenu. Découvrez comment ajouter des titres, créer des listes, insérer des liens et des images, et bien plus encore !
', '
### Paragraphe 1
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam placerat massa eu ex aliquet, eget consequat nunc varius. Sed ac malesuada turpis. *Italique* et **gras** peuvent être utilisés pour mettre en valeur certaines parties du texte. Par exemple, vous pouvez créer une liste non ordonnée pour résumer vos points principaux :

- Fonctionnalité 1
- Fonctionnalité 2
- Fonctionnalité 3

### Paragraphe 2
Maecenas ac est malesuada, rutrum quam in, eleifend eros. Mauris sit amet enim eu lacus cursus efficitur. Vous pouvez également créer des liens vers des ressources externes. Par exemple, voici un [lien vers notre site Web](https://www.example.com) où vous pouvez en apprendre davantage sur ces fonctionnalités.

### Paragraphe 3
Vestibulum et aliquet massa, quis commodo nisl. Fusce tincidunt, risus in dignissim semper, leo eros accumsan nulla, at viverra tellus tellus sed odio. Vous pouvez insérer des images dans votre contenu en utilisant la syntaxe suivante :

', '2023-06-15 13:00:00','https://exemple.com/image1.jpg', 1, 1, 1),

(' Article 7', '## Résumé
Dans cet article, nous explorons les fonctionnalités de Markdown et comment les utiliser pour formater du contenu. Découvrez comment ajouter des titres, créer des listes, insérer des liens et des images, et bien plus encore !
', '
### Paragraphe 1
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam placerat massa eu ex aliquet, eget consequat nunc varius. Sed ac malesuada turpis. *Italique* et **gras** peuvent être utilisés pour mettre en valeur certaines parties du texte. Par exemple, vous pouvez créer une liste non ordonnée pour résumer vos points principaux :

- Fonctionnalité 1
- Fonctionnalité 2
- Fonctionnalité 3

### Paragraphe 2
Maecenas ac est malesuada, rutrum quam in, eleifend eros. Mauris sit amet enim eu lacus cursus efficitur. Vous pouvez également créer des liens vers des ressources externes. Par exemple, voici un [lien vers notre site Web](https://www.example.com) où vous pouvez en apprendre davantage sur ces fonctionnalités.

### Paragraphe 3
Vestibulum et aliquet massa, quis commodo nisl. Fusce tincidunt, risus in dignissim semper, leo eros accumsan nulla, at viverra tellus tellus sed odio. Vous pouvez insérer des images dans votre contenu en utilisant la syntaxe suivante :

', '2023-07-01 10:00:00','https://exemple.com/image1.jpg', 1, 1, 0),

(' Article 8', '## Résumé
Dans cet article, nous explorons les fonctionnalités de Markdown et comment les utiliser pour formater du contenu. Découvrez comment ajouter des titres, créer des listes, insérer des liens et des images, et bien plus encore !
', '
### Paragraphe 1
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam placerat massa eu ex aliquet, eget consequat nunc varius. Sed ac malesuada turpis. *Italique* et **gras** peuvent être utilisés pour mettre en valeur certaines parties du texte. Par exemple, vous pouvez créer une liste non ordonnée pour résumer vos points principaux :

- Fonctionnalité 1
- Fonctionnalité 2
- Fonctionnalité 3

### Paragraphe 2
Maecenas ac est malesuada, rutrum quam in, eleifend eros. Mauris sit amet enim eu lacus cursus efficitur. Vous pouvez également créer des liens vers des ressources externes. Par exemple, voici un [lien vers notre site Web](https://www.example.com) où vous pouvez en apprendre davantage sur ces fonctionnalités.

### Paragraphe 3
Vestibulum et aliquet massa, quis commodo nisl. Fusce tincidunt, risus in dignissim semper, leo eros accumsan nulla, at viverra tellus tellus sed odio. Vous pouvez insérer des images dans votre contenu en utilisant la syntaxe suivante :

', '2023-07-01 10:00:00','https://exemple.com/image1.jpg', 1, 1, 0)


