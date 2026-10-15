# Plan d'implémentation du Sprint 1

Ce plan définit le déroulement du Sprint 1 selon les directives du `cahier_des_charges.md`. Il est structuré pour s'exécuter avec le workflow du skill `executeur-sprint`, garantissant la validation du concepteur à chaque étape clé.

## Étapes de réalisation proposées

### Étape 1 : Conception et Cadrage
*   **Objectif :** Identifier les cas d'utilisation pour la gestion de l'administration du blog à partir des maquettes.
*   **Skills utilisés :** `dev-conception-n2` (Pour l'aide à la formulation des cas d'utilisation et scénarios).
*   **Workflow (executeur-sprint) :**
    1.  Demande de validation avant analyse des maquettes.
    2.  Analyse du dossier `maquettes-blog/_observation-maquettes`.
    3.  Création du fichier `conception/use_cases.mmd`.
    4.  Demande de validation du résultat de l'étape 1 avant de passer à l'étape 2.

---

### Étape 2 : Développement du CRUD (Backend)
*   **Objectif :** Développer la classe PHP `Categorie` et ses méthodes pour un CRUD complet.
*   **Skills utilisés :** `dev-poo-n2` (Pour le code PHP objet propre) et `dev-architecture-n2` (Pour s'assurer d'une bonne séparation Modèle/Données).
*   **Workflow (executeur-sprint) :**
    1.  Demande de validation avant d'entamer le code Backend.
    2.  Création de `backend/Categorie.php` pour la structure de données.
    3.  Création de `backend/api.php` pour la réception des appels.
    4.  Demande de validation du code PHP (Étape 2) avant de passer au Frontend.

---

### Étape 3 : Construction de l'Interface (Frontend)
*   **Objectif :** Créer la page HTML et l'intégrer avec Tailwind CSS pour la gestion des catégories.
*   **Skills utilisés :** `dev-frontend-n2` (Pour l'application stricte de Tailwind CSS en simplifiant le code HTML des maquettes).
*   **Workflow (executeur-sprint) :**
    1.  Demande de validation avant de démarrer l'intégration HTML/CSS.
    2.  Création du fichier racine `index.html`.
    3.  Création/Mise à jour de `assets/css/style.css`.
    4.  Demande de validation visuelle et structurelle (Étape 3) avant d'ajouter l'interactivité.

---

### Étape 4 : Interactivité Javascript (SPA)
*   **Objectif :** Rendre la liste des catégories asynchrone en utilisant Javascript natif (`fetch`).
*   **Skills utilisés :** `dev-frontend-n2` (Pour la partie Single Page Application avec Vanilla JS).
*   **Workflow (executeur-sprint) :**
    1.  Demande de validation avant de commencer le code Javascript.
    2.  Création de `assets/js/app.js` avec la fonction de chargement asynchrone (fetch) connectée à `backend/api.php`.
    3.  Demande de validation finale de l'étape 4.

## Livrables de fin de Sprint

À l'issue de ces 4 étapes, l'arborescence correspondra exactement à celle décrite dans le cahier des charges :
- `/assets/css/style.css`
- `/assets/js/app.js`
- `/backend/Categorie.php`
- `/backend/api.php`
- `/conception/use_cases.mmd`
- `/index.html`

## Vérification Plan (Verification Plan)

### Tests Manuels (avec le concepteur)
- Ouverture de `index.html` dans le navigateur pour vérifier le rendu visuel Tailwind (Étape 3).
- Test du chargement asynchrone des données de catégorie au chargement de la page pour valider l'interactivité SPA (Étape 4).
- Lecture conjointe du code source PHP pour s'assurer du respect des règles de POO et d'architecture (Étape 2).
