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
		foreach ($_selects as $id => $item) {
			$str.= '<option value="'.$item[1].'">'.$item[0].'</option>';
		}
		return  $str.= '</select><br>';
	}

	public static function label(string $_idname ,string $_name): string
	{
		return '<label for="'.$_idname.'">'.$_name.' : </label>';
	}

}




