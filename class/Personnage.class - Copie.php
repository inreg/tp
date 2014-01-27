<?php
class Personnage
{
  private $_force;
  private $_experience;
  private $_degats;
	private $_localisation;
	const FORCE_PETITE=20;
	const FORCE_MOYENNE=50;
	const FORCE_GRANDE=80;
	
	private static $_texteADire='je vais tous vous tuer';
	public function __construct($forceInitiale)
	{
		// echo 'voici le constructeur';
		// $this->setForce($force);
		// $this->setDegats($degats);
		// $this->_experience=1;
		$this->setForce($forceInitiale);
	
	}
  public function frapper(Personnage $persoAFrapper)
  {
    $persoAFrapper->_degats += $this->_force;
  }
  
  public function gagnerExperience()
  {
    $this->_experience++;
  }
  
// Mutateur chargé de modifier l'attribut $_force.
  public function setForce($force)
  {
    if (in_array($force,array(self::FORCE_PETITE,self::FORCE_MOYENNE,self::FORCE_GRANDE)))
	{
		$this->_force= $force;
	}
  }
  
    public function setDegats($degats)
  {
    if (!is_int($degats)) // S'il ne s'agit pas d'un nombre entier.
    {
      trigger_error('Le niveau de dégâts d\'un personnage doit être un nombre entier', E_USER_WARNING);
      return;
    }

   $this->_degats = $degats;
 }
  // Mutateur chargé de modifier l'attribut $_experience.
  public function setExperience($experience)
  {
   if (!is_int($experience)) // S'il ne s'agit pas d'un nombre entier.
   {
      trigger_error('L\'expérience d\'un personnage doit être un nombre entier', E_USER_WARNING);
      return;
    }
    
    if ($experience > 100) // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
    {
      trigger_error('L\'expérience d\'un personnage ne peut dépasser 100', E_USER_WARNING);
      return;
    }
    
    $this->_experience = $experience;
  }
  
  // Ceci est la méthode degats() : elle se charge de renvoyer le contenu de l'attribut $_degats.
  public function degats()
  {
    return $this->_degats;
  }
  
  // Ceci est la méthode force() : elle se charge de renvoyer le contenu de l'attribut $_force.
  public function force()
  {
    return $this->_force;
  }
  
  // Ceci est la méthode experience() : elle se charge de renvoyer le contenu de l'attribut $_experience.
  public function experience()
  {
    return $this->_experience;
  }

	public static function parler()
	{
		echo self::$_texteADire;
	}
}?>

