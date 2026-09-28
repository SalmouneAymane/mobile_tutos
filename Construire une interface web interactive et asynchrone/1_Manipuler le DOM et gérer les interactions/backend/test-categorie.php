<?php
require_once("categorie.php");

$categorie1 = new categorie(1,"maths","rouge","plus");

$categorie2 = new categorie(2,"physics","blue","atom");

echo $categorie1->getNom()."||".$categorie1->getColor() ."<br>";
$categorie1 ->setNom("geo");
echo $categorie1->getNom()."||".$categorie1->getColor() ."<br>";

?>