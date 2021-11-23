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

<span><b>Kop Surat Perusahaan/Principal</b></span><br>
<h5 style="text-align: right">Bekasi, <?= date("d F Y", strtotime($bg['tgl_surat_permohonan'])) ?></h5><br>
<table>
    <tr>
        <td width="20%">Nomor</td>
        <td width="10%">:</td>
        <td><?= $bg['nomor_surat_permohonan'] ?></td>
    </tr>
    <tr>
        <td>Perihal</td>
        <td>:</td>
        <td>Permohonan <?= $bg['jenis_bg'] ?> </td>
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

Dengan hormat, <br>
<p style="text-align: justify;">Bersama ini kami <?= $bg['pic1'] ?> selaku <?= $bg['jabatan_pic1'] ?> dari <?= $bg['nama_principal'] ?> berkedudukan di <?= $bg['alamat_principal'] ?>, dengan itikad baik bermaksud mengajukan permohonan jaminan <?= $bg['jenis_bg'] ?> dengan keterangan sebagai berikut: </p><br>

<ol type="a">
  <table width="100%">
    
    <tr>
        <td width="25%"><li>Jenis Jaminan</li></td>
        <td  width="5%">:</td>
        <td><?= $bg['jenis_bg'] ?></td>
    </tr>

    <tr>
        <td><li>Nilai Kontrak</li></td>
        <td>:</td>
        <td>Rp. <?= number_format($bg['nilai_kontrak'],'2',',','.') ?></td>
    </tr>

    <?php 

        $date1 = new DateTime($bg['jangka_waktu_awal']);
        $date2 = new DateTime($bg['jangka_waktu_akhir']);

        $hari = $date2->diff($date1)->format("%a") + 1;

    ?>

    <tr>
        <td><li>Jangka Waktu</li></td>
        <td>:</td>
        <td><?= $hari ?> Hari (<?= date("d F Y", strtotime($bg['jangka_waktu_awal'])) ?> s/d <?= date("d F Y", strtotime($bg['jangka_waktu_akhir'])) ?>)</td>
    </tr>

    <tr>
        <td><li>Ditujukan Kepada</li></td>
        <td>:</td>
        <td><?= $bg['nama_oblige'] ?></td>
    </tr>
    <tr>
        <td><li>Alamat Oblige</li></td>
        <td>:</td>
        <td><?= $bg['alamat_oblige'] ?></td>
    </tr>
    <tr>
        <td><li>Nama Pekerjaan</li></td>
        <td>:</td>
        <td><?= $bg['nama_pekerjaan'] ?></td>
    </tr>

    <?php if($bg['id_jenis_bg'] == 1) : 
        $nm_surat   = "Nomor Surat Undangan";
        $tgl_surat  = "Tanggal Surat Undangan";
    ?>

    <?php elseif ($bg['id_jenis_bg'] == 2) : 
        $nm_surat   = "Nomor Surat Perintah Kerja";
        $tgl_surat  = "Tanggal Surat Perintah Kerja";    
    ?>

    <?php elseif ($bg['id_jenis_bg'] == 3) : 
        $nm_surat   = "Nomor Surat Kontrak Kerja Lengkap";
        $tgl_surat  = "Tanggal Surat Kontrak Kerja Lengkap";    
    ?>

    <?php else : 
        $nm_surat   = "Nomor Surat Berita Acara Serah Terima";
        $tgl_surat  = "Tanggal Surat Berita Acara Serah Terima";    
    ?>

    <?php endif; ?>

    <tr>
        <td><li><?= $nm_surat ?></li></td>
        <td>:</td>
        <td><?= $bg['no_surat_undangan'] ?></td>
    </tr>
    <tr>
        <td><li><?= $tgl_surat ?></li></td>
        <td>:</td>
        <td><?= date("d F Y", strtotime($bg['tgl_surat_undangan'])) ?></td>
    </tr>
    <tr>
        <td><li>Tanggal Terbit Jaminan</li></td>
        <td>:</td>
        <td><?= date("d F Y", strtotime($bg['tgl_terbit_jaminan'])) ?></td>
    </tr>
        
  </table>
</ol>  <br>

<p style="text-align: justify">
Permohonan ini akan kami lengkapi sesuai dengan persyaratan-persyaratan dari <?= $bg['nama_asuransi'] ?> berkaitan dengan permohonan <?= $bg['jenis_bg'] ?> tersebut di atas kami menyatakan bahwa: <br>
<ul type="1">
    <li>Penjelasan dan Keterangan yang diberikan adalah BENAR dan dalam hal <?= $bg['nama_asuransi'] ?> memerlukan keterangan lebih lanjut mengenai proyek tersebut di atas kami bersedia memberikan penjelasan kepada <?= $bg['nama_asuransi'] ?>.</li>
    <li>Bersedia membayar jasa penjaminan, biaya administrasi dan bea materai, serta biaya-biaya lainnya yang mungkin timbul dari penjaminan tersebut.</li>
    <li>Bertanggung jawab penuh apabila terjadi wanprestasi/default atas proyek yang kami lakukan</li>
    <li>Bersedia tunduk dan patuh kepada masyarakat/ketentuan yang berlaku di <?= $bg['nama_asuransi'] ?></li>
    <li>Menjamin bahwa dalam hal terjadi tindak pidana maupun kegiatan yang melanggar hukum berkaitan dengan proyek ini adalah menjadi tanggung jawab kami sepenuhnya</li>
</ul>
</p><br>

Demikian kami sampaikan, atas perhatian dan kerjasamanya kami ucapkan termmakasih. <br><br>

<div style="margin-left: 400px">
    <table>
        <tbody>
            <tr>
                <td>Hormat kami,</td>
            </tr>
            <tr>
                <td>Principal/Pemohon, <br>
                <?= $bg['nama_principal'] ?></td>
            </tr>
            <tr>
                <td><?= br(5) ?></td>
            </tr>
            <tr>
                <td><u><b><?= $bg['pic1'] ?></b></u></td>
            </tr>
            <tr>
                <b><?= $bg['jabatan_pic1'] ?></b>
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>