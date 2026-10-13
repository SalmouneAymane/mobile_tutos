# Sprint 1 : Cadrer le projet et développer en POO

Bienvenue dans le code source du Sprint 1. Ce dossier contient la première version de l'application de gestion de contenus (Blog).

L'objectif de ce sprint est de poser les bases : développement du premier CRUD avec la Programmation Orientée Objet (POO), construction de l'interface avec Tailwind CSS, et initiation à la communication asynchrone (SPA).

Consultez le fichier `cahier_des_charges.md` pour le détail des étapes à réaliser.

## Comment tester le projet en local ?

Pour exécuter le projet et tester l'interface ou le Backend, vous pouvez utiliser le serveur web intégré de PHP.

1. Ouvrez votre terminal (ligne de commande) et naviguez jusqu'au dossier `sprint-1/`.
2. Lancez le serveur local PHP en activant l'affichage des erreurs avec la commande suivante :
   ```bash
   php -S localhost:8000 -d display_errors=1 -d error_reporting=E_ALL
   ```
3. Ouvrez votre navigateur internet :
   - Pour voir l'interface (Frontend) : accédez à [http://localhost:8000](http://localhost:8000)
   - Pour tester le script API (Backend) : accédez à [http://localhost:8000/backend/api.php](http://localhost:8000/backend/api.php)

> **Note :** L'ajout de `-d display_errors=1` permet de forcer l'affichage des messages d'erreur PHP directement dans le navigateur, ce qui vous aidera grandement à corriger vos bugs.
