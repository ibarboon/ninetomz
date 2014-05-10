<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contents_Model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function get_content($args) {
		if($args) {
			$sql = "select content_head, content_body from wc_contents where content_page = ?;";
			$query = $this->db->query($sql, $args);
			$result_set = $query->row_array();
			if(strpos($result_set['content_body'],'|') !== false) {
				$result_set['content_body'] = explode('|',$result_set['content_body']);
			}
			return $result_set;
		}
	}

}

/* End of file contents_model.php */
/* Location: ./application/models/contents_model.php */