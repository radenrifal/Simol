<?php
	class Model_Diagram extends CI_Model{
	   
       public function view_diagram_kegiatan(){
            $query = "SELECT k.jenis_kegiatan, COUNT(d.id_kegiatan) AS jumlah 
                      FROM tbl_kegiatan AS k INNER JOIN tbl_dokumen AS d ON k.id_kegiatan=d.id_kegiatan
                      GROUP BY d.id_kegiatan";
            return $this->db->query($query);
       }
       
       public function view_diagram_kegiatan_filter($tahun){
            $query = "SELECT k.jenis_kegiatan, COUNT(d.id_kegiatan) AS jumlah 
                      FROM tbl_kegiatan AS k INNER JOIN tbl_dokumen AS d ON k.id_kegiatan=d.id_kegiatan
                      WHERE Year(waktu)='".$tahun."'
                      GROUP BY d.id_kegiatan";
            return $this->db->query($query);
       }
       
       public function view_tbl_dokumen(){
            $query = "SELECT YEAR(waktu) AS year FROM tbl_dokumen GROUP BY YEAR(waktu) DESC";
            return $this->db->query($query);
       }
       
       public function view_diagram_kategori(){
            $query = "SELECT i.nama_kategori, COUNT(k.id_kategori) AS jumlah 
                      FROM tbl_kategori AS i INNER JOIN tbl_kegiatan AS k ON i.id_kategori=k.id_kategori
                      GROUP BY k.id_kategori";
            return $this->db->query($query);
       }
       
       public function view_diagram_notulensi_rapat(){
            $query = "SELECT MONTH(tanggal_rapat) AS bulan, COUNT(id_notulensi) AS jumlah 
                      FROM tbl_notulensi_rapat                       
                      GROUP BY MONTH(tanggal_rapat)";
            return $this->db->query($query);
       }
       
       public function view_diagram_notulensi_rapat_filter($tahun){
            $query = "SELECT MONTH(tanggal_rapat) AS bulan, COUNT(id_notulensi) AS jumlah 
                      FROM tbl_notulensi_rapat
                      WHERE YEAR(tanggal_rapat)='".$tahun."'                       
                      GROUP BY MONTH(tanggal_rapat)";
            return $this->db->query($query);
       }
       
       public function view_tbl_notulensi_rapat(){
            $query = "SELECT YEAR(tanggal_rapat) AS year FROM tbl_notulensi_rapat GROUP BY YEAR(tanggal_rapat) DESC";
            return $this->db->query($query);
       }
    }
?>