<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->ci =& get_instance();
		$this->ci->load->config('tank_auth', TRUE);
		$this->load->library('tank_auth');
		$this->load->model('admin/admin_model', 'admin_model');
		$role =  $this->users->get_user_role($this->session->userdata('user_id'));
	 		if($role != ADMIN){
	 			redirect('/');
	 		}
	}

	function add_employee(){
		$this->layout->view('admin/add_user');
	}

	function save_employee(){

		$password = $this->input->post('password');
		$hasher = new PasswordHash(
					$this->ci->config->item('phpass_hash_strength', 'tank_auth'),
					$this->ci->config->item('phpass_hash_portable', 'tank_auth'));
			$hashed_password = $hasher->HashPassword($password);

		$data['user'] = array(
			'username' => $this->input->post('username'),
			'password' => $hashed_password,
			'email' => $this->input->post('email'),
			'activated' => $this->input->post('status'),
			'role' => $this->input->post('role'),
			'banned' => 0,
			'new_email_key' =>  md5($this->input->post('email')),
			'created' => date('Y-m-d H:i:s')
		);

		$user_id = $this->admin_model->create_user($data['user']);

		if($user_id != ''){

			$data['profile'] = array(
				'user_id' => $user_id,
				'f_name' => ucfirst($this->input->post('fname')),
				'm_name' => ucfirst($this->input->post('mname')),
				'l_name' => ucfirst($this->input->post('lname')),
				'sex' => $this->input->post('sex'),
				'dob' => $this->input->post('dob'),
				'mobile' => $this->input->post('mobile'),
				'landline' => $this->input->post('landline'),
				'post' => ucfirst($this->input->post('post')),
				'join_date' => $this->input->post('join_date'),
				'start_time' => $this->input->post('stime'),
				'end_time' => $this->input->post('etime'),
				'emp_type' => $this->input->post('emp_type'),
				'country' => ucfirst($this->input->post('country')),
				'city' => ucfirst($this->input->post('city')),
				'state' => ucfirst($this->input->post('state')),
				'street' => ucfirst($this->input->post('street')),
				'block_no' => ucfirst($this->input->post('block')),
			);

			$data['salary'] = array(
				'user_id' => $user_id,
				'salary' => $this->input->post('salary')
				);


			if(($this->admin_model->create_user_profile($data['profile']) == 1) && ($this->admin_model->create_user_salary($data['salary']) == 1)){
				echo 'success';
			}else{
				echo 'fail';
			}
		}		
	}

	function list_employee(){
		$data['users'] = $this->admin_model->list_users();
		//echo json_encode($data);
		$this->layout->view('admin/list_user', $data);
	}

	function view_employee($id = '')
	{
		if($id == ''){
			redirect('pagenotfound');
		}
		$data['user'] = $this->admin_model->show_user($id);
		if(!empty($data['user'])){
			$this->layout->view('admin/single_view', $data);	
		}else{
			redirect('pagenotfound');	
		}
	}

	function edit_user($id = '')
	{
		if($id == ''){
			redirect('pagenotfound');
		}
		$data['user'] = $this->admin_model->show_user($id);
		if(!empty($data['user'])){
			$this->layout->view('admin/edit_user', $data);	
		}else{
			redirect('pagenotfound');	
		}	
	}

function update_employee(){

		$user_id = $this->input->post('uid');
		//echo 'asdf'.$user_id;

		//die();

		$data['user'] = array(
			
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'activated' => $this->input->post('status'),
			'role' => $this->input->post('role'),
			'banned' => $this->input->post('ban'),
			'created' => date('Y-m-d H:i:s')
		);

		//echo json_encode($data['user']);
		//die();

		$this->admin_model->update_user($data['user'], $user_id);

		

			$data['profile'] = array(

				'f_name' => ucfirst($this->input->post('fname')),
				'm_name' => ucfirst($this->input->post('mname')),
				'l_name' => ucfirst($this->input->post('lname')),
				'sex' => $this->input->post('sex'),
				'dob' => $this->input->post('dob'),
				'mobile' => $this->input->post('mobile'),
				'landline' => $this->input->post('landline'),
				'post' => ucfirst($this->input->post('post')),
				'join_date' => $this->input->post('join_date'),
				'start_time' => $this->input->post('stime'),
				'end_time' => $this->input->post('etime'),
				'emp_type' => $this->input->post('emp_type'),
				'country' => ucfirst($this->input->post('country')),
				'city' => ucfirst($this->input->post('city')),
				'state' => ucfirst($this->input->post('state')),
				'street' => ucfirst($this->input->post('street')),
				'block_no' => ucfirst($this->input->post('block')),
			);

			//echo json_encode($data['profile']);
			//die();

			$this->admin_model->update_user_profile($data['profile'], $user_id);
				redirect('admin/edit_user'.'/'.$user_id);			
	}

	function delete_user($id = '')
	{
		if($id == ''){
			redirect('pagenotfound');
		}
		
		$this->admin_model->delete_user($id);
		redirect('listEmp');
		
	}
}

