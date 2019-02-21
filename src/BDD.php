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

	public function createInTable(string $_tableName,array $_colName,$_colValue){
		try
		{
			$str = "";
			foreach ($_colValue as $key) {
				$str.="'".$key."',";
			}
			$str2 = "";
			foreach ($_colName as $key) {
				$str2.="`".$key."`,";
			}
            $this->req = $this->bdd->prepare("INSERT INTO `".$_tableName."` (".substr($str2, 0,-1).") 
             	VALUES (".substr($str, 0,-1).");");
            $this->execute();
        }catch(Exception $e)
        {
            $this->alert("Erreur lors de la création d'un utilisateur : ".$e->getMessage());
        }
	}

	public function updateInTable(string $_tableName,array $_colName,array $_colValue,int $_id){
        try
        {
            $str = "";
            for ($i=0; $i < count($_colName); $i++) {
                $str.="`".$_colName[$i]."`= '".$_colValue[$i]."',";
            }
           $this->req = $this->bdd->prepare("UPDATE ".$_tableName." SET ".substr($str, 0,-1)."WHERE `id` = ".$_id);
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
	
	public function getInfoBy(string $_tableName,array $_colName,string $_by,int $_id)
	{
		try
		{
			$infoArray = [];
            $reponse = $this->bdd->query('SELECT * FROM '.$_tableName.' WHERE '.$_by.' ='.$_id);
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
