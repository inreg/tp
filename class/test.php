<?php
function chargerClasse($classe)
{
	require $classe.'.class.php';
}

spl_autoload_register('chargerClasse');
$perso= new Personnage(Personnage::FORCE_GRANDE);
echo $perso->force();
Personnage::parler();

$cpt1=new Compteur();
$cpt2= new Compteur();
echo Compteur::get_compteur();
?>
