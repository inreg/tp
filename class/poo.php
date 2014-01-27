<?php


function chargerClasse($classe)
{
	require $classe.'.class.php';
}

spl_autoload_register('chargerClasse');
require 'bd.php'; // connection à la bdd
$perso= new Personnage (array('nom'=>'Oliver','forcePerso'=>5,'degats'=>1,'niveau'=>1,'experience'=>1));

$manager= new PersonnagesManager($db);
$manager->add($perso);

?>