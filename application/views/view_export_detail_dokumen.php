<html>

    <body>
        <h3 align="center">Laporan Kegiatan Bidang INATEK Pusat Inovasi LIPI</h3>
        <table>
            <thead>
                <tr color="white">
                    <th align="center" bgcolor="#3C8DBC"><b>No</b><br /></th>
                    <th align="center" bgcolor="#3C8DBC"><b>Nama Kegiatan</b></th>
                    <th align="center" bgcolor="#3C8DBC"><b>Judul Dokumen</b></th>
                    <th align="center" bgcolor="#3C8DBC"><b>File Dokumen</b></th>
                    <th align="center" bgcolor="#3C8DBC"><b>Waktu</b></th>
                    <th align="center" bgcolor="#3C8DBC"><b>Status Dokumen</b></th>
                    <th align="center" bgcolor="#3C8DBC"><b>Pengirim</b></th>
                </tr>
            </thead>
            <tbody>
                <br />
            <?PHP
       	        $query = $this->model_dokumen->view_all_dokumen();
                $no    = 1;
                foreach($query->result() as $row):
                $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", 
				"Juli", "Agustus", "September", "Oktober", "November", "Desember");

        			$tahun = substr($row->waktu, 0, 4);
        			$bulan = substr($row->waktu, 5, 2);
        			$tgl   = substr($row->waktu, 8, 2);
                    $jam   = substr($row->waktu, 11, 8);
            	 
        	    $waktu = $tgl . " " . $BulanIndo[(int)$bulan-1] . " " . $tahun . " " . $jam;
            ?>
                <tr>
                    <td align="center" <?php if($row->status_dokumen == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                        <?php echo $no++;?>
                    </td>  
                    <td <?php if($row->status_dokumen == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                        &nbsp;<?php echo $row->jenis_kegiatan;?>
                    </td>
                    <td <?php if($row->status_dokumen == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                        &nbsp;<?php echo $row->judul_dokumen;?>
                    </td>
                    <td <?php if($row->status_dokumen == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                        &nbsp;<?php echo $row->file_dokumen;?>
                    </td>
                    <td align="center" <?php if($row->status_dokumen == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                        <?php echo $waktu;?>
                    </td>
                    <td<?php if($row->status_dokumen == 'Gagal Diterima') echo ' style="color:#4B646F;"'; ?>>
                        <?php echo $row->status_dokumen;?>
                    </td>
                    <td>&nbsp;<?php echo $row->nama;?></td>
                </tr>
            <?PHP
           	    endforeach;
            ?>
            </tbody>
        </table>
    </body>
</html>
