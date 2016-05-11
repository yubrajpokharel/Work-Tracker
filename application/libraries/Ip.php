<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		Daanfe Inc Dev Team
 * @copyright	Copyright (c) 20015, Daanfe, Inc.
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------
class Ip {

	function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->library('session');
		$this->ci->load->database();
	}

	function get_IP()
	{
		$IPaddress  =   $_SERVER['REMOTE_ADDR'];
		return $IPaddress;
	}


	function ip_details() 
	    {
	    	$IPaddress = $this->get_IP();
	        $json       = file_get_contents("http://ipinfo.io/{$IPaddress}");
	        $details    = json_decode($json);
	        return $details;
	    }


	function insert_ip_details(){

		$ip_details = $this->ip_details();
		$data = array(
			'ip' => $ip_details->ip,
			'country' => $ip_details->country,
			'city' => $ip_details->city,
			'location' => $ip_details->loc,
			'org' => $ip_details->org,
			'time' => date('h:i:s'),
			'date' => date('Y-m-d')
			);
		echo json_encode($data);
		$this->ci->db->insert('ip_track', $data);		
	}

}

/* End of file ip_helper.php */
/* Location: ./system/helpers/email_helper.php */