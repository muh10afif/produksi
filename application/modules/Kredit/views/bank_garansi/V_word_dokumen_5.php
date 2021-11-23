<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <style>
        body {
            line-height: 20px;
            color: black;
            margin: 0;
        }
        tr td {
            padding: 1.5px;
        }
    </style>
</head>
<body>

<center>
<h4><b>Surat Pengantar Persetujuan Bank</b></h4>

</center> <br>

<p style="text-align: justify">
Terlampir kami sampaikan persetujuan asuransi atas nama <?= $bg['nama_principal'] ?> dengan <?= $bg['nomor_persetujuan'] ?> tanggal persetujuan <?= date("d F Y", strtotime($bg['tgl_persetujuan'])) ?> dengan nilai jaminan Rp. <?= number_format($bg['nilai_kontrak'],'2',',','.') ?>
</p><br>

<table width="100%">
    <tr>
        <td align="center">Tanda Terima</td>
        <td width="150"></td>
        <td align="center">PT. Solusi Sinergi Mandiri</td>
    </tr>
    <tr>
        <td height="100" align="center">
            
        <td></td>
        <td align="center">
        </td>
    </tr>
    <tr>
        <td align="center">( ................ )</td>
        <td></td>
        <td align="center"><b><u>JALIUS SOFYAR</u></b><br>
    Manager Produksi</td>
    </tr>
</table>

</body>
</html>