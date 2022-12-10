<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pesan extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('model_pesan');
        $this->load->model('model_admin_pengguna');
        $this->load->model('model_dokumen');
        $this->load->model('model_admin_notulensi_rapat');       
	}

	public function index(){
        if($this->session->userdata('username_staff') == "" && $this->session->userdata('password_staff') == ""){  
            redirect(site_url());
        }
        else{
            $this->load->view('user/view_pesan');	
        }
	}
    
    public function pesan_keluar(){
		$this->load->view('user/view_pesan_keluar');
	}
    
    public function insert_pesan(){
        $nama_tujuan        = $this->input->post('nama_tujuan');
        $email_arr          = array();
        $send_error         = 0;
        
        if( !empty($nama_tujuan) ){
            foreach ($nama_tujuan AS $nama){
                $email_tujuan   = $this->model_pesan->get_email_by_nip($nama);
                $email_tujuan   = $email_tujuan->email;
                $email_arr[]    = array('nip' => $nama, 'email' => $email_tujuan);
            }
        }
        
        if( empty($email_arr) ){
            $data['status']         = "error";
        	$this->load->view('view_admin_pesan_keluar', $data);
            die();
        }
        
        foreach($email_arr as $email){
            $subjek             = $this->input->post('subjek');
            $pesan              = $this->input->post('pesan');
            $pengirim           = $this->input->post('pengirim');
            $to                 = $email['email'];
            $message            = "From : ".$email['nip']."<br />".$pesan;
            
            $headers            = "MIME-Version: 1.0" . "\r\n";
            $headers            = "Content-type:text/html;charset=iso-8859-1" . "\r\n";
            //$send               = $this->swiftmailer->send_email_pesan($to,$subjek,$message);
            @mail($to,$subjek,$message,$headers);
            if( @mail ){
                date_default_timezone_set("Asia/Jakarta");
                $data = array('nip'             =>$email['nip'],
                              'pengirim'        =>$pengirim,
                              'subjek'          =>$subjek,
                              'pesan'           =>$pesan,
                              'status'          =>'Belum Dibaca',
                              'waktu'           =>date('Y-m-d H:i:s'));
                $this->model_pesan->insert_pesan($data);
            }else{
                $send_error++;
            }
        }

        if( $send_error > 0 ){
            $data['status']         = "error";
            $data['jumlah_error']   = $send_error;
        	$this->load->view('user/view_pesan_keluar', $data);
        }else{
            
            $data['status'] = "success";
            $this->load->view('user/view_pesan_keluar',$data);
        }
    }
    
    
    
    public function pesan_baca(){
        $nip                = $this->input->post('nama_tujuan');
        $this->model_pesan->pesan_baca($nip);
    }
    
    public function dibaca(){
        foreach($this->input->post('checkbox') as $id){
            $this->model_pesan->pesan_baca($id);
        }
        redirect(site_url().'pesan');
    }
    
    public function belum_dibaca(){
        foreach($this->input->post('checkbox') as $id){
            $this->model_pesan->pesan_belum_dibaca($id);
        }
        redirect(site_url().'pesan');
    }
    
    public function delete_id_pesan(){
        foreach($this->input->post('checkbox') as $id){
            $this->model_pesan->delete_id_pesan($id);
        }
        redirect(site_url().'pesan');
    }
    
    public function delete_id_pesan_keluar(){
        foreach($this->input->post('checkbox') as $id){
            $this->model_pesan->delete_id_pesan($id);
        }
        redirect(site_url().'pesan_keluar');
    }
    
    public function detail_pesan(){
        $data['detail_pesan'] = $this->uri->segment(3);
        $this->load->view('user/view_pesan_baca_masuk',$data);
        $this->model_pesan->pesan_baca($this->uri->segment(3));
    }
    
    public function detail_pesan_keluar(){
        $data['detail_pesan'] = $this->uri->segment(3);
        $this->load->view('user/view_pesan_baca_keluar',$data);
        //$this->model_pesan->pesan_baca($this->uri->segment(3));
    }
    
    public function buat_pesan(){
        if($this->session->userdata('username_staff') == "" && $this->session->userdata('password_staff') == ""){  
            redirect(site_url());
        }
        else{
            $this->load->view('user/view_buat_pesan');	
        }
	}
    
}
