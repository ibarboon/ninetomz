<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Albums_Model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function get_album($args) {
		$sql = "select a.row_id as album_id, lower(a.album_type) as album_type, a.album_name, a.album_description from wc_albums a where a.row_id = ?";
		$query = $this->db->query($sql,$args);
		$result_set = $query->row_array();
		return $result_set;
	}

	public function get_album_list() {
		$sql = "select a.row_id as album_id, lower(a.album_type) as album_type, a.album_name, a.album_description, p.photo_name from wc_albums a, wc_photos p where a.row_id = p.album_id and p.album_cover_flag = 'Y' order by a.created_at desc limit 0, 6";
		$query = $this->db->query($sql);
		$result_array = $query->result_array();
		return $result_array;
	}

}

/* End of file albums_model.php */
/* Location: ./application/models/albums_model.php */