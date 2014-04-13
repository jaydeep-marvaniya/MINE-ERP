<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class input extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

		$data['home'] = strtolower(__CLASS__).'/';
		$this->load->vars($data);
	}


//Quantity	

	function index(){

		
		$this->load->database();
		$this->load->library('grocery_crud');
		
		$this->grocery_crud->set_subject('QUANTITY');
		$this->grocery_crud->set_table('qty');
		$output_qty = $this->grocery_crud->render();
		
		$this->load->view('abstract_view.php',$output_qty);
		
	
	}


//bill-detail-quantity

	function editbill()
	{		
		$this->load->database();
		$this->load->library('grocery_crud');
		
		$this->grocery_crud->set_subject('BILL DETAILS');
		$this->grocery_crud->set_table('qty_bill');
		$output = $this->grocery_crud->render();
		
		$this->load->view('abstract_view.php',$output);
		

	}
//level difference
	function editlevel()
	{
		$this->load->database();
		$this->load->library('grocery_crud');
	
		$this->grocery_crud->set_subject('BILL DETAILS');
		$this->grocery_crud->set_table('leveldiff');
		$output = $this->grocery_crud->render();
	
		$this->load->view('abstract_view.php',$output);
	
	}
	
// kmdetail 
	
	function editkmlog()
	{
		$this->load->database();
		$this->load->library('grocery_crud');
		
		$this->grocery_crud->set_subject('KILOMETER DETAILS');
		$this->grocery_crud->set_table('kmlog');
		$output_qty = $this->grocery_crud->render();
		
		$this->load->view('abstract_view.php',$output_qty);
		
	}

//	edit diesel

	function editdiesel()
	{
		$this->load->database();
		$this->load->library('grocery_crud');
	
		$this->grocery_crud->set_subject('DIESEL FILLING');
		$this->grocery_crud->set_table('diesel');
		$output = $this->grocery_crud->render();
	
		$this->load->view('abstract_view.php',$output);
	
	
	}

//PENELETY DETAILS

	
	function editPENdata()
	{
		$this->load->database();
		$this->load->library('grocery_crud');
	
		$this->grocery_crud->set_subject('PENALTY DETAILS');
		$this->grocery_crud->set_table('monthlydata');
		$output = $this->grocery_crud->render();
	
		$this->load->view('abstract_view.php',$output);
	
	
	}
	
//edit penalty
	function editPEN()
	{
		$this->load->database();
		$this->load->library('grocery_crud');
	
		$this->grocery_crud->set_subject('PENALTY DETAILS');
		$this->grocery_crud->set_table('penalty');
		$output = $this->grocery_crud->render();
	
		$this->load->view('abstract_view.php',$output);
	
	
	}
	
	
	
	
}


?>