<?php

class Auteur
{
    private int $id_auteur;
    private string $nom;
    private string $prenom;
    private string $biographie;
    private string $avatar;

    public function __construct(
        int $id_auteur,
        string $nom,
        string $prenom,
        string $biographie,
        string $avatar
    ) {
        $this->id_auteur = $id_auteur;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->biographie = $biographie;
        $this->avatar = $avatar;
    }

    public function getNomComplet(): string
    {
        return $this->prenom . ' ' . $this->nom;
    }
}
