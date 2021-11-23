
<?php 

header("Content-type: application/ms-excel");

header("Content-Disposition: attachment; filename=laporan_cbc.xls");


?>
<h2>DATA PRODUKSI BISNIS BARU ASKRED CBC PT SSM JAKARTA
</h2>
<table border="1" width="100%">
<thead>
<tr>
	<th colspan="14" style="background-color: yellow;text-align: center">DATA PRODUKSI</th>
	<th colspan="5" style="background-color: green;text-align: center">DATA PENAGIHAN</th>
  <th rowspan="2">KET</th>
</tr>
<tr>

<th>No</th>
<th nowrap>ASURANSI</th>
<th nowrap>SURAT PENGANTAR SSM</th>
<th nowrap>TGL SURAT SSM</th>
<th nowrap>BANK</th>
<th nowrap>PEMBAWA BISNIS</th>
<th nowrap>NAMA PRINCIPAL</th>
<th nowrap>NO SURAT BANK</th>
<th nowrap>TGL SURAT</th>
<th nowrap>NILAI PERTANGGUNGAN</th>
<th nowrap>NILAI PREMI</th>
<th nowrap>POTENSI KOMISI</th>
<th nowrap>NO NPP</th>
<th nowrap>TGL NPP</th>
<th nowrap>SURAT PENAGIHAN</th>
<th nowrap>JML TAGIHAN</th>
<th nowrap>TGL MASUK TAGIHAN KE ASKRINDO</th>
<th nowrap>KETERANGAN</th>
<th nowrap>BUKTI BAYAR</th>
<th nowrap>KET</th>




 </tr>

</thead>

<tbody>

<?php $i=1; foreach($data_bg as $row) { ?>

<tr>
<td nowrap><?php echo $i ?></td>
<td nowrap><?php echo $row->nama_asuransi?></td>	
 <td nowrap><?php echo $row->surat_tagih_sm?></td>
 <td nowrap><?php echo $row->tgl_tagih_sm?></td>
 <td nowrap><?php echo $row->nama_bank?></td>
 <td nowrap><?php echo $row->pembawa_bisnis?></td>
 <td nowrap><?php echo $row->principal ;?></td>
 <td nowrap><?php echo $row->no_surat_bank ;?></td>
 <td nowrap><?php echo $row->tgl_surat_bank ;?></td>
 <td nowrap><?php echo $row->nilai_pertanggungan ;?></td>
 <td nowrap><?php echo $row->nilai_premi ;?></td>
 <td nowrap><?php echo $row->potensi_komisi   ;?></td>
 <td nowrap><?php echo $row->no_npp ;?></td>
 <td nowrap><?php echo $row->tgl_npp   ;?></td>
 <td nowrap><?php echo $row->no_surat_tagih   ;?></td>
 <td nowrap><?php echo $row->tgl_surat_tagih;?></td>
 <td nowrap><?php echo $row->jumlah_tagih   ;?></td>
 <td nowrap><?php echo $row->tanggal_masuk_tagih   ;?></td>
 <td nowrap><?php echo $row->ket   ;?></td>
 <td rowspan="1" nowrap><?php echo $row->bukti_bayar   ;?></td>


 </tr>

<?php $i++; } ?>

</tbody>

</table>