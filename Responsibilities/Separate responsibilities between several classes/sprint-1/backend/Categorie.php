<?php
/**
 * Modèle Categorie
 * 
 * NOTE PÉDAGOGIQUE :
 * Pour le Sprint 1, cette classe utilise le pattern "Active Record" simplifié.
 * Elle gère à la fois ses propres propriétés (encapsulation) 
 * et la persistance des données (qui se fait ici dans un fichier JSON local).
 */
class Categorie {
    private $id;
    private $nom;
    private $couleur;
    private $icone;

    private static $dataFile = __DIR__ . '/data/categories.json';

    public function __construct($nom = null, $couleur = null, $icone = null, $id = null) {
        $this->nom = $nom;
        $this->couleur = $couleur;
        $this->icone = $icone;
        $this->id = $id;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getNom() { return $this->nom; }
    public function getCouleur() { return $this->couleur; }
    public function getIcone() { return $this->icone; }

    // Setters
    public function setNom($nom) { $this->nom = $nom; }
    public function setCouleur($couleur) { $this->couleur = $couleur; }
    public function setIcone($icone) { $this->icone = $icone; }
    public function setId($id) { $this->id = $id; }

    /**
     * Lit toutes les catégories depuis le fichier JSON
     * @return Categorie[]
     */
    public static function readAll() {
        if (!file_exists(self::$dataFile)) {
            return [];
        }

        $json = file_get_contents(self::$dataFile);
        $data = json_decode($json, true);
        
        if (!is_array($data)) {
            return [];
        }

        $categories = [];
        foreach ($data as $item) {
            $categories[] = new Categorie(
                $item['nom'] ?? '', 
                $item['couleur'] ?? '', 
                $item['icone'] ?? '', 
                $item['id'] ?? null
            );
        }

        return $categories;
    }

    /**
     * Ajoute cette catégorie au fichier JSON
     * @return bool
     */
    public function create() {
        $categories = self::readAll();
        
        // Générer un ID simple
        $maxId = 0;
        foreach ($categories as $cat) {
            if ($cat->getId() > $maxId) {
                $maxId = $cat->getId();
            }
        }
        $this->id = $maxId + 1;

        $categories[] = $this;
        return self::saveAll($categories);
    }

    /**
     * Met à jour cette catégorie dans le fichier JSON
     * @return bool
     */
    public function update() {
        $categories = self::readAll();
        $updated = false;

        foreach ($categories as $key => $cat) {
            if ($cat->getId() == $this->id) {
                $categories[$key] = $this;
                $updated = true;
                break;
            }
        }

        if ($updated) {
            return self::saveAll($categories);
        }
        return false;
    }

    /**
     * Supprime cette catégorie du fichier JSON
     * @return bool
     */
    public function delete() {
        if (!$this->id) return false;

        $categories = self::readAll();
        $initialCount = count($categories);
        
        $categories = array_filter($categories, function($cat) {
            return $cat->getId() != $this->id;
        });

        if (count($categories) < $initialCount) {
            return self::saveAll(array_values($categories)); // array_values pour réindexer
        }
        return false;
    }

    /**
     * Sauvegarde un tableau d'objets Categorie dans le fichier JSON
     */
    private static function saveAll($categories) {
        $data = [];
        foreach ($categories as $cat) {
            $data[] = [
                'id' => $cat->getId(),
                'nom' => $cat->getNom(),
                'couleur' => $cat->getCouleur(),
                'icone' => $cat->getIcone()
            ];
        }

        $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        return file_put_contents(self::$dataFile, $json) !== false;
    }
}
