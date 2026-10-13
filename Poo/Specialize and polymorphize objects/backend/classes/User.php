<?php

require_once __DIR__ . '/Auteur.php';

class User
{
    private int $id_user;
    private string $email;
    private string $password;
    private string $role;
    private ?Auteur $auteur;

    public function __construct(
        int $id_user,
        string $email,
        string $password,
        string $role,
        ?Auteur $auteur = null
    ) {
        $this->id_user = $id_user;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->auteur = $auteur;
    }

    public function getRoleName(): string
    {
        return $this->role;
    }

    public function getAuteur(): ?Auteur
    {
        return $this->auteur;
    }
}
