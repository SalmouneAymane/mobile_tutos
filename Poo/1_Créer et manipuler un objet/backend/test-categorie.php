<?php
require_once("categorie.php");

$categorie1 = new categorie(1,"maths","rouge","plus");

$categorie2 = new categorie(2,"physics","blue","atom");

$categorie1->afficher();
$categorie2->afficher();

?>