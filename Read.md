🎯 Objectif

Weekly veut créer une plateforme web où les utilisateurs peuvent publier, consulter et commenter des annonces.

L'application sera développée avec Laravel 11 en respectant les bonnes pratiques :

​

✅ Gestion des utilisateurs: avec un système d'authentification sécurisé (Laravel Breeze, Jetstream ou Laravel UI).

✅ CRUD complet pour les annonces, avec pagination et soft delete.

✅ Gestion des catégories pour classer les annonces.

✅ Commentaires sous chaque annonce.

✅ Utilisation des outils artisan (php artisan make --all), seeders, factories et REPL (Tinker) pour le développement et les tests.

​

🏗 Technologies et Outils

Framework : Laravel (dernière version stable)
Base de données : MySQL / PostgreSQL
Frontend : Blade + Tailwind CSS (via Laravel Breeze/Jetstream)
Authentification : Laravel Breeze / Jetstream / UI
Outils de développement :
php artisan make:model -mcr (Modèles, Migrations, Controllers, Requests)
php artisan make:seeder & php artisan make:factory (Données de test)
php artisan tinker (REPL pour tester les requêtes)
Eloquent ORM pour manipuler les données
​

📌 Architecture du Projet

​

1️⃣ Gestion des Utilisateurs (users)

📌 Authentification (Laravel Breeze / Jetstream)

📌 Profils utilisateurs

📌 Rôles et permissions (ex: admin, utilisateur) (bonus)

📌 Modèle : User

id (PK)
name
email (unique)
password
role (admin, user) (bonus)
timestamps
​

📌 Fonctionnalités

✅ Inscription / Connexion

✅ Gestion de profil

✅ Middleware pour restreindre certaines pages

​

2️⃣ Gestion des Annonces (annonces)

📌 CRUD avec pagination

📌 Soft delete pour la suppression

📌 Liées aux utilisateurs et aux catégories

​

📌 Modèle : Annonce

id (PK)
titre
description
prix (optionnel)
image (optionnel)
user_id (FK → users)
categorie_id (FK → categories)
status (actif, brouillon, archivé)
deleted_at (Soft Delete)
timestamps
​

📌 Fonctionnalités

✅ Affichage et création d'annonces

✅ Modification et suppression (soft delete)

✅ Pagination (->paginate(10))

​

​

3️⃣ Gestion des Catégories (categories)

📌 Organisation des annonces par catégorie

📌 CRUD pour l’admin

​

📌 Modèle : Categorie

id (PK)
nom (unique)
slug (SEO-friendly)
timestamps
​

​

📌 Fonctionnalités

✅ Affichage des catégories

✅ Lier une annonce à une catégorie

​

4️⃣ Gestion des Commentaires

📌 Liés aux annonces et aux utilisateurs

📌 Système de validation avant soumission

​

📌 Modèle : Commentaire

id (PK)
contenu
user_id (FK → users)
annonce_id (FK → annonces)
timestamps
​

📌 Fonctionnalités

✅ Ajouter un commentaire à une annonce

✅ Supprimer ses propres commentaires

​

🛠 Outils et Artisan Commands

1️⃣ Génération des modèles et migrations

2️⃣ Ajout des factories et seeders

3️⃣ Utilisation de Tinker (REPL) pour tester

​

✅ Bonnes Pratiques

🔹 Utiliser les Form Requests pour valider les entrées utilisateurs

🔹 Middleware pour sécuriser l'accès aux ressources

🔹 Soft delete pour éviter la suppression définitive des annonces

🔹 Utilisation des Relations Eloquent