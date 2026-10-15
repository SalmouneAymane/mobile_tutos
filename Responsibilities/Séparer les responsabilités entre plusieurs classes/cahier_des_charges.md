# Cahier des Charges - Sprint 1

## Objectif Principal
Développer la première version de l'application en posant les bases de la Programmation Orientée Objet (POO) et de l'interface visuelle (Tailwind CSS et Javascript asynchrone).

## Étapes de réalisation

### Étape 1 : Conception et Cadrage
* **Tâche :** Analyser les maquettes et leurs descriptions fournies dans le dossier `maquettes-blog/_observation-maquettes`.
* **Tâche :** Identifier les acteurs et construire les cas d'utilisation pour la gestion de l'administration du blog en se basant sur l'observation de ces maquettes.
* **Résultat attendu :** Un document listant les cas d'utilisation et scénarios principaux dérivés des maquettes.

### Étape 2 : Développement du CRUD (Backend)
* **Tâche :** Développer la classe PHP `Categorie`.
* **Tâche :** Implémenter les méthodes nécessaires pour réaliser un CRUD complet (Create, Read, Update, Delete) sur la table des catégories.
* **Résultat attendu :** Un code PHP fonctionnel gérant l'enregistrement et la lecture des catégories dans un fichier JSON de manière orientée objet.

### Étape 3 : Construction de l'Interface (Frontend)
* **Tâche :** Créer les pages HTML pour afficher la liste des catégories, le formulaire d'ajout et d'édition.
* **Tâche :** Utiliser les classes utilitaires de **Tailwind CSS** pour styliser ces pages proprement.
* **Résultat attendu :** Une interface visuelle claire et structurée.

### Étape 4 : Interactivité (SPA)
* **Tâche :** Utiliser Javascript (fonction `fetch()`) pour charger la liste des catégories de manière asynchrone.
* **Résultat attendu :** La liste s'affiche sans que la page web n'ait besoin de se recharger entièrement.

## Architecture Attendue (Fin du Sprint 1)
Voici l'arborescence type attendue à la fin de ce sprint :

```text
sprint-1/
├── assets/
│   ├── css/
│   │   └── style.css       (Fichier CSS, incluant Tailwind)
│   └── js/
│       └── app.js          (Script gérant l'interactivité et fetch)
├── backend/
│   ├── Categorie.php       (Classe POO gérant les données et le CRUD)
│   └── api.php             (Fichier PHP cible pour les requêtes asynchrones)
├── conception/
│   └── use_cases.mmd       (Livrable de l'étape 1 : diagrammes Mermaid des cas d'utilisation)
└── index.html              (Interface principale HTML)
```
