<?php

/**
 * @author Rheval
 * @copyright 2015
 */
	class Model_Admin_Pengguna extends CI_Model {
		// Property -> Tipe data harus private
        
        //Admin
        //INSERT
        public function tambah_pengguna($data_pengguna){
            $this->db->insert('tbl_pengguna', $data_pengguna);
        }
        public function tambah_datadiri($data_datadiri){
            $this->db->insert('tbl_datadiri', $data_datadiri);
        }
        
        public function view_pengguna(){
            $query      = "SELECT * FROM tbl_pengguna AS p INNER JOIN tbl_datadiri AS d ON p.nip=d.nip";
            return $this->db->query($query);
        }
        
        public function view_pengguna_per_pengguna($nama){
            $query      = "SELECT * FROM tbl_pengguna AS p INNER JOIN tbl_datadiri AS d ON p.nip=d.nip
                           WHERE username<>'".$nama."'";
            return $this->db->query($query);
        }
        
        public function view_validasi_pengguna($nip){
            $query      = "SELECT * FROM tbl_pengguna AS p INNER JOIN tbl_datadiri AS d ON p.nip=d.nip
                           WHERE p.nip='".$nip."'";
            return $this->db->query($query);
        }
        
        public function view_detail_pengguna($detail_pengguna){
            $query      = "SELECT * FROM tbl_pengguna AS p INNER JOIN tbl_datadiri AS d ON p.nip=d.nip WHERE p.nip='".$detail_pengguna."'";
            return $this->db->query($query);
        }
        
        public function delete_pengguna($delete_pengguna){
            $query      = "DELETE FROM tbl_pengguna WHERE nip='".$delete_pengguna."'";
            $this->db->query($query);
        }
        public function delete_pengguna_datadiri($delete_pengguna_datadiri){
            $query      = "DELETE FROM tbl_datadiri WHERE nip='".$delete_pengguna_datadiri."'";
            $this->db->query($query);
        }
        
        public function delete_all_pengguna(){
            $query      = "TRUNCATE TABLE tbl_pengguna";
            $this->db->query($query);
        }
        public function delete_all_pengguna_datadiri(){
            $query      = "TRUNCATE TABLE tbl_datadiri";
            $this->db->query($query);
        }
        
        public function view_file_image($file_image){
    		$query      = "SELECT * FROM tbl_pengguna WHERE file_image='".$file_image."'";
            return $this->db->query($query);
    	}
        
        public function update_datadiri($nip_tmp, $nama, $jabatan, $jenis_kelamin, $alamat, $tempat_lahir, $tanggal_lahir, $agama, $status_perkawinan, $no_hp, $email){
            $query      = "UPDATE tbl_datadiri
                           SET
                           nama='".$nama."',
                           jenis_kelamin='".$jenis_kelamin."',
                           jabatan='".$jabatan."',
                           alamat='".$alamat."',
                           tempat_lahir='".$tempat_lahir."',
                           tanggal_lahir='".$tanggal_lahir."',
                           agama='".$agama."',
                           status_perkawinan='".$status_perkawinan."',
                           no_hp='".$no_hp."',
                           email='".$email."'
                           WHERE nip='".$nip_tmp."'";
                           
            $this->db->query($query);
        }
        public function update_pengguna($nip_tmp, $status_pengguna){
            $query      = "UPDATE tbl_pengguna
                           SET
                           status_pengguna='".$status_pengguna."'
                           WHERE nip='".$nip_tmp."'";
                           
            $this->db->query($query);
        }
        
        public function jumlah_pengguna(){
			$query = "SELECT * FROM tbl_pengguna";
			return $this->db->query($query);
		}
        
        public function update_username_password($password_baru, $username, $nip){
			$sql = "UPDATE tbl_pengguna 
					SET password='".$password_baru."', username='".$username."'					
					WHERE nip='".$nip."'";
					
			return $this->db->query($sql);
		}
        
        public function cek_by_nip($nip){
			$sql = "SELECT * FROM tbl_pengguna WHERE nip='".$nip."'";
			return $this->db->query($sql);
		}
    }
?>