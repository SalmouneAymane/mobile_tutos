# Category Management Refactor Analysis

## Current problem

The Sprint 1 `Categorie` class combines two responsibilities in one class:

- **Category entity:** stores the category data (`id`, `nom`, `couleur`, and `icone`) and exposes it through getters and setters (`backend/Categorie.php`, lines 11–38).
- **JSON persistence and CRUD:** knows the path to `data/categories.json` (line 16), reads and decodes the file in `readAll()` (lines 41–67), creates, updates, and deletes categories (lines 70–128), and serializes/writes the data in `saveAll()` (lines 131–144).

This tightly couples the category data structure to file access. For example, changing the storage mechanism would require changing the entity class as well. The responsibilities should be separated: keep `Categorie` focused on representing a category, and move JSON read/write and CRUD operations into a separate manager or repository class.

## Comment for the GitHub issue

> Currently, the `Categorie` class mixes two responsibilities: it defines the category data structure (`id`, `nom`, `couleur`, and `icone`) and handles CRUD operations against `data/categories.json`. This tightly couples the entity to its storage mechanism. The refactor should keep `Categorie` focused on category data and move JSON file access and persistence into a separate manager class.
