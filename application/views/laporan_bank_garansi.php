
<?php 

header("Content-type: application/ms-excel");

header("Content-Disposition: attachment; filename=laporan.xlsx");


?>

<table border="1" width="100%">

<thead>

<tr>
<th>No</th>
<th>Nama Asuransi</th>
<th>NO PPK BG/IP</th>
<th>TGL PPK BG/IP</th>
<th>NAMA BANK</th>


 </tr>

</thead>

<tbody>

<?php $i=1; foreach($data_bg as $row) { ?>

<tr>
<td><?php echo $i ?></td>	
 <td><?php echo $row->nama_asuransi?></td>
 <td><?php echo $row->no_ppk?></td>
 <td><?php echo $row->tgl_ppk?></td>
 <td><?php echo $row->nama_bank?></td>
 



 </tr>

<?php $i++; } ?>

</tbody>

</table>

