# Documentation – Gestion de Projet Symfony (ECF)

## Présentation du projet

Ce projet est une application web développée avec le framework Symfony. Il répond à un besoin spécifique de gestion de comptes utilisateurs avec différents rôles (admin, employé, utilisateur), de publication de trajets, de réservation, et d'administration.

---

## Mise en place de l'environnement de travail

L’environnement a été mis en place avec les outils suivants :

-   **OS :** Windows 10
-   **IDE :** Visual Studio Code avec les extensions PHP/Symfony
-   **PHP :** Version 8.2
-   **Serveur local :** Symfony CLI (serveur interne)
-   **Base de données :** MySQL/MariaDB (phpMyAdmin)
-   **Versionnement :** Git avec GitHub
-   **Dépendances :** via Composer

**Choix justifiés :**

-   Symfony pour sa robustesse, son architecture MVC claire et ses bundles intégrés.
-   Composer pour la gestion des dépendances.
-   Git pour le travail en version contrôlée.
-   Symfony CLI pour un serveur de développement optimisé et simplifié.

---

## Mécanismes de sécurité mis en place

### Frontend

-   Validation HTML5 sur les formulaires.
-   Utilisation de Bootstrap pour le gain de temps et la réutilisabilité des composants.

### Backend

-   Protection CSRF sur les formulaires Symfony.
-   Validation des données via les contraintes `@Assert` dans les entités.
-   Rôles utilisateurs (`ROLE_USER`, `ROLE_EMPLOYE`, `ROLE_ADMIN`) vérifiés avant autorisation d'accès.
-   Authentification via le composant `security.yaml`.
-   Hashage des mots de passe avec `PasswordHasherInterface`.

---

## Veille technologique

Durant le projet, j'ai consulté les documentations officielles :

-   Symfony : https://symfony.com/doc
-   Doctrine : https://www.doctrine-project.org/
-   Heroku : https://devcenter.heroku.com/articles/php-support

---

## Gestion de version (Git)

-   Branche principale : `main`
-   Branche de développement : `dev`
-   Autre branche : `heroku*`
-   Fusion avec `pull request` et validation de commit (`git commit -m "Fix: ..."`)

---

## Déploiement

-   Environnement de production : Heroku
-   Variables d’environnement configurées via `.env.local`
-   Commandes utilisées :
    ```bash
    composer install --no-dev --optimize-autoloader
    php bin/console cache:clear --env=prod
    php bin/console doctrine:migrations:migrate
    ```
