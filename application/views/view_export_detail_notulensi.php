<html>

    <body>
        <h3 align="center">Laporan Monitoring Notulensi Rapat Bidang INATEK Pusat Inovasi LIPI</h3>
        <table>
            <thead>
                <tr color="white">
                    <th align="center" bgcolor="#3C8DBC"><b>No</b><br /></th>
                    <th align="center" bgcolor="#3C8DBC"><b>Pengirim</b></th>
                    <th align="center" bgcolor="#3C8DBC"><b>Pembahasan</b></th>
                    <th align="center" bgcolor="#3C8DBC"><b>Penyelenggara</b></th>
                    <th align="center" bgcolor="#3C8DBC"><b>Tempat</b></th>
                    <th align="center" bgcolor="#3C8DBC"><b>Notulis</b></th>
                    <th align="center" bgcolor="#3C8DBC"><b>Waktu</b></th>
                    <th align="center" bgcolor="#3C8DBC"><b>Status</b></th>
                    <th align="center" bgcolor="#3C8DBC"><b>Ket.</b></th>
                </tr>
            </thead>
            <tbody>
                <br />
            <?PHP
       	        $query = $this->model_admin_notulensi_rapat->view_all_notulensi();
                $no    = 1;
                foreach($query->result() as $row):
                $tanggal_rapat = $row->tanggal_rapat;
                $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", 
				"Juli", "Agustus", "September", "Oktober", "November", "Desember");

        			$tahun = substr($row->tanggal_rapat, 0, 4);
        			$bulan = substr($row->tanggal_rapat, 5, 2);
        			$tgl   = substr($row->tanggal_rapat, 8, 2);
                
        	    $tanggal = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
            ?>
                <tr>
                    <td<?php if($row->status_notulensi == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                        <center><?php echo $no++; ?></center>
                    </td>
                    <td<?php if($row->status_notulensi == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                        <?php echo $row->nama; ?></td>
                    <input type="hidden" id="nama_<?php echo $row->id_notulensi; ?>" 
                    value="<?php echo $row->nama; ?>" />
                    <td<?php if($row->status_notulensi == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                        <?php echo $row->hari.', '.$tanggal?></td>
                    <input type="hidden" id="hari_<?php echo $row->id_notulensi; ?>" 
                    value="<?php echo $row->hari; ?>" />
                    <input type="hidden" id="tanggal_rapat_<?php echo $row->id_notulensi; ?>" 
                    value="<?php echo $row->tanggal_rapat; ?>" />
                    <td<?php if($row->status_notulensi == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                        <?php echo $row->pembahasan?></td>
                    <input type="hidden" id="pembahasan_<?php echo $row->id_notulensi; ?>" 
                    value="<?php echo $row->pembahasan; ?>" />   
                    <td<?php if($row->status_notulensi == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                        <?php echo $row->penyelenggara?></td>
                    <input type="hidden" id="penyelenggara_<?php echo $row->id_notulensi; ?>" 
                    value="<?php echo $row->penyelenggara; ?>" />
                    <td<?php if($row->status_notulensi == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                        <?php echo $row->tempat?></td>
                    <input type="hidden" id="tempat_<?php echo $row->id_notulensi; ?>" 
                    value="<?php echo $row->tempat; ?>" />
                    <input type="hidden" id="peserta_<?php echo $row->id_notulensi; ?>" 
                    value="<?php echo $row->peserta; ?>" />
                    <td<?php if($row->status_notulensi == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                        <?php echo $row->notulis?></td>
                    <input type="hidden" id="notulis_<?php echo $row->id_notulensi; ?>" 
                    value="<?php echo $row->notulis; ?>" />
                    <td<?php if($row->status_notulensi == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                        <?php if($row->status_notulensi == 'Diterima'){
                        ?>
                        <span class="label1 label-success label-sm"><?php echo $row->status_notulensi; ?></span>
                        <?php
                            }elseif($row->status_notulensi == 'Proses'){
                        ?>
                        <span class="label1 label-info label-sm"><?php echo $row->status_notulensi; ?></span>
                        <?php
                            }elseif($row->status_notulensi == 'Gagal Diterima'){
                        ?>
                        <span class="label1 label-danger label-sm"><?php echo $row->status_notulensi; ?></span>
                        <?php
                            }elseif($row->status_notulensi == 'Dalam Pengecekan'){
                        ?>
                        <span class="label1 label-warning label-sm"><?php echo $row->status_notulensi; ?></span>
                        <?php } ?>
                    </td>
                    <td<?php if($row->status_notulensi == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                        <?php if($row->status_notulensi == 'Diterima'){?> Selesai <?php }?>
                        <?php if($row->status_notulensi == 'Gagal Diterima'){?> Perbaiki <?php }?> 
                    </td>
                </tr>
            <?PHP
           	    endforeach;
            ?>
            </tbody>
        </table>
    </body>
</html>
