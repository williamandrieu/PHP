<?php
class Exercices{

	public static function name(string $_name): string{
		return "<div class='exercices'><p><strong>".$_name."</strong></p>";
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
}