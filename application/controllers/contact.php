<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$models = array('options_model');
		foreach($models as $model):
			$this->load->model($model);
		endforeach;
	}

	public function index() {
		$header_params['current_page'] = ($this->uri->segment(1))? $this->uri->segment(1): 'home';
		$header_params['html_meta_list'] = $this->options_model->select_option_by_type('html_meta');
		$body_params['contact_list'] = $this->options_model->select_option_by_type('contact');
		$this->load->view('header', $header_params);
		$this->load->view('contact_view', $body_params);
		$this->load->view('footer');
	}

	public function submit(){
		if($this->uri->segment(3) AND $this->uri->segment(3) == true){
			$sql = "select replace(option_value,'|',',') as option_value from wc_options where option_name = 'Mail-us';";
			$query = $this->db->query($sql);
			$result_set = $query->row_array();
			$mail_to = $result_set['option_value'];
			$msg = '<b>NAME: </b>'.$this->input->post('input-name').'<br/>';
			$msg .= '<b>EMAIL: </b>'.$this->input->post('input-email').'<br/>';
			$msg .= '<b>PHONE: </b>'.$this->input->post('input-phone').'<br/>';
			$msg .= '<b>SERVICE: </b>'.$this->input->post('input-service').'<br/>';
			$msg .= '<b>MESSAGE: </b>'.$this->input->post('input-message').'<br/>';
			$config['mailtype'] = 'html';
			$this->load->library('email', $config);
			$this->email->from('contact@ninetomstudio.com');
			$this->email->to($mail_to);
			$this->email->subject('ninetomstudio - contact us');
			$this->email->message($msg);
			if($this->email->send()) {
				$header_params['current_page'] = ($this->uri->segment(1))? $this->uri->segment(1): 'home';
				$header_params['html_meta_list'] = $this->options_model->select_option_by_type('html_meta');
				$body_params['contact_list'] = $this->options_model->select_option_by_type('contact');
				$body_params['alert_message'] = 'Your message has been successfully sent';
				$this->load->view('header', $header_params);
				$this->load->view('contact_view',$body_params);
				$this->load->view('footer');
			}
		}
	}

}
/* End of file contact.php */
/* Location: ./application/controllers/contact.php */