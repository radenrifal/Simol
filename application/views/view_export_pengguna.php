<html> 
    <body>
        <h3 align="center">Pengguna Monitoring Laporan Bidang INATEK Pusat Inovasi LIPI</h3>
        <table >
            <thead>
                <tr color="white">
                    <th align="center" bgcolor="#3C8DBC"><b>No.</b></th>
                    <th align="center" bgcolor="#3C8DBC"><b>NIP</b></th>
                    <th align="center" bgcolor="#3C8DBC"><b>Nama Lengkap</b></th>
                    <th align="center" bgcolor="#3C8DBC"><b>Jabatan</b></th> 
                    <th align="center" bgcolor="#3C8DBC"><b>Alamat</b></th>
                    <th align="center" bgcolor="#3C8DBC"><b>Tempat Tanggal Lahir</b></th>
                    <th align="center" bgcolor="#3C8DBC"><b>Agama</b></th>
                    <th align="center" bgcolor="#3C8DBC"><b>Status Perkawinan</b></th>
                    <th align="center" bgcolor="#3C8DBC"><b>Nomor HP</b></th>
                    <th align="center" bgcolor="#3C8DBC"><b>Email</b></th>
                </tr>
            </thead>
            <tbody>
                <br />
            <?PHP
               	$query = $this->model_admin_pengguna->view_pengguna();
                $no    = 1;
                foreach($query->result() as $row):
                $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
	 
            	$tahun = substr($row->tanggal_lahir, 0, 4);
            	$bulan = substr($row->tanggal_lahir, 5, 2);
            	$tgl   = substr($row->tanggal_lahir, 8, 2);
            	 
            	$tanggallahir = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
                
            ?>
                <tr>
                    <td align="center"><?php echo $no++; ?></td>
                    <td><?php echo $row->nip?></td>  
                    <td><?php echo $row->nama?></td>
                    <td><?php echo $row->jabatan?></td>
                    <td><?php echo $row->alamat?></td>
                    <td><?php echo $tanggallahir?></td>
                    <td><?php echo $row->agama?></td>
                    <td><?php echo $row->status_perkawinan?></td>
                    <td><?php echo $row->no_hp?></td>
                    <td><?php echo $row->email?></td>
                </tr>
            <?PHP
           	    endforeach;
            ?>
            </tbody>
        </table>
    </body>
</html>
