<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Emp_model extends CI_Model
{
	private $table_name			= 'users';			// user accounts
	private $profile_table_name	= 'user_profiles';	// user profiles

	function __construct()
	{
		parent::__construct();

		$ci =& get_instance();
		$this->table_name			= $ci->config->item('db_table_prefix', 'tank_auth').$this->table_name;
		$this->profile_table_name	= $ci->config->item('db_table_prefix', 'tank_auth').$this->profile_table_name;
	}

	// statics ***********************************************
	function get_total_working_hour_statics(){
		$data = $this->db->select('SUM(t.end - t.start)/10000 AS diff, t.task_date as date')
						->from('user_task as t')
						->group_by('t.task_date')
						->get()->result();
		return $data;
	}

	function get_total_salary_monthly_statics(){
		$data = $this->db->select('SUM(amount) as total, paid_date as month')
						->from('paid_salary')
						->group_by('Month(paid_date), Year(paid_date)')
						->get()->result();
						
		//echo json_encode($data);
		return $data;
	}

	function get_my_total_paid_salary_statics($user_id){
		$data = $this->db->select('SUM(amount) as total, paid_date as month')
						->from('paid_salary')
						->where('user_id', $user_id)
						->group_by('Month(paid_date), Year(paid_date)')
						->get()->result();
						
		//echo json_encode($data);
		return $data;
	}

	function get_my_working_hours($user_id){
		$data = $this->db->select('(t.end - t.start)/10000 AS diff, t.task_date as date')
						->from('user_task as t')
						->where('t.user_id', $user_id)
						->get()->result();
		return $data;

	}
	// *******************************************************

	//check if the task is aleady added on certain date for user
	//Param @user_id, @date
	function check_task($id, $date)
	{
		$data = $this->db->select('*')
					->from('user_task')
					->where('user_id', $id)
					->where('task_date', $date)
					
					->get()->row();
		return $data;
	}


	//create a task for user 
	//Param @array data of user
	function create_task($data)
	{
		if ($this->db->insert('user_task', $data)) {
			return $this->db->insert_id();
		}
	}

	//get the tasks of user
	//Param @user_id
	function get_tasks($id)
	{
		$data = $this->db->select('*')
					->from('user_task')
					->where('user_id', $id)
					->order_by('task_date', 'desc')
					->get()->result();
		return $data;
	}

	function create_user_profile($data)
	{

		if ($this->db->insert($this->profile_table_name, $data)) {
			return 1; 
		}else{
			return 0;
		}		
	}


	function list_users(){
		$data = $this->db->select('*')
					->from('users as u')
					->join('user_profiles as up', 'u.id = up.user_id')
					->get()->result();

		return $data;
	}

	function show_user($id){
		$data = $this->db->select('*')
					->from('users as u')
					->join('user_profiles as up', 'u.id = up.user_id', 'LEFT')
					->join('user_salary as us', 'u.id = us.user_id', 'LEFT')
					->where('u.id', $id)
					->get()->row();

		return $data;
	}

	//get the total working hours of employee 
	function get_employee_working_hours(){
		$roles = array(2,3);
		$data = $this->db->select('up.user_id, up.f_name, up.l_name, up.post, up.mobile, SUM(t.end - t.start) AS diff, us.salary as per_hour')
						->from('user_task as t')
						->join('user_profiles as up', 't.user_id = up.user_id')
						->join('users as u', 'up.user_id = u.id')
						->join('user_salary as us', 'us.user_id = u.id', 'LEFT')
						->where('t.status', 0)
						//->where_in('u.role', $roles)
						->group_by('t.user_id')
						->get()->result();
		return $data;
	}

	function get_employee_working_hours_detail($user_id){
		$data = $this->db->select('t.*, (t.end - t.start) AS diff')
						->from('user_task as t')
						->where('t.status', 0)
						->where('t.user_id', $user_id)
						->get()->result();
		return $data;
	}

	function get_paid_employee_working_hours(){
		$data = $this->db->select('up.user_id, up.f_name, up.l_name, up.post, up.mobile, SUM(t.end - t.start) AS diff, us.salary as per_hour')
						->from('user_task as t')
						->join('user_profiles as up', 't.user_id = up.user_id')
						->join('users as u', 'up.user_id = u.id')
						->join('user_salary as us', 'us.user_id = u.id', 'LEFT')
						->where('t.status', 1)
						//->where('u.role', 3)
						->group_by('t.user_id')
						->get()->result();
		return $data;
	}

	function get_employee_unpaid_detail($user_id){
		$data = $this->db->select('up.user_id, SUM(t.end - t.start)/10000 AS diff, us.salary as per_hour')
						->from('user_task as t')
						->join('user_profiles as up', 't.user_id = up.user_id')
						->join('users as u', 'up.user_id = u.id')
						->join('user_salary as us', 'us.user_id = u.id', 'LEFT')
						->where('t.status', 0)
						->where('t.user_id', $user_id)
						->get()->row();
		return $data;
	}

	function get_employee_total_paid($user_id){
		$data = $this->db->select('SUM(us.amount) AS total')
						->from('paid_salary as us')
						->where('us.user_id', $user_id)
						->get()->row();
		return $data;
	}

	function get_employee_total_unpaid($user_id){
		$data = $this->db->select('SUM(us.salary * (ut.end - ut.start)/10000) as total, us.salary as salary, SUM(ut.end - ut.start)/10000 as total_hours')
						->from('user_task as ut')
						->join('user_salary as us', 'ut.user_id = us.user_id', 'LEFT')
						->where('ut.user_id', $user_id)
						->where('ut.status', 0)
						->get()->row();
		// echo json_encode($data);
		// die();
		return $data;
	}

	function get_employee_paid($data){
		if ($this->db->insert('paid_salary', $data)) {
			return $this->db->insert_id();
		}
	}

	function update_task_status($user_id){
		if($this->db->where('user_id', $user_id)->update('user_task', array('status' => '1'))){
			echo mysql_error();
			return 1;
		}else{
			return 0;
		}
	}

	function get_user_history($user_id){
		// echo $user_id;
		$data = $this->db->select('ps.*, us.salary as per_hour')
						->from('paid_salary as ps')
						->join('user_profiles as up', 'ps.user_id = up.user_id', 'LEFT')
						->join('user_salary as us', 'up.user_id = us.user_id', 'LEFT')
						->where('ps.user_id', $user_id)
						->get()->result();
		return $data;
	}

	function get_user_unpaid_history($user_id){
		// echo $user_id;
		$data = $this->db->select('ut.*, us.salary as per_hour, SUM(ut.end - ut.start)/10000 as total_hours, us.salary as salary,')
						->from('user_task as ut')
						->join('user_profiles as up', 'ut.user_id = up.user_id', 'LEFT')
						->join('user_salary as us', 'up.user_id = us.user_id', 'LEFT')
						->where('ut.user_id', $user_id)
						->where('ut.status', 0)
						->get()->result();
		// echo json_encode($data);
		// die();
		return $data;
	}

	function update_pro_pic($data)
	{
		$this->db->where('user_id', $data['user_id']);
		$this->db->update('user_profiles' , $data);
	}

}

/* End of file users.php */
/* Location: ./application/models/emp/emp_model.php */