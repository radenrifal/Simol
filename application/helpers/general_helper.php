<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('generate_id_dokumen' || 'generate_email')){
    /**
     * Generate ID Dokumen
     * @return Mixed, Boolean false if invalid id kegiatan, otherwise string of dokumen id
     */
    function generate_id_dokumen($plus=0){
        // Set varial CI sebagai instan akses, pengganti $this yang ada di controller
        $CI =& get_instance();
        
        // Set inisial id dokumen
        $initial        = 'D';
        // Set maksimal id dari hasil total dokumen yang ada, variabel $plus adalah tambahan value untuk iterasi
        // Perhitungan total dokumen ada di model_dokumen dengan function count_all
        $max_id         = $CI->model_dokumen->count_all() + $plus;
        // Set number id_dokumen 3 digit, misal 001
        $number         = str_pad($max_id + 1, 3, '0', STR_PAD_LEFT);
        // Set id dokumen dengan menggabungkan inisial dengan number, misal jadi D001
        $id_dokumen     = $initial . $number;
        // Cek apakah id_dokumen sudah ada atau belum
        // Terdapat di model_dokumen dengan function get_dokumen, berisikan parameter $id_dokumen di atas
        $check          = $CI->model_dokumen->get_dokumen($id_dokumen);

        if( $check ){                       // Jika hasil cek ternyata ada id_dokumen nya
            // Kembali panggil fungsi generate_id_dokumen() berisikan parameter $plus + 1
            // Misal $plus di atas = 1, kemudian akan di lanjutkan $plus nya menjadi 2, dst
            return generate_id_dokumen($plus + 1);     
        }else{                              // Jika hasil cek ternyata tidak ada id_dokumen nya
            // Mengembalikan/return id_dokumen yang available/tersedia
            return $id_dokumen;
        }
    }
    
    function generate_email($nama_tujuan){
        // Set varial CI sebagai instan akses, pengganti $this yang ada di controller
        $CI =& get_instance();
        
        // Cek apakah id_dokumen sudah ada atau belum
        // Terdapat di model_dokumen dengan function get_dokumen, berisikan parameter $id_dokumen di atas
        $email          = $CI->model_pesan->get_email($nama_tujuan);
        
        if( !$email || empty($email) ) return false;
        
        return $email->email;
    }
}