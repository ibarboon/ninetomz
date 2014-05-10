<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Portfolio extends CI_Controller {
	
	public function __construct() {
		parent::__construct();

		$models = array('albums_model','contents_model','options_model','photos_model');
		foreach($models as $model):
			$this->load->model($model);
		endforeach;
	}

	public function index() {
		$header_params['current_page'] = ($this->uri->segment(1))? $this->uri->segment(1): 'home';
		$header_params['html_meta_list'] = $this->options_model->select_option_by_type('html_meta');
		$this->load->view('header',$header_params);
		if($this->uri->segment(2)) {
			$body_params['album_id'] = $this->uri->segment(2);
			$body_params['album'] = $this->albums_model->get_album($body_params['album_id']);
			$body_params['photo_list'] = $this->photos_model->get_photo_list($body_params['album_id']);
			$this->load->view('portfolio_detail_view',$body_params);
		} else {
			$body_params['album_list'] = $this->albums_model->get_album_list();
			$this->load->view('portfolio_view', $body_params);
		}
		$this->load->view('footer');
	}

	public function get_portfolio_list() {
		$in_offset = ($this->input->post('inOffset'))? $this->input->post('inOffset'): 0;
		$sql = "select a.row_id as album_id, lower(a.album_type) as album_type, a.album_name, a.album_description, p.photo_name ";
		$sql .= "from wc_albums a, wc_photos p ";
		$sql .= "where a.row_id = p.album_id and p.album_cover_flag = 'Y' order by a.created_at desc limit ?, 6;";
		$query = $this->db->query($sql, (int)$in_offset);
		$result_array = $query->result_array();
		echo json_encode($result_array);
	}

	public function get_photo_list() {
		$in_album_id = ($this->input->post('inAlbumId'))? $this->input->post('inAlbumId'): 0;
		$in_offset = ($this->input->post('inOffset'))? $this->input->post('inOffset'): 0;
		$sql = "select photo_name, photo_description from wc_photos where album_id = ? order by created_at limit ?, 6";
		$query = $this->db->query($sql, array((int)$in_album_id, (int)$in_offset));
		$result_array = $query->result_array();
		echo json_encode($result_array);
	}
}

/* End of file portfolio.php */
/* Location: ./application/controllers/portfolio.php */