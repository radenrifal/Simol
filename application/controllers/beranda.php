<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beranda extends CI_Controller {

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
       $this->load->model('model_admin_pengguna');
	}
    
	public function index(){
        $this->load->view('user/view_beranda');	
	}
    
    public function beranda_coba(){
	   $this->load->view('view_beranda_baru');	# redirect(site_url());
	}
    
    public function cek_data_nip(){
        $username           = $this->input->post('username');
        $password           = $this->input->post('password');
        //$status_pengguna    = 'staff';
        
        $query = $this->model_beranda->login($username, $password);
        
        if($query->num_rows()){
            $row = $query->row();
            $this->session->set_userdata('nip_staff', $row->nip);
            $this->session->set_userdata('username_staff', $row->username);
            $this->session->set_userdata('nama_staff', $row->nama);
            $this->session->set_userdata('id_datadiri', $row->id_datadiri);
            $this->session->set_userdata('password_staff', $row->password);
            redirect(site_url());
             
        }
        else{
            $this->session->sess_destroy();
            $data["status"] = "error";
			$this->load->view("user/view_beranda", $data);
        }
            
    }
    
    
    public function logout_staff(){
		$this->session->sess_destroy();
		redirect(site_url());
	}
}
