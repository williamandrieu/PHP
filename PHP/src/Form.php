<?php
class Form
{
	public static function input(string $_idname ,string $_name, string $_type)
	{
		echo '<label for="'.$_idname.'">'.$_name.' : </label><input id="'.$_idname.'" type="'.$_type.'" name="'.$_idname.'">';
	}

	public static function select(string $_idname ,string $_name, array $_selects)
	{
		$str = '<label for="'.$_idname.'">'.$_name.' : </label><select id="'.$_idname.'" name="'.$_idname.'">';

		foreach ($_selects as $id => $item) {
			$str.= '<option value="'.$item[1].'">'.$item[0].'</option>';
		}

		echo $str.= '</select><br>';
	}

}




