<?php
class categorie {
    private static int $nextId = 1;
    private int $id;
    private string $nom;
    private string $color;
    private string $icon;

    public function __construct(string $Inom,string $Icolor, string $Iicon)
    {
        $this ->id = self::$nextId++;
        $this ->nom = $Inom;
        $this ->color = $Icolor;
        $this ->icon = $Iicon;
    }

    //setters 
    public function setId(int $NewId){
        $this->nom = $NewId;
        
    }
    public function setNom(string $NewName){
        if (strlen($NewName) > 2) {
            $this->nom = $NewName;
        } else {
            echo "Erreur : Nom trop court !<br>";
        }
    }
    
    public function setColor(string $NewColor){
        if (strlen($NewColor) > 2) { 
            $this->nom = $NewColor;
        } else {
            echo "Erreur : Nom de color trop court !<br>";
        }
    }
    public function setIcon(string $NewIcon){
        if (strlen($NewIcon) > 2) { 
            $this->nom = $NewIcon;
        } else {
            echo "Erreur : Nom  d'icon trop court !<br>";
        }
    }

    //geters

    public function getId(): int {
        return $this->id;
    }
    public function getNom(): string {
        return $this->nom;
    }
    public function getColor(): string {
        return $this->color;
    }
    public function getIcon(): string {
        return $this->icon;
    }

}
?>