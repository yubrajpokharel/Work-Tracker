<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->ci =& get_instance();
		$this->ci->load->config('tank_auth', TRUE);
		$this->load->library('tank_auth');
		$this->load->model('emp/emp_model', 'emp_model');
		$this->load->model('admin/admin_model', 'admin_model');
		$role =  $this->users->get_user_role($this->session->userdata('user_id'));
	 		// if($role != EMPLOYEE){
	 		// 	redirect('/');
	 		// }
	}

	function stats(){
		$user_id = $this->session->userdata('user_id');
		$data['my_hours_stats'] = $this->emp_model->get_my_working_hours($user_id);
		$data['my_paid_salary'] = $this->emp_model->get_my_total_paid_salary_statics($user_id);
		$this->layout->view('employee/stats', $data);
	}

	function puncher(){
		$user_id = $this->session->userdata('user_id');
		$data['tasks'] = $this->emp_model->get_tasks($user_id);
		$this->layout->view('employee/dashboard', $data);	
	}

	function save_record(){

		$user_id = $this->input->post('id');
		$date = $this->input->post('pwdate');
		$task = $this->input->post('pwtask');
		$stime = $this->input->post('st_time');
		$etime = $this->input->post('ed_time');
		// check tasks
		$tasks = $this->emp_model->check_task($user_id, $date);
		if(count($tasks)>0){ 
			echo 'error'; 				// if task already exists
		}else {
			$data['tasks'] = array(
				'user_id' => $user_id,
				'task_date' => $date,
				'task' => $task,
				'start' => $stime,
				'end' => $etime
			);

			$insert_id = $this->emp_model->create_task($data['tasks']);
			if($insert_id != '' ){  	// if success 
				echo 'success';
			}else{ 						// if not success
				echo 'error';
			}
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

	function change_pro_pic()
		{
			$config['upload_path'] = './uploads/users/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '2048';
			$config['max_width']  = '0';
			$config['max_height']  = '0';
			$config['encrypt_name'] = 'true';
			
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('pic'))
				{
					$error = array('error' => $this->upload->display_errors());
					//echo json_encode($error);
					//die();
					redirect('profile', 'refresh');
				}
				else
				{
					$data = array(
						'user_id' => $this->session->userdata('user_id'),
						'profile_pic' => $this->upload->file_name
					);

					$this->emp_model->update_pro_pic($data);
					//die();
					redirect('profile', 'refresh');
				}
						
		}

	
	
}

