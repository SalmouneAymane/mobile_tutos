<?php
// 1. Déclarer que la réponse est du JSON
header('Content-Type: application/json');
session_start();
//?? so if the session has a categories dont create it 
$_SESSION['categories'] ??= [
    ["name" => "Développement Web", "color" => "blue"],
    ["name" => "Design UI/UX", "color" => "purpule"]
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['categories'] = array_merge($_SESSION['categories'], json_decode(file_get_contents('php://input'), true));
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents('php://input'), true);
    $_SESSION['categories'] = array_values(array_filter(
        $_SESSION['categories'],
        fn($categorie) => $categorie['name'] !== $data['name']
    ));
}

// 3. Convertir le tableau PHP en JSON et l'afficher
echo json_encode($_SESSION['categories']);
?>