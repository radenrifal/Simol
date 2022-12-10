<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokumen extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('model_dokumen');
        $this->load->model('model_pesan');
		$this->load->model('model_admin_notulensi_rapat');
	}

	public function index(){
        if($this->session->userdata('username_staff') == "" && $this->session->userdata('password_staff') == ""){ 
            redirect(site_url());
        }
        else{
            $this->load->view('user/view_dokumen');	
        }
	}
    
    public function delete_per_username(){
        foreach($this->input->post('checkbox') as $id_dokumen){
            $this->model_dokumen->delete_per_username($id_dokumen);
        }
        redirect(site_url().'dokumen/index/terhapus');
    }
    
    public function staff_tambah_dokumen(){
        $config['upload_path'] = './assets/dokumen';
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size']	= '10240';
        //$config['overwrite'] = true;
				
        $this->load->library("upload", $config);
        
        $id_kegiatan    = $this->input->post('id_kegiatan');
        $id_dokumen     = $this->input->post('id_dokumen');
        $judul_dokumen  = $this->input->post('judul_dokumen');
        
            
        $id_pengirim    = $this->session->userdata('nip_staff');
        $query          = $this->model_dokumen->get_by_id_pengirim($id_pengirim);
        $row = $query->row();
        
        $subjek             = 'Mengajukan Laporan Dokumen Kegiatan';
        $pesan              = 'Dengan ini saya mengajukan laporan dokumen kegiatan yang berjudul : '.$judul_dokumen;
        $pengirim           = $row->nama;
        $to                 = 'radenrifalardiansyah@gmail.com';
        $message            = "From : ".$pengirim."<br />".$pesan;
        $headers            = "MIME-Version: 1.0" . "\r\n";
        $headers            = "Content-type:text/html;charset=iso-8859-1" . "\r\n";
        
        $query  = $this->model_dokumen->cek_by_id_dokumen($id_dokumen);
        if($query->num_rows() > 0){
            $data["status_dokumen_sama"]    = "error_dokumen_sama";
			$this->load->view('user/view_dokumen',$data);
        }else{
            if (isset($_FILES["userfile"]["name"])) {
                if($_FILES["userfile"]["name"] != ''){
                    if($this->upload->do_upload()){
                        @mail($to,$subjek,$message,$headers);
                        if( @mail ){
                            date_default_timezone_set("Asia/Jakarta");
                            $file = $this->upload->data();
                            $data = array('nip'=>$this->session->userdata('nip_staff'),
                                          'id_dokumen'=>$id_dokumen,
                                          'id_kegiatan'=>$id_kegiatan,
                                          'judul_dokumen'=>$judul_dokumen,
                                          'file_dokumen'=>$file["file_name"],
                                          'waktu'=>date('Y-m-d H:i:s'),
                                          'status_dokumen' => 'Proses');
                			$this->model_dokumen->tambah_dokumen($data);
                			$data["status_proses"] = "success_proses";
                			$this->load->view('user/view_dokumen',$data);    
                        }
                    }else{
                        $data["status_dokumen"] = "error_dokumen";
            			$this->load->view('user/view_dokumen',$data);
                    }
                }else{
                    $data["status"] = "error";
                    $this->load->view('user/view_dokumen',$data); 
                }
            }
        }
    }
    
    public function update_dokumen(){
        $id_kegiatan    = $this->input->post('id_kegiatan');
        $id_dokumen     = $this->input->post('id_dokumen');
        $judul_dokumen  = $this->input->post('judul_dokumen');
        
        $id_pengirim    = $this->session->userdata('nip_staff');
        $query          = $this->model_dokumen->get_by_id_pengirim($id_pengirim);
        $row = $query->row();
        
        $subjek             = 'Mengajukan Laporan Dokumen Kegiatan';
        $pesan              = 'Dengan ini saya mengajukan laporan dokumen kegiatan yang berjudul : '.$judul_dokumen;
        $pengirim           = $row->nama;
        $to                 = 'radenrifalardiansyah@gmail.com';
        $message            = "From : ".$pengirim."<br />".$pesan;
        $headers            = "MIME-Version: 1.0" . "\r\n";
        $headers            = "Content-type:text/html;charset=iso-8859-1" . "\r\n";
        
        @mail($to,$subjek,$message,$headers);
        if( @mail ){
            if ( $_FILES["userfile"]["name"] != '' ) {
                $status_dokumen = "Proses";
                
                $config['upload_path'] = './assets/dokumen';
                $config['allowed_types'] = 'docx|pdf|doc';
                $config['max_size']	= '10240';
                //$config['overwrite'] = true;
                	
                $this->load->library("upload", $config);
                
                if($this->upload->do_upload()){
                    $file = $this->upload->data();
                    $this->model_dokumen->update_dokumen($id_dokumen, $judul_dokumen, $file["file_name"], $status_dokumen);
                    $data["status_proses"]  = "success_proses";
                    $data["id_dokumen"]     = $id_dokumen;
                    $data["judul_dokumen"]  = $judul_dokumen;
                    $this->load->view('user/view_dokumen',$data);
                     //redirect(site_url().'dokumen/'.$id_dokumen);
                }else{
                    $data["status_dokumen"] = "error_dokumen";
                    $data['insert_id_kegiatan'] = $id_kegiatan;
                    $this->load->view('user/view_dokumen',$data); die();
                }
            }else{
                $this->model_dokumen->update_dokumen($id_dokumen, $judul_dokumen, '', '');
                $data["status_proses"]  = "success_update";
                $data["id_dokumen"]     = $id_dokumen;
                $data["judul_dokumen"]  = $judul_dokumen;
                $this->load->view('user/view_dokumen',$data);
            }
        }
    }
}
