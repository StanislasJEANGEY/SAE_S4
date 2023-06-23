# SAE_S4

Projet d'appli Backend + Frontend + Mobile

Membres :
BRESSON Jules
JEANGEY Stanislas
MELCHIOR Damien
ROBERT Antonin

Plage de port utilisé : 18090->18099

URL dépôt git : https://github.com/StanislasJEANGEY/SAE_S4.git

Identifiants et mots de passe pour se connecter sur MiniPress:

-   admin : admin
-   Jean : jean
-   Nicolas : nicolas

Liens utiles :

-   appli (http://docketu.iutnc.univ-lorraine.fr:18095)
-   api (http://docketu.iutnc.univ-lorraine.fr:18096)
-   webjs (http://docketu.iutnc.univ-lorraine.fr:18099)
-   phpmyadmin (http://docketu.iutnc.univ-lorraine.fr:18097)
-   sql (http://docketu.iutnc.univ-lorraine.fr:18098) network : sql.db

## Application backend

### Fonctionnalités

Lien vers le sujet :  
https://arche.univ-lorraine.fr/pluginfile.php/3211556/mod_resource/content/2/Sujet-Architecture-SAE-S4-DWM.01.pdf

| Fonctionnalité                                              | Nom de la personne | Statut |
| ----------------------------------------------------------- | :----------------: | :----: |
| 1. Créer un article                                         |       Jules        |   OK   |
| 2. Créer un article en choisissant une catégorie            |      Antonin       |   OK   |
| 3. Afficher la liste des articles                           |     Stanislas      |   OK   |
| 4. Afficher la liste des articles en filtrant par catégorie |     Stanislas      |   OK   |
| 5. Création d’une catégorie                                 |      Antonin       |   OK   |
| 6. Formulaire d’authentification                            |       Damien       |   OK   |
| 7. Contrôle d’accès                                         |       Damien       |   OK   |
| 8. Auteurs                                                  |    Jules/Damien    |   OK   |
| 9. API : liste des catégories                               |     Stanislas      |   OK   |
| 10. API : liste des articles                                |     Stanislas      |   OK   |
| 11. API : articles d’une catégorie                          |     Stanislas      |   OK   |
| 12. API : article complet                                   |      Antonin       |   OK   |
| 13. API : liste des articles d’un auteur                    |     Stanislas      |   OK   |
| 14. Publication/dépublication des articles                  |      Antonin       |   OK   |
| 15. Création d’utilisateurs                                 |       Damien       |   OK   |
| 16. Tri de la liste d’articles dans l’API                   |     Stanislas      |   OK   |

## Précision sur la répartition des tâches :

Au démarrage du projet, Jules et Stanislas se sont occupé de mettre en place l'architecture du projet.
Stanislas et Antonin se sont occupé de l'API, pendant que Jules et Damien commençaient à travailler sur quelques fonctionnalités.
De plus, Damien s'est occupé de l'aspect visuel de l'application.

## Application mobile

### Fonctionnalités

| Fonctionnalité                                                                            | Nom de la personne | Statut |
| ----------------------------------------------------------------------------------------- | :----------------: | :----: |
| 1. Affichage de la liste des articles                                                     |       Jules        |   OK   |
| 2. Affichage de la liste des catégories dans une zone dédiée de la page                   |       Jules        |   OK   |
| 3. Affichage de la liste des articles d’une catégorie, en cliquant sur la catégorie       |       Jules        |   OK   |
| 4. Affichage complet d’un article en cliquant sur un article dans une liste               |       Jules        |   OK   |
| 5. Affichage de la liste des articles d’un auteur en cliquant sur son nom                 |       Damien       |   OK   |
| 6. Tri des listes d’articles selon l’ordre ascendant ou descendant de la date de création |    Damien/Jules    |   OK   |
| 7. Filtrage des listes d’articles selon un mot clé dans le titre                          |       Jules        |   OK   |
| 8. Filtrage des listes d’articles selon un mot clé dans le titre ou dans le résumé        |       Jules        |   OK   |

## Précision sur la répartition des tâches :

Au démarrage de la partie mobile du projet, Jules s'occupait des bases du projet et a fait quelques fonctionnalités
Pendant que Damien s'occupait de lier l'application mobile à l'API, et s'est également occupé de l'affichage du markdown.
De plus, Damien s'est aussi beaucoup occupé de l'aspect visuel de l'application mobile.
C'est pour cela que Damien n'apparait que très peu dans le tableau des fonctionnalités alors que son implication dans le projet est significative.

## Application web javascript

### Fonctionnalités

| Fonctionnalité                                                                            | Nom de la personne | Statut |
| ----------------------------------------------------------------------------------------- | :----------------: | :----: |
| 1. Affichage de la liste des articles                                                     |     Stanislas      |   OK   |
| 2. Affichage de la liste des catégories dans une zone dédiée de la page                   |     Stanislas      |   OK   |
| 3. Affichage de la liste des articles d’une catégorie, en cliquant sur la catégorie       |     Stanislas      |   OK   |
| 4. Affichage complet d’un article en cliquant sur un article dans une liste               |     Stanislas      |   OK   |
| 5. Affichage de la liste des articles d’un auteur en cliquant sur son nom                 |     Stanislas      |   OK   |
| 6. Tri des listes d’articles selon l’ordre ascendant ou descendant de la date de création |      Antonin       |   OK   |
| 7. Filtrage des listes d’articles selon un mot clé dans le titre                          |      Antonin       |   OK   |
| 8. Filtrage des listes d’articles selon un mot clé dans le titre ou dans le résumé        |      Antonin       |   OK   |

## Précision sur la répartition des tâches :

Antonin s'est occupé de faire le fichier loader qui permet de charger les données avec l'api. Il a également fait les
les méthodes de tri et de filtres des articles. A côté, Stanislas s'est occupé de la gestion des classes, de l'affichage
et des évenements de l'application javascript.
