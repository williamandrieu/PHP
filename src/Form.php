<?php
class Form
{
	public static function input(string $_idname ,string $_name, string $_type)
	{
		if($_name == ""){
			return '<input id="'.$_idname.'" type="'.$_type.'" name="'.$_idname.'">';
		}else{
			return self::label($_idname, $_name).'<input id="'.$_idname.'" type="'.$_type.'" name="'.$_idname.'">';
		}
	}

	public static function select(string $_idname ,string $_name, array $_selects)
	{
		$str = self::label($_idname, $_name).'<select id="'.$_idname.'" name="'.$_idname.'">';
		for ($i=0; $i < count($_selects); $i++) { 
			$name = "";
			for ($y=0; $y <count($_selects[$i]) ; $y++) { 
				if($y !=count($_selects[$i])-1){
					$name.= $_selects[$i][$y]." ";
				}
			}
			$str.= '<option value="'.$_selects[$i][count($_selects[$i])-1].'">'.substr($name, 0,-1).'</option>';
		}
		return  $str.= '</select><br>';
	}

	public static function label(string $_idname ,string $_name): string
	{
		return '<label for="'.$_idname.'">'.$_name.' : </label>';
	}

}




