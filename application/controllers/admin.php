<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
     
     // Constuctor
	public function __construct(){
	   parent::__construct();
	   $this->load->model('model_admin');
	   $this->load->model('model_admin_pengguna');
	   $this->load->model('model_beranda');
	   $this->load->model('model_admin_tentang_kami');
       $this->load->model('model_dokumen');
       $this->load->model('model_pesan');
       $this->load->model('model_admin_notulensi_rapat');
	   $this->load->model('model_profil');
	  // $this->load->model('model_pengaturan');
	   $this->load->model('model_kegiatan');
	   $this->load->model('model_diagram');
	}
    
	public function index(){
        if($this->session->userdata('username') == "" && $this->session->userdata('password') == ""){ 
            $this->load->view('admin');
        }
        else{
			redirect(site_url().'admin/menu_utama');	# redirect(site_url());
        }
	}
    
    public function login(){
        $username           = $this->input->post('username');
        $password           = $this->input->post('password');
        $status_pengguna    = 'admin';
        
		$query = $this->model_admin->view_admin($username, $password, $status_pengguna);	// mysql_query("");
			
		if($query->num_rows()){		// mysql_num_rows();
			$row = $query->row();	// eq: fetch object
			$this->session->set_userdata('username',$row->username);
			$this->session->set_userdata('password',$row->password);
            $this->session->set_userdata('nama_admin',$row->nama);
            $this->session->set_userdata('nip_admin',$row->nip);
            $this->session->set_userdata('jabatan_admin',$row->jabatan); 
			redirect(site_url().'admin/menu_utama');	# redirect(site_url());
		}
		else {
			$data["status"] = "error";
			$this->load->view("admin", $data);
		}
		
	}
	
	public function logout(){
    	$this->session->sess_destroy();
        redirect(site_url().'admin');
		
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
            redirect(site_url().'admin');
		}
			
	}
    
    //controller Sign Up -------------------------------------------------------------------------------
    public function sign_up(){
		$this->load->view('view_admin_signup');
	}
    
    //controller Tentang Kami --------------------------------------------------------------------------
    public function tentang_kami(){
        if($this->session->userdata('username') != "" && $this->session->userdata('password') != ""){ 
    		$this->load->view('view_admin_tentang_kami');
            
        }
        else{
    		redirect(site_url().'admin');
        }        
	}
    
    //controller Menu Utama Admin ----------------------------------------------------------------------
    public function menu_utama(){
        if($this->session->userdata('username') == "" && $this->session->userdata('password') == ""){ 
    		redirect(site_url().'admin');
        }
        else{
			$this->load->view('view_admin_menuutama');
        }        		
	}
    
    public function update_tentang_kami(){
	   $this->model_admin_tentang_kami->update($this->input->post('konten'));
	   $data['status'] = "success";
	   $this->load->view('view_admin_tentang_kami',$data);
	}

    //controller Pengguna ------------------------------------------------------------------------------
    public function pengguna(){
  		$this->load->view('view_admin_pengguna');
	}
    
    public function detail_pengguna(){
        if($this->session->userdata('username') != "" && $this->session->userdata('password') != ""){ 
    		$data['detail_pengguna'] = $this->uri->segment(3);
            $this->load->view('view_admin_detail_pengguna',$data);
        }
        else{
    		redirect(site_url().'admin');
        }
        
    }
    
    public function detail_pesan(){
        if($this->session->userdata('username') != "" && $this->session->userdata('password') != ""){ 
    		$data['detail_pesan'] = $this->uri->segment(3);
            $this->load->view('view_admin_pesan_baca',$data);
            $this->model_pesan->pesan_baca($this->uri->segment(3));
        }
        else{
    		redirect(site_url().'admin');
        }
    }
    
    public function detail_pesan_keluar(){
        if($this->session->userdata('username') != "" && $this->session->userdata('password') != ""){ 
    		$data['detail_pesan'] = $this->uri->segment(3);
            $this->load->view('view_admin_pesan_baca_keluar',$data);
            //$this->model_pesan->pesan_baca($this->uri->segment(3));
        }
        else{
    		redirect(site_url().'admin');
        }
        
    }
    
    public function buat_pesan(){
        if($this->session->userdata('username') != "" && $this->session->userdata('password') != ""){ 
            $this->load->view('view_admin_buat_pesan');
        }
        else{
			redirect(site_url().'admin');	# redirect(site_url());
        }
	}
    
    public function tambah_pengguna(){
        $nip                = $this->input->post('nip');
        $nama_pengguna      = $this->input->post('username');
        //$password           = $this->input->post('password');
        //$repassword         = $this->input->post('repassword');
        $status_pengguna    = $this->input->post('status_pengguna');
        
        //$nama               = 'Null';
        $jenis_kelamin      = 'Pria';
        $jabatan            = 'Null';
        $alamat             = 'Null';
        $tempat_lahir       = 'Null';
        $tanggal_lahir      = '1900-01-01';
        $agama              = 'Null';
        $status_perkawinan  = 'Belum Menikah';
        $no_hp              = 'Null';
        $email              = 'Null';
        
        $query      = $this->model_admin_pengguna->cek_by_nip($nip);
        if($query->num_rows() > 0){
            $data['status_nip'] = "error_nip";
  		    $this->load->view('view_admin_pengguna',$data);
        }else{
            if($nip == "" || $nama_pengguna == "" || $status_pengguna == ""){
                $data['status'] = "error";
      		    $this->load->view('view_admin_pengguna',$data);
            }else{
                $data_pengguna      = array(
                                  'nip'                 => $nip,
                                  'username'            => $nama_pengguna,
                                  'password'            => md5(1234),
                                  'status_pengguna'     => $status_pengguna);
            
                $data_datadiri      = array(
                                      'nip'                 => $nip,
                                      'nama'                => $nama_pengguna,
                                      'jenis_kelamin'       => $jenis_kelamin,
                                      'jabatan'             => $jabatan,
                                      'alamat'              => $alamat,
                                      'tempat_lahir'        => $tempat_lahir,
                                      'tanggal_lahir'       => $tanggal_lahir,
                                      'agama'               => $agama,
                                      'status_perkawinan'   => $status_perkawinan,
                                      'no_hp'               => $no_hp,
                                      'email'               => $email,);
                $this->model_admin_pengguna->tambah_pengguna($data_pengguna);
                $this->model_admin_pengguna->tambah_datadiri($data_datadiri);
                $data['nip']            = $nip;
                $data['nama_pengguna']  = $nama_pengguna;
                $data['status']         = "success";
      		    $this->load->view('view_admin_pengguna',$data);
            }
        }
        /*
        
        $query              = $this->model_admin_pengguna->view_validasi_pengguna($nip);	// mysql_query("");
			
		if($query->num_rows()){		// mysql_num_rows();
            $row = $query->row();
            $nip_validasi = $row->nip;
            if($nip != $nip_validasi){
                $data_pengguna      = array(
                                  'nip'                 => $nip,
                                  'username'            => $nama_pengguna,
                                  'password'            => md5(1234),
                                  'status_pengguna'     => $status_pengguna);
            
                $data_datadiri      = array(
                                      'nip'                 => $nip,
                                      'nama'                => $nama_pengguna,
                                      'jenis_kelamin'       => $jenis_kelamin,
                                      'jabatan'             => $jabatan,
                                      'alamat'              => $alamat,
                                      'tempat_lahir'        => $tempat_lahir,
                                      'tanggal_lahir'       => $tanggal_lahir,
                                      'agama'               => $agama,
                                      'status_perkawinan'   => $status_perkawinan,
                                      'no_hp'               => $no_hp,
                                      'email'               => $email,);
                $this->model_admin_pengguna->tambah_pengguna($data_pengguna);
                $this->model_admin_pengguna->tambah_datadiri($data_datadiri);
                redirect("admin/pengguna");
            }
			
		}
		else{
            $this->load->view('view_admin_pengguna');
		}
        */
        
    }
    
    public function view_file_image(){
  		$data['pengguna'] = $this->uri->segment(3);
  		$this->load->view('view_admin_pengguna',$data);
   	}
    
    public function delete_pengguna(){
        foreach($this->input->post('checkbox') as $nip){
            $this->model_admin_pengguna->delete_pengguna($nip);
            $this->model_admin_pengguna->delete_pengguna_datadiri($nip);
        }
        redirect(site_url().'admin/pengguna/terhapus');
    }
    
    public function update_pengguna(){
        $nip_tmp            = $this->input->post('edit_nip');
        $nama               = $this->input->post('nama');
        $jabatan            = $this->input->post('jabatan');
        $jenis_kelamin      = $this->input->post('jenis_kelamin');
        $alamat             = $this->input->post('alamat');
        $tempat_lahir       = $this->input->post('tempat_lahir');
        $tanggal_lahir      = $this->input->post('tanggal_lahir');
        $agama              = $this->input->post('agama');
        $status_perkawinan  = $this->input->post('status_perkawinan');
        $no_hp              = $this->input->post('no_hp');
        $email              = $this->input->post('email');
        $status_pengguna    = $this->input->post('status_pengguna');
        
        if($nip_tmp == "" || $nama == "" || $jabatan == "" || $jenis_kelamin == "" || $alamat == "" || $tempat_lahir == "" ||
            $tanggal_lahir == "" || $agama == "" || $status_perkawinan == "" || $no_hp == "" || $email == "" || $status_pengguna == ""){
            $data['status'] = "error";
            $this->load->view('view_admin_pengguna',$data);
        }else{
            $this->model_admin_pengguna->update_datadiri($nip_tmp, $nama, $jabatan, $jenis_kelamin, $alamat, $tempat_lahir, $tanggal_lahir, $agama, $status_perkawinan, $no_hp, $email);
            $this->model_admin_pengguna->update_pengguna($nip_tmp, $status_pengguna);
            $data['nip']            = $nip_tmp;
            $data['nama_pengguna']  = $nama;
            $data['status_ubah'] = "success_ubah";
  		    $this->load->view('view_admin_pengguna',$data);
        }
   	}
    
    
    //Dokumen ------------------------------------------------------------------------------------------
    public function detail_dokumen(){
        if($this->session->userdata('username') == "" && $this->session->userdata('password') == ""){ 
    		redirect(site_url().'admin');
        }
        else{
    		$this->load->view('view_admin_detail_dokumen');
        }
	}
        
        /**
         * Fungsi untuk ambil/setting data id_dokumen pada saat pemilihan kegiatan
         */
        public function ambil_id_dokumen(){
            // Set variabel id_kegiatan, ambil dari post data yang dikirim dari AJAX
            $id_kegiatan    = $this->input->post('id_kegiatan');
            // Set variabel $id_dokumen untuk value yang akan di kembalikan/return sebagai respon AJAX
            // Default kosong
            $id_dokumen     = '';
     
            // Cek jika $id_kegiatan tidak kosong/mempunyai value
            if( !empty($id_kegiatan) ){
                // Set $id_dokumen value dari hasil generate id dokumen
                // generate_id_dokumen() adalah fungsi yang ada di helpers/general_helper.php
                $id_dokumen = generate_id_dokumen();
            }
    
            // Check jika $id_dokumen kosong/tidak memiliki value
            if( !$id_dokumen || empty($id_dokumen) ){
                // Set JSON data dengan tipe array sebagai respon AJAX
                $data = array(
                    'message'   => 'error',
                );
            }else{
                // Set JSON data dengan tipe array sebagai respon AJAX
                $data = array(
                    'message'   => 'success',
                    'id'        => $id_dokumen
                );
            }
            
            // JSON encode data, ubah data array di atas menjadi tipe JSON yang akan di kembalikan/return sebagai respon AJAX
            die(json_encode($data));
        }
        
        public function tambah_dokumen(){
            $config['upload_path'] = './assets/dokumen';
            $config['allowed_types'] = 'pdf|doc|docx';
            $config['max_size']	= '10240';
            //$config['overwrite'] = true;
    				
            $this->load->library("upload", $config);
            
            $id_kegiatan    = $this->input->post('id_kegiatan');
            $id_dokumen     = $this->input->post('id_dokumen');
            $judul_dokumen  = $this->input->post('judul_dokumen');
            
            $query  = $this->model_dokumen->cek_by_id_dokumen($id_dokumen);
            if($query->num_rows() > 0){
                $data["status_dokumen_sama"]    = "error_dokumen_sama";
    			$this->load->view('view_admin_detail_dokumen',$data);
            }else{
                if (isset($_FILES["userfile"]["name"])) {
                    if($_FILES["userfile"]["name"] != ''){
                        if($this->upload->do_upload()){
                            date_default_timezone_set("Asia/Jakarta");
                            $file = $this->upload->data();
                            $data = array('nip'=>$this->session->userdata('nip_admin'),
                                          'id_dokumen'=>$id_dokumen,
                                          'id_kegiatan'=>$id_kegiatan,
                                          'judul_dokumen'=>$judul_dokumen,
                                          'file_dokumen'=>$file["file_name"],
                                          'waktu'=>date('Y-m-d H:i:s'),
                                          'status_dokumen' => 'Proses');
                			$this->model_dokumen->tambah_dokumen($data);
                			$data["status_proses"] = "success_proses";
                			$this->load->view('view_admin_detail_dokumen',$data);
                        }else{
                            $data["status_dokumen"] = "error_dokumen";
                			$this->load->view('view_admin_detail_dokumen',$data);
                        }
                    }else{
                        $data["status"] = "error";
                        $this->load->view('view_admin_detail_dokumen',$data); 
                    }
                }
            }
        }
        
        public function update_dokumen(){
            $config['upload_path'] = './assets/dokumen';
            $config['allowed_types'] = 'docx|pdf|doc';
            $config['max_size']	= '10240';
            //$config['overwrite'] = true;
    				
            $this->load->library("upload", $config);
            
            $id_kegiatan    = $this->input->post('id_kegiatan');
            $id_dokumen     = $this->input->post('id_dokumen');
            $judul_dokumen  = $this->input->post('judul_dokumen');
            $status_dokumen = "Proses";
            
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
                    $data["status"]         = "success";
                     $data["id_dokumen"]     = $id_dokumen;
        			 $data["judul_dokumen"]  = $judul_dokumen;
                     $data["insert_id_kegiatan"] = $id_kegiatan;
                     $this->load->view('view_admin_dokumen_per_kegiatan',$data);
                }else{
                    $data["status_dokumen"] = "error_dokumen";
                    $data['insert_id_kegiatan'] = $id_kegiatan;
                    $this->load->view('view_admin_dokumen_per_kegiatan',$data); die();
                }
            }else{
                $this->model_dokumen->update_dokumen($id_dokumen, $judul_dokumen, '', '');
                $data["status_proses"]  = "success_update";
                $data["id_dokumen"]     = $id_dokumen;
                $data["judul_dokumen"]  = $judul_dokumen;
                $data['insert_id_kegiatan'] = $id_kegiatan;
                $this->load->view('view_admin_dokumen_per_kegiatan',$data);
            }
        }
        
        public function update_status_dokumen_proses(){
            $id_dokumen     = $this->uri->segment(3);
            $status_dokumen = 'Dalam Pengecekan';  
            $this->model_dokumen->update_status_dokumen($id_dokumen, $status_dokumen);
            redirect(base_url().'admin/detail_dokumen/'.$id_dokumen.'/pengecekan');
        }
        
        public function update_status_dokumen_terima(){
            $id_dokumen     = $this->uri->segment(3);
            
            $id_pengirim    = $this->session->userdata('nip_admin');
            $query          = $this->model_dokumen->get_by_id_pengirim($id_pengirim);
            $row = $query->row();
            
            $query1         = $this->model_dokumen->get_by_id_dokumen($id_dokumen);
            $row1 = $query1->row();
            $judul_dokumen  = $row1->judul_dokumen; 
            $subjek             = 'Pemberitahuan Dokumen Gagal Diterima';
            $pesan              = 'Selamat dokumen anda dengan judul'.$judul_dokumen.' telah terverifikasi dengan baik, dan sudah diterima';
            $pengirim           = $row->nama;
            $to                 = $row1->email;
            $message            = "From : ".$pengirim."<br />".$pesan;
            
            
            $headers            = "MIME-Version: 1.0" . "\r\n";
            $headers            = "Content-type:text/html;charset=iso-8859-1" . "\r\n";
            //$send               = $this->swiftmailer->send_email_pesan($to,$subjek,$message);
            @mail($to,$subjek,$message,$headers);
            if( @mail ){
                $status_dokumen = 'Diterima';  
                $this->model_dokumen->update_status_dokumen($id_dokumen, $status_dokumen);
                redirect(base_url().'admin/detail_dokumen/'.$id_dokumen.'/diterima'); 
            }
        }
        
        public function update_status_dokumen_gagal_terima(){
            $id_dokumen     = $this->uri->segment(3);
            $id_pengirim    = $this->session->userdata('nip_admin');
            $query          = $this->model_dokumen->get_by_id_pengirim($id_pengirim);
            $row = $query->row();
            
            $query1         = $this->model_dokumen->get_by_id_dokumen($id_dokumen);
            $row1           = $query1->row();
            $judul_dokumen  = $row1->judul_dokumen;
            $subjek             = 'Pemberitahuan Dokumen Telah Diterima';
            $pesan              = 'Dokumen dengan judul : '.$judul_dokumen.' gagal terverifikasi';
            $pengirim           = $row->nama;
            $to                 = $row1->email;
            $message            = "From : ".$pengirim."<br />".$pesan;
            
            
            $headers            = "MIME-Version: 1.0" . "\r\n";
            $headers            = "Content-type:text/html;charset=iso-8859-1" . "\r\n";
            //$send               = $this->swiftmailer->send_email_pesan($to,$subjek,$message);
            @mail($to,$subjek,$message,$headers);
            if( @mail ){
                $status_dokumen = 'Gagal Diterima';  
                $this->model_dokumen->update_status_dokumen($id_dokumen, $status_dokumen);
                redirect(base_url().'admin/detail_dokumen/'.$id_dokumen.'/gagal'); 
            }
            
        } 
        
        //controller Manipulasi ]---------------------------------------------------------------------------
        public function delete_dokumen_per_kegiatan(){
            foreach($this->input->post('checkbox') as $id_dokumen){
                $this->model_dokumen->delete_dokumen_per_kegiatan($id_dokumen);
            }
            
            $data["status_hapus"]         = "success_hapus";
            $data["insert_id_kegiatan"] = $this->input->post('id_kegiatan');
            $this->load->view('view_admin_dokumen_per_kegiatan',$data);
        } 
    
        public function delete_detail_dokumen(){
            foreach($this->input->post('checkbox') as $id_dokumen){
                $this->model_dokumen->delete_dokumen_per_kegiatan($id_dokumen);
            }
            redirect(site_url().'admin/detail_dokumen/terhapus');
        }
        
        
        public function export_excel(){
    	   if($this->uri->segment(3) == "excel_pengguna"){
    	       header('Content-Type: application/ms-excel'); // msword   atau  ms-excel
    	       header('Content-Disposition: attachment; filename="Pengguna.xls"');
    				
    	       $this->load->view('view_export_pengguna');
    	   }elseif($this->uri->segment(3) == "excel_detail"){
    	       header('Content-Type: application/ms-excel'); // msword   atau  ms-excel
    	       header('Content-Disposition: attachment; filename="Detail Dokumen.xls"');
    				
    	       $this->load->view('view_export_detail_dokumen');
    	   }elseif($this->uri->segment(3) == "excel_identifikasi_teknologi"){
    	       header('Content-Type: application/ms-excel'); // msword   atau  ms-excel
    	       header('Content-Disposition: attachment; filename="Identifikasi Teknologi.xls"');
    				
    	       $this->load->view('view_export_identifikasi_teknologi');
    	   }
    	}
        
        
        public function export_pdf(){
            if($this->uri->segment(3) == "pdf_pengguna"){
    	           $this->load->library('tcpdf');
    	           $this->load->library('parser');
    	           $pdf = new tcpdf();
    				
    	           $orientation = 'L';
    	           $format = 'A4';
    	           $keepmargins = false;
    	           $tocpage = false;
    				
    	           $pdf->AddPage($orientation, $format, $keepmargins, $tocpage);
    	           $family = "times";
    	           $style = "";
    	           $size = "11";
    				
    	           $pdf->SetFont($family, $style, $size);
    				
    	           $html = $this->parser->parse('view_export_pengguna', array());
    	           $ln = true;
    	           $fill = false;
    	           $reseth = false;
    	           $cell = false;
    	           $align = "";
                   $pdf->WriteHTML($html, $ln, $fill, $reseth, $cell, $align);
    	           $pdf->output('Pengguna.pdf');	
    	   }elseif($this->uri->segment(3) == "pdf_detail_dokumen"){
    	           $this->load->library('tcpdf');
    	           $this->load->library('parser');
    	           $pdf = new tcpdf();

    	           $orientation = 'L';
    	           $format = 'A4';
    	           $keepmargins = false;
    	           $tocpage = false;
    				
    	           $pdf->AddPage($orientation, $format, $keepmargins, $tocpage);
    				
    	           $family = "times";
    	           $style = "";
    	           $size = "11";
    				
    	           $pdf->SetFont($family, $style, $size);
    				
    	           $html = $this->parser->parse('view_export_detail_dokumen', array());
    	           $ln = true;
    	           $fill = false;
    	           $reseth = false;
    	           $cell = false;
    	           $align = "";
                   $pdf->WriteHTML($html, $ln, $fill, $reseth, $cell, $align);
                   $pdf->output('Detail Dokumen.pdf');	
    	   }elseif($this->uri->segment(3) == "pdf_detail_notulensi"){
    	           $this->load->library('tcpdf');
    	           $this->load->library('parser');
    	           $pdf = new tcpdf();
    				
    	           $orientation = 'L';
    	           $format = 'A4';
    	           $keepmargins = false;
    	           $tocpage = false;
    				
    	           $pdf->AddPage($orientation, $format, $keepmargins, $tocpage);
    				
    	           $family = "times";
    	           $style = "";
    	           $size = "11";
    				
    	           $pdf->SetFont($family, $style, $size);
    				
    	           $html = $this->parser->parse('view_export_detail_notulensi', array());
    	           $ln = true;
    	           $fill = false;
    	           $reseth = false;
    	           $cell = false;
    	           $align = "";
                   $pdf->WriteHTML($html, $ln, $fill, $reseth, $cell, $align);
                   $pdf->output('Detail Notulensi Rapat.pdf');	
    	   }elseif($this->uri->segment(3) == "pdf_cetak_laporan_kegiatan"){
    	           $this->load->library('tcpdf');
    	           $this->load->library('parser');
    	           $pdf = new tcpdf();

    	           $orientation = 'L';
    	           $format = 'A4';
    	           $keepmargins = false;
    	           $tocpage = false;
    				
    	           $pdf->AddPage($orientation, $format, $keepmargins, $tocpage);
    				
    	           $family = "times";
    	           $style = "";
    	           $size = "11";
    				
    	           $pdf->SetFont($family, $style, $size);
    				
                    /*
                    $users      = $this->model_admin_pengguna->view_pengguna()->result();
                    $kategori   = $this->model_dokumen->view_id_kegiatan()->result();
                    
                    
                    $data['users']      = $users;
                    $data['kategori']   = $kategori;
                    
                    $users          = array();
                    $users      = $this->model_admin_pengguna->view_pengguna()->result();
                    $this->session->set_userdata('users', $users);
		            */  
                   $html = $this->parser->parse('view_export_laporan_kegiatan', array());
                   
                   print_r($html);
                   die();
                   
                   //$html = $this->parser->parse('view_export_detail_notulensi', array());
    	           $ln = true;
    	           $fill = false;
    	           $reseth = false;
    	           $cell = false;
    	           $align = "";
                   $pdf->WriteHTML($html, $ln, $fill, $reseth, $cell, $align);
                   $pdf->output('Laporan Kegiatan.pdf');	
    	   }
           			
    	}
        
    //controller Pesan ---------------------------------------------------------------------------------
    public function pesan(){
        if($this->session->userdata('username') == "" && $this->session->userdata('password') == ""){ 
    		redirect(site_url().'admin');
        }
        else{
    		$this->load->view('view_admin_pesan');
        }
	}
    
    //controller Pesan ---------------------------------------------------------------------------------
    public function pesan_keluar(){
        if($this->session->userdata('username') == "" && $this->session->userdata('password') == ""){ 
    		redirect(site_url().'admin');
        }
        else{
    		$this->load->view('view_admin_pesan_keluar');
        }
	}
    
    //Ambil judul paten pake ajak
        public function ambil_email(){
            $nama_tujuan    = $this->input->post('nama_tujuan');
            // Set variabel $judul_paten untuk value yang akan di kembalikan/return sebagai respon AJAX
            // Default kosong
            $email          = '';
            
            // Cek jika $id_kegiatan tidak kosong/mempunyai value
            if( !empty($nama_tujuan) ){
                // Set $nama_tujuan value dari hasil generate id dokumen
                // generate_judul_paten() adalah fungsi yang ada di helpers/general_helper.php
                $email      = generate_email($nama_tujuan);
            }
    
            // Check jika $id_dokumen kosong/tidak memiliki value
            if( !$email || empty($email) ){
                // Set JSON data dengan tipe array sebagai respon AJAX
                $data = array(
                    'message'   => 'error',
                );
            }else{
                // Set JSON data dengan tipe array sebagai respon AJAX
                $data = array(
                    'message'   => 'success',
                    'email'     => $email
                );
            }
            
            // JSON encode data, ubah data array di atas menjadi tipe JSON yang akan di kembalikan/return sebagai respon AJAX
            die(json_encode($data));
        }
    
    public function kegiatan(){
        if($this->session->userdata('username') == "" && $this->session->userdata('password') == ""){ 
            $this->load->view('admin');
        }
        else{
			$this->load->view('view_admin_kegiatan');	# redirect(site_url());
        }
	}
    
    public function laporan_kegiatan(){
        if($this->session->userdata('username') == "" && $this->session->userdata('password') == ""){ 
            $this->load->view('admin');
        }
        else{
            $year           = '';
            $month          = '';
            $years          = array();
            $get_years      = $this->model_dokumen->get_year_dokumen();
            
            foreach($get_years as $y){
                $years[$y->year] = $y->year;
            }
            
            $users          = array();
            $kategori       = array();
            
            if( $_POST ){
                $year       = $this->input->post('tahun_laporan_kegiatan');
                $month      = $this->input->post('bulan_laporan_kegiatan');
                $users      = $this->model_admin_pengguna->view_pengguna()->result();
                $kategori   = $this->model_dokumen->view_id_kegiatan()->result();
            }
            
            $data['years']      = $years;
            $data['year']       = $year;
            $data['month']      = $month;
            $data['users']      = $users;
            $data['kategori']   = $kategori;
			$this->load->view('view_admin_laporan_kegiatan', $data);	# redirect(site_url());
        }
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
        	$this->load->view('view_admin_pesan_keluar', $data);
        }else{
            $data['status']         = "success";
        	$this->load->view('view_admin_pesan_keluar', $data);
        }

        /*
        $headers            = "MIME-Version: 1.0" . "\r\n";
        $headers            .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
        
        @mail($to,$subjek,$message,$headers);
        if(@mail){
                date_default_timezone_set("Asia/Jakarta");
                $data = array('nip'             =>$nama_tujuan,
                              'pengirim'        =>$pengirim,
                              'subjek'          =>$subjek,
                              'pesan'           =>$pesan,
                              'status'          => 'Belum Dibaca',
                              'waktu'           =>date('Y-m-d H:i:s'));
                $this->model_pesan->insert_pesan($data);
                redirect(site_url().'admin/pesan_keluar');	
            }
            echo "Gagal";
        */
    }
    
    public function pesan_baca(){
        $this->model_pesan->pesan_baca($this->uri->segment(3));
    }
    
    public function pesan_baca_staff(){
        $this->model_pesan->pesan_baca($this->uri->segment(3));
        redirect(site_url().'pesan');
    }
    
    public function dibaca(){
        foreach($this->input->post('checkbox') as $id){
            $this->model_pesan->pesan_baca($id);
        }
        redirect(site_url().'admin/pesan');
    }
    
    public function belum_dibaca(){
        foreach($this->input->post('checkbox') as $id){
            $this->model_pesan->pesan_belum_dibaca($id);
        }
        redirect(site_url().'admin/pesan');
    }
    
    public function delete_id_pesan(){
        foreach($this->input->post('checkbox') as $id){
            $this->model_pesan->delete_id_pesan($id);
        }
        redirect(site_url().'admin/pesan');
    }
    
    public function delete_id_pesan_keluar(){
        foreach($this->input->post('checkbox') as $id){
            $this->model_pesan->delete_id_pesan($id);
        }
        redirect(site_url().'admin/pesan_keluar');
    }     
    //controller Template Pesan ---------------------------------------------------------------------------------
    public function template_pesan(){
        if($this->session->userdata('username') == "" && $this->session->userdata('password') == ""){ 
    		redirect(site_url().'admin');
        }
        else{
    		$this->load->view('view_admin_template_pesan');
        }
	}
    
    public function update_template_pesan(){
	   $this->model_pesan->update($this->input->post('konten_pesan'));
	   redirect(site_url().'admin/template_pesan');
	}
    
    //controller Notulensi Rapat ----------------------------------------------------------------------
    public function notulensi_rapat(){
        if($this->session->userdata('username') == "" && $this->session->userdata('password') == ""){ 
    		redirect(site_url().'admin');
        }
        else{
			$this->load->view('view_admin_notulensi_rapat');
        }        		
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
        
        if (isset($_FILES["userfile"]["name"])) {
            if($_FILES["userfile"]["name"] != ''){
                if($this->upload->do_upload()){
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
    		        $this->load->view("view_admin_notulensi_rapat", $data);
                }else{
                    $data["status_dokumen"] = "error_dokumen";
                    $this->load->view("view_admin_notulensi_rapat", $data);
                }
            }else{
                $data["status"] = "error";
                $this->load->view("view_admin_notulensi_rapat", $data);
            }
        }
    }
    
        public function update_notulensi_rapat(){
            $config['upload_path'] = './assets/dokumen/notulensi rapat';
            $config['allowed_types'] = 'gif|jpg|png|xlsx|pptx|docx|rar|zip|pdf|txt|doc';
            $config['max_size']	= '100000000';
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
            
            if (isset($_FILES["userfile"]["name"])) {
                if($this->upload->do_upload())
                {
                    $file = $this->upload->data();
        			$this->model_admin_notulensi_rapat->update_notulensi_rapat($id_notulensi, $hari, $tanggal_rapat, $pembahasan, $penyelenggara,
                    $tempat, $peserta, $notulis, $file["file_name"]);
        			$data["status"] = "save_success";
        			redirect("admin/notulensi_rapat", $data);
                }else{
                    echo $this->upload->display_errors();
                }
            }
        }
        
        public function delete_detail_notulensi(){
    	   $this->model_admin_notulensi_rapat->delete_detail_notulensi();
    	   redirect(site_url().'admin/notulensi_rapat');
    	}
        
        public function update_status_notulensi(){
            $id_notulensi   = $this->uri->segment(3);
            $id_pengirim    = $this->session->userdata('nip_admin');
            
            $query1         = $this->model_admin_notulensi_rapat->get_by_id_notulensi($id_notulensi);
            $row1           = $query1->row();
            
            $query          = $this->model_admin_notulensi_rapat->get_by_id_pengirim($id_pengirim);
            $row = $query->row();
            
            $pembahasan     = $row1->pembahasan; 
            $subjek             = 'Pemberitahuan Laporan Notulensi Diterima';
            $pesan              = 'Laporan notulensi anda dengan judul : '.$pembahasan.' telah berhasil diterima';
            $pengirim           = $row->nama;
            $to                 = $row1->email;
            
            $message            = "From : ".$pengirim."<br />".$pesan;
            $headers            = "MIME-Version: 1.0" . "\r\n";
            $headers            = "Content-type:text/html;charset=iso-8859-1" . "\r\n";
            //$send               = $this->swiftmailer->send_email_pesan($to,$subjek,$message);
            @mail($to,$subjek,$message,$headers);
            if( @mail ){
                $status_notulensi   = 'Diterima';
                $this->model_admin_notulensi_rapat->update_status_notulensi($id_notulensi, $status_notulensi);
                redirect(base_url().'admin/notulensi_rapat/'.$id_notulensi.'/diterima');
            }
            
        }
        
        public function update_status_notulensi_proses(){
            $id_notulensi       = $this->uri->segment(3);
            $status_notulensi   = 'Dalam Pengecekan';
            $this->model_admin_notulensi_rapat->update_status_notulensi($id_notulensi, $status_notulensi);
            redirect(base_url().'admin/notulensi_rapat/'.$id_notulensi.'/pengecekan');
        }
        
        public function update_status_notulensi_batal(){
            $id_notulensi   = $this->uri->segment(3);
            $id_pengirim    = $this->session->userdata('nip_admin');
            
            $query1         = $this->model_admin_notulensi_rapat->get_by_id_notulensi($id_notulensi);
            $row1           = $query1->row();
            
            $query          = $this->model_admin_notulensi_rapat->get_by_id_pengirim($id_pengirim);
            $row = $query->row();
            
            $pembahasan     = $row1->pembahasan; 
            $subjek             = 'Pemberitahuan Laporan Notulensi Gagal Diterima';
            $pesan              = 'Laporan notulensi anda dengan judul : '.$pembahasan.' gagal diterima';
            $pengirim           = $row->nama;
            $to                 = $row1->email;
            $message            = "From : ".$pengirim."<br />".$pesan;
            $headers            = "MIME-Version: 1.0" . "\r\n";
            $headers            = "Content-type:text/html;charset=iso-8859-1" . "\r\n";
            //$send               = $this->swiftmailer->send_email_pesan($to,$subjek,$message);
            @mail($to,$subjek,$message,$headers);
            if( @mail ){
                $status_notulensi   = 'Gagal Diterima';
                $this->model_admin_notulensi_rapat->update_status_notulensi($id_notulensi, $status_notulensi);
                redirect(base_url().'admin/notulensi_rapat/'.$id_notulensi.'/gagal');
            }
        }
        
        public function delete_notulensi_rapat(){
            foreach($this->input->post('checkbox') as $id_notulensi){
                $this->model_admin_notulensi_rapat->delete_notulensi_rapat($id_notulensi);
            }
            redirect(site_url().'admin/notulensi_rapat/terhapus');
        }
        
        
        //Pengaturan ------------------------------------------------------------------------------------------
        public function pengaturan(){
    		$this->load->view('view_admin_pengaturan');
    	}
        
        //Profil ------------------------------------------------------------------------------------------
        public function profil(){
    		$this->load->view('view_admin_profil');
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
                
              
                $this->model_profil->update_datadiri($id_datadiri, $nip, $nama, $jenis_kelamin, $jabatan, $alamat, $tempat_lahir, $tanggal_lahir, 
                                                     $agama, $status_perkawinan, $no_hp, $email);
            if($this->uri->segment(3) == "update_datadiri"){
                $data["status"]     = "success";
                $this->load->view('view_admin_profil', $data);
            }else{
                $data["status"]     = "error";
                $this->load->view('view_admin_profil', $data);
            }
        }
        
        
        //Kegiatan & Kategori ------------------------------------------------------------------------------------------
        public function tambah_kegiatan(){
            $plus               = 0;
            $initial            = 'S';
            $max_id             = $this->model_kegiatan->count_all() + $plus;
            $number             = str_pad($max_id + 1, 3, '0', STR_PAD_LEFT);
            $id_kegiatan        = $initial . $number;
            $check              = $this->uri->segment(2);
            $jenis_kegiatan     = $this->input->post('jenis_kegiatan');
            $id_kategori        = $this->input->post('id_kategori');
            
            if( $id_kegiatan && $jenis_kegiatan != ""){
                $data           = array('id_kegiatan' => $id_kegiatan, 'jenis_kegiatan' => $jenis_kegiatan, 'id_kategori' => $id_kategori);
                $this->model_kegiatan->tambah_kegiatan($data);
                $this->load->view('view_admin_kegiatan');
                return $plus + 1;     
            }else{ 
                $this->load->view('view_admin_kegiatan');
            }
        }
        
        public function tambah_kategori(){
            $plus               = 0;
            $initial_k          = 'K';
            $max_id_k           = $this->model_kegiatan->count_all_kategori() + $plus;
            $number_k           = str_pad($max_id_k + 1, 3, '0', STR_PAD_LEFT);
            $id_kategori        = $initial_k . $number_k;
            $check              = $this->uri->segment(2);
            $nama_kategori      = $this->input->post('nama_kategori');
            
            if( $id_kategori && $nama_kategori != ""){
                $data           = array('id_kategori' => $id_kategori, 'nama_kategori' => $nama_kategori);
                $this->model_kegiatan->tambah_kategori($data);
                $this->load->view('view_admin_kegiatan');
                return $plus + 1;     
            }else{ 
                $this->load->view('view_admin_kegiatan');
            }
        }
        
        public function edit_kegiatan(){
            $id_kegiatan        = $this->input->post('id_kegiatan');
            $jenis_kegiatan     = $this->input->post('jenis_kegiatan');
            $this->model_kegiatan->edit_kegiatan($id_kegiatan, $jenis_kegiatan);
            redirect(base_url().'admin/kegiatan');
        }
        
        public function edit_kategori(){
            $id_kategori        = $this->input->post('id_kategori');
            $nama_kategori      = $this->input->post('nama_kategori');
            $this->model_kegiatan->edit_kategori($id_kategori, $nama_kategori);
            redirect(base_url().'admin/kegiatan');
        }
        
        public function delete_kegiatan(){
            $id_kegiatan    = $this->input->post('id_kegiatan');
            $this->model_kegiatan->delete_kegiatan($id_kegiatan);
            redirect(base_url().'admin/kegiatan');
        }
        
        public function delete_all_kegiatan(){
            $this->model_kegiatan->delete_all_kegiatan();
            redirect(base_url().'admin/kegiatan');
        }
        public function delete_kategori(){
            $id_kategori    = $this->input->post('id_kategori');
            $this->model_kegiatan->delete_kategori($id_kategori);
            redirect(base_url().'admin/kegiatan');
        }
        
        public function delete_all_kategori(){
            $this->model_kegiatan->delete_all_kategori();
            redirect(base_url().'admin/kegiatan');
        }
        
    //Dokumen Per Kegiatran ------------------------------------------------------------------------------
    public function dokumen_per_kegiatan(){
        $data['insert_id_kegiatan'] = 'S001';
  		$this->load->view('view_admin_dokumen_per_kegiatan', $data);
	}
    public function jadwal_kegiatan(){
  		$this->load->view('view_admin_jadwal_kegiatan');
	}
    public function pilih_kategori(){
        $id         = $this->input->post('id_kategori');
        if( !$id ){ $data = array('message' => 'error'); die(json_encode($data)); }
        
        $kegiatan   = $this->model_dokumen->view_kegiatan_by_kategori( trim($id) );
    
        if( !$kegiatan || empty($kegiatan) ){ $data = array('message' => 'error'); die(json_encode($data)); }
        
        $html       = '';
        foreach($kegiatan as $row){
            $html  .= '
            <li>
                <a href="'.base_url().'admin/pilih_kegiatan/'.$row->id_kegiatan.'" class="pilih-kegiatan">
                <i class="glyphicon glyphicon-th-list"></i> '. $row->jenis_kegiatan . '</a>
            </li>
            ';
            $this->model_dokumen->view_data_per_kegiatan($row->id_kegiatan);
        }
        $data = array(
            'message'   => 'success',
            'html'      =>  $html,
        ); 
        die( json_encode($data) );
    }
    
    public function pilih_kegiatan($id_kegiatan){
        $data['insert_id_kegiatan'] = $this->uri->segment(3);
        $this->load->view('view_admin_dokumen_per_kegiatan',$data);
    }
    
    
    //Diagram ------------------------------------------------------------------------------------------
    public function diagram_kegiatan(){
  		$this->load->view('view_admin_diagram');
	}
    
    public function diagram_kategori(){
  		$this->load->view('view_admin_diagram_kategori');
	}
    
    public function diagram_notulensi_rapat(){
  		$this->load->view('view_admin_diagram_notulensi_rapat');
	}
}
