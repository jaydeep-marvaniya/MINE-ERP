	<?php
	/* final works on this project
	 * 
	 * summary ,
	 *
	 * 
	 * */
	
	class SUMMERY extends CI_Controller{
	
		public function index()
		{
			
		}
	
		function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
			
		
		}
				
		public function summerynow()
		{	
			if($this->session->userdata('logged_in'))
			{
			
			
			$this->load->helper('url');
			$this->load->helper('array');
			//summery of quantity  
			$query=$this->db->query("select sum(super_total_par_day) as TOTAL_QUANTITY_TILL_NOW  from totalqtyparday ");
			
			if ($query->num_rows() > 0)
			{
				$data['QTYUPTODATE']= $query->row_array();
			}
			else $data['QTYUPTODATE']= 0;
			
			
			
			//SUMMERY OG TRIPS
			
			$query2=$this->db->query("select sum(trips) as TOTAL_TRIPS_TILL_NOW  
									from qty join vehicles on qty.vehicle=vehicles.vehicelid WHERE vehicletype<>'outer_party'");
			
			if ($query2->num_rows() > 0)
			{
				$data['TRIPSUPTODATE']= $query2->row_array();
			}
			else $data['TRIPSUPTODATE']= 0;
	
			
	
			//total diesel in firm
	
	
			$query=$this->db->query("select sum(quentity) as TOTAL_NEW_DIESEL_TILL_NOW from dieselin  ");
			
			if ($query->num_rows() > 0)
			{
				$data['NEWDIESELUPTODATE']= $query->row_array();
			}
			else $data['NEWDIESELSUPTODATE']= 0;
			
			//TOTAL CONS OF DIESLE
			
			$query=$this->db->query("select sum(quentity) as TOTAL_CONS_DIESEL_TILL_NOW from diesel  ");
			
			if ($query->num_rows() > 0)
			{
				$data['CONSDIESELUPTODATE']= $query->row_array();
			}
			else $data['CONSDIESELSUPTODATE']= 0;
			
			
			
			
			
			//TOTAL TRIPS and Quantity PAR VEHICLE 
			$query=$this->db->query(" 	select  concat(vehiclename, '-', vehicleno) as Truck ,
										sum(trips) as 'TOTAL TRIPS',
										sum(trips*capacity) as 'TOTAL QUANTITY'
										from qty join vehicles on vehicles.vehicelid=qty.vehicle group by vehicle  ");
			
			
			
			$this->load->library('table');
			$this->table->set_caption('VEHICLE TRIPS AND QUANTITY');
			$tmpl = array ( 'table_open'  => ' <table border="1" cellpadding="2" cellspacing="1" class="mytable">' );
			$this->table->set_template($tmpl);
	
			$data['tableTRIPS']= $this->table->generate($query);
	
			
			//total target achievement 
			$query=$this->db->query("select MONTH  ,total_par_month as QUANTITY  , dailytarget AS 'DAILY TARGET' , day(last_day(dateofmonth)) AS 'WORKING DAYS' , dailytarget*day(last_day(dateofmonth))-total_par_month as 'NET QUANTITY' 
										from totalqtyparmonth join monthlydata on totalqtyparmonth.month= month(monthlydata.dateofmonth) ");
				
				
				
			$this->load->library('table');
			$this->table->set_caption('MONTHLY TARGET AND TOTAL QUANTITY');
			$tmpl = array ( 'table_open'  => ' <table border="1" cellpadding="2" cellspacing="1" class="mytable">' );
			$this->table->set_template($tmpl);
			
			$data['tableTARGET']= $this->table->generate($query);
			
			//TARGET_PAR_DATE
			
			$query=$this->db->query(" select 
						super_total_par_day as 'QUANTITY PAR DAY', 
						sum(if(`single_date`<'2012-08-30',`super_total_par_day`,0)) as 'TOTAL QUANTITY',
						dailytarget AS 'Daily Target',
						day(single_date)* dailytarget as 'Target Quantity',
						sum(if(`single_date`<'2012-08-30',`super_total_par_day`,0))-day(single_date)* dailytarget   AS 'NET QUANTITY' 
						
									from totalqtyparday join monthlydata on month(totalqtyparday.single_date)=month(monthlydata.dateofmonth)
					 ");
			
			
			
			$this->load->library('table');
			$this->table->set_caption('DAILY TARGET AND TOTAL QUANTITY');
			$tmpl = array ( 'table_open'  => ' <table border="1" cellpadding="2" cellspacing="1" class="mytable">' );
			$this->table->set_template($tmpl);
				
			$data['tableTARGETPARDAY']= $this->table->generate($query);

			//$this->load->view('summerysidebar');
				
			$this->load->view('SUMMERYVIEW',$data);

				
				
			
		
		}
		else
		{
			redirect('login', 'refresh');
				
		}
			
		
			
		
	
		
		}
		
	}
	?>
