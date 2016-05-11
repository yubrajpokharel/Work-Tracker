<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Admin_model extends CI_Model
{
	private $table_name			= 'users';			// user accounts
	private $profile_table_name	= 'user_profiles';	// user profiles
	private $salary_table_name	= 'user_salary';	// user salary

	function __construct()
	{
		parent::__construct();

		$ci =& get_instance();
		$this->table_name			= $ci->config->item('db_table_prefix', 'tank_auth').$this->table_name;
		$this->profile_table_name	= $ci->config->item('db_table_prefix', 'tank_auth').$this->profile_table_name;
	}

	function create_user($data)
	{

		if ($this->db->insert($this->table_name, $data)) {
			return $this->db->insert_id();
		}
			
	}

	function create_user_profile($data)
	{
		if ($this->db->insert($this->profile_table_name, $data)) {
			return 1; 
		}else{
			return 0;
		}		
	}

	function create_user_salary($data)
	{
		if ($this->db->insert($this->salary_table_name, $data)) {
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
		$data = $this->db->select('u.*, u.id as uid, up.*, us.salary')
					->from('users as u')
					->join('user_profiles as up', 'u.id = up.user_id', 'LEFT')
					->join('user_salary as us', 'u.id = us.user_id', 'LEFT')
					->where('u.id', $id)
					->get()->row();
		return $data;
	}

	function update_user($data, $id){
		//echo $id;
		$this->db->where('id', $id);
		$this->db->update('users', $data);
		echo mysql_error();

	}

	function update_user_profile($data, $id){
		//echo $id;
		
		$this->db->where('user_id', $id);
		$this->db->update('user_profiles', $data);
		echo mysql_error();
		

	}

	function update_user_salary($data, $id){
		//echo $id;
		$this->db->where('user_id', $id);
		$this->db->update('user_salary', $data);
		echo mysql_error();
	}
	

	function delete_user($user_id){
		$this->db->where('id', $user_id);
		$this->db->update('users', array(
			'banned'		=> 1,
			'ban_reason'	=> "Deleted By the Admin.",
		));
	}

}

/* End of file users.php */
/* Location: ./application/models/auth/users.php */