<?php
	class Model_Profil extends CI_Model{
	
        public function view_profil($username){
			$query = "SELECT * 
                    FROM tbl_pengguna AS p INNER JOIN tbl_datadiri AS d On p.nip=d.nip
                    WHERE p.username='".$username."'";
			
			return $this->db->query($query);
		}  
        
        public function view_profil_detail(){
			$query = "SELECT * FROM tbl_datadiri";
			return $this->db->query($query);
		}
        
        public function update_datadiri($id_datadiri, $nip, $nama, $jenis_kelamin, $jabatan, $alamat, $tempat_lahir, $tanggal_lahir, 
                                        $agama, $status_perkawinan, $no_hp, $email){
            $query = "UPDATE tbl_datadiri 
                      SET
                      nip='".$nip."',
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
                      WHERE id_datadiri='".$id_datadiri."'";
                      
            $this->db->query($query);
        }
        
    }
?>