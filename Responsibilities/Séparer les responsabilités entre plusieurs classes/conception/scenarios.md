# Scénarios : Ajouter une catégorie

**Acteur principal :** Administrateur
**Objectif :** Créer une nouvelle catégorie pour classer les articles du blog.

## Scénario Nominal (Succès)
1. L'Administrateur navigue vers la page d'administration des catégories (`index.php`).
2. Le système affiche la liste des catégories existantes et le bouton "Nouvelle Catégorie".
3. L'Administrateur clique sur "Nouvelle Catégorie".
4. Le système affiche le formulaire de création (Titre).
5. L'Administrateur saisit "Technologie" dans le champ Titre et valide.
6. Le système enregistre la catégorie dans la base de données.
7. Le système rafraîchit la liste des catégories et affiche la nouvelle catégorie.
8. Le système affiche un message de succès "Catégorie ajoutée avec succès".

## Scénario Alternatif (Erreur de validation)
*Condition :* À l'étape 5 du scénario nominal, l'Administrateur valide le formulaire en laissant le champ Titre vide.
6. Le système détecte que le champ Titre est vide.
7. Le système refuse l'enregistrement et affiche un message d'erreur : "Le titre de la catégorie est obligatoire."
8. L'Administrateur est invité à corriger sa saisie.
