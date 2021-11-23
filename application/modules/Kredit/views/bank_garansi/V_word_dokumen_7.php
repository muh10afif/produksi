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

<span><b>PEMBERITAHUAN REALISASI DAN PEMBAYARAN BIAYA PENJAMINAN</b></span><br><br>

    <table>
        <tr>
            <td width="20%">Nomor</td>
            <td width="10%">:</td>
            <td></td>
        </tr>
        <tr>
            <td>Lamp</td>
            <td>:</td>
            <td><?= date("d F Y", now('Asia/Jakarta')) ?></td>
        </tr>
        <tr>
            <td>Perihal</td>
            <td>:</td>
            <td>Pemberitahuan Relaisasi dan Pembayaran <br> Biaya Penjaminan</td>
        </tr>
    </table><br>
    
    <table>
        <tr>
            <td width="40%"><?= $bg['nama_asuransi'] ?></td>
        </tr>
        <tr>
            <td>Kantor <?= $bg['nama_cabang'] ?></td>
        </tr>
        <tr>
            <td>  <?php
            $str = $bg['alamat_cabang_as'];
            echo wordwrap($str,20,"<br>\n",TRUE);
            ?> </td>
        </tr>
    </table><br>
    <p style="text-align: justify;"><?= nbs(5) ?>
        Dengan ini kami beritahukan bahwa sesuai Surat Persetujuan Prinsip Kontra Bank Garansi dari <?= $bg['nama_asuransi'] ?> <?= $bg['nama_cabang'] ?> Nomor <?= $bg['nomor_persetujuan'] ?> tanggal <?= date('d F Y', strtotime($bg['tgl_persetujuan'])) ?> kami telah menerbitkan Bank Garansi dengan data sebagai berikut: 
    </p><br>
    
    <table border="1" width="100%">
        <tbody>
            <tr>
                <td>Nomor Bank Garansi</td>
                <td><?= $bg['no_bg'] ?></td>
            </tr>
            <tr>
                <td>Nilai Jaminan</td>
                <td>Rp. <?= number_format($bg['nilai_jaminan'],'2',',','.') ?></td>
            </tr>
            <tr>
                <td>Jangka Waktu</td>
                <td></td>
            </tr>
            <tr>
                <td>Tanggal Penerbitan</td>
                <td><?= date('d F Y', strtotime($bg['tgl_bg'])) ?></td>
            </tr>
        </tbody>
    </table><br>
    <table border="1" style="padding: 10px;">
        <tr>
            <td>Dengan ini kami beritahukan pula bahwa: <br> 
            - Biaya penjaminan KBG sebesar <br>
            - Biaya Administrasi KBG sebesar <br>
            - Bea Material Endorsement KBG sebesar
            </td>
            <td></td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td></td>
        </tr>
        <tr>
            <td>Telah kami kreditkan ke Rekening <?= $bg['nama_asuransi'] ?></td>
            <td>No Rek 1000863471 Bank Bukopin Capem Bekasi Komplek Sentra Niaga Kalimalang Jl. A. Yani Blok A1 No. 3,4,10,11 Bekasi Barat</td>
        </tr>
        <tr>
            <td>No Kredit Nota Tanggal</td>
            <td></td>
        </tr>
    </table><br>
    <div style="margin-left: 350px">
        <table>
            <tbody>
                <tr>
                    <td>Bekasi,<?= date("d F Y", now('Asia/Jakarta')) ?></td>
                </tr>
                <tr>
                    <td>PT BANK BUKOPIN TBK</td>
                </tr>
                <tr>
                    <td><?= br(5) ?></td>
                </tr>
                <tr>
                    <td><u><b>Nomi Suspan</b></u></td>
                </tr>
                <tr>
                    <b>Manager Operasional Cabang Bekasi</b>
                </tr>
            </tbody>
        </table>
    </div>
    
</body>
</html>