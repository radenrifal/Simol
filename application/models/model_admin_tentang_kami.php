<?php
	class Model_Admin_Tentang_Kami extends CI_Model{
	   
		public function view(){
			$query = "SELECT * FROM tbl_tentangkami";
			return $this->db->query($query);
		}
        
        public function update($konten_isi){
            $sql = "UPDATE tbl_tentangkami SET konten='".$konten_isi."'";
            $this->db->query($sql);
        }
    }
?>