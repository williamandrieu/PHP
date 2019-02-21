<?php
class TableGenerator{

	public static function trInTable(array $tabValue): string{
		$table = "";
		for ($i=0;$i< count($tabValue);$i++) {
      		$str = "";
      		for ($y=0; $y < count($tabValue[$i]); $y++) { 
          		$str.= "<th>".$tabValue[$i][$y]."</th>"; 
        	}
        if($i % 2 == 0){
          $table.= '<tr class="gris">'.$str.'</tr>';
        }else{
          $table.='<tr class="bleu">'.$str.'</tr>';
        }
      }
      return $table;
	}

	public static function colName(array $tabNameCol): string{
		$str = "";
		foreach ($tabNameCol as $key) {
			$str.= "<th>".$key."</th>" ;
		}
		return "<tr>".$str."</tr>";
	}
}