

<?php

header("Content-type: application/ms-excel");
header("Content-Disposition: attachment; filename=laporan_bg_".date('Y-m-d').".xls");


?>
<h2>REKAP PRODUKSI BISNIS BARU PT SSM JAKARTA</h2>
<table border="1" width="100%">

<thead>
<tr>
    <th colspan="21" style="background-color: yellow;text-align: center">DATA PRODUKSI</th>
    <th colspan="5" style="background-color: green;text-align: center">DATA PENAGIHAN</th>
</tr>
<tr>
<th nowrap>No</th>
<th nowrap>Nama Asuransi</th>
<th nowrap>Cabang Asuransi</th>
<th nowrap>No Regis</th>
<th nowrap>Tgl Regis</th>
<th nowrap>No Surat Permohonan</th>
<th nowrap>Tgl Surat Permohonan</th>
<th nowrap>NO PPK BG/IP</th>
<th nowrap>TGL PPK BG/IP</th>
<th nowrap>NAMA BANK</th>
<th nowrap>SUMBER BISNIS</th>
<th nowrap>NAMA PRINCIPAL</th>
<th nowrap>ALAMAT PRINCIPAL</th>
<th nowrap>NO SURAT</th>
<th nowrap>TGL_SURAT</th>
<th nowrap>JENIS BG</th>
<th nowrap>TANGGAL AWAL</th>
<th nowrap>TANGGAL AKHIR</th>
<th nowrap>HARI</th>
<th nowrap>NILAI JAMINAN</th>
<th nowrap>NAMA OBLIGEE</th>
<th nowrap>ALAMAT OBLIGEE</th>
<th nowrap>NAMA PEKERJAAN</th>
<th nowrap>NILAI KONTRAK</th>
<th nowrap>NILAI PREMI</th>
<th nowrap>PREMI ASURANSI</th>
<th nowrap>PREMI BANK</th>
<th nowrap>POTENSI KOMISI</th>
<th nowrap>NO BG</th>
<th nowrap>TGL BG</th>
<th nowrap>KET BG</th>
<th nowrap>BUKTI BAYAR</th>
<th nowrap>SURAT PENAGIHAN</th>
<th nowrap>TGL SURAT TAGIH </th>
<th nowrap>TGL MASUK TAGIH</th>
<th nowrap>KET</th>




 </tr>

</thead>

<tbody>

<?php $i=1; foreach ($data_bg as $row) { ?>
    <?php
    $date1=date_create($row->tgl_awal);
    $date2=date_create($row->tgl_akhir);
    $diff=date_diff($date1, $date2)->format("%a");
    ?>

<tr>
<td nowrap><?php echo $i ?></td>    
 <td nowrap><?php echo $row->nama_asuransi?></td>
 <td nowrap><?php echo $row->nama_cabang?></td>
 <td nowrap><?php echo $row->no_regis?></td>
 <td nowrap><?php echo $row->tgl_regis?></td>
 <td nowrap><?php echo $row->no_srt_permohonan?></td>
 <td nowrap><?php echo $row->tgl_srt_permohonan?></td>
 <td nowrap><?php echo $row->no_ppk?></td>
 <td nowrap><?php echo $row->tgl_ppk?></td>
 <td nowrap><?php echo $row->nama_bank?></td>
 <td nowrap><?php echo $row->sumber_bisnis?></td>
 <td nowrap><?php echo $row->principal;?></td>
 <td nowrap><?php echo $row->alamat_principal;?></td>
 <td nowrap><?php echo $row->no_surat ;?></td>
 <td nowrap><?php echo $row->tgl_surat ;?></td>
 <td nowrap><?php echo $row->jenis_bg ;?></td>
 <td nowrap><?php echo $row->tgl_awal;?></td>
 <td nowrap><?php echo $row->tgl_akhir;?></td>
 <td nowrap><?php echo $diff+1 ?> hari</td>
 <td nowrap><?php echo $row->nilai_jaminan ;?></td>
 <td nowrap><?php echo $row->nama_obligee   ;?></td>
 <td nowrap><?php echo $row->alamat_obligee;?></td>
 <td nowrap><?php echo $row->nama_pekerjaan   ;?></td>
 <td nowrap><?php echo $row->nilai_kontrak;?></td>
 <td nowrap><?php echo $row->nilai_premi;?></td>
 <td nowrap><?php echo $row->premi_asuransi   ;?></td>
 <td nowrap><?php echo $row->premi_bank   ;?></td>
 <td nowrap><?php echo $row->potensi_komisi   ;?></td>
 <td nowrap><?php echo $row->no_bg   ;?></td>
 <td nowrap><?php echo $row->tgl_bg   ;?></td>
 <td nowrap><?php echo $row->ket_bg   ;?></td>
 <td nowrap><?php echo $row->bukti_bayar   ;?></td>
 <td nowrap><?php echo $row->no_surat_tagih   ;?></td>
 <td nowrap><?php echo $row->tgl_surat_tagih   ;?></td>
 <td nowrap><?php echo $row->tgl_masuk_tagih   ;?></td>
  <td nowrap><?php echo $row->ket   ;?></td>

 

 </tr>

    <?php $i++;
} ?>

</tbody>

</table>

