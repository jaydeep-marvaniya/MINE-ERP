<?php


class store extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
	
	
	}
	
	
	public function index()
	{
		
		$this->load->helper('url');
		
	}
	
	
	public function  vehicle_edit()
	{
		
		$this->load->helper('url');
		
		$this->load->database();
		$this->load->library('grocery_crud');
	
		$this->grocery_crud->set_subject('TOTAL VEHICLES IN FIRMS');
		$this->grocery_crud->set_table('vehicles');
		$this->grocery_crud->set_rules('vehicleno','trips','is_natural_no_zero');
		$this->grocery_crud->required_fields( 'vehiclename', 'vehicleno', 'vehicletype');
	
		
		
		$output_qty = $this->grocery_crud->render();

		
		////////////// to make sidebar for store
		
		//$this->load->view('qtysidebar');

		$this->load->view('storesidebar');
		
		$this->load->view('abstract_view.php',$output_qty);
		//$this->_example_output($output_qty);
	

	}
	
	public function service_edit()
	
	{
	
		$this->load->database();
		$this->load->library('grocery_crud');
	
		$this->grocery_crud->set_subject('edit spareparts');
		$this->grocery_crud->set_table('services');
		$output_qty = $this->grocery_crud->render();
		$this->load->view('storesidebar');
		$this->load->view('abstract_view.php',$output_qty);
	
	}
	
	
	
	public function store_edit()
	
	{

		$this->load->database();
		$this->load->library('grocery_crud');
		
		$this->grocery_crud->set_subject('edit spareparts');
		$this->grocery_crud->set_table('store');
		$output_qty = $this->grocery_crud->render();
		$this->load->view('storesidebar');
		$this->load->view('abstract_view.php',$output_qty);
		
	}
	
	
	
		
	

	
	
}
?>