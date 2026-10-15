<?php
require_once __DIR__ . '/../classes/GestionCategorie.php';

function assertTest(bool $condition, string $message): void
{
    if (!$condition) {
        throw new RuntimeException($message);
    }
}

$testDirectory = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'gestion-categorie-' . uniqid('', true);
mkdir($testDirectory);
$dataFile = $testDirectory . DIRECTORY_SEPARATOR . 'categories.json';
$property = new ReflectionProperty(GestionCategorie::class, 'dataFile');
$property->setValue(null, $dataFile);

try {
    file_put_contents($dataFile, json_encode([
        ['id' => 1, 'nom' => 'Web', 'couleur' => 'Bleu', 'icone' => 'Code'],
        ['id' => '3', 'nom' => 'Design', 'couleur' => 'Rose', 'icone' => 'Pinceau'],
    ]));

    $gestionCategorie = new GestionCategorie();
    $categories = $gestionCategorie->getAll();

    assertTest(count($categories) === 2, 'getAll should return every stored category.');
    assertTest($categories[0] instanceof Categorie, 'getAll should return Categorie objects.');
    assertTest($categories[0]->getNom() === 'Web', 'getAll should hydrate category fields.');
    assertTest($categories[1]->getId() === '3', 'getAll should preserve stored identifiers.');

    $newCategorie = new Categorie('Mobile', 'Vert', 'Telephone');
    assertTest($gestionCategorie->create($newCategorie), 'create should save a category.');
    assertTest($newCategorie->getId() === 4, 'create should assign the next available ID.');

    $updatedCategorie = new Categorie('Design graphique', 'Rose', 'Pinceau', 3);
    assertTest($gestionCategorie->update($updatedCategorie), 'update should replace an existing category.');
    assertTest(
        $gestionCategorie->getAll()[1]->getNom() === 'Design graphique',
        'update should persist changed category data.'
    );
    assertTest(!$gestionCategorie->update(new Categorie('Unknown', 'Noir', 'X', 99)), 'update should fail for an unknown ID.');

    assertTest($gestionCategorie->delete(1), 'delete should remove an existing category.');
    assertTest(!$gestionCategorie->delete(99), 'delete should fail for an unknown ID.');
    assertTest(count($gestionCategorie->getAll()) === 2, 'delete should persist the removal.');

    file_put_contents($dataFile, '{invalid json');
    try {
        $gestionCategorie->getAll();
        throw new RuntimeException('getAll should reject invalid JSON.');
    } catch (JsonException $exception) {
    }

    unlink($dataFile);
    assertTest($gestionCategorie->getAll() === [], 'getAll should treat a not-yet-created data file as an empty list.');
    assertTest(
        $gestionCategorie->create(new Categorie('Backend', 'Noir', 'Serveur')),
        'create should initialize a missing data file.'
    );

    $_SERVER['REQUEST_METHOD'] = 'GET';
    ob_start();
    include __DIR__ . '/../api.php';
    $apiResponse = json_decode(ob_get_clean(), true, 512, JSON_THROW_ON_ERROR);
    assertTest($apiResponse['status'] === 'success', 'the API should use GestionCategorie for GET requests.');
    assertTest(count($apiResponse['data']) === 1, 'the API should return the categories managed by GestionCategorie.');
} finally {
    if (file_exists($dataFile)) {
        unlink($dataFile);
    }
    rmdir($testDirectory);
}

echo "GestionCategorie tests passed.\n";
