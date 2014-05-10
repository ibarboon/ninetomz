<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct() {
		parent::__construct();

		$models = array('contents_model','options_model','photos_model');
		foreach($models as $model):
			$this->load->model($model);
		endforeach;
	}

	public function index() {
		$header_params['current_page'] = ($this->uri->segment(1))? $this->uri->segment(1): 'home';
		$header_params['html_meta_list'] = $this->options_model->select_option_by_type('html_meta');
		$header_params['carousel_intro_list'] = $this->photos_model->get_carousel_intro();

		$body_params['carousel_intro_list'] = $header_params['carousel_intro_list'];
		$body_params['carousel_content_list'] = $this->photos_model->get_carousel_content();
		$body_params['contact_list'] = $this->options_model->select_option_by_type('contact');
		$body_params['contents'] = $this->contents_model->get_content('home');
		
		$this->load->view('header', $header_params);
		$this->load->view('home_view', $body_params);
		$this->load->view('footer');
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */