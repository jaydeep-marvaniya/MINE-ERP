<?php
class kmlog extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();

	}
	
	
	public function get_net($date,$trucktype,$truckNO)
	{
			$query= $this->db->query("SELECT closingkm-openingkm as netkm, closinghours-openinghours as nethours
									 FROM `kmlog` WHERE MONTH(openingdate)= MONTH('$date') &&  `Vehicletype`='$trucktype'&& `Vehicleno`='$truckNo'");
			return $query->result_array();
		
	}
}


?>