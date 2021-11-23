<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permohonan Bank Garansi</title>
    <style>
        table tr th {
            text-align: center;
            vertical-align: middle;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h3 style="font-weight: bold;">Report Produksi Bank Garansi</h3>

<table border="1" width="100%">
    <thead>
        <tr>
            <th rowspan="2">No.</th>
            <th rowspan="2">NAMA BANK</th>
            <th rowspan="2">NAMA ASURANSI</th>
            <th rowspan="2">NAMA APLICANT</th>
            <th colspan="2">JANGKA WAKTU</th>
            <th rowspan="2">JENIS JAMINAN</th>
            <th rowspan="2">NO BG</th>
            <th rowspan="2">TANGGAL BG</th>
            <th rowspan="2">NILAI JAMINAN</th>
        </tr>
        <tr>
            <th>AWAL</th>
            <th>AKHIR</th>
        </tr>
    </thead>
    <tbody>
        <?php $tot_nj=0; $no=1; foreach ($dt_bg as $d): ?>
            <tr>
                <td align="center"><?= $no ?></td>
                <td><?= $d['nama_bank'] ?></td>
                <td><?= $d['nama_asuransi'] ?></td>
                <td><?= $d['nama_principal'] ?></td>
                <td><?= date('d-m-yy', strtotime($d['jangka_waktu_awal'])) ?></td>
                <td><?= date('d-m-yy', strtotime($d['jangka_waktu_akhir'])) ?></td>
                <td><?= $d['jenis_bg'] ?></td>
                <td><?= $d['no_bg'] ?></td>
                <td><?= $d['tgl_bg'] ?></td>
                <td align="right"><?= $d['nilai_jaminan'];
                    $tot_nj += $d['nilai_jaminan'];
                ?></td>
            </tr>
        <?php $no++; endforeach; ?>
        <tr>
            <td colspan="9" style="font-weight: bold; text-align: right;">TOTAL</td>
            <td align="right"><?=  $tot_nj ?></td>
        </tr>
        <!-- <tr>
            <td colspan="8" style="font-weight: bold; text-align: center; color: red;">GRAND TOTAL</td>
            <td></td>
        </tr> -->
        
    </tbody>
</table>
    
</body>
</html>