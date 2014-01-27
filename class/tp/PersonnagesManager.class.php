<?php
class PersonnagesManager
{
	private $_db;
	
	public function __construct ($db)
	{
		$this->setDb($db);
	}
	
	public function addPersonnage(Personnage $perso)
	{
		$q=$this->_db->prepare('insert into personnages values (nom=:nom');
		$q->bindValue(':nom',$perso->nom());
		$q->execute();
		
		$perso->hydrate(array('id'=>$this->_db->lastInsertId(),'degats'=>0));
	}
	
	public function count()
	{
		return $this->_db->query('select count(*) from personnages')->fetchColumn();
	}
	
	public function delete(Personnage $perso)
	{
		return $this->_db->exec('Delete personnages where id='. $perso->id().);
	}
	
	public function exists($info)
	{
		if (is_int($info))
		{
			return (bool) $this->_db->query('select count(*) from personnages where id='.$info)->fetchColumn();;
		}
		
		$q=$this->_db->prepare('select count(*) from personnages where nom=:nom');
		$q->execute(':nom',	array(':nom'=>$info));
		return (bool) $q->fetchColumn();
	}
	
	public function get($info)
	{
		if (is_int($info))
		{
			$q=$this->_db->query('select id, nom, degats from personnages where id='.$info)
			$donnes=$q->fetch(PDO::FETCH_ASSOC);
			return new Personnage($donnees);
		}
	}
	
	public function setDb(PDO $db)
	{
		$this->_db=$db;
	}
}

?>