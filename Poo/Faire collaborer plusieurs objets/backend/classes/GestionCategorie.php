<?php

require_once __DIR__ . '/Categorie.php';

class GestionCategorie
{
    public function getAll(): array
    {
        return [
            new Categorie(1, 'Mathématiques', 'rouge', 'calculator'),
            new Categorie(2, 'Physique', 'bleu', 'atom'),
        ];
    }
}
