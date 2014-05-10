<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Options_Model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function create_row($args) {
		$sql = 'insert into sport_user (row_id, created_at, created_by, updated_at, updated_by, usr_login, pwd_login, user_type, user_name, user_email, user_telephone, user_address, user_discount, user_status) values (null, now(), 1, now(), 1, \''.$args['usr_login'].'\', md5(md5(\''.$args['pwd_login'].'\')), \'M\', \''.$args['user_name'].'\', \''.$args['user_email'].'\', \''.$args['user_telephone'].'\', \''.$args['user_address'].'\', 10, \'A\');';
		$query = $this->db->query($sql);
		return $query;
	}

	public function select_option_by_type($args) {
		$sql = 'select option_name, option_value from wc_options where lower(option_type) = ?;';
		$query = $this->db->query($sql,$args);
		$result_array = $query->result_array();
		return $result_array;
	}

	public function update_row($args) {
		$sql = 'update sport_user set updated_at = now(), updated_by = \''.$args['updated_by'].'\', user_name = \''.$args['user_name'].'\', user_email = \''.$args['user_email'].'\', user_telephone = \''.$args['user_telephone'].'\', user_address = \''.$args['user_address'].'\' where usr_login = \''.$args['usr_login'].'\';';
		$query = $this->db->query($sql);
		return $query;
	}

	public function delete_row($args) {
		$sql = 'update sport_user set user_status = \'U\' where usr_login = \''.$args.'\';';
		$query = $this->db->query($sql);
		return $query;
	}

}

/* End of file options_model.php */
/* Location: ./application/models/options_model.php */