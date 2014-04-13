<?php
class diesel extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();

	}

	
	public function totaldieselparday($date)
	{
		$query= $this->db->query(" SELECT sum(`Quentity`) FROM `diesel` WHERE date='$date' ");
		return $query->row_array();
		
	}
	public function totaldieselparmonth($date,$trucktype,$truckno)
	{
		$query= $this->db->query(" SELECT SUM(  `Quentity` ) FROM  `diesel` WHERE  `vehicletype` =  '$trucktype' &&  `vehicleno` ='$truckno'
								GROUP BY EXTRACT(  YEAR_MONTH FROM  '$date' )");
		return $query->row_array();
		
		
	}
	public function totalparmonth($date)
	{
		$query= $this->db->query(" SELECT sum(`Quentity`) FROM `diesel` GROUP BY EXTRACT(  YEAR_MONTH FROM  '$date' ) ");
		return $query->row_array();
		
	}	
	

	
}
?>