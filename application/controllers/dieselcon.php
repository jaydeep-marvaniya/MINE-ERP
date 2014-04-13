<?php
class dieselcon extends CI_Controller{

	public function index()
	{
	
		$this->load->helper('url');
	}

	function __construct()
	{
		parent::__construct();
	
		$this->load->helper('url');
		$this->load->library('session');
		
	
	}
	
//make sidebar entry of this table
	public function  diesel_input_edit()
	{
	

		if($this->session->userdata('logged_in'))
		{
		
		
	
		$this->load->database();
		$this->load->library('grocery_crud');
	
		$this->grocery_crud->set_subject('DIESEL INPUT');
		$this->grocery_crud->set_table('dieselin');
		
		
		
		$output_qty = $this->grocery_crud->render();
	
	
		$this->_example_output($output_qty);
		
		}
		else
		{
			redirect('login', 'refresh');
		
		}
		
	
	}
	
	
	public function  dieseledit()
	{

		if($this->session->userdata('logged_in'))
		{
		
		


		$this->load->database();
		$this->load->library('grocery_crud');

		$this->grocery_crud->set_subject('OR edit DIESEL');
		$this->grocery_crud->set_table('diesel');
		$this->grocery_crud->set_relation('vehicle','vehicles','{vehiclename} {vehicleno}');
		
		$this->grocery_crud->required_fields(
		
				'Openingdate', 'Closingdate', 'vehicle', 'OpeningKm', 'ClosingKm', 'OpeningHours', 'ClosingHours'
		
		);
		
		$output_qty = $this->grocery_crud->render();


		$this->_example_output($output_qty);
		
		}
		else
		{
			redirect('login', 'refresh');
		
		}
		

	}

	function _example_output($output = null)

	{	$this->load->view('dieselsidebar');
     	$this->load->view('abstract_view.php',$output);
	}






	public function dieselday()
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
			$data['date'] = $date;
		}
		
		
		//query for running NEW diesel
		$query=$this->db->query("SELECT SUM(Quentity) as runningnew from dieselin WHERE fillingDate<'$date'");
		if ($query->num_rows() > 0)
		{
			$data['RUNNING_NEW_DIESEL']= $query->row_array();
		}
		else $data['RUNNING_NEW_DIESEL']= 0;
		
		//QUERY FOR RUNNING CON
		$query=$this->db->query("SELECT SUM(Quentity) as runningdiesel from diesel WHERE fillingDate<'$date'");
		if ($query->num_rows() > 0)
		{
			$data['RUNNING_CONS_DIESEL']= $query->row_array();
		}
		else $data['RUNNING_CONS_DIESEL']= 0;
		
		
		//opening balance
		//$data['opening_balance'] = $data['RUNNING_NEW_DIESEL']-$data['RUNNING_CONS_DIESEL'];
 		
		//QUERY FOR NEW diesel PAR DAY
		$query=$this->db->query("SELECT SUM(Quentity) AS newdiesel from dieselin WHERE fillingDate='$date' ");
		if ($query->num_rows() > 0)
		{
			$data['NEW_DIESEL']= $query->row_array();
		}
		else $data['NEW_DIESEL']= 0;
		
		//total diesel
		//$data['total_diesel'] = $data['NEW_DIESEL'] + $data['opening_balance'];
		
		//total cons
		
		$query=$this->db->query("SELECT SUM(Quentity) AS cons from diesel WHERE fillingDate='$date'");
		if ($query->num_rows() > 0)
		{
			$data['CONS_DIESEL']= $query->row_array();
		}
		else $data['CONS_DIESEL']= 0;
		 
		//closing balance
		//$data['closing_balance']= $data['total_diesel'] - $data['CONS_DIESEL'];
		
		
		$query=$this->db->query(" 		select  concat(vehiclename, '-', vehicleno) as vehicle ,
										sum( if(FillingDate='$date',Quentity,0)) as THIS_DAY,
										sum(Quentity) as TOTAL_CONSUMPTION  from diesel join vehicles on vehicles.vehicelid=diesel.vehicle group by vehicle 
				 ");
		
		
		
		$this->load->library('table');
		$this->table->set_caption('PER VEHICLE CONSUMPTION');
		$tmpl = array ( 'table_open'  => ' <table border="1" cellpadding="2" cellspacing="1" class="mytable">' );
		$this->table->set_template($tmpl);
		
		$data['tableVEHICLE']= $this->table->generate($query);
		
			
		$this->load->view('DIESELVIEW.php',$data);
		
		
		}
		else
		{
			redirect('login', 'refresh');
		
		}
		
		


	}
	
	
	function dieselchart()
	
	{

		if($this->session->userdata('logged_in'))
		{
		
		
		
		$this->load->library('highcharts');
		$this->highcharts->set_type('area');
		$this->highcharts->set_title('Par day Diesel');
		$this->highcharts->set_dimensions(700, 300);
		$this->highcharts->set_axis_titles('Date', 'Quantity in Lt');
	
	
		$this->highcharts->render_to("g_render");
		$con = mysql_connect('localhost','root','123');
	
		mysql_select_db("mineerp", $con);
		$result = mysql_query("select fillingDate as `Date` ,  sum(`Quentity`) as `diesel_cons` from diesel group by `fillingDate`");
	
		while ($myrow = mysql_fetch_array($result))
		{ $i=0;
		$value[] = intval($myrow['diesel_cons']);
		$date[$i] = ($myrow['Date']);
		$this->highcharts->push_categorie($date[$i],'x');
		$i++;
		}
	
		$serie['data'] = $value;
		$this->highcharts->set_serie($serie, "diesel_cons");
	
		$data['charts']= $this->highcharts->render();
		$this->load->view('dieselsidebar');
		$this->load->view('chartview', $data);
	
		}

		
		else
		{
			redirect('login', 'refresh');
		
		}
		
	
	}
	
	


}




?>