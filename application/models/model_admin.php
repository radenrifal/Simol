<?php

/**
 * @author Rheval
 * @copyright 2015
 */
	class Model_Admin extends CI_Model {
		// Method
		public function view_admin($username, $password, $status_pengguna){
			$query = "SELECT * FROM tbl_pengguna as a INNER JOIN tbl_datadiri as p ON a.nip = p.nip 
                      WHERE a.username='".$username."' AND a.password='".md5($password)."' AND a.status_pengguna='".$status_pengguna."'";
			
			return $this->db->query($query);
		}
    }
?>