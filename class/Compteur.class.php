<?php
class Compteur
{
	private static $_compteur=0;
	public function __construct()
	{
		self::$_compteur++;
	}
	
	public static function get_compteur()
	{
		echo self::$_compteur;
	}
}


?>
