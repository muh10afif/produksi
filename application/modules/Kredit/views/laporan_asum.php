
<?php 

header("Content-type: application/ms-excel");

header("Content-Disposition: attachment; filename=laporan_asum.xls");


?>
<h2>DATA ASUM
</h2>
<table border="1" width="100%">
<thead>
<tr>
	<th nowrap style="width:30px;">No</th>
	<th>Tertanggung</th>
	<th nowrap>Produk</th>
	<th nowrap>No Polis</th>
	<th nowrap>Tanggal Polis</th>
	<th nowrap>Premi</th>
	<th nowrap>Tanggal Penagihan</th>
	<th nowrap> No Surat Penagihan</th>
	<th nowrap>Komisi</th>
	<th nowrap>Keterangan</th>
 </tr>

</thead>

<tbody>

<?php $i=1; foreach($data_asum as $row) { ?>

<tr>
<td nowrap><?php echo $i ?></td>
<td nowrap><?php echo $row->tertanggung?></td>	
 <td nowrap><?php echo $row->produk?></td>
 <td nowrap><?php echo $row->no_polis?></td>
 <td nowrap><?php echo $row->tgl_polis?></td>
 <td nowrap><?php echo $row->premi?></td>
 <td nowrap><?php echo $row->tgl_penagihan ;?></td>
 <td nowrap><?php echo $row->no_surat_penagihan ;?></td>
 <td nowrap><?php echo $row->komisi ;?></td>
 <td nowrap><?php echo $row->keterangan ;?></td>



 </tr>

<?php $i++; } ?>

</tbody>

</table>