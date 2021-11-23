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
<span><b>KOP SURAT PERUSAHAAN</b></span><br>
<span><b>Surat SANGGUP </b></span><br>
<span>AKSEP / PROMES</span>

</center> <br>

Nilai Nominal : Rp. <?= number_format($bg['nilai_jaminan'],'2',',','.') ?> <br><br>

Tang bertandatangan dibawah ini: <br><br>

<p style="text-align: justify">
<?= $bg['pic1'] ?> selaku <?= $bg['jabatan_pic1'] ?> <?= $bg['nama_principal'] ?>, dan <?= $bg['pic2'] ?> selaku <?= $bg['jabatan_pic2'] ?> <?= $bg['nama_principal'] ?> yang berkedudukan dan kantor di <?= $bg['alamat_principal'] ?>, yang diangkat berdasarkan Akta perubahan terakhir dengan No. <?= $bg['nomor_akta_principal'] ?> yang dibuat dihadapan Notaris <?= $bg['nama_notaris'] ?> di Bekasi dalam hal ini bertindak untuk dan atas nama <?= $bg['nama_principal'] ?> bahwa untuk akta ini dan tegala akibatnya serta pelaksanaannya memilih tempat kedudukan hukum yang umum dan tetap di Kantor Panitera <?= $bg['pengadilan'] ?> di <?= $bg['alamat_pengadilan'] ?>, dengan Surat Sanggup ini menjamin dan berjanji secara tidak dapat ditarik kembali (trrevocable) dan tanpa syarat (unconditional) untuk membayar sepenuhnya tanpa syarat kepada !
</p><br>

<center>
<span><b><?= $bg['nama_asuransi'] ?></b></span><br>
<span><b><?= $bg['nama_cabang'] ?></b></span><br>
</center> <br>

<p style="text-align: justify">
Atas permintaan pertama, semua Jumlah jumlah uang yang sekarang atau pada suatu waktu akan terhutang oleh <?= $bg['nama_principal'] ?> kepada <?= $bg['nama_asuransi'] ?>, karena sebab dicairkannya Jaminan yang diterbitkan <?= $bg['nama_asuransi'] ?> oleh pihak Obligee (Pemberi kerja) atau pihak Perbankan atau berdasarkan apapun juga. <br><br>
Surat sanggup ini dikeluarkan sebagai dana cadangan klaim, untuk memback up kewajiban pekerjaan <?= $bg['nama_pekerjaan'] ?> kepada <?= $bg['nama_asuransi'] ?> atau diterbitkannya Kontra Bank Garansi kepada PT. Bank Bukopin sesuai dengan surat permohonan <?= $bg['nomor_surat_permohonan'] ?> tanggal <?= date("d F Y ", strtotime($bg['tgl_surat_permohonan'])) ?><br><br>
Pemberian Surat Sanggup yang diatur dalam akta ini tidak dapat diakhin 7 dicabut / dibatalkan oleh <?= $bg['nama_principal'] ?> tanpa persetujuan tertulis dari <?= $bg['nama_asuransi'] ?>. <br><br>
Surat Sanggup ini dikeluarkan dengan ketentuan "fanpa protes non pembayaran" dan "tanpa biaya menurut pasal 176 KUHD juncto pasal 145 KUMD.
</p> <br>
<div style="margin-left: 400px">
    <table>
        <tbody>
            <tr>
                <td>Bekasi,<?= date("d F Y", now('Asia/Jakarta')) ?></td>
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