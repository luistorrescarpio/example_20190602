<?php 

require("heasy_mysql.php");


$obj = (object)$_REQUEST;

switch ($obj->action) {
	case 'getData':
		$r = query("SELECT * FROM personal WHERE dni='$obj->dni'");
		res($r);

		break;
}