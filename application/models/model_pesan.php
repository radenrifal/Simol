<?php
	class Model_Pesan extends CI_Model{
	   /* Fungsi untuk otomatis tampil data */
        function get_email($nama_tujuan){
            if ( !$nama_tujuan ) return false;
            
            $this->db->select('email');
            $this->db->where(array('nip' => $nama_tujuan));
            $query = $this->db->get('tbl_datadiri');
            if ( $query->num_rows() == 0 ) return false;
    
            return $query->row();
        }
        
        public function insert_pesan($data){
            $this->db->insert('tbl_pesan', $data);
        }
        
        public function view_pesan(){
			$query = "SELECT * FROM tbl_pesan AS s INNER JOIN tbl_pengguna As p ON s.nip=p.nip WHERE status='Belum Dibaca'";
			return $this->db->query($query);
		}
        
        public function get_email_by_nip($nip){
            if( !$nip || $nip == "" ) return false;
			$sql     = "SELECT email FROM tbl_datadiri WHERE nip='".$nip."'";
            $query   = $this->db->query($sql);
			return $query->row();
		}
        //View Pesan Per Username
        public function view_pesan_per_username($username){
			$query = "SELECT * FROM (tbl_pesan AS s INNER JOIN tbl_pengguna As p ON s.nip=p.nip) 
                      INNER JOIN tbl_datadiri AS d ON p.nip=d.nip WHERE username='".$username."' GROUP BY waktu DESC";
			return $this->db->query($query);
		}
        
        public function view_pesan_per_username_admin($username){
			$query = "SELECT * FROM (tbl_pesan AS s INNER JOIN tbl_pengguna As p ON s.nip=p.nip) 
                      INNER JOIN tbl_datadiri AS d ON p.nip=d.nip WHERE username='".$username."' GROUP BY waktu DESC";
			return $this->db->query($query);
		}
        
        public function view_pesan_keluar_admin($username){
			$query = "SELECT * FROM (tbl_pesan AS s INNER JOIN tbl_pengguna As p ON s.nip=p.nip) 
                      INNER JOIN tbl_datadiri AS d ON p.nip=d.nip WHERE pengirim='".$username."' ORDER BY waktu DESC";
			return $this->db->query($query);
		}
        
        public function view_detail_pesan($username){
			$query = "SELECT * FROM (tbl_pesan AS d INNER JOIN tbl_pengguna AS p ON d.nip=p.nip)
                      INNER JOIN tbl_datadiri AS r ON p.nip=r.nip
                      WHERE username='".$username."' && status='Belum Dibaca' GROUP BY waktu DESC";
			return $this->db->query($query);
		}
        
        //Jumlah Username Pesan Baru
        public function jumlah_pesan_baru_per_username($username){
			$query = "SELECT * FROM (tbl_pesan AS s INNER JOIN tbl_pengguna AS p ON s.nip=p.nip) 
                      INNER JOIN tbl_datadiri AS d ON p.nip=d.nip WHERE username='".$username."' AND status='Belum Dibaca'";
			return $this->db->query($query);
		}
        
        public function pesan_baca($id_pesan){
            $query = "UPDATE tbl_pesan SET status='Dibaca' WHERE id_pesan=".$id_pesan;
            $this->db->query($query);
        }
        
        public function pesan_belum_dibaca($id_pesan){
            $query = "UPDATE tbl_pesan SET status='Belum Dibaca' WHERE id_pesan=".$id_pesan;
            $this->db->query($query);
        }
        
        /* template pesan */
        public function view(){
			$query = "SELECT * FROM tbl_template_pesan";
			return $this->db->query($query);
		}
        
        public function update($konten_isi){
            $query = "UPDATE tbl_template_pesan SET konten_pesan='".$konten_isi."'";
            $this->db->query($query);
        }
        
        public function delete_id_pesan($id_pesan){
            $query = "DELETE FROM tbl_pesan WHERE id_pesan='".$id_pesan."'";
            $this->db->query($query);
            
        }
        
        public function view_pesan_baca($id_pesan){
			$query = "SELECT * FROM (tbl_pesan AS s INNER JOIN tbl_pengguna As p ON s.nip=p.nip) 
                      INNER JOIN tbl_datadiri AS d ON p.nip=d.nip WHERE s.id_pesan='".$id_pesan."'";
			return $this->db->query($query);
		}
 
 
    }
?>