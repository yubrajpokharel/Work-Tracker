<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
		$this->load->library('layout'); 

		$this->load->model('emp/emp_model', 'emp_model');

		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}

	}

	function index()
	{
		 // Administrative tasks
		 $data['total_users'] = $this->users->get_total_users();
		 $data['total_admins'] = $this->users->get_total_admins();
		 $data['total_managers'] = $this->users->get_total_managers();

		 $data['total_working_hours'] = $this->emp_model->get_total_working_hour_statics();	
		 $data['total_salary'] = $this->emp_model->get_total_salary_monthly_statics();	 
		 // Administrative tasks finished

		 $role =  $this->users->get_user_role($this->session->userdata('user_id'));

		 if($role == ADMIN){		 	
		 	$this->layout->view('admin/dashboard', $data);

		   }else if($role == MANAGER){

		 	 $this->layout->view('manager/dashboard', $data);

		 	}else if($role == EMPLOYEE){
		 	  $user_id = $this->session->userdata('user_id');
		 	  $data['tasks'] = $this->emp_model->get_tasks($user_id);
		 	  $this->layout->view('employee/dashboard', $data);
		 	}

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */