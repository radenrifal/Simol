<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('model_dokumen');
        $this->load->model('model_beranda');
        $this->load->model('model_pesan');
        $this->load->model('model_admin');
        $this->load->model('model_admin_notulensi_rapat');
        $this->load->model('model_profil');
        $this->load->model('model_diagram');
	}

	public function index(){
        $this->load->view('view_admin_kegiatan');	
	}
    
    public function diagram_kegiatan(){
        $this->load->view('user/view_diagram');	
	}
    
    public function diagram_kategori(){
        $this->load->view('user/view_diagram_kategori');	
	}
    
    public function diagram_notulensi_rapat(){
        $this->load->view('user/view_diagram_notulensi_rapat');	
	}
}
