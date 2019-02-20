<?php


/**
 * 
 */
class Calculette 
{
	private $nb1;
	private $nb2;
	function __construct($nb1,$nb2)
	{
		$this->nb1 = $nb1;
		$this->nb2 = $nb2;
	}


public function sumOf($nb1,$nb2)
{
	return $nb2 + $nb1;
}

public function subOf($nb1,$nb2)
{
	return $nb2 - $nb1;
}

public function multiplyOf($nb1,$nb2)
{
	return $nb2 * $nb1;
}

public function divOf($nb1,$nb2)
{
	return $nb1 / $nb2;
}


public function moduloOf($nb1,$nb2)
{
	return $nb1 % $nb2;
}
public function isPremier($nb)
{
	if ($nb < 2) {
		return $nb." n'est pas Premier";
	}
	$count = 0;
	for ($i=1; $i < $nb ; $i++) { 
		if ($nb % $i == 0) {
			$count++;

		}
	}
	if ($count > 2) {
		return $nb." n'est pas Premier \n";
	} else{
		return $nb." est Premier \n";
	}

}

public function IMC($nb1, $nb2){
    return $nb1 / $nb2*$nb2;
}

public function is45($nb)
{
	$str = "";
	if ($nb === 45) {
		for ($i=$nb; $i > 0; $i-=2) { 
			 $str .= $i." ";
		}
	}
	return $str;
}

public function setNb1($value)
{
	$this->nb1 = $value;
}
public function setNb2($val)
{
	$this->nb2 = $val;
}
public function getNb1()
{
	return $this->nb1;
}
public function getNb2()
{
	return $this->nb2;
}













}

?>