<?php
require_once('conf.php');

class CI_phpgrid {

	public function qty()
	{
		$dg = new C_DataGrid("SELECT * FROM qty", "Orders");
		return $dg;
	}
}
?>