<?php
class BDD{
	// Attributs
	private $idUser = "root";
	private $password = "root";
	private $bdd;
	private $req;

	public function __construct(){
		try
		{	
			$this->bdd = new PDO('mysql:host=localhost;dbname=semaine_PHP;charset=utf8', $this->idUser,$this->password);
		}
		catch(Exception $e)
		{
	        echo "Erreur lors de la connection à la bdd : "; echo $e;
		}
	}

	public function getBdd(){return $this->bdd;}
	public function getReq(){return $this->req;}

	public function createUserReq(string $_nom,string $_prenom,string $_ddn,int $_sexe){
		try
		{
            $this->req = $this->bdd->prepare("INSERT INTO `utilisateur` (`nom`, `prenom`, `ddn`, `sexe`) VALUES ('".$_nom."', '".$_prenom."', '".$_ddn."', '".$_sexe."');");

        }catch(Exception $e){
            echo "Erreur lors de la preparation : ".$e;
        }
	}

	public function delUserReq(int $_id){
		try
		{
            $this->req = $this->bdd->prepare("DELETE FROM `utilisateur` WHERE id = ".$_id);

        }catch(Exception $e){
            echo "Erreur lors de la preparation de la suppression : ".$e;
        }
	}

	public function getUserInfo()
	{
		try
		{
			$userArray = [];
            $reponse = $this->bdd->query('SELECT * FROM utilisateur');
            while ($donnees = $reponse->fetch())
			{
				$userArray[] = [$donnees['prenom'],$donnees['id']];
			}

			$reponse->closeCursor();
			return $userArray;

        }catch(Exception $e){
            echo "Erreur lors de la preparation : ".$e;
        }



        
	}

	public function execute(){
		try
		{
			$this->req->execute();
		}catch(Exception $e){
			echo "Erreur lors de l'execution : ".$e;
		}
	}
}
