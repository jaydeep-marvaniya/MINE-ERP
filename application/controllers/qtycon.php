<?php


class qtycon extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
	
		$this->load->library('session');
		$this->load->helper('url');
	
	}
	
	
	public function index()
	{
		
		$this->load->helper('url');
		
	}
	
	
	public function  qtyedit()
	{
		
		
		
	if($this->session->userdata('logged_in'))
	{
		
		$this->load->database();
		$this->load->library('grocery_crud');
	
		$this->grocery_crud->set_subject('OR edit TRIPS');
		$this->grocery_crud->set_table('qty');
		$this->grocery_crud->set_relation('vehicle','vehicles','{vehiclename} {vehicleno}');
		$this->grocery_crud->required_fields('trip_Date','Shift','trips','capacity','vehicle');
		$this->grocery_crud->set_rules('capacity','capacity','is_natural_no_zero');
		$this->grocery_crud->set_rules('trips','trips','is_natural_no_zero');
		
		
		
		$output_qty = $this->grocery_crud->render();
			
		$this->load->view('qtysidebar');
		$this->load->view('abstract_view.php',$output_qty);
		//$this->_example_output($output_qty);
	
		
	}
	
	else
		{
			redirect('login', 'refresh');
	
		}	

	}
	public function billedit()
	
	{
		if($this->session->userdata('logged_in'))
		{
		
		$this->load->database();
		$this->load->library('grocery_crud');
		
		$this->grocery_crud->set_subject('OR edit TRIPS');
		$this->grocery_crud->set_table('qty_bill');
		$this->grocery_crud->required_fields('bill_date','bill_amount');
		//$this->grocery_crud->set_rules('bill_date','','is_natural_no_zero');
	//	$this->grocery_crud->set_rules('bill_amount','bill_amount','is_natural_no_zero');
		
		
		
		$output_qty = $this->grocery_crud->render();
		$this->load->view('qtysidebar');
		$this->load->view('abstract_view.php',$output_qty);
		
		}
		else
		{
			redirect('login', 'refresh');
		
		}
		
		
		
		
		
	}
	
	
	function leveledit()
	{
		if($this->session->userdata('logged_in'))
		{
		
		
		$this->load->database();
		$this->load->library('grocery_crud');
	
		$this->grocery_crud->set_subject('LEVEL DIFFERENCE');
		$this->grocery_crud->set_table('leveldiff');
		$this->grocery_crud->required_fields('leveldiffdate','amount');
		
		$output = $this->grocery_crud->render();
		$this->load->view('qtysidebar');
		$this->load->view('abstract_view.php',$output);
		
		}
		else
		{
			redirect('login', 'refresh');
		
		}
		
	
	}

	function qtychart()
	
	
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
		$result = mysql_query("SELECT * FROM qtyparday");
	
		while ($myrow = mysql_fetch_array($result))
		{ $i=0;
		$value[] = intval($myrow['total_par_day']);
		$date[$i] = ($myrow['single_date']);
		$this->highcharts->push_categorie($date[$i],'x');
		$i++;
		}
	
		$serie['data'] = $value;
		$this->highcharts->set_serie($serie, "total_par_day");
	
		$data['charts']= $this->highcharts->render();
		$this->load->view('qtysidebar');
		$this->load->view('chartview', $data);
		
		}
		else
		{
			redirect('login', 'refresh');
		
		}
		
	
	
	}
	
	
		
		
		
		
	public function qtyday()
	{	
		
		if($this->session->userdata('logged_in'))
		{
		
		
		
		$this->load->database();
		if(isset($_POST['date']) && $_POST['date'] !=NULL){
		
			$date= $this->input->post('date');
			$data['date']=$date;
		}
		
		else{
			$date= date("Y-m-d", strtotime('today'));
			$data['date'] = $date; //Or whatever arbitrary date you want.
		
		}
		
		
		//QTYUPTODATE
		$query=$this->db->query("SELECT total_par_day FROM qtyparday where single_date='$date'");
		
		if ($query->num_rows() > 0)
		{
			$data['QTYUPTODATE']= $query->row_array();
		}
		else $data['QTYUPTODATE']= 0;
	
		
		
		//TOTALQTY
		$query=$this->db->query("select super_total_par_day from totalqtyparday where single_date='$date'");
		if ($query->num_rows() > 0)
		{
				$data['TOTALQTY']= $query->row_array();
		}
		else 	$data['TOTALQTY']= 0;
		
		
		//billamount of this month
		$query=$this->db->query("select bill_amount from qty_bill where bill_date='$date'");
		if ($query->num_rows() > 0)
		{
			$data['BILLAMOUNT']= $query->row_array();
		}
		else $data['BILLAMOUNT']= 0;
		
		
		//QTYUPTOMONTH
		
		$query= $this->db->query("SELECT total_par_month FROM `qtyparmonth` WHERE month= month('$date')&& year=year('$date')");
		if ($query->num_rows() > 0)
		{
			$data['QTYUPTOMONTH'] = $query->row_array();
		}
		else $data['QTYUPTOMONTH'] = 0;
		
		
		
		//LEVELDIFFERENCE
		$query=$this->db->query("SELECT amount FROM leveldiff WHERE month(leveldiffdate)= month('$date')&& year(leveldiffdate)=year('$date') ");
		if ($query->num_rows() > 0)
		{
			$data['LEVELDIFF']= $query->row_array();
		}
		else $data['LEVELDIFF']= 0;
		
		
		
		//TOTALQTYMONTH
		$query= $this->db->query("SELECT total_par_month FROM `totalqtyparmonth` WHERE month= month('$date')&& year=year('$date')");
		if ($query->num_rows() > 0)
		{
			$data['TOTALQTYMONTH']= $query->row_array();
		}
		else $data['TOTALQTYMONTH']= 0;
		
		
		
		//TOTALTRIPS
		$query= $this->db->query("SELECT sum(trips) AS totaltrips FROM qty GROUP BY EXTRACT(YEAR_MONTH FROM '$date') ");
		if ($query->num_rows() > 0)
		{
			$data['TOTALTRIPS']= $query->row_array();
		}
		else $data['TOTALTRIPS']= 0;
		
		
		
		//BILLAMOUNTMONTH
		
		$query=$this->db->query("SELECT sum(bill_amount) as billupto FROM `qty_bill` group by EXTRACT(YEAR_MONTH FROM '$date') ");
		if ($query->num_rows() > 0)
		{
			$data['BILLAMOUNTMONTH']= $query->row_array();
		}
		else $data['BILLAMOUNTMONTH']= 0;
		
		
		//NEW TABLES
		$this->load->library('table');
		$this->table->set_caption('<h3>TRIPS PAR DAY</h3>');
		$tmpl = array (
	'table_open'   => '<table border="1" cellpadding="4" cellspacing="0" class "citablemain">',

   'thead_open'   => '<thead>',
   'thead_close'   => '</thead>',

   'heading_row_start'  => '<tr class="maintable">',
   'heading_row_end'  => '</tr>',
   'heading_cell_start' => '<th class="maintable">',
   'heading_cell_end'  => '</th>',

   'tbody_open'   => '<tbody>',
   'tbody_close'   => '</tbody>',

   'row_start'    => '<tr class="citable">',
   'row_end'    => '</tr>',
   'cell_start'   => '<td>',
   'cell_end'    => '</td>',

   'row_alt_start'   => '<tr class="altcitable">',
   'row_alt_end'   => '</tr>',
   'cell_alt_start'  => '<td>',
   'cell_alt_end'   => '</td>',

   'table_close'   => '</table>'
  );

		$this->table->set_template($tmpl);
		//&& trip_Date ='$date'
//		$query=$this->db->query("SELECT shift AS Shift, sum( if( TruckNo = '1' && Trucktype='volvo' && trip_Date ='$date', trips, 0 ) ) AS 'Volvo-1'  ,
	//				sum( if(  TruckNo = '2' && Trucktype='volvo' && trip_Date ='$date', trips, 0 ) ) AS 'Volvo-2',
		//			sum( if(  TruckNo = '3' && Trucktype='volvo' && trip_Date ='$date', trips, 0 ) ) AS 'Volvo-3'
		//
			//		FROM qty GROUP BY shift");
					//and more trucks
		$query=$this->db->query("	SELECT concat(vehiclename, '-', vehicleno ) as TRUCK ,
									sum( if( shift='1' && trip_Date ='$date', trips, 0 ) ) AS 'Shift-1',
									sum( if( shift='2' && trip_Date ='$date', trips, 0 ) ) AS 'Shift-2',
									sum( if( shift='3' && trip_Date ='$date', trips, 0 ) ) AS 'Shift-3', 
									sum( if( shift='4' && trip_Date ='$date', trips, 0 ) ) AS 'Shift-4'
									FROM qty join vehicles on qty.vehicle=vehicles.vehicelid where vehicletype='trucks' GROUP BY vehicle");
		
			$data['table']= $this->table->generate($query);
			
		
		
		
		//$this->load->model('quantity');
		//DATE CALCULATION
		//$data['QTYUPTODATE']= $this->quantity->get_pardayqty($date);
		/*
		$data['TOTALQTY']= $this->quantity->get_totalparday($date);
		$data['BILLAMOUNT']=$this->quantity->get_billparday($date);
		
		//MONTH CALCULATION
		$data['QTYUPTOMONTH']=$this->quantity->get_qty($date);
		$data['BILLAMOUNTMONTH']=$this->quantity->get_totalbill($date);
		$data['TOTALTRIPS']=$this->quantity->get_totaltrips($date);
		
		$data['TOTALQTYMONTH']=$this->quantity->get_totalqty($date);
		$data['LEVELDIFF']= $this->quantity-> get_leveldiff($date);
		$data['TOTALQTYMONTH']= $data['TOTALQTYMONTH']+ $data['LEVELDIFF'];
		
		$data['TRIPSUPTO']=$this->quantity->get_tripsupto($date);
		$data['QTYUPTP']=$this->quantity->get_qtyupto($date);

		$data['TOTALQTYUPTO']=$this->quantity->get_totalqtyupto($date);
		$data['LEVELDIFFUPTO']=$this->quantity->get_totalleveldiff($date);
		$data['TOTALQTYUPTO']=$data['TOTALQTYUPTO']+ $data['LEVELDIFFUPTO'];    
		*/
		


		$this->load->view('QTYVIEW',$data);
		}
		else
		{
			redirect('login', 'refresh');
		
		}
		
		
	
	}

	
	
}
?>