<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tentang_Kami extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('model_tentang_kami');
        $this->load->model('model_pesan');
        $this->load->model('model_dokumen');
	}

	public function index(){
        if($this->session->userdata('username_staff') != "" && $this->session->userdata('password_staff') != ""){  
            redirect(site_url());
        }
        else{
            $this->load->view('user/view_tentang_kami');	
        }
	}
}