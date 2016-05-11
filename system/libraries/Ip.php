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
/**
 * Validate email address
 *
 * @access	public
 * @return	bool
 */
if ( ! function_exists('get_IP'))
{
	function get_IP()
	{
		$IPaddress  =   $_SERVER['REMOTE_ADDR'];
		return $IPaddress;
	}
}


if ( ! function_exists('ip_details'))
{
	function ip_details($IPaddress) 
	    {
	        $json       = file_get_contents("http://ipinfo.io/{$IPaddress}");
	        $details    = json_decode($json);
	        return $details;
	    }
}

function testdaanfe(){
	$this->CI =& get_instance();
	echo $this->db->count_all('about_us');
}

}

/* End of file ip_helper.php */
/* Location: ./system/helpers/email_helper.php */