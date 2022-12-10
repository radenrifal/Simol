<?PHP
	class Model_Beranda extends CI_Model{
        public function login($username, $password){
            $query  = "SELECT * FROM tbl_pengguna as a INNER JOIN tbl_datadiri as p ON a.nip = p.nip 
                       WHERE a.username='".$username."' AND a.password='".md5($password)."'";
            return $this->db->query($query);
        }
	}