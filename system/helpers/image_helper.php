<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		Yubraj Pokharel
 * @copyright	Copyright (c) 2015, Daanfe, Inc.
 * @link		http://daanfe.com/library/codeigniter/image
 * @since		Version 1.0
 * @filesource
 */

 function make_thumb($filename, $folder){
		
		$ci=& get_instance();
		$ci->load->library('image_lib');

		$source_path = './uploads/'.$folder.'/'.$filename;
		$target_path = './uploads/'.$folder.'/thumb/'.$filename;

		$config_manip = array(
			'image_library' => 'gd2',
			'source_image' => $source_path,
			'new_image' => $target_path,
			'maintain_ratio' => true,
			'create_thumb' => TRUE,
			'thumb_marker' => '',
			'width' => 300,
			'height' => 200
		);

		$ci->image_lib->initialize($config_manip);

		if (!$ci->image_lib->resize()) {
			echo $ci->image_lib->display_errors();
		}
		// clear the temp memory //
		$ci->image_lib->clear();
	}

function make_thumb_custom($filename, $folder, $height, $width){
		
		$ci=& get_instance();
		$ci->load->library('image_lib');

		$source_path = './uploads/'.$folder.'/'.$filename;
		$target_path = './uploads/'.$folder.'/thumb/'.$filename;

		$config_manip = array(
			'image_library' => 'gd2',
			'source_image' => $source_path,
			'new_image' => $target_path,
			'maintain_ratio' => FALSE,
			'create_thumb' => TRUE,
			'thumb_marker' => '',
			'width' => $height,
			'height' => $width
		);

		$ci->image_lib->initialize($config_manip);

		if (!$ci->image_lib->resize()) {
			echo $ci->image_lib->display_errors();
		}
		// clear the temp memory //
		$ci->image_lib->clear();
	}
	




/* End of file image_helper.php */
/* Location: ./system/helpers/image_helper.php */