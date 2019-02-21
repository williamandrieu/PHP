<?php
class PostVerif{

	public static function email(string $_mail): bool{
		return preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $_mail);
	}

	public static function codePostale(string $_codePostale){
		return preg_match ( " #^[0-9]{5,5}$# " , $_codePostale);
	}

	public static function age(string $_dateDeNaissance): int{
		$datetime1 = strtotime(date("m/d/Y"));
		$datetime2 = strtotime(date($_dateDeNaissance));
		$secs = $datetime1 - $datetime2;
		return floor(($secs / 86400) / 364.25);
	}
	
}