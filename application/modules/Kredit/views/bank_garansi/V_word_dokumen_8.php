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
        }
    </style>
</head>
<body>
    <img width="300" height="70" src="<?php echo base_url()?>assets/img/ssm_logo.png"><br><br>
    <h5 style="text-align: right">Jakarta, <?= date("d F Y", now('Asia/Jakarta')) ?></h5><br>
    <table>
        <tr>
            <td width="20%">Nomor</td>
            <td width="10%">:</td>
            <td></td>
        </tr>
        <tr>
            <td>Hal</td>
            <td>:</td>
            <td>Permohonan Pengajuan Sertifikat Bank Garansi <br>
            <?= $bg['jenis_bg'] ?> a/n <?= $bg['nama_principal'] ?></td>
        </tr>
    </table>
    <br>
    Kepada Yth. <br>
    <?= $bg['nama_asuransi'] ?> <br>
    <?php
    $str = $bg['alamat_cabang_as'];
    echo wordwrap($str,20,"<br>\n",TRUE);
    ?> 
    <br><br>
    Dengan Hormat, <br>
    <p style="text-align: justify;"><?= nbs(5) ?>Menunjuk surat <b><?= $bg['nama_principal'] ?></b> No. <?= $bg['nomor_surat_permohonan'] ?> tangga1 <?= date('d F Y', strtotime($bg['tgl_surat_permohonan'])) ?> dan menunjuk perjanjian Kerjsama Keagenan antara <?= $bg['nama_asuransi'] ?> dengan PT. Solusi Sinergi Mandiri No. dan No. tangga1  bersama ini kami sampaikan permohonan dengan keterangan sebagaimana berikut:</p> <br>
    <table>
        <tr>
            <td width="40%">Jenis Pertanggungan</td>
            <td width="10%">:</td>
            <td><?= $bg['jenis_bg'] ?></td>
        </tr>
        <tr>
            <td width="40%">Nilai Jaminan</td>
            <td width="10%">:</td>
            <td><?= number_format($bg['nilai_jaminan'],'2',',','.') ?></td>
        </tr>
        <tr>
            <td width="40%">Nilai Kontrak</td>
            <td width="10%">:</td>
            <td><?= number_format($bg['nilai_kontrak'],'2',',','.') ?></td>
        </tr>
        <tr>
            <td width="40%">Jangka Waktu</td>
            <td width="10%">:</td>
            <td></td>
        </tr>
        <tr>
            <td width="40%">Ditujukan Kepada</td>
            <td width="10%">:</td>
            <td><?= $bg['nama_oblige'] ?></td>
        </tr>
        <tr>
            <td width="40%">Alamat Oblige</td>
            <td width="10%">:</td>
            <td><?= $bg['alamat_oblige'] ?></td>
        </tr>
        <tr>
            <td width="40%">Nama Pekerjaan</td>
            <td width="10%">:</td>
            <td><?= $bg['nama_pekerjaan'] ?></td>
        </tr>
    </table><br>
    <p style="text-align: justify;"><?= nbs(5) ?>Demikian surat Permohonan ini kami sampaikan, atas perhatian dan kerjasamanya. Kami ucapkan Terimakasih. </p>
    <br>
    Hormat kami, <br>
    <b>PT. Solusi Sinergi Mandiri</b><br>
    <?= br(4) ?>
    <b><u>JALIUS SOFYAR</u></b><br>
    Manager Produksi

</body>
</html>