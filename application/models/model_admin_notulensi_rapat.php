<?php

/**
 * @author Rheval
 * @copyright 2015
 */
	class Model_Admin_Notulensi_Rapat extends CI_Model {
		// Property -> Tipe data harus private
        public function get_by_id_pengirim($nip){
            $query      = "SELECT * FROM tbl_datadiri WHERE nip='".$nip."' ";
            return $this->db->query($query);
        }
        
        public function get_by_id_notulensi($id_notulensi){
            $query      = "SELECT * FROM tbl_notulensi_rapat AS n INNER JOIN tbl_datadiri AS d 
                           ON n.nip=d.nip 
                           WHERE id_notulensi='".$id_notulensi."' ";
            return $this->db->query($query);
        }
        //Admin
        //INSERT
        public function insert_notulensi_rapat($data_notulensi){
            $this->db->insert('tbl_notulensi_rapat', $data_notulensi);
        }
        
        public function view_all_notulensi(){
            $query      = "SELECT * FROM (tbl_notulensi_rapat AS n INNER JOIN tbl_pengguna AS p On n.nip=p.nip) INNER JOIN tbl_datadiri AS d
                           ON p.nip=d.nip GROUP BY id_notulensi DESC";
            return $this->db->query($query);
        }
        
        public function view_notulensi_per_nip($nip){
            $query      = "SELECT * FROM (tbl_notulensi_rapat AS n INNER JOIN tbl_pengguna AS p On n.nip=p.nip) INNER JOIN tbl_datadiri AS d
                           ON p.nip=d.nip
                           GROUP BY id_notulensi DESC
                           HAVING n.nip='".$nip."'
                           ORDER BY id_notulensi DESC";
            return $this->db->query($query);
        }
        
        public function jumlah_notulensi_per_username($username){
            $query      = "SELECT * FROM (tbl_notulensi_rapat AS n INNER JOIN tbl_pengguna AS p On n.nip=p.nip) INNER JOIN tbl_datadiri AS d
                           ON p.nip=d.nip
                           WHERE p.username='".$username."' AND n.status_notulensi='Gagal Diterima'";
            return $this->db->query($query);
        }
        
        public function update_notulensi_rapat($id_notulensi, $hari, $tanggal_rapat, $pembahasan, $penyelenggara, $tempat, $peserta, $notulis, $file, $status_notulensi){
			$query       = "UPDATE tbl_notulensi_rapat 
                            SET 
                            hari='".$hari."',
                            tanggal_rapat='".$tanggal_rapat."', 
                            pembahasan='".$pembahasan."', 
                            penyelenggara='".$penyelenggara."',
                            tempat='".$tempat."',
                            peserta='".$peserta."',
                            notulis='".$notulis."',
                            file_notulensi='".$file."',
                            status_notulensi='".$status_notulensi."'
                            WHERE id_notulensi='".$id_notulensi."'";
			$this->db->query($query);
		}
        
        public function delete_detail_notulensi(){
            $query      = "TRUNCATE TABLE tbl_notulensi_rapat";
            return $this->db->query($query);
        }
        
        public function update_status_notulensi($id_notulensi, $status_notulensi){
			$query       = "UPDATE tbl_notulensi_rapat SET status_notulensi='".$status_notulensi."'
                            WHERE id_notulensi='".$id_notulensi."'";
			$this->db->query($query);
		}
        
        public function delete_notulensi_rapat($id_notulensi_rapat){
			$query       = "DELETE FROM tbl_notulensi_rapat WHERE id_notulensi='".$id_notulensi_rapat."'";
			$this->db->query($query);
		}
        
        public function jumlah_notulensi_rapat(){
			$query = "SELECT * FROM tbl_notulensi_rapat WHERE status_notulensi='Proses'";
			return $this->db->query($query);
		}
        
        public function view_detail_notulensi_rapat(){
			$query = "SELECT * FROM (tbl_notulensi_rapat AS n INNER JOIN tbl_pengguna AS p ON n.nip=p.nip)
                      INNER JOIN tbl_datadiri AS r ON p.nip=r.nip
                      WHERE status_notulensi='Proses' ORDER BY id_notulensi DESC";
			return $this->db->query($query);
		}
        
        public function view_all_notulensi_per_rows($id_notulensi){
			$query = "SELECT * FROM (tbl_notulensi_rapat AS n INNER JOIN tbl_pengguna AS p ON n.nip=p.nip)
                      INNER JOIN tbl_datadiri AS r ON p.nip=r.nip
                      WHERE n.id_notulensi='".$id_notulensi."'";
			return $this->db->query($query);
		}
    }
?>