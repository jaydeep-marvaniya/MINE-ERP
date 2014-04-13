<?php

class penaltycon extends CI_Controller{
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


	public function  penaltyedit()
	{


		if($this->session->userdata('logged_in'))
		{
	
		$this->load->database();
		$this->load->library('grocery_crud');

		$this->grocery_crud->set_subject('OR edit PENALTY LOG');
		$this->grocery_crud->set_table('penalty');
		
		$this->grocery_crud->required_fields(
		
				'penno', 'penDate', 'Reportedtrips', 'Hindrencefreeday'
				
				
				
		);
		
		
		$output_qty = $this->grocery_crud->render();


		$this->_example_output($output_qty);

		}
		else
		{
			redirect('login', 'refresh');
		
		}
		

	}

	public function  MONTHLYedit()
	{

		if($this->session->userdata('logged_in'))
		{
		
	
	
		$this->load->database();
		$this->load->library('grocery_crud');
	
		$this->grocery_crud->set_subject('OR edit PENALTY LOG');
		$this->grocery_crud->set_table('monthlydata');
		$output_qty = $this->grocery_crud->render();
	
	
		$this->_example_output($output_qty);
		
		}
		else
		{
			redirect('login', 'refresh');
		
		}
		
	
	}
	
	
	function _example_output($output = null)

	{	$this->load->view('penaltysidebar');
		$this->load->view('abstract_view.php',$output);
	}

	
	public function penaltyday()
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

	$query=$this->db->query("
								SELECT penDate, `Reportedtrips` , `Reportedtrips`*dumperfactor as qty, 
								`Reportedtrips`*dumperfactor*`Hindrencefreeday` as actual_qty,
								dailytarget*`Hindrencefreeday`  as daily_target,
								dailytarget*`Hindrencefreeday`-`Reportedtrips`*dumperfactor*`Hindrencefreeday` as shotfallqty 
							FROM `penalty` join monthlydata on month(penalty.penDate) = month(monthlydata.dateofmonth) where month(`penDate`) = month('$date')		");
	
	$this->load->library('table');
	$this->table->set_caption('PENALTY Per DAY');
	$tmpl = array ( 'table_open'  => ' <table border="1" cellpadding="2" cellspacing="1" class="flexigrid">' );
	
	$this->table->set_template($tmpl);
	$data['table']= $this->table->generate($query);
	
	$this->load->helper('url');

	
	$this->load->view('PENALTYVIEW',$data);
	
	}
	else
	{
		redirect('login', 'refresh');
	
	}
	
		
	}

	function penaltychart()
	{

		if($this->session->userdata('logged_in'))
		{
		
				
		$this->load->library('highcharts');
		$this->highcharts->set_type('area');
		$this->highcharts->set_title('Par day Quantity');
		$this->highcharts->set_dimensions(700, 300);
		$this->highcharts->set_axis_titles('Date', 'Quantity');
	
	
		$this->highcharts->render_to("g_render");
		$con = mysql_connect('localhost','root','123');
	
		mysql_select_db("mineerp", $con);
		$result = mysql_query(" 	SELECT penDate, `Reportedtrips` , `Reportedtrips`*dumperfactor as qty, 
								`Reportedtrips`*dumperfactor*`Hindrencefreeday` as actual_qty,
								dailytarget*`Hindrencefreeday`  as daily_target,
								dailytarget*`Hindrencefreeday`-`Reportedtrips`*dumperfactor*`Hindrencefreeday` as shotfallqty 
							FROM `penalty` join monthlydata on month(penalty.penDate) = month(monthlydata.dateofmonth) ");
	
		while ($myrow = mysql_fetch_array($result))
		{ $i=0;
		$value[] = intval($myrow['shotfallqty']);
	
		$date[$i] = ($myrow['penDate']);
		$this->highcharts->push_categorie($date[$i],'x');
		$i++;
		}
	
		$serie['data'] = $value;

		$this->highcharts->set_serie($serie, "shotfallqty");	
	
		$data['charts']= $this->highcharts->render();
		$this->load->view('penaltysidebar');
		$this->load->view('chartview', $data);
	
		}
		else
		{
			redirect('login', 'refresh');
		
		}
		
		

		
		}
	
	
	
	
}

?>