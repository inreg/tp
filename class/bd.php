<?php
//connection à la bd
$dns = 'mysql:host=localhost;dbname=tests';
$utilisateur = 'root';
$motDePasse = '';
$db = new PDO( $dns, $utilisateur, $motDePasse );

?>