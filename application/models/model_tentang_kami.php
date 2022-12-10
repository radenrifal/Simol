<?php
	class Model_Tentang_Kami extends CI_Model{
        public function view(){
			$query = "SELECT * FROM tbl_tentangkami";
			return $this->db->query($query);
		}
    }
?>