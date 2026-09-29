<?php
class categorie {
    public $id;
    public $nom;
    public $color;
    public $icon;

    public function __construct($Iid,$Inom,$Icolor,$Iicon)
    {
        $this ->id = $Iid;
        $this ->nom = $Inom;
        $this ->color = $Icolor;
        $this ->icon = $Iicon;
    }
    public function afficher() {
        echo $this->nom . "||". $this->color ."||". $this->icon ."<br>";
        
    }

}
?>