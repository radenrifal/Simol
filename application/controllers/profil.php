<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profil extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('model_dokumen');
        $this->load->model('model_pesan');
		$this->load->model('model_admin_notulensi_rapat');
		$this->load->model('model_profil');
		$this->load->model('model_admin_pengguna');
	}

	public function index(){
        if($this->session->userdata('username_staff') == "" && $this->session->userdata('password_staff') == ""){  
            redirect(site_url());
        }
        else{
            $this->load->view('user/view_profil');	
        }
	}
    
    public function detail_profil(){
		$data['profil'] = $this->uri->segment(2);
		$this->load->view('view_profil',$data);
	}
    
    public function update_username_password(){
        $nip            = $this->input->post('nip_tmp');
        $username       = $this->input->post('username');
        $password       = $this->input->post('password');
        $password_baru  = $this->input->post('password_baru');
        $ulangi         = $this->input->post('ulangi');
        
		if($password_baru == $ulangi){
			$this->model_admin_pengguna->update_username_password(md5($password_baru), $username, $nip);
			$this->session->sess_destroy();
            $data["status"]     = "success";
            $this->load->view('user/view_beranda', $data);
		}else{
            $data["status"]     = "error";
            $this->load->view('user/view_profil', $data);
		}
			
	}
    
    public function update_datadiri(){
        $id_datadiri        = $this->input->post('id_datadiri_tmp');
        $nip                = $this->input->post('nip');
        $nama               = $this->input->post('nama');
        $jenis_kelamin      = $this->input->post('jenis_kelamin');
        $jabatan            = $this->input->post('jabatan');
        $alamat             = $this->input->post('alamat');
        $tempat_lahir       = $this->input->post('tempat_lahir');
        $tanggal_lahir      = $this->input->post('tanggal_lahir');
        $agama              = $this->input->post('agama');
        $status_perkawinan  = $this->input->post('status_perkawinan');
        $no_hp              = $this->input->post('no_hp');
        $email              = $this->input->post('email');
        
        if($id_datadiri == "" || $nip == "" || $nama == "" || $jenis_kelamin == "" || $jabatan == "" || $alamat == "" ||
           $tempat_lahir == "" || $tanggal_lahir == "" || $agama == "" || $status_perkawinan == "" || $no_hp == "" || 
           $email == ""){

           $this->load->view('user/view_profil', $data);
        }else{
            $this->model_profil->update_datadiri($id_datadiri, $nip, $nama, $jenis_kelamin, $jabatan, $alamat, $tempat_lahir, $tanggal_lahir, 
                                             $agama, $status_perkawinan, $no_hp, $email);
            $data["status"]     = "success";
            $this->load->view('user/view_profil', $data);
        }
    }
    
}
