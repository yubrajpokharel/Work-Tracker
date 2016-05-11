<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		Yubraj Pokharel
 * @copyright	Copyright (c) 2015, Daanfe, Inc.
 * @link		http://daanfe.com/library/codeigniter/ip
 * @since		Version 1.0
 * @filesource
 */

	function get_IP()
	{
		$IPaddress  =   $_SERVER['REMOTE_ADDR'];
		return $IPaddress;
	}

	function url_get_contents ($Url) {
	    if (!function_exists('curl_init')){ 
	        die('CURL is not installed!');
	    }
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $Url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    $output = curl_exec($ch);
	    curl_close($ch);
	    return $output;
	}


	function ip_details() 
	    {
	    	$IPaddress = get_IP();
	        $json       = url_get_contents("http://ipinfo.io/{$IPaddress}");
	        $details    = json_decode($json);
	        return $details;
	    }


	function insert_ip_details(){

		$ci=& get_instance();
        $ci->load->database(); 

		$ip_details = ip_details();
		$time = date('h:i:s');
		$date = date('Y-m-d');
		$pc_name = gethostname();
		$page = $_SERVER['REQUEST_URI'];

		$checker = check_ip($ip_details->ip, $date);
		if($checker == TRUE)
		{
			$sql = "insert into 
        			ip_track(ip, country, city, location, org, page, pc_name, visit_time, date) 
        			values('$ip_details->ip', '$ip_details->country', '$ip_details->city', '$ip_details->loc', '$ip_details->org', '$page', '$pc_name', '$time', '$date')"; 
        	$query = $ci->db->query($sql);    	
		}

		$sql2 = "insert into 
        			page_track(page, time, date) 
        			values('$page', '$time', '$date')"; 
        	$query = $ci->db->query($sql2);
	}

	function check_ip($ip, $date)
	{
		$ci=& get_instance();
    	$ci->load->database(); 

		$check_sql = "Select * from ip_track where ip = '$ip' AND date = '$date'";
		$check = $ci->db->query($check_sql);
		$row = $check->result();

		if(empty($row)) 
			return TRUE;
		else 
			return FALSE;

	}

/* End of file ip_helper.php */
/* Location: ./system/helpers/ip_helper.php */