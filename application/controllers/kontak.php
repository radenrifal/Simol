<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kontak extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('model_kontak');
        $this->load->model('model_pesan');
        $this->load->model('model_dokumen');
	}

	public function index(){
		$this->load->view('view_kontak');
	}
    
    public function feedback(){
        $nama       = $this->input->post('nama');
        $comment    = $this->input->post('comment');
        
        date_default_timezone_set("Asia/Jakarta");
        $data       = array('nama'          => $nama,
                            'comment'       => $comment,
                            'waktu'         => date('Y-m-d H:i:s'));
                            
        $this->model_kontak->feedback($data);
        $data["status"] = "save_success";
	    redirect("/kontak", $data);
    }
}
