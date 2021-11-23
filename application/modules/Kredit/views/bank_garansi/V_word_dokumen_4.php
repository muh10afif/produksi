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
            margin-top: 0;
        }
        tr td {
            padding: 1.5px;
        }
    </style>
</head>
<body>

<center>
<span><b>SURAT PERNYATAAN KESANGGUPAN MENYELESAIKAN PEKERJAAN</b></span><br>
<span><b>DAN TANGGUNG JAWAB MUTLAK</b></span><br>
<span>NO : ........................... </span>
</center> <br>

Yang bertanda tangan dibawah ini <br><br>

<table>
    <tr>
        <td width="20%">Nama</td>
        <td width="10%">:</td>
        <td><?= $bg['pic1'] ?></td>
    </tr>
    <tr>
        <td>Jabatan</td>
        <td>:</td>
        <td><?= $bg['jabatan_pic1'] ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?= $bg['alamat_principal'] ?></td>
    </tr>
    <tr>
        <td>No. KTP</td>
        <td>:</td>
        <td><?= $bg['nik_pic1'] ?></td>
    </tr>
</table><br><br>

<p style="text-align: justify">
Adalah mewakili <?= $bg['nama_principal'] ?> selaku Principal atau pihak yang dijamin, mengajukan Permohonan Surety Bond / Penjaminan Bank Garansi <?= $bg['jenis_bg'] ?> kepada <?= $bg['nama_asuransi'] ?>, berdasarkan Surat Perjanjian Kerja/ Addendum/Kesepakatan Perpanjangan jangka waktu No <?= $bg['no_surat_undangan'] ?> Tanggal <?= nice_date($bg['tgl_surat_undangan'], 'd F Y') ?>, dengan nilai kontrak Rp. <?= number_format($bg['nilai_kontrak'],'2',',','.') ?> (<?= terbilang($bg['nilai_kontrak']) ?>) dengan jangka waktu dari tanggal <?= nice_date($bg['jangka_waktu_awal'], 'd F Y') ?> sampai dengan <?= nice_date($bg['jangka_waktu_akhir'], 'd F Y') ?> <br><br>
Dengan ini menyatakan dengan sesungguhnya dan menjamin bahwa : <br><br>
<ol type="1">
    <li>
        Sanggup untuk menyelesaikan 100% pekerjaan sesuai batas waktu sebagaimana tertuang dalam LOA/ LOI / PO / Surat Perintah Kerja / Kontrak Kerja / Addendum / Kesepakatan Perpanjangan jangka waktu No. <?= $bg['no_surat_undangan'] ?> Tanggal <?= nice_date($bg['tgl_surat_undangan'], 'd F Y') ?>, dengan nilai kontrak Rp. <?= number_format($bg['nilai_kontrak'],'2',',','.') ?> (<?= terbilang($bg['nilai_kontrak']) ?>).
    </li>
    <li>
        Apabila sampai batas waktu yang telah ditentukan pekerjaan tersebut belum selesai dikerjakan, maka kami akan bertanggung jawab sepenuhnya untuk menyelesaikan pekerjaan tersebut sampai dengan tercapainya progress 100%.
    </li>
    <li>
      Bersedia bertanggung jawab penuh untuk menyelesaikan kewajiban tersebut dan jika terjadi pemutusan kontrak maka kami sanggup mencari kontraktor pengganti guna menyelesaikan sisa kewajiban pekerjaan kami kepada Obligee/Pemilik Proyek sebesar nilai pekerjaan yang dinyatakan wanprestasi/default/gagal.  
    </li>
    <li>
        Bersedia menanggung seluruh biaya yang harus dikeluarkan guna tercapainya progress 100% dan terselesaikannya pekerjaan dimaksud.
    </li>
    <li>
        Surat pernyataan ini dibuat dalam rangka pengajuan permohonan Surety Bond/Kontra Bank Garansi <?= $bg['jenis_bg'] ?> atas pekerjaan tersebut yang akan dilaksanakan. 
    </li>
</ol><br>
Demikian surat pernyataan ini dibuat dengan sebenar-benarnya dalam keadaan sadar dan sehat jasmani rohani serta tanpa tekanan dari pihak manapun.
</p><br>

<div>
    <table>
        <tbody>
            <tr>
                <td>Jakarta,<?= date("d F Y", now('Asia/Jakarta')) ?></td>
            </tr>
            <tr>
                <td><?= $bg['nama_principal'] ?></td>
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