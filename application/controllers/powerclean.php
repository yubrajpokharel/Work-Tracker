<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Powerclean extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
		$this->load->library('layout'); 

	}

	function index()
	{
		 $this->load->view('static/index');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */