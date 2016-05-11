<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class pagenotfound extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');

		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}

	}

	function index()
	{
		 $this->layout->view('404');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */