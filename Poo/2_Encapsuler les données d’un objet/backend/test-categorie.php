<?php
require_once("categorie.php");

$categorie1 = new categorie("maths","rouge","plus");

$categorie2 = new categorie("physics","blue","atom");

echo $categorie1->getNom()."||".$categorie1->getColor() ."<br>";
$categorie1 ->setNom("geo");
echo $categorie1->getNom()."||".$categorie1->getColor() ."<br>";

?>