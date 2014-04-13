<?php
class quantity extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}
	
	
	public function get_pardayqty($date)
	{
		
		$query=$this->db->query("SELECT total_par_day FROM qtyparday where single_date='$date'");
		
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else return 0;
	}
	
	public function get_totalparday($date)
	{
		
		$query=$this->db->query("select super_total_par_day from totalqtyparday where single_date='$date'");
		if ($query->num_rows() > 0)
		{
		return $query->row_array();
		}
		else return 0;
	}
	
	public function get_billparday($date)
	{
		$query=$this->db->query("select bill_amount from qty_bill where bill_date='$date'");
		if ($query->num_rows() > 0)
		{
		return $query->row_array();
		}
		else return 0;
	}
	
	public function get_tripsparday($date)
	{
		$query=$this->db->query("SELECT shift, sum( if( TruckNo = '1' && trip_Date ='$date' && Trucktype='volvo' , trips, 0 ) ) AS volvo1  ,  
								sum( if(  TruckNo = '2' && trip_Date ='$date' && Trucktype='volvo', trips, 0 ) ) AS volvo2, 
								sum( if(  TruckNo = '3' && trip_Date ='$date' && Trucktype='volvo', trips, 0 ) ) AS volvo3 
								
								FROM qty GROUP BY shift");
		//and more trucks
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else return 0;
		
	}
	
	public function get_totaltrips($date)
	{
		$query= $this->db->query("SELECT sum(trips)
								  FROM qty
								  GROUP BY EXTRACT(YEAR_MONTH FROM '$date') ");
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else return 0;
	}
	
	public function get_totalqty($date)
	{
		$query= $this->db->query("SELECT total_par_month FROM `totalqtyparmonth` WHERE month= month('$date')&& year=year('$date')");
		if ($query->num_rows() > 0)
		{
		return $query->row_array();
		}
		else return 0;
	}
	
	public function get_qty($date)
	{
		$query= $this->db->query("SELECT total_par_month FROM `qtyparmonth` WHERE month= month('$date')&& year=year('$date')");
		if ($query->num_rows() > 0)
		{
		return $query->row_array();
		}
		else return 0;	}
	
	public function get_totalbill($date)
	{
		$query=$this->db->query("SELECT sum(bill_amount) FROM `qty_bill` group by EXTRACT(YEAR_MONTH FROM '$date') ");
		if ($query->num_rows() > 0)
		{
		return $query->row_array();
		}
		else return 0;
	}
	
	public function get_leveldiff($date)
	{
		$query=$this->db->query("SELECT amount FROM leveldiff WHERE month(leveldiffdate)= month('$date')&& year(leveldiffdate)=year('$date') ");
		if ($query->num_rows() > 0)
		{
		return $query->row_array();
		}
		else return 0;
	}
	
	
	public function get_tripsupto($date)
	{
		$query=$this->db->query("SELECT sum(trips) FROM `qty` WHERE MONTH(`trip_date`)<=(MONTH('$date')-1) && YEAR(`trip_date`)<=YEAR('$date')");
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else return 0;
		
	}
	
	public function get_qtyupto($date)
	{
		$query=$this->db->query("SELECT sum(total_par_day) FROM qtyparday where MONTH(`single_date`)<=(MONTH('$date')-1) && YEAR(`single_date`)<=YEAR('$date')");
			if ($query->num_rows() > 0)
			{
				return $query->row_array();
			}
			else return 0;
		
	}
	
	public function get_totalqtyupto($date)
	{
		$query=$this->db->query("SELECT sum(total_par_day) FROM totalqtyparday where MONTH(`single_date`)<=(MONTH('$date')-1) && YEAR(`single_date`)<=YEAR('$date')");
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else return 0;
	
	}
	public function get_totalleveldiff($date)
	{
		$query=$this->db->query("SELECT sum(amount) FROM leveldiff WHERE month(leveldiffdate)<= (month('$date')-1) && year(leveldiffdate)<=year('$date') ");
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else return 0;
		
		
	}
	
	public function get_totalbill($date)
	{
		$query=$this->db->query("SELECT sum(bill_amount) FROM qty_bill WHERE month(bill_date)<= (month('$date')-1) && year(bill_date)<=year('$date') ");
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else return 0;
	}
	
	

	
}

?>