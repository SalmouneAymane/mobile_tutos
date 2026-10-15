<?php
require_once __DIR__ . '/../Categorie.php';

class GestionCategorie
{
    private static $dataFile = __DIR__ . '/../data/categories.json';

    /**
     * @return Categorie[]
     */
    public function getAll(): array {
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

    public function create($categorie) {
        $categories = $this->getAll();
        $maxId = 0;

        foreach ($categories as $existingCategorie) {
            if ($existingCategorie->getId() > $maxId) {
                $maxId = $existingCategorie->getId();
            }
        }

        $categorie->setId($maxId + 1);
        $categories[] = $categorie;

        return $this->saveAll($categories);
    }

    public function update($categorie) {
        $categories = $this->getAll();
        foreach ($categories as $key => $existingCategorie) {
            if ($existingCategorie->getId() == $categorie->getId()) {
                $categories[$key] = $categorie;
                return $this->saveAll($categories);
            }
        }

        return false;
    }

    public function delete($id) {
        if (!$id) return false;
        $categories = $this->getAll();
        $initialCount = count($categories);

        $categories = array_filter($categories, function($categorie) use ($id) {
            return $categorie->getId() != $id;
        });

        if (count($categories) < $initialCount) {
            return $this->saveAll(array_values($categories));
        }
        return false;
    }

    /**
     * @param Categorie[] $categories
     */
    private function saveAll($categories) {
        $data = [];
        foreach ($categories as $categorie) {
            $data[] = [
                'id' => $categorie->getId(),
                'nom' => $categorie->getNom(),
                'couleur' => $categorie->getCouleur(),
                'icone' => $categorie->getIcone(),
            ];
        }

        $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        return file_put_contents(self::$dataFile, $json) !== false;
    }
}
