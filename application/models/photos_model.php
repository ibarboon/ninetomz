<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Photos_Model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function get_carousel_intro() {
		$sql = "select photo_name, photo_description from wc_photos where album_id = '1';";
		$query = $this->db->query($sql);
		$result_array = $query->result_array();
		return $result_array;
	}

	public function get_carousel_content() {
		$sql = "select photo_name, photo_description from wc_photos where album_id = '2';";
		$query = $this->db->query($sql);
		$result_array = $query->result_array();
		return $result_array;
	}

	public function get_photo_list($args) {
		if($args) {
			$sql = "select photo_name, photo_description from wc_photos where album_id = ? order by created_at limit 0, 6;";
			$query = $this->db->query($sql, $args);
			$result_array = $query->result_array();
			return $result_array;
		}
	}

}

/* End of file photos_model.php */
/* Location: ./application/models/photos_model.php */