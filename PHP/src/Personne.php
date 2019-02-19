<?php
class Personne
{
	private $nom;
	private $prenom;
	private $ddn;
	private $sexe;

	public function __construct($nom,$prenom,$ddn,$sexe)
	{
		
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->ddn = $ddn;
		$this->sexe = $sexe;

	}

	 public function getNom()
	{
		return $this->nom;
	}

	 public function getPrenom()
	{
		return $this->prenom;
	}

	 public function getDdn()
	{
		return $this->ddn;
	}
	public function getAge()
	{
		$datetime1 = strtotime(date("m/d/Y"));
		$datetime2 = strtotime(date($this->getDdn()));
		$secs = $datetime1 - $datetime2;// == return sec in difference
		$years = floor(($secs / 86400) / 365);
		return $years;
	}

	 public function getSexe()
	{
		return $this->sexe;
	}


	public function setNom($nom)
	{
		$this->nom = $nom;
	}

	public function setPrenom($prenom)
	{
		$this->prenom = $prenom;
	}

	public function setDdn($ddn)
	{
		$this->ddn = $ddb;
	}

	public function setSexe($sexe)
	{
		$this->sexe = $sexe;
	}


	public function getNameWithMP($tab,$param): string
	{
		$str = "";
		foreach ($param as $letter) {
			
			foreach ($tab as $val) 
			{	
				
				if ($val[0] == $letter) {
					$str .= $val ." ";
				}

			}
	    }	
		return $str;
	}

}




