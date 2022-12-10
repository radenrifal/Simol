<?php
	class Model_Kegiatan extends CI_Model{
		
		public function view_kegiatan(){
            $query  = "SELECT * FROM tbl_kegiatan AS k INNER JOIN tbl_kategori AS p ON p.id_kategori=k.id_kategori";
			return $this->db->query($query);
		}
        public function view_kategori(){
            $query  = "SELECT * FROM tbl_kategori";
			return $this->db->query($query);
		}
		
        function count_all(){
            $sql    = "SELECT COUNT(*) AS total FROM tbl_kegiatan";
            $query  = $this->db->query($sql);
            $count  = $query->row();
            
            return $count->total;
        }
        function count_all_kategori(){
            $sql    = "SELECT COUNT(*) AS total FROM tbl_kategori";
            $query  = $this->db->query($sql);
            $count  = $query->row();
            
            return $count->total;
        }
        
        public function tambah_kegiatan($data){
			$this->db->insert('tbl_kegiatan', $data);
		}
        public function tambah_kategori($data){
			$this->db->insert('tbl_kategori', $data);
		}
        public function edit_kegiatan($id_kegiatan, $jenis_kegiatan){
            $query = "UPDATE tbl_kegiatan SET jenis_kegiatan='".$jenis_kegiatan."' WHERE id_kegiatan='".$id_kegiatan."'";
			$this->db->query($query);
        }
        public function edit_kategori($id_kategori, $nama_kategori){
            $query = "UPDATE tbl_kategori SET nama_kategori='".$nama_kategori."' WHERE id_kategori='".$id_kategori."'";
			$this->db->query($query);
        }
        public function delete_kegiatan($id_kegiatan){
            $query = "DELETE FROM tbl_kegiatan WHERE id_kegiatan='".$id_kegiatan."'";
			$this->db->query($query);
        }
        public function delete_all_kegiatan(){
            $query = "TRUNCATE tbl_kegiatan";
			$this->db->query($query);
        }
        public function delete_kategori($id_kategori){
            $query = "DELETE FROM tbl_kategori WHERE id_kategori='".$id_kategori."'";
			$this->db->query($query);
        }
        public function delete_all_kategori(){
            $query = "TRUNCATE tbl_kategori";
			$this->db->query($query);
        }
    }
?>