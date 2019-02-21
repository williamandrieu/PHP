<?php
class Exercices{

	public static function name(string $_name): string{
		return "<p><strong>".$_name."</strong></p>";
	}

	public static function oldDate(int $_sec): string{
		$dateNow = strtotime(date("r")) + 3600;
		return date("r",$dateNow - $_sec);
	}

	public static function intToHexa(int $_nb): string{
		return dechex($_nb);
	}

	public static function intToBin(int $_nb): string{
		return decbin($_nb);
	}

	public static function getFact($nb) 
	{
	    $facto = 1;
		    for ($i=1; $i <= $nb; $i++) {
			       $facto *= $i;
			    }
	    return $facto;
	}

	public static function primeNumber(int $nb)
	{
		$str = "";
		for ($i=2; $i < $nb; $i++) { 
			$count = 0;
			for ($j=2; $j <= $i; $j++) 
			{ 
				if($i % $j == 0){
					$count++;
				}

			}
			if ($count < 2) {
				$str .= $i.", ";
			} 
		}

		return substr($str, 0, -2);

	}

	public static function sortName(string $name)
	{
		$nameTab = explode(',', $name);
		
		$str = "";
		foreach ($nameTab as $value) 
		{
			$tmpTab[] = substr($value, 1);
		}

		usort($tmpTab, "strnatcmp");
		foreach ($nameTab as $val) {
			$tmpVal = substr($val, 1);
			$tmpTab[array_search($tmpVal, $tmpTab)] = $val;
			
		}
		foreach ($tmpTab as $name) {
			$str .= $name . ", ";
		}
		return substr($str, 0,-2);
		
	}

	public static function smallest(string $nbString)
	{	
		$nbTab = explode(',', $nbString);;
		sort($nbTab);
		return "le plus petit nombre est : " . $nbTab[0];
	}

	public static function roman($nb)
	{
		if ($nb > 4999 || $nb < 1)
		{
			return "Impossible de convertir ce nombre en chiffre Romain veuillez entre un nombre inferieur a 5000 et superieur à 0";
		}
		else
		{
			$str = "";
			$romanTab = [1,4,5,9,10,40,50,90,100,400,500,900,1000];
			$romanLetter = ["I","IV","V","IX","X","XL","L","XC","C","CD","D","CM","M"];

			for ($i=count($romanTab)-1; $i >= 0; $i--) 
			{ 
				if (intdiv($nb, $romanTab[$i]) > 0) {
					
						$osef[] = intdiv($nb, $romanTab[$i]);
						$nb -= $romanTab[$i]* $osef[count($osef)-1];
						$str .= str_repeat($romanLetter[$i],$osef[count($osef)-1]); 
						
					
				}
				
			}
		return $str;
		}
	}

	public static function emailVerif(string $mail)
	{
		return preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $mail);
	}

	public static function dateVerif(string $date)
	{
		
		if (preg_match('#^[0-9]{2}+/[0-9]{2}+/[0-9]{2}$#', $date))
		 {
			list($day, $month, $year) = explode('/', $date);
			if(checkdate($month, $day, $year))
			{
				return true;

			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;//"La date n'est pas valide elle dois etre au format jj/mm/aa";
		}

	}
}