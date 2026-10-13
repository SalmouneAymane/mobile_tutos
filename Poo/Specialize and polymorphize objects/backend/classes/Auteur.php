<?php

require_once __DIR__ . '/User.php';

class Auteur extends User
{
    protected int $id_auteur;
    protected string $nom;
    protected string $prenom;
    protected string $biographie;
    protected string $avatar;

    public function getRoleName(): string
    {
        return "Auteur publié";
    }
}
