<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notulensi_Rapat extends CI_Controller {

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
            $this->load->view('user/view_notulensi_rapat');	
        }
	}
    
        public function delete_notulensi_rapat(){
            foreach($this->input->post('checkbox') as $id_notulensi){
                $this->model_admin_notulensi_rapat->delete_notulensi_rapat($id_notulensi);
            }
            redirect(site_url().'notulensi_rapat/index/terhapus');
        }
        
        public function insert_notulensi_rapat(){
            $config['upload_path'] = './assets/dokumen/notulensi rapat';
            $config['allowed_types'] = 'docx|pdf|doc';
            $config['max_size']	= '10240'; //10 Mb
            //$config['overwrite'] = true;
    				
            $this->load->library("upload", $config);
            $nip                = $this->input->post('nip');
            $hari               = $this->input->post('hari');
            $tanggal_rapat      = $this->input->post('tanggal_rapat');
            $pembahasan         = $this->input->post('pembahasan');
            $penyelenggara      = $this->input->post('penyelenggara');
            $tempat             = $this->input->post('tempat');
            $peserta            = $this->input->post('peserta');
            $notulis            = $this->input->post('notulis');
              
            $id_pengirim    = $this->session->userdata('nip_staff');
            $query          = $this->model_admin_notulensi_rapat->get_by_id_pengirim($id_pengirim);
            $row = $query->row();
            
            $subjek             = 'Mengajukan Laporan Notulensi Rapat';
            $pesan              = 'Dengan ini saya mengajukan laporan notulensi rapat dengan pembahasan : '.$pembahasan;
            $pengirim           = $row->nama;
            $to                 = 'radenrifalardiansyah@gmail.com';
            $message            = "From : ".$pengirim."<br />".$pesan;
            $headers            = "MIME-Version: 1.0" . "\r\n";
            $headers            = "Content-type:text/html;charset=iso-8859-1" . "\r\n";

            if (isset($_FILES["userfile"]["name"])) {
                if($_FILES["userfile"]["name"] != ''){
                    if($this->upload->do_upload()){
                        @mail($to,$subjek,$message,$headers);
                        if( @mail ){
                            date_default_timezone_set("Asia/Jakarta");
                            $file = $this->upload->data();
                            $data               = array('nip'               => $nip,
                                                        'hari'              => $hari,
                                                        'tanggal_rapat '    => $tanggal_rapat,
                                                        'pembahasan'        => $pembahasan,
                                                        'penyelenggara'     => $penyelenggara,
                                                        'tempat'            => $tempat,
                                                        'peserta'           => $peserta,
                                                        'file_notulensi'    => $file["file_name"],
                                                        'notulis'           => $notulis,
                                                        'status_notulensi'  => 'Proses');
                            $this->model_admin_notulensi_rapat->insert_notulensi_rapat($data);
                            $data["status_proses"] = "success_proses";
            		        $this->load->view("user/view_notulensi_rapat", $data);
                        }
                    }else{
                        $data["status_dokumen"] = "error_dokumen";
                        $this->load->view("user/view_notulensi_rapat", $data);
                    }
                }else{
                    $data["status"] = "error";
                    $this->load->view("user/view_notulensi_rapat", $data);
                }
            }else{
                $this->load->view("user/view_notulensi_rapat");
            }
        }
    
        public function update_notulensi_rapat(){
            $config['upload_path'] = './assets/dokumen/notulensi rapat';
            $config['allowed_types'] = 'docx|pdf|doc';
            $config['max_size']	= '10240'; //10 Mb
            //$config['overwrite'] = true;
    				
            $this->load->library("upload", $config);
            
            $id_notulensi       = $this->input->post('id_notulensi_tmp');
            $hari               = $this->input->post('hari');
            $tanggal_rapat      = $this->input->post('tanggal_rapat');
            $pembahasan         = $this->input->post('pembahasan');
            $penyelenggara      = $this->input->post('penyelenggara');
            $tempat             = $this->input->post('tempat');
            $peserta            = $this->input->post('peserta');
            $notulis            = $this->input->post('notulis');
            $status_notulensi   = 'Proses';
            
            
            $id_pengirim    = $this->session->userdata('nip_staff');
            $query          = $this->model_admin_notulensi_rapat->get_by_id_pengirim($id_pengirim);
            $row = $query->row();
            
            $subjek             = 'Mengajukan Perbaikan Laporan Notulensi Rapat';
            $pesan              = 'Dengan ini saya mengajukan perbaikan laporan notulensi rapat dengan pembahasan : '.$pembahasan;
            $pengirim           = $row->nama;
            $to                 = 'radenrifalardiansyah@gmail.com';
            $message            = "From : ".$pengirim."<br />".$pesan;
            $headers            = "MIME-Version: 1.0" . "\r\n";
            $headers            = "Content-type:text/html;charset=iso-8859-1" . "\r\n";
            
            if (isset($_FILES["userfile"]["name"])) {
                if($_FILES["userfile"]["name"] != ''){
                    if($this->upload->do_upload()){
                        @mail($to,$subjek,$message,$headers);
                        if( @mail ){
                            date_default_timezone_set("Asia/Jakarta");
                            $file = $this->upload->data();
                			$this->model_admin_notulensi_rapat->update_notulensi_rapat($id_notulensi, $hari, $tanggal_rapat, $pembahasan, $penyelenggara,
                            $tempat, $peserta, $notulis, $file["file_name"], $status_notulensi);
                            $data["status_update"] = "success_update";
                            $data["pembahasan"] = $pembahasan;
                            $data["penyelenggara"] = $penyelenggara;
                            $this->load->view("user/view_notulensi_rapat", $data);
                        }
                    }else{
                        $data["status_dokumen"] = "error_dokumen";
                        $this->load->view("user/view_notulensi_rapat", $data);
                    }
                }else{
                    $data["status"] = "error";
                    $this->load->view("user/view_notulensi_rapat", $data);
                }
            }else{
                $this->load->view("user/view_notulensi_rapat");
            }
        }
    
}
