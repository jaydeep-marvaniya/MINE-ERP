<?php

class Admin_model extends CI_Model {
	function __construct()
	{
		parent::Model();
		
		$this->load->helper('url');
   }

   public function verify_user($email, $password)
   {
   $this->load->database();
      $q = $this
            ->db
            ->where('email_address', $email)
            ->where('password', sha1($password))
            ->limit(1)
            ->get('users');

      if ( $q->num_rows > 0 ) {
         // person has account with us
         	return true;
      }
      return false;
   }
}
?>