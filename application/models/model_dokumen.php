<?php
	class Model_Dokumen extends CI_Model{
		function count_all(){
            $sql    = "SELECT COUNT(*) AS total FROM tbl_dokumen";
            $query  = $this->db->query($sql);
            $count  = $query->row();
            
            return $count->total;
        }
        
        /* Fungsi untuk otomatis tampil data */
        function get_dokumen($id_dokumen){
            if ( !$id_dokumen ) return false;
            
            $query = $this->db->get_where('tbl_dokumen', array('id_dokumen' => $id_dokumen));
            if ( !$query->num_rows() )
                return false;
    
            foreach ( $query->result() as $row ) {
                $dokumen = $row;
            }
            
            return $id_dokumen;
        }
		
        function get_all_dokumen(){
            $query = $this->db->get('tbl_dokumen');
            if( $query ) return $query->result();
            return false;
        }  
        
        function save_dokumen( $data ){
            if(!$data || empty($data)) return false;
            
            $query  = $this->db->insert('tbl_dokumen', $data);
            if( $query ) {
                $id = $this->db->insert_id();
                return $id;
            };
            
            return false;
        }
        
        public function view_kegiatan(){
            $query = "SELECT * FROM tbl_kegiatan";
            return $this->db->query($query);
		}
        
        /* Contoh untuk insert/save data dokumen
         * Set data array berisikan field dari tabel dengan value nya
        $data = array(
            'id_dokumen'        => 'D001',
            'id_kegiatan'       => 'K001',
            'judul_dokumen'     => 'Judul Dokumen',
            'file_dokumen'      => 'dokumen.docx',
            'pukul'             => date('H:i:s'),
            'tanggal'           => date('Y-m-d')
        );
        $dokumen = $this->model_dokumen->save_dokumen($data);
        */
        /* Model inkubasi teknologi fungsi 
        function tambah_dokumen($id_kegiatan, $id_dokumen, $judul_dokumen){
            $query  = "INSERT INTO tbl_dokumen(id_dokumen,id_kegiatan,judul_dokumen,file_dokumen,waktu)
                       VALUES ('".$id_kegiatan."','".$id_dokumen."','".$judul_dokumen."','DATETIME: Auto CURDATE()',CURDATE())";
        }
        */
        
        public function tambah_dokumen($data){
			$this->db->insert('tbl_dokumen', $data);
		}
        
        public function view_all_dokumen(){
            $query      = "SELECT * FROM ((tbl_kegiatan AS k INNER JOIN tbl_dokumen AS d
                           ON k.id_kegiatan=d.id_kegiatan) INNER JOIN tbl_pengguna AS p ON d.nip = p.nip) INNER JOIN tbl_datadiri AS t ON p.nip=t.nip
                           ORDER BY waktu DESC";
            return $this->db->query($query);
        }
        
        public function view_all_dokumen_per_rows($id_dokumen){
            $query      = "SELECT * FROM ((tbl_kegiatan AS k INNER JOIN tbl_dokumen AS d
                           ON k.id_kegiatan=d.id_kegiatan) INNER JOIN tbl_pengguna AS p ON d.nip = p.nip) INNER JOIN tbl_datadiri AS t ON p.nip=t.nip
                           WHERE d.id_dokumen='".$id_dokumen."'
                           ORDER BY waktu DESC";
            return $this->db->query($query);
        }
        
        public function delete_per_username($id_dokumen_delete){
			$query       = "DELETE FROM tbl_dokumen WHERE id_dokumen='".$id_dokumen_delete."'";
			$this->db->query($query);
		}
        
        /* Model Identifikasi Teknologi*/
        public function view_data_per_kegiatan($id_kegiatan=''){
            $query      = "SELECT * FROM ((tbl_kegiatan AS k INNER JOIN tbl_dokumen AS d
                           ON k.id_kegiatan=d.id_kegiatan) INNER JOIN tbl_pengguna AS p ON d.nip = p.nip) INNER JOIN tbl_datadiri AS t ON p.nip=t.nip
                           WHERE k.id_kegiatan='".$id_kegiatan."'";
            return $this->db->query($query);
        }
        
        public function delete_dokumen_per_kegiatan($id_dokumen_delete){
			$query       = "DELETE FROM tbl_dokumen WHERE id_dokumen='".$id_dokumen_delete."'";
			$this->db->query($query);
		}
        
        public function delete_all_identifikasi_teknologi(){
            $query      = "DELETE FROM tbl_dokumen WHERE id_kegiatan='K001'";
            $this->db->query($query);
        }
        
        public function delete_detail_dokumen(){
            $query      = "TRUNCATE TABLE tbl_dokumen";
            return $this->db->query($query);
        }
        
        public function update_dokumen($id_dokumen, $judul_dokumen, $file_dokumen='', $status_dokumen=''){
			$query       = "UPDATE tbl_dokumen SET judul_dokumen = '".$judul_dokumen."', waktu=NOW() ";
            if( !empty($file_dokumen) ) { $query .= ", file_dokumen='".$file_dokumen."' "; }
            if( !empty($status_dokumen) ) { $query .= ", status_dokumen='".$status_dokumen."' "; }
            $query      .= "WHERE id_dokumen='".$id_dokumen."'";
			$this->db->query($query);
		}
        
        public function update_status_dokumen($id_dokumen, $status_dokumen){
			$query       = "UPDATE tbl_dokumen SET status_dokumen = '".$status_dokumen."'
                            WHERE id_dokumen='".$id_dokumen."'";
			$this->db->query($query);
		}
        
        public function jumlah_dokumen(){
			$query = "SELECT * FROM tbl_dokumen WHERE status_dokumen='Proses'";
			return $this->db->query($query);
		}
        
        public function jumlah_dokumen_per_username($username){
			$query = "SELECT * FROM (tbl_dokumen AS d INNER JOIN tbl_pengguna AS p ON d.nip=p.nip) 
                      INNER JOIN tbl_datadiri AS r ON p.nip=r.nip WHERE username='".$username."' AND status_dokumen='Gagal Diterima'";
			return $this->db->query($query);
		}
        
        public function view_detail_dokumen(){
			$query = "SELECT * FROM (tbl_dokumen AS d INNER JOIN tbl_pengguna AS p ON d.nip=p.nip)
                      INNER JOIN tbl_datadiri AS r ON p.nip=r.nip
                      WHERE status_dokumen='Proses'
                      ORDER BY d.waktu DESC";
			return $this->db->query($query);
		}
        
        public function view_dokumen_per_nip($nip){
            $query      = "SELECT * FROM ((tbl_kegiatan AS k INNER JOIN tbl_dokumen AS d
                           ON k.id_kegiatan=d.id_kegiatan) INNER JOIN tbl_pengguna AS p ON d.nip = p.nip)
                           INNER JOIN tbl_datadiri AS r ON p.nip=r.nip WHERE p.nip='".$nip."'
                           ORDER BY id_dokumen DESC";
            return $this->db->query($query);
        }
        
        public function cek_by_id_dokumen($id_dokumen){
            $query      = "SELECT * FROM tbl_dokumen WHERE id_dokumen='".$id_dokumen."'";
            return $this->db->query($query);
        }
        
        public function cek_by_file_dokumen($file_dokumen){
            $query      = "SELECT * FROM tbl_dokumen WHERE file_dokumen='".$file_dokumen."'";
            return $this->db->query($query);
        }
        
        /* Dokumen Per Kegiatan*/
        public function view_dokumen_per_kegiatan($id_kategori){
            $query      = "SELECT * FROM tbl_kategori AS k INNER JOIN tbl_kegiatan As p ON k.id_kategori=p.id_kategori
                           WHERE k.id_kategori='".$id_kategori."'";
            return $this->db->query($query);
        }
        
        /* Dokumen Per Kegiatan*/
        public function view_data_dokumen_per_kegiatan($id_kegiatan){
            $query      = "SELECT * FROM ((tbl_kegiatan AS k INNER JOIN tbl_dokumen AS d
                           ON k.id_kegiatan=d.id_kegiatan) INNER JOIN tbl_pengguna AS p ON d.nip = p.nip) INNER JOIN tbl_datadiri AS t ON p.nip=t.nip
                           WHERE k.id_kegiatan='".$id_kegiatan."'";
            return $this->db->query($query);
        }
        
        public function view_kegiatan_by_kategori($id_kategori){
            if( !$id_kategori || empty($id_kategori) ) return false;
            $sql    = "SELECT * FROM tbl_kegiatan WHERE id_kategori LIKE '".$id_kategori."'";
            $query  = $this->db->query($sql);
            $result = $query->result();
            
            return $result;
        }
        
        public function view_id_kegiatan(){
            $query      = "SELECT * FROM tbl_kategori";
            return $this->db->query($query);
        }
        
        public function get_by_id_pengirim($nip){
            $query      = "SELECT * FROM tbl_datadiri WHERE nip='".$nip."' ";
            return $this->db->query($query);
        }
        
        public function get_by_id_dokumen($id_dokumen){
            $query      = "SELECT * FROM tbl_dokumen AS d INNER JOIN tbl_datadiri AS i 
                           ON d.nip=i.nip
                           WHERE id_dokumen='".$id_dokumen."' ";
            return $this->db->query($query);
        }
        
        
        
        public function get_year_dokumen(){
            $sql        = "SELECT YEAR(waktu) AS year FROM tbl_dokumen GROUP BY YEAR(waktu)";
            $query      = $this->db->query($sql);
            return $query->result();
        }
        
        public function get_dokumen_per_week($week, $month, $year, $id_kegiatan){
            if( !$week ) return false;
            if( !$month ) return false;
            if( !$year ) return false;
            if( !$id_kegiatan ) return false;
            
            $sql        = 'SELECT WEEK(waktu, 5) - WEEK(DATE_SUB(waktu, INTERVAL DAYOFMONTH(waktu) -1 DAY), 5) + 1 AS minggu FROM tbl_dokumen 
                           WHERE WEEK(waktu, 5) - WEEK(DATE_SUB(waktu, INTERVAL DAYOFMONTH(waktu) -1 DAY), 5) + 1 = ' . $week . ' 
                           AND MONTH(waktu) = '.$month.' AND YEAR(waktu) = '.$year.' AND id_kegiatan LIKE "'.$id_kegiatan.'"';
            $query      = $this->db->query($sql);
            return $query->num_rows();
        }
        
        public function get_dokumen_per_user($month, $year, $nip, $id_kegiatan){
            if( !$month ) return false;
            if( !$year ) return false;
            if( !$nip ) return false;
            if( !$id_kegiatan ) return false;
            
            $sql        = 'SELECT id_dokumen FROM tbl_dokumen 
                           WHERE MONTH(waktu) = '.$month.' 
                           AND YEAR(waktu) = '.$year.' 
                           AND nip = "'.$nip.'" 
                           AND id_kegiatan LIKE "'.$id_kegiatan.'"';
            $query      = $this->db->query($sql);
            return $query->num_rows();
        }
        
        public function get_dokumen_per_kegiatan_total($month, $year, $id_kegiatan){
            if( !$month ) return false;
            if( !$year ) return false;
            if( !$id_kegiatan ) return false;
            
            $sql        = 'SELECT id_dokumen FROM tbl_dokumen 
                           WHERE MONTH(waktu) = '.$month.' 
                           AND YEAR(waktu) = '.$year.' 
                           AND id_kegiatan LIKE "'.$id_kegiatan.'"';
            $query      = $this->db->query($sql);
            return $query->num_rows();
        }
        
        public function get_kegiatan_by_id($id_kegiatan){
            if( !$id_kegiatan ) return false;
            $this->db->where('id_kegiatan', $id_kegiatan);
            $query = $this->db->get('tbl_kegiatan');
        
            if( $query->num_rows() == 0 ) return false;
            return $query->row();
        }
    }
?>