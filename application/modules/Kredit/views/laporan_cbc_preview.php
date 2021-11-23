<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Laporan Bank Garansi</title>
  </head>
  <body>
    <a class="btn btn-success" href="<?php echo base_url('Kredit/Kredit_non_konsumtif/export_cbc') ?>" role="button">export</a>

<h2>REKAP PRODUKSI BISNIS BARU PT SSM JAKARTA</h2>
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
 <td nowrap><?php echo $row->bukti_bayar   ;?></td>


 </tr>

<?php $i++; } ?>

</tbody>

</table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

