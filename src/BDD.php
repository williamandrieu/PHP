<?php
class BDD{
	// Attributs
	private $idUser = "root";
	private $password = "root";
	private $dbName;
	private $bdd;
	private $req;

	public function __construct(string $_dbName){
		try
		{	$this->dbname = $_dbName;
			$this->bdd = new PDO('mysql:host=localhost;dbname='.$this->dbName.'semaine_PHP;charset=utf8', $this->idUser,$this->password);
		}
		catch(Exception $e)
		{
	        $this->alert("Erreur lors de la connection à la bdd : ".$e->getMessage());
		}
	}

	public function getBdd(){return $this->bdd;}
	public function getReq(){return $this->req;}

	public function createInTable(string $_tableName,array $_colName){
		try
		{
			$str = "";
			foreach ($_colName as $key) {
				$str.="'".$key."',";
			}
            $this->req = $this->bdd->prepare("INSERT INTO `".$_tableName."` (`nom`, `prenom`, `ddn`, `sexe`, `mail`, `code_postale`) 
             	VALUES (".substr($str, 0,-1).");");
            $this->execute();
        }catch(Exception $e)
        {
            $this->alert("Erreur lors de la création d'un utilisateur : ".$e->getMessage());
        }
	}

	public function delInTable(string $_tableName,int $_id){
		try
		{
            $this->req = $this->bdd->prepare("DELETE FROM `".$_tableName."` WHERE id = ".$_id);
            $this->execute();
        }catch(Exception $e)
        {
            $this->alert("Erreur lors de la suppression d'un utilisateur : ".$e->getMessage());
        }
	}

	public function getInfo(string $_tableName,array $_colName)
	{
		try
		{
			$infoArray = [];
            $reponse = $this->bdd->query('SELECT * FROM '.$_tableName);
            while ($donnees = $reponse->fetch())
			{
				$rowArray = [];
				foreach ($_colName as $key) {
					$rowArray[] = $donnees[$key];
				}
				$infoArray[] = $rowArray;
			}
			$reponse->closeCursor();
			return $infoArray;

        }catch(Exception $e)
        {
        	$this->alert("Erreur lors de la recherche d'information User : ".$e->getMessage());
        }
        
	}

	public function concatInfo(array $_tab1, string $_separator): array{
		$new = [];
		$sub = count_chars($_separator);
		for ($i=0; $i < count($_tab1) ; $i++){
			$str = "";
			for ($y=0; $y < count($_tab1[$i]) ; $y++) { 
				$str.= $_tab1[$i][$y].$_separator;
			}
			$new[].= substr($str, 0,-intval($sub));
		}
		return $new;
	}

	public function merge(array $_tab1, array $_tab2): array{
		$newTab = [];
		for ($i=0; $i < count($_tab1); $i++) { 
			$newTab[] = [$_tab1[$i],$_tab2[$i]];
		}
		return $newTab;
	}

	private function execute(){
		try
		{
			$this->req->execute();
		}catch(Exception $e)
		{
			$this->alert("Erreur lors de l'execution : ".$e->getMessage());
		}
	}

	private function alert(string $message){
		echo '<script>alert("'.$message.'")</script>';
	}
}
