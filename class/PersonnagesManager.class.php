<?php 
class PersonnagesManager
{
	private $_db;
	public function  __construct($db)
	{
		$this->setDb($db);
	}
	
	
	public function add(Personnage $perso)
	{
		//requete d'insertion
		$q = $this->_db->prepare('insert into personnages set nom = :nom, forcePerso = :forcePerso, degats= :degats, niveau= :niveau, experience= :experience');
		
		$q->bindValue(':nom',$perso->nom());
		$q->bindValue(':forcePerso',$perso->forcePerso(),PDO::PARAM_INT);
		$q->bindValue(':degats',$perso->degats(),PDO::PARAM_INT);
		$q->bindValue(':niveau',$perso->niveau(),PDO::PARAM_INT);
		$q->bindValue(':experience',$perso->experience(),PDO::PARAM_INT);
		$q->execute();
		
	}
	
	public function delete(Personnage $perso)
	{
		//requete de suppression
	
	}
	public function get ($id)
	{
		//requete de type de select et retourne un personnage
	}
	
	public 	function getList()
	{
		//retourne une liste
		
		$persos = array();
		$q = $this ->_db->query('Select id, nom, forcePerso, degats,niveau,experience from personnages  order by nom');
		
		while ($donnees =$q->fetch(PDO::FETCH_ASSOC))
		{
			$persos[] = new Personnage($donnees);
		}
		return $persos;
	}
	
	public function update(Personnage $perso)
	{
			//prepare une requete de type update et execute
	}
	
	public	function setDb(PDO $db)
	{
		$this->_db=$db;
	}
}


?>