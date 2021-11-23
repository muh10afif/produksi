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
    <table>
        <tr>
            <td width="40%">Nomor</td>
            <td width="10%">:</td>
            <td></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td><?= date("d F Y", now('Asia/Jakarta')) ?></td>
        </tr>
        <tr>
            <td>Lampiran</td>
            <td>:</td>
            <td>1 (Satu) Berkas</td>
        </tr>
    </table>
    <br>
    Kepada Yth. <br>
    Pimpinan <?= $bg['nama_cabang'] ?> <br>
    <?= $bg['nama_asuransi'] ?> <br>
    <?php
    $str = $bg['alamat_cabang_as'];
    echo wordwrap($str,20,"<br>\n",TRUE);
    ?> 
    <br><br>
    <table>
        <tr>
            <td width="15%">Perihal</td>
            <td width="5%">:</td>
            <td><b>Permohonan Pembayaran Komisi Kontra Bank Garansi</b></td>
        </tr>
    </table>
    <br>
    Dengan Hormat, <br>
    <p style="text-align: justify;"><?= nbs(5) ?>Menunjuk data Bank Garansi kami sebagaimana hal dibawah, bersama ini kami sampaikan permohonan pembayaran Komisi pemasaran Kontra Bank Garansi <b>Bukopin</b> dengan perincian sebagai berikut:</p> <br>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">No Bank Garansi</th>
                <th class="text-center">Premi</th>
                <th class="text-center">Komisi</th>
                <th class="text-center">Realisasi Biaya</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1.</td>
                <td><?= $bg['no_bg'] ?></td>
                <td class="text-right"><?= number_format($bg['nilai_premi'],'0',',','.') ?></td>
                <td class="text-right"><?= number_format($bg['nilai_premi'] * 0.15,'0',',','.') ?></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td class="text-right"><?= number_format($bg['nilai_premi'] * 0.15,'0',',','.') ?></td>
                <td></td>
            </tr>
        </tbody>
    </table><br>
    <p style="text-align: justify;"><?= nbs(5) ?>Berkenaan dengan hal tersebut, kami mohon agar komisi sebesar Rp. <?= number_format($bg['nilai_premi'] * 0.15,'2',',','.') ?> (<?= terbilang($bg['nilai_premi'] * 0.15) ?>) dapat di Transfer ke No.Rekening 130-00-79707-777 Bank Mandiri KK Bandung BEC atas nama <b>PT. SOLUSI SINERGI MANDIRI</b>. <br>
    <?= nbs(5) ?>Demikian surat Permohonan ini kami sampaikan, atas perhatian dan kerjasama yang baik kami ucapkan Terimakasih. </p>
    <br>
    Hormat kami, <br>
    <b>PT. SOLUSI SINERGI MANDIRI</b><br>
    <?= nbs(5) ?><img width="100" height="100" src="<?php echo base_url()?>assets/img/ttd.png">
    <?= br(1) ?>
    <b><u>RIO SUKMAWAN</u></b><br>
    Direktur Utama

</body>
</html>