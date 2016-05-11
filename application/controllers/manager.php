<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Manager extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->ci =& get_instance();
		$this->ci->load->config('tank_auth', TRUE);
		$this->load->library('tank_auth');
		$this->load->model('admin/admin_model', 'admin_model');
		$this->load->model('emp/emp_model', 'emp_model');
		$role =  $this->users->get_user_role($this->session->userdata('user_id'));
	 		if($role != MANAGER){
	 			redirect('/');
	 		}
	}

	function profile()
	{
		$id = $this->session->userdata('user_id');
		$data['user'] = $this->emp_model->show_user($id);
		if(!empty($data['user'])){
			$this->layout->view('employee/profile', $data);	
		}else{
			redirect('pagenotfound');	
		}
	}

	function add_employee(){
		$this->layout->view('manager/add_user');
	}

	function employee_hours(){
		$data['hours'] = $this->emp_model->get_employee_working_hours();
		$this->layout->view('manager/working_hours', $data);
	}

	function paid_employee_hours(){
		$data['hours'] = $this->emp_model->get_paid_employee_working_hours();
		$this->layout->view('manager/paid_working_hours', $data);
	}

	function checkout($user_id = ''){
		//$user_id = $this->input->post('user_id');
		if($user_id == ''){
			echo "false";
			exit();
		}	

		$data = $this->emp_model->get_employee_working_hours_detail($user_id);
		$counter = 0;
		foreach($data as $d){
			$counter++;
			echo '
				<tr>
					<td class="col-lg-2">'.$counter.'</td>
					<td class="col-lg-2">'.$d->task_date.'</td>
					<td class="col-lg-3">'.$d->task.'</td>
					<td class="col-lg-2">'.$d->start.'</td>
					<td class="col-lg-2">'.$d->end.'</td>
					<td class="col-lg-2">'.($d->diff/10000).' Hours</td>
					<td class="col-lg-1">'; if($d->status == 1 ) echo '<span class="label label-success">paid</span>'; else echo '<span class="label label-danger">pending</span></td>
				</tr>';
		}
	}

	//pay employee salary
	function paybill($user_id = ''){
		if($user_id == ''){
			echo "false";
			exit();
		}
		
		$paid_detail = $this->emp_model->get_employee_unpaid_detail($user_id);

		$data = array(
			'user_id' => $paid_detail->user_id,
			'hours' => $paid_detail->diff,
			'amount' => $paid_detail->diff * $paid_detail->per_hour
		);

		$insert_data = $this->emp_model->get_employee_paid($data);

		if(!empty($insert_data)){
			if($update_tasks = $this->emp_model->update_task_status($user_id) == 1){
				echo "success";
			}
		}else{
			echo "fail";
		}
	}

	function view_employee_history($user_id = ''){
		if($user_id == ''){
			redirect('pagenotfound');
		}
		
		$data['user'] = $this->admin_model->show_user($user_id);
		$data['payments'] = $this->emp_model->get_user_history($user_id);
		$data['total_amount'] = $this->emp_model->get_employee_total_paid($user_id);
		
		$this->layout->view('manager/history', $data);
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
				'join_date' => $this->input->post('join_date'),
				'start_time' => $this->input->post('stime'),
				'end_time' => $this->input->post('etime'),
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
		$this->layout->view('manager/list_user', $data);
	}

	function view_employee($id = '')
	{

		if($id == ''){
			redirect('pagenotfound');
		}
		$data['user'] = $this->admin_model->show_user($id);
		if(!empty($data['user'])){
			$this->layout->view('manager/single_view', $data);	
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
		// echo json_encode($data);
		if(!empty($data['user'])){
			$this->layout->view('manager/edit_user', $data);	
		}else{
			redirect('pagenotfound');	
		}	
	}

	function update_employee(){

		$user_id = $this->input->post('uid');
		$data['user'] = array(
			
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'activated' => $this->input->post('status'),
			
			'banned' => $this->input->post('ban'),
			'created' => date('Y-m-d H:i:s')
		);

		$this->admin_model->update_user($data['user'], $user_id);

			$data['profile'] = array(

				'f_name' => ucfirst($this->input->post('fname')),
				'm_name' => ucfirst($this->input->post('mname')),
				'l_name' => ucfirst($this->input->post('lname')),
				'sex' => $this->input->post('sex'),
				'dob' => $this->input->post('dob'),
				'mobile' => $this->input->post('mobile'),
				'landline' => $this->input->post('landline'),
				
				'join_date' => $this->input->post('join_date'),
				'start_time' => $this->input->post('stime'),
				'end_time' => $this->input->post('etime'),
				
				'country' => ucfirst($this->input->post('country')),
				'city' => ucfirst($this->input->post('city')),
				'state' => ucfirst($this->input->post('state')),
				'street' => ucfirst($this->input->post('street')),
				'block_no' => ucfirst($this->input->post('block')),
			);


			$this->admin_model->update_user_profile($data['profile'], $user_id);

			$data['salary'] = array(
				'user_id' => $user_id,
				'salary' => $this->input->post('salary')
				);

			$this->admin_model->update_user_salary($data['salary'], $user_id);

			redirect('manager/edit_user'.'/'.$user_id);			
	}

	function delete_user($id = '')
	{
		if($id == ''){
			redirect('pagenotfound');
		}
		
		$this->admin_model->delete_user($id);
		redirect('listEmpManager');
		
	}

	function paid_hours(){
		$user_id = $this->session->userdata('user_id');
		$data['user'] = $this->admin_model->show_user($user_id);
		$data['payments'] = $this->emp_model->get_user_history($user_id);
		$data['total_amount'] = $this->emp_model->get_employee_total_paid($user_id);

		
		$this->layout->view('employee/paid', $data);
	}

	function remaining_hours(){
		$user_id = $this->session->userdata('user_id');
		$data['user'] = $this->admin_model->show_user($user_id);
		$data['payments'] = $this->emp_model->get_user_unpaid_history($user_id);
		$data['total_amount'] = $this->emp_model->get_employee_total_unpaid($user_id);
		
		$this->layout->view('employee/remaining', $data);
	}
}

