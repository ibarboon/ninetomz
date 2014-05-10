<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends CI_Controller {
	
	public function __construct() {
		parent::__construct();

		$models = array('contents_model','options_model','photos_model');
		foreach($models as $model):
			$this->load->model($model);
		endforeach;
	}

	public function index(){
		if((int)$this->session->userdata('user_data') === 0){
			redirect('/backend/signin/', 'refresh');
		}else{
			redirect('/backend/content/', 'refresh');
		}
	}

	public function content() {
		$header_params['current_page'] = ($this->uri->segment(2))? $this->uri->segment(2): 'content';
		$header_params['user'] = $this->session->userdata('user_data');
		if($this->input->post('input-save-changes')) {
			$content_body = $this->input->post('input-content-body-0').'|'.$this->input->post('input-content-body-1').'|'.$this->input->post('input-content-body-2');
			$sql = 'update wc_contents set content_head = ?, content_body = ?, last_updated_at = now(), last_updated_by = upper(?) where content_page = ?';
			$query = $this->db->query($sql,
				array($this->input->post('input-content-header'),
				$content_body,
				$header_params['user']['user_login'],
				'home')
			);
			$body_params['update_result'] = $query;
		}
		$sql = 'select content_head, content_body from wc_contents where content_page = ? ;';
		$query = $this->db->query($sql,'home');
		$body_params['contents'] = $query->row_array();
		$body_params['contents']['content_body'] = explode('|',$body_params['contents']['content_body']);
		$this->load->view('backend/header_view', $header_params);
		$this->load->view('backend/content_view',$body_params);
		$this->load->view('backend/footer_view');
	}

	public function portfolio() {
		$header_params['current_page'] = ($this->uri->segment(2))? $this->uri->segment(2): 'content';
		$header_params['user'] = $this->session->userdata('user_data');

		//CREATE ALBUM
		if($this->input->post('input-create-album')){
			$album_id = 0;
			$success_files = 0;
			$error_files = 0;

			$sql = 'insert into wc_albums values (null, now(), upper(?), now(), upper(?), ?, ?, ?);';
			$input_array = array(
				$header_params['user']['user_login'],
				$header_params['user']['user_login'],
				$this->input->post('input-album-type'),
				$this->input->post('input-album-name'),
				$this->input->post('input-album-description')
			);
			if($this->db->query($sql, $input_array)){
				//GET ALBUM_ID
				$sql = 'select max(row_id) as row_id from wc_albums;';
				$query = $this->db->query($sql);
				$result_set = $query->row_array();
				$album_id = $result_set['row_id'];
				
				$config['upload_path'] = './assets/img/portfolio/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '1024';
				$config['overwrite'] = false;
				$config['encrypt_name'] = true;

				$this->load->library('upload', $config);
				//SORTING ARRAY
				foreach($_FILES['userfile'] as $o_k => $o_v):
					foreach($o_v as $i_k => $i_v):
						$_FILES['userfile'.$i_k][$o_k] = $i_v;
					endforeach;
				endforeach;

				unset($_FILES['userfile']);
				//UPLOAD FILES

				foreach($_FILES as $key => $value):
					if($this->upload->do_upload($key)){
						$photo = $this->upload->data();
						$cover_flag = ($key == 'userfile0')? 'Y': 'N';
						$sql = 'insert into wc_photos values (null, now(), upper(?), now(), upper(?), ?, ?, ?, ?, ?, ?);';
						$in_array = array(
							$header_params['user']['user_login'],
							$header_params['user']['user_login'],
							$photo['file_name'],
							'Photo Description',
							$album_id,
							$cover_flag,
							'N',
							'N'
						);
						$query = $this->db->query($sql, $in_array);
						$success_files += 1;
					} else {
						$error_files += 1;
						$error_array = array('error' => $this->upload->display_errors());
					}
				endforeach;
			}

			if((int)$error_files == 0){
				$body_params['alert_type'] = 'alert-success';
				$body_params['alert_message'] = 'Create Album was successful.';
			}else{
				$sql = "delete from wc_albums where row_id = ?";
				$query = $this->db->query($sql, $album_id);
				$body_params['alert_type'] = 'alert-danger';
				$body_params['alert_message'] = 'Error';
			}
			$body_params['update_result'] = true;
		}

		//UPDATE ALBUM
		if($this->input->post('input-edit-album')) {
			$sql = 'update wc_albums set last_updated_at = now(), last_updated_by = upper(?), album_type = ?, album_name = ?, album_description = ? where row_id = ?';
			$data = array(
				$header_params['user']['user_login'],
				$this->input->post('input-album-type'),
				$this->input->post('input-album-name'),
				$this->input->post('input-album-description'),
				$this->uri->segment(3)
			);
			$query = $this->db->query($sql,$data);
			$body_params['update_result'] = $query;
		}
		//Add Photos
		if($this->input->post('input-add-photos')) {
			$album_id = $this->uri->segment(3);
			
			$config['upload_path'] = './assets/img/portfolio/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '1024';
			$config['overwrite'] = false;
			$config['encrypt_name'] = true;
			//$config['max_width']  = '1024';
			//$config['max_height']  = '768';
			$this->load->library('upload', $config);
			foreach($_FILES['userfile'] as $o_k => $o_v):
				foreach($o_v as $i_k => $i_v):
					$_FILES['userfile'.$i_k][$o_k] = $i_v;
				endforeach;
			endforeach;
			unset($_FILES['userfile']);
			foreach($_FILES as $key => $value){
				if ($this->upload->do_upload($key)) {
					$photo = $this->upload->data();
					$sql = 'insert into wc_photos values (null, now(), upper(?), now(), upper(?), ?, ?, ?, ?, ?, ?);';
					$data = array(
						$header_params['user']['user_login'],
						$header_params['user']['user_login'],
						$photo['file_name'],
						'Photo Description',
						$album_id,
						'N',
						'N',
						'N'
					);
					$query = $this->db->query($sql,$data);
					$body_params['update_result'] = $query;
				} else {
					$body_params['update_result'] = array('error' => $this->upload->display_errors());
				}
			}
		}
		if($this->input->post('input-edit-photo')) {
			$sql = 'update wc_photos set last_updated_at = now(), last_updated_by = upper(?), photo_description = ? where row_id = ?';
			$data = array(
				$header_params['user']['user_login'],
				$this->input->post('input-photo-description'),
				$this->uri->segment(4)
			);
			$query = $this->db->query($sql,$data);
			$body_params['update_result'] = $query;
		}
		//default
		if($this->uri->segment(3)) {
			$sql = 'select row_id, album_name, album_description, album_type from wc_albums where row_id = ?;';
			$query = $this->db->query($sql,$this->uri->segment(3));
			$body_params['album'] = $query->row_array();
			$sql = 'select row_id, photo_name, photo_description, album_cover_flag, carousel_content_flag, carousel_intro_flag from wc_photos where album_id = ?;';
			$query = $this->db->query($sql,$this->uri->segment(3));
			$body_params['photos'] = $query->result_array();
			$this->load->view('backend/header_view', $header_params);
			$this->load->view('backend/portfolio_detail_view',$body_params);
			$this->load->view('backend/footer_view');
		} else {
			$sql = 'select a.row_id, p.photo_name, a.album_name, a.album_description, a.album_type from wc_albums a, wc_photos p where a.row_id = p.album_id and p.album_cover_flag = ?;';
			$query = $this->db->query($sql,'Y');
			$body_params['albums'] = $query->result_array();
			$this->load->view('backend/header_view', $header_params);
			$this->load->view('backend/portfolio_view',$body_params);
			$this->load->view('backend/footer_view');
		}
	}
	public function do_delete(){
		if($this->uri->segment(3) && $this->uri->segment(4)){
			if($this->uri->segment(3) == 'album'){
				$sql = 'delete from wc_albums where row_id = ?';
				$query[0] = $this->db->query($sql,$this->uri->segment(4));
				$sql = 'delete from wc_photos where album_id = ?';
				$query[1] = $this->db->query($sql,$this->uri->segment(4));
				if($query[0] && $query[1]){
					redirect('/backend/portfolio/', 'refresh');
				}
			}

			if($this->uri->segment(3) == 'photo'){
				$sql = 'delete from wc_photos where row_id = ?';
				$query = $this->db->query($sql,$this->uri->segment(5));
				if($query){
					redirect('/backend/portfolio/'.$this->uri->segment(4), 'refresh');
				}
			}
		}
	}

	public function do_carousel(){
		if($this->uri->segment(3) && $this->uri->segment(4)){
			$album_id = ($this->uri->segment(3) === 'intro')? 1: 2;
			$sql = "insert into wc_photos (row_id, created_at, created_by, last_updated_at, last_updated_by, photo_name, photo_description, album_id, album_cover_flag, carousel_intro_flag, carousel_content_flag) select null, now(), 'WEBADM', now(), 'WEBADM', photo_name, photo_description, ?, 'N', 'N', 'N' from wc_photos where row_id = ?;";
			$query = $this->db->query($sql,array($album_id, $this->uri->segment(5)));
			if($query){
				redirect('/backend/portfolio/'.$this->uri->segment(4), 'refresh');
			}
		}
	}

	public function do_album_cover(){
		if($this->uri->segment(3) && $this->uri->segment(4)){
			$sql = "update wc_photos set album_cover_flag = 'N' where album_id = ?;";
			$query = $this->db->query($sql, $this->uri->segment(4));
			$sql = "update wc_photos set album_cover_flag = 'Y' where row_id = ?;";
			$query = $this->db->query($sql, $this->uri->segment(5));
			if($query){
				redirect('/backend/portfolio/'.$this->uri->segment(4), 'refresh');
			}
		}
	}

	public function contact() {
		$header_params['current_page'] = ($this->uri->segment(2))? $this->uri->segment(2): 'content';
		$header_params['user'] = $this->session->userdata('user_data');
		if($this->input->post('input-save-changes')) {
			$contact_list = array('Welcome','Visit-us','Mail-us','Call-us');
			foreach($contact_list as $contact):
				$sql = 'update wc_options set option_value = ?, last_updated_at = now(), last_updated_by = upper(?) where option_name = ?';
				$query = $this->db->query($sql,
					array(str_replace("\n","<br />",$this->input->post('input-'.strtolower($contact))),
					$header_params['user']['user_login'],
					$contact)
				);
			endforeach;
			$body_params['update_result'] = $query;
		}
		$sql = 'select lower(option_name) as option_name, option_value from wc_options where option_type = ?;';
		$query = $this->db->query($sql,'contact');
		$body_params['option_list'] = $query->result_array();
		$this->load->view('backend/header_view', $header_params);
		$this->load->view('backend/contact_view', $body_params);
		$this->load->view('backend/footer_view');
	}

	public function other() {
		$header_params['current_page'] = ($this->uri->segment(2))? $this->uri->segment(2): 'content';
		$header_params['user'] = $this->session->userdata('user_data');
		if($this->input->post('input-save-changes')) {
			$sql = 'update wc_options set option_value = ?, last_updated_at = now(), last_updated_by = upper(?) where option_name = ?';
			$query = $this->db->query($sql,
				array($this->input->post('input-description'),
				$header_params['user']['user_login'],
				'description')
			);
			$sql = 'update wc_options set option_value = ?, last_updated_at = now(), last_updated_by = upper(?) where option_name = ?';
			$query = $this->db->query($sql,
				array($this->input->post('input-keywords'),
				$header_params['user']['user_login'],
				'keywords')
			);
			$sql = 'update wc_options set option_value = ?, last_updated_at = now(), last_updated_by = upper(?) where option_name = ?';
			$query = $this->db->query($sql,
				array($this->input->post('input-author'),
				$header_params['user']['user_login'],
				'author')
			);
			$body_params['update_result'] = $query;
		}
		$sql = 'select option_name, option_value from wc_options where option_type = ?;';
		$query = $this->db->query($sql,'html_meta');
		$body_params['option_list'] = $query->result_array();
		$this->load->view('backend/header_view', $header_params);
		$this->load->view('backend/other_view',$body_params);
		$this->load->view('backend/footer_view');
	}

	public function user() {
		if($this->input->post('input-save-changes')) {
			$sql = 'update wc_users set user_login = upper(?), user_password = md5(?), last_updated_at = now(), last_updated_by = upper(?) where user_login = ?';
			$query = $this->db->query($sql,array($this->input->post('user-login'),$this->input->post('new-password'),$this->uri->segment(3),$this->uri->segment(3)));
			$body_params['update_result'] = $query;
			$this->session->set_userdata('user_data', array('user_login' => strtoupper($this->input->post('user-login'))));
		}
		$header_params['current_page'] = ($this->uri->segment(2))? $this->uri->segment(2): 'home';
		$header_params['user'] = $this->session->userdata('user_data');
		$sql = 'select user_login from wc_users where lower(user_login) = ?';
		$query = $this->db->query($sql,$this->uri->segment(3));
		$body_params['user'] = $query->row_array();
		$this->load->view('backend/header_view', $header_params);
		$this->load->view('backend/user_view',$body_params);
		$this->load->view('backend/footer_view');
	}

	public function signin(){
		$params = array();
		if($this->input->post('in-submit')){
			$sql = 'select user_login from wc_users where lower(user_login) = ? and user_password = md5(?);';
			$query = $this->db->query($sql, array($this->input->post('in-user-login'), $this->input->post('in-user-password')));
			if($query->num_rows() > 0){
				$result_set = $query->row_array();
				$this->session->set_userdata('user_data', $result_set);
				redirect('/backend/content/', 'refresh');
			}else{
				$params['alert_type'] = 'alert-danger';
				$params['alert_message'] = 'The username or password you entered is incorrect.';
			}
		}
		$this->load->view('signin_view', $params);
	}

	public function signout() {
		$this->session->sess_destroy();
		redirect('/backend/signin/', 'refresh');
	}
}

/* End of file backend.php */
/* Location: ./application/controllers/backend.php */