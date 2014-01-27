<?php
Class Personnage
{
	private $_id;
	private $_nom;
	private $_forcePerso;
	private $_degats;
	private $_niveau;
	private $_experience;
	
	
	public function __construct (array $donnees)
	{
		foreach($donnees as $key => $value)
		{
			$method = 'set'.ucfirst($key);
			if (method_exists($this,$method))
			{
				$this->$method($value);
			}
		}
	}
	
	
	public function id()
	{
		return $this->_id;
	}
	
	public function nom()
	{
		return $this->_nom;
	}
	
	public function forcePerso()
	{
		return $this->_forcePerso;
	}

	public function degats()
	{
		return $this->_degats;
	}
	
	public function niveau()
	{
		return $this->_niveau;
	}
	
	public function experience()
	{
		return $this->_experience;
	}
	
	public function setId($id)
	{
		$id=(int)$id;
		if ($id>0)
		{
			$this->_id=$id;
		}
	}
	
	public function setNom($nom)
	{
		if (is_string($nom))
		{
		$this->_nom=$nom;
		}
	}
	
	public function setForcePerso($force)
	{
		$force=(int)$force;
		if (($force>0) and ($force<=100))
		{
			$this->_forcePerso=$force;
		}
	}

	public function setDegats($degats)
	{
		$degats=(int)$degats;
		if (($degats>=0) and ($degats<=100))
		{
			$this->_degats=$degats;
		}
	}
	
	public function setNiveau($niveau)
	{
		$niveau=(int)$niveau;
		if (($niveau>=1) and ($niveau<=100))
		{
			$this->_niveau=$niveau;
		}
	}
	
	public function setExperience($experience)
	{
		$experience=(int)$experience;
		if (($experience>=1) and ($experience<=100))
		{
			$this->_experience=$experience;
		}
	}
}


?>