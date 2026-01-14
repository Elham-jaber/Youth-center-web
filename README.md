# Youth Center — Application Web (CodeIgniter 4)

##  Présentation
**Youth Center** est une application web développée en **PHP avec le framework CodeIgniter 4**.
Le projet a été réalisé dans le cadre de la **Licence 3 Informatique – RESAWEB 2025 (UBO Brest)**.

L’application permet à une association de jeunesse de gérer :
- les demandes de contact,
- le suivi des messages,
- les comptes utilisateurs,
- les réservations de ressources,
avec des espaces distincts pour les **visiteurs**, **membres** et **administrateurs**.

---

##  Technologies utilisées
- PHP
- CodeIgniter 4
- MySQL
- phpMyAdmin
- SQL (tables, vues, fonctions, procédures, triggers)
- HTML / CSS / JavaScript
- IDE : Visual Studio Code

---

##  Méthodologie
Le projet a été développé selon la méthodologie **Agile Scrum**, avec :
- découpage en sprints,
- backlog produit,
- livraisons progressives,
- amélioration continue.

---

##  Fonctionnalités principales

###  Visiteur
- Accès à la partie publique (Accueil)
- Consultation des actualités
- Formulaire de contact avec validation
- Suivi de sa demande via un code unique

---

###  Membre
- Connexion sécurisée
- Consultation des réservations
- Réservation de ressources selon les créneaux disponibles
- Visualisation de l’état des réservations

---

###  Administrateur
- Gestion des messages de contact (lecture / réponse)
- Gestion des ressources (ajout / suppression)
- Consultation des réservations par date et par ressource
- Accès aux statistiques

---

##  Architecture — MVC
L’application respecte le pattern **MVC (Model – View – Controller)**.

- **Controllers** : gestion des routes et de la logique applicative
- **Models** : accès à la base de données et règles métier
- **Views** : interface utilisateur (HTML / CSS)

CodeIgniter joue le rôle de chef d’orchestre et assure la séparation des responsabilités.

---

##  Base de données
La base de données MySQL comprend :
- des **tables relationnelles**
- des **vues SQL**
- des **fonctions**
- des **procédures stockées**
- des **triggers**



### Import
1. Créer une base de données via phpMyAdmin
2. Importer le fichier `database/youth_center.sql`
3. Configurer la connexion dans le fichier `.env` (non versionné)

---

##  Sécurité
- Accès aux espaces privés protégé par authentification
- Impossible d’accéder aux pages privées sans connexion valide
- Le fichier `.env` n’est pas versionné (sécurité des identifiants)

---

## Installation locale
1. Cloner le dépôt GitHub
2. Installer un serveur local (XAMPP / WAMP / Laragon)
3. Configurer le fichier `.env`
4. Importer la base de données
5. Lancer l’application depuis le navigateur

---

##  Contexte académique
- Formation : **Licence 3 Informatique**
- Module : **RESAWEB**
- Année : **2024–2025**
- Université : **UBO Brest**
- Rédigé par : **Elham Jaber**

---

##  Points clés du projet
- Respect du pattern MVC
- Utilisation avancée de SQL (vues, triggers, procédures)
- Application web fonctionnelle et sécurisée
- Projet versionné sur GitHub


 Le script SQL est disponible dans le dossier : database.
