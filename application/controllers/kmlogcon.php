<?php

class kmlogcon extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
			
	
	
	}
	
	public function index()
	{
		

		$this->load->helper('url');
	}


	public function  kmlogedit()
	{

		if($this->session->userdata('logged_in'))
		{
		
		

		$this->load->database();
		$this->load->library('grocery_crud');

		$this->grocery_crud->set_subject('OR edit Km LOG');
		$this->grocery_crud->set_table('kmlog');
		$this->grocery_crud->set_relation('vehicle','vehicles','{vehiclename} {vehicleno}');
		$this->grocery_crud->required_fields(
				
				'Openingdate', 'Closingdate', 'vehicle', 'OpeningKm', 'ClosingKm', 'OpeningHours', 'ClosingHours'
				
				);
		
		$output_qty = $this->grocery_crud->render();

		$this->load->view('kmsidebar');
		$this->_example_output($output_qty);

		}
		else
		{
			redirect('login', 'refresh');
		
		}
		
		
		}

	function _example_output($output = null)

	{	//$this->load->view('header');
	$this->load->view('abstract_view.php',$output);
	}






public function kmmonth()
	{

		if($this->session->userdata('logged_in'))
		{
		
		
	
	
	
	$this->load->database();
	if(isset($_POST['date'])){

		$date= $this->input->post('date');
		$data['date']=$date;
	}

	else{
		$date= date("Y-m-d", strtotime('today'));
		$data['date'] = $date; //Or whatever arbitrary date you want.

	}


	//kmlog this month FOR VOLVO
	$query_VOLVO=$this->db->query(" SELECT 
										(select concat(vehiclename,'-',vehicleno)  FROM vehicles where kmlog.vehicle=vehicles.vehicelid ) AS 'vehicle',
										(SELECT COALESCE(SUM(trips),0) FROM `qty` WHERE qty.vehicle=kmlog.vehicle &&  month(trip_date)=8) as 'TOTAL Trips',
										(`ClosingKm`-`OpeningKm`) as 'NetKMs',
										(`ClosingHours`-`OpeningHours`) as 'Net HOURS',

										(SELECT COALESCE(SUM(Quentity),0)  FROM `diesel` WHERE diesel.vehicle= kmlog.vehicle && month(fillingDate)=8) as 'monthly',

										(SELECT COALESCE(SUM(Quentity),0)  FROM `diesel`  WHERE diesel.vehicle= kmlog.vehicle && month(fillingDate)=8)/(`ClosingKm`-`OpeningKm`) as 'DIESEL per KM',
										(SELECT COALESCE(SUM(Quentity),0)  FROM `diesel` WHERE diesel.vehicle= kmlog.vehicle && month(fillingDate)=8)/(SELECT COALESCE(SUM(trips*capacity),0) FROM `qty` WHERE qty.vehicle=kmlog.vehicle && month(trip_date)=8) AS 'diesel/quentity',
										((SELECT COALESCE(SUM(Quentity),0)  FROM `diesel` WHERE diesel.vehicle= kmlog.vehicle && month(fillingDate)=8)/(SELECT COALESCE(SUM(trips*capacity),0) FROM `qty` WHERE qty.vehicle=kmlog.vehicle && month(trip_date)=8))*41.45 AS 'rs/quentity',
										(SELECT COALESCE(SUM(Quentity),0)  FROM `diesel` WHERE diesel.vehicle= kmlog.vehicle && month(fillingDate)=8)/(`ClosingHours`-`OpeningHours`) as 'DIESEL per hour',
	
										(SELECT COALESCE(SUM(trips),0) FROM `qty` WHERE qty.vehicle= kmlog.vehicle && month(trip_date)=8)/(`ClosingHours`-`OpeningHours`)as 'trip per hour',

										(SELECT COALESCE(SUM(trips*capacity),0) FROM `qty` WHERE qty.vehicle= kmlog.vehicle && month(trip_date)=8)/(`ClosingHours`-`OpeningHours`)as 'Quantity per hour',
										(SELECT COALESCE(SUM(trips),0) FROM `qty` WHERE qty.vehicle= kmlog.vehicle && month(trip_date)=8)/((`ClosingKm`-`OpeningKm`)*2) as 'LIED' FROM kmlog WHERE MONTH(`Openingdate`) =8
			
						
			 					 ");

	

	//NEW TABLES
	$this->load->library('table');
	$this->table->set_caption('TRIPS PAR DAY');
	$tmpl = array ( 'table_open'  => ' <table border="1" cellpadding="2" cellspacing="1" class="mytable">' );
	$this->table->set_template($tmpl);
	
	$data['tablevolvo']= $this->table->generate($query_VOLVO);
	
	
	$this->load->view('kmsidebar');
	$this->load->view('KMVIEW',$data);
	
		
		}
	
	
	else
	{
		redirect('login', 'refresh');
	
	}
	


}


}


?>