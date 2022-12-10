<html>
    <head>
        <title>Laporan Kegiatan</title>
        
    </head>
    
    
    <body>
    <?php
        $year       = $this->uri->segment(4);
        $month      = $this->uri->segment(5);
        
        $kategori       = array();
        $kategori       = $this->model_dokumen->view_id_kegiatan()->result();
        $users          = array();
        $users          = $this->model_admin_pengguna->view_pengguna()->result();
        //$users      = $this->session->userdata('users');
        //print_r($users); die();
    ?>
        <table class="table table-bordered table-striped" align="center">
            <thead>
                <tr>
                    <th rowspan="2" style="text-align: center; vertical-align: middle;">No</th>
                    <th rowspan="2" style="text-align: center; vertical-align: middle;">Nama Kegiatan</th>
                    <th colspan="4" style="text-align: center;">Minggu</th>
                    <th style="text-align: center;" <?php echo ( !empty($users) ? 'colspan="'. round( count($users) /* - 1 */ ) .'"' : '' ); ?>>Personel</th>
                    <th rowspan="2" style="text-align: center; vertical-align: middle;">Total</th>
                </tr>
                <tr>
                    <th style="text-align: center; vertical-align: middle;">1</th>
                    <th style="text-align: center; vertical-align: middle;">2</th>
                    <th style="text-align: center; vertical-align: middle;">3</th>
                    <th style="text-align: center; vertical-align: middle;">4</th>
                    <?php if( !empty($users) ): ?>
                        <?php foreach($users as $usr): ?>
                            <?php if($usr->status_pengguna != "admin"): ?>
                                <th><?php echo ucwords(strtolower($usr->nama)); ?></th>
                            <?php endif ?>
                        <?php endforeach ?>
                    <?php else: ?>
                        <th style="text-align: center;">Personel</th>
                    <?php endif ?>
                </tr>
            </thead>
            <tbody>
                
                <?php
                    if( !empty($kategori) ): 
                ?>
                    <?php $i = 1; ?>
                    <?php foreach($kategori as $kat): ?>
                        <tr>
                            <td style="background-color: #E3F0F7; font-weight: bold; text-align: center;"><?php echo $i; ?></td>
                            <td style="background-color: #E3F0F7; font-weight: bold;" colspan="<?php echo round(7 + count($users) /* - 1 */); ?>"><?php echo $kat->nama_kategori; ?></td>
                        </tr>
                        <?php $kegiatan = $this->model_dokumen->view_kegiatan_by_kategori($kat->id_kategori); ?>
                        <?php if( !empty($kegiatan) ): ?>
                            <?php foreach($kegiatan as $keg): ?>
                                <?php
                                    $laporan_minggu1 = $this->model_dokumen->get_dokumen_per_week(1, intval($month), $year, $keg->id_kegiatan);
                                    $laporan_minggu2 = $this->model_dokumen->get_dokumen_per_week(2, intval($month), $year, $keg->id_kegiatan);
                                    $laporan_minggu3 = $this->model_dokumen->get_dokumen_per_week(3, intval($month), $year, $keg->id_kegiatan);
                                    $laporan_minggu4 = $this->model_dokumen->get_dokumen_per_week(4, intval($month), $year, $keg->id_kegiatan);
                                    $laporan_minggu5 = $this->model_dokumen->get_dokumen_per_week(5, intval($month), $year, $keg->id_kegiatan);
                                ?>
                                <tr>
                                    <td></td>
                                    <td><?php echo $keg->jenis_kegiatan; ?></td>
                                    <td <?php echo ( $laporan_minggu1 > 0 ? 'style="background-color: green; color: #FFF; text-align: center; vertical-align: middle;"' : '' ); ?>>
                                        <?php //echo ( $laporan_minggu1 > 0 ? $laporan_minggu1 : '' ); ?>
                                    </td>
                                    <td <?php echo ( $laporan_minggu2 > 0 ? 'style="background-color: green; color: #FFF; text-align: center; vertical-align: middle;"' : '' ); ?>>
                                        <?php //echo ( $laporan_minggu2 > 0 ? $laporan_minggu2 : '' ); ?>
                                    </td>
                                    <td <?php echo ( $laporan_minggu3 > 0 ? 'style="background-color: green; color: #FFF; text-align: center; vertical-align: middle;"' : '' ); ?>>
                                        <?php //echo ( $laporan_minggu3 > 0 ? $laporan_minggu3 : '' ); ?>
                                    </td>
                                    <td <?php echo ( $laporan_minggu4 > 0 || $laporan_minggu5 > 0 ? 'style="background-color: green; color: #FFF; text-align: center; vertical-align: middle;"' : '' ); ?>>
                                        <?php //echo ( $laporan_minggu4 > 0 || $laporan_minggu5 > 0 ? $laporan_minggu4 + $laporan_minggu5 : '' ); ?>
                                    </td>
                                    <?php if( !empty($users) ): ?>
                                        <?php foreach($users as $usr): ?>
                                            <?php if($usr->status_pengguna != "admin"): ?>
                                                <th style="text-align: center; vertical-align: middle;">
                                                <?php
                                                    $dokumen_per_user = $this->model_dokumen->get_dokumen_per_user(intval($month), $year, $usr->nip, $keg->id_kegiatan);
                                                    echo ( $dokumen_per_user > 0 ? $dokumen_per_user : '-' );
                                                ?>
                                                </th>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    <?php else: ?>
                                        <th style="text-align: center; vertical-align: middle;">-</th>
                                    <?php endif ?>
                                    <td style="text-align: center; vertical-align: middle;">
                                    <?php
                                        $dokumen_per_kegiatan_total = $this->model_dokumen->get_dokumen_per_kegiatan_total(intval($month), $year, $keg->id_kegiatan);
                                        echo ( $dokumen_per_kegiatan_total > 0 ? $dokumen_per_kegiatan_total : '-' );
                                    ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php endif ?>
                        
                        <?php $i++; ?>
                    <?php endforeach ?>
                <?php else: ?>
                <tr>
                    <td colspan="8" style="text-align: center; vertical-align: middle;"><strong>Data Belum Ada</strong></td>
                </tr>
                <?php endif ?>
            </tbody>
        </table>
    </body>
</html>