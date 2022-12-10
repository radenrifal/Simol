/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 
$(document).ready(function(){

    //==================================================================================================//
    //---------------------------------------- Custom Handling -----------------------------------------//
    //==================================================================================================//
    
    // #kegiatan = ambil dari atribut select box Kegiatan yang di view_admin_inkubasi_teknologi.php
    $('#kegiatan').change(function(){
        // Set variabel url untuk AJAX url nya, ambil dari atribut data-url
        // $(this) = $('#kegiatan'), bisa pake keduanya
        // Klo ambil atribut data, bisa pake langsung .data('url') atau .attr('data-url')
        var url = $(this).data('url');
        // Set variabel val untuk value yg di kirim ke URL
        var val = $(this).val();
        
        $.ajax({
            type : "POST",                      // Tipe AJAX POST
            url  : url,                         // AJAX url yang di set di atas
            data : {                            // Set data yang dikirim ke URL nya
                'id_kegiatan' : val,            // nama variabel : valuenya   
            },
            success: function(response) {       // Return/Respon dari AJAX saat sukses
                // Variabel 'response' di dalam function berisikan return value dari AJAX bertipe JSON
                // Response di atas di parsing terlebih dahulu untuk digunakan pada filter dibawah
                response = $.parseJSON(response);
                
                // Cek pesan/message dari respon yang sudah di parsing, digunakan 'response.message'
                if(response.message == 'success'){      // Jika respon message success
                    // Set input value #id_dokumen dengan id_dokumen dari respon, digunakan 'response.id'
                    $('#id_dokumen').val(response.id);
                }else{                                  // Jika respon message error
                    // Set input value #id_dokumen menjadi empty/kosong
                    $('#id_dokumen').val('');
                }
            }
		});
    });
    
});
