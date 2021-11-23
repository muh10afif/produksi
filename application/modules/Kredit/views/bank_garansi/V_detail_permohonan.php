<style>
    .tab {
        pointer-events: none;
        cursor: default;
        text-decoration: none;
        color: black;
        }
</style>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <input type="hidden" name="id_permohonan" id="id_permohonan" value="<?= $id_permohonan ?>">
                    <a href="<?= base_url('Kredit/Kredit_non_konsumtif/') ?>"><button class="btn btn-success btn-sm float-right"  type="button"><i class="fa fa-arrow-left mr-2"></i>Kembali</button></a>
                    <h5 id="judul">Detail Permohonan</h5>
                </div>
                <div class="card-body table-responsive">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-success card-outline card-tabs">
                                <div class="card-header p-0 pt-1 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="data-principal-tab" data-toggle="pill" href="#data-principal" role="tab" aria-controls="data-principal" aria-selected="true">Data Principal</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link data_permohonan" id="data-permohonan-tab" data-toggle="pill" href="#data-permohonan" role="tab" aria-controls="data-permohonan" aria-selected="false">Data Permohonan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="legalitas-tab" data-toggle="pill" href="#legalitas" role="tab" aria-controls="legalitas" aria-selected="false">Legalitas</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="persetujuan-asuransi-tab" data-toggle="pill" href="#persetujuan-asuransi" role="tab" aria-controls="persetujuan-asuransi" aria-selected="false">Persetujuan Asuransi</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="bank-garansi-tab" data-toggle="pill" href="#bank-garansi" role="tab" aria-controls="bank-garansi" aria-selected="false">Bank Garansi</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="bukti-bayar-premi-tab" data-toggle="pill" href="#bukti-bayar-premi" role="tab" aria-controls="bukti-bayar-premi" aria-selected="false">Bukti Bayar Premi</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-two-tabContent">
                                        <div class="tab-pane fade show active" id="data-principal" role="tabpanel" aria-labelledby="data-principal-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-light table-hover mt-3">
                                                        <tbody>
                                                            <tr>
                                                                <td width="15%" class="font-weight-bold">Nama Principal</td>
                                                                <td>: <?= $bg['nama_principal'] ?></td>
                                                                <td width="15%" class="font-weight-bold">Nama PIC 2</td>
                                                                <td>: <?= $bg['pic2'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="15%" class="font-weight-bold">Alamat Principal</td>
                                                                <td>: <?= $bg['alamat_principal'] ?></td>
                                                                <td width="15%" class="font-weight-bold">Jabatan PIC 2</td>
                                                                <td>: <?= $bg['jabatan_pic2'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="15%" class="font-weight-bold">Nama PIC 1</td>
                                                                <td>: <?= $bg['pic1'] ?></td>
                                                                <td width="15%" class="font-weight-bold">NIK PIC 2</td>
                                                                <td>: <?= $bg['nik_pic2'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="15%" class="font-weight-bold">Jabatan PIC 1</td>
                                                                <td>: <?= $bg['jabatan_pic2'] ?></td>
                                                                <td width="15%" class="font-weight-bold">Akta Principal</td>
                                                                <td>: <?= $bg['akta_principal'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="15%" class="font-weight-bold">NIK PIC 1</td>
                                                                <td>: <?= $bg['nik_pic1'] ?></td>
                                                                <td width="15%" class="font-weight-bold">Nomor Akta Principal</td>
                                                                <td>: <?= $bg['nomor_akta_principal'] ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="data-permohonan" role="tabpanel" aria-labelledby="data-permohonan-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-light table-hover mt-3">
                                                        <tbody>
                                                            <tr>
                                                                <td width="20%" class="font-weight-bold">Nomor Registrasi</td>
                                                                <td>: <?= $bg['nomor_registrasi'] ?></td>
                                                                <td width="20%" class="font-weight-bold">Bank</td>
                                                                <td>: <?= $bg['nama_bank'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" class="font-weight-bold">Tanggal Registrasi</td>
                                                                <td>: <?= ($bg['tgl_registrasi'] == null) ? '' : date('d-M-Y', strtotime($bg['tgl_registrasi'])) ?></td>
                                                                <td width="20%" class="font-weight-bold">Cabang Bank</td>
                                                                <td>: <?= $bg['cabang_bank'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" class="font-weight-bold">Nomor Surat Permohonan</td>
                                                                <td>: <?= $bg['nomor_surat_permohonan'] ?></td>
                                                                <td width="20%" class="font-weight-bold">Nama Oblige</td>
                                                                <td>: <?= $bg['nama_oblige'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" class="font-weight-bold">Tanggal Surat Permohonan</td>
                                                                <td>: <?= ($bg['tgl_surat_permohonan'] == null) ? '' : date('d-M-Y', strtotime($bg['tgl_surat_permohonan'])) ?></td>
                                                                <td width="20%" class="font-weight-bold">Alamat Oblige</td>
                                                                <td>: <?= $bg['alamat_oblige'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" class="font-weight-bold">Nomor Surat Undangan</td>
                                                                <td>: <?= $bg['no_surat_undangan'] ?></td>
                                                                <td width="20%" class="font-weight-bold">Nama Pekerjaan</td>
                                                                <td>: <?= $bg['nama_pekerjaan'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="15%" class="font-weight-bold">Tanggal Surat Undangan</td>
                                                                <td>: <?= ($bg['tgl_surat_undangan'] == null) ? '' : date('d-M-Y', strtotime($bg['tgl_surat_undangan'])) ?></td>
                                                                <td width="20%" class="font-weight-bold">Nilai Kontrak</td>
                                                                <?php 
                                                                    if ($bg['nilai_kontrak'] != '') {
                                                                        $nk = "Rp. ".number_format($bg['nilai_kontrak'], '2',',','.');
                                                                    } else {
                                                                        $nk = "-";
                                                                    }   
                                                                ?>
                                                                <td>: <?= $nk ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" class="font-weight-bold">Asuransi</td>
                                                                <td>: <?= $bg['nama_asuransi'] ?></td>
                                                                <td width="20%" class="font-weight-bold">Nilai Jaminan</td>
                                                                <?php 
                                                                    if ($bg['nilai_jaminan'] != '') {
                                                                        $nj = "Rp. ".number_format($bg['nilai_jaminan'], '2',',','.');
                                                                    } else {
                                                                        $nj = "-";
                                                                    }   
                                                                ?>
                                                                <td>: <?= $nj ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" class="font-weight-bold">Cabang Asuransi</td>
                                                                <td>: <?= $bg['nama_cabang'] ?></td>
                                                                <td width="20%" class="font-weight-bold">Jenis Jaminan</td>
                                                                <td>: <?= $bg['jenis_bg'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" class="font-weight-bold">Jangka Waktu Awal</td>
                                                                <td>: <?= ($bg['jangka_waktu_awal'] == null) ? '' : date('d-M-Y', strtotime($bg['jangka_waktu_awal'])) ?></td>
                                                                <td width="20%" class="font-weight-bold">Jangka Waktu Akhir</td>
                                                                <td>: <?= ($bg['jangka_waktu_akhir'] == null) ? '' : date('d-M-Y', strtotime($bg['jangka_waktu_akhir'])) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20%" class="font-weight-bold">Tanggal Terbit Jaminan</td>
                                                                <td>: <?= ($bg['tgl_terbit_jaminan'] == null) ? '' : date('d-M-Y', strtotime($bg['tgl_terbit_jaminan'])) ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="legalitas" role="tabpanel" aria-labelledby="legalitas-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-light table-hover mt-3">
                                                        <tbody>
                                                            <tr>
                                                                <td width="15%" class="font-weight-bold">Nama Notaris</td>
                                                                <td>: <?= $bg['nama_notaris'] ?></td>
                                                                <td width="15%" class="font-weight-bold">Pengadilan</td>
                                                                <td>: <?= $bg['pengadilan'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="15%" class="font-weight-bold">Alamat Notaris</td>
                                                                <td>: <?= $bg['alamat_notaris'] ?></td>
                                                                <td width="15%" class="font-weight-bold">Alamat Pengadilan</td>
                                                                <td>: <?= $bg['alamat_pengadilan'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="15%" class="font-weight-bold">Nomor KTP</td>
                                                                <td>: <?= $bg['no_ktp'] ?></td>
                                                                <td width="15%" class="font-weight-bold">Pasal</td>
                                                                <td>: <?= $bg['pasal'] ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="persetujuan-asuransi" role="tabpanel" aria-labelledby="persetujuan-asuransi-tab">

                                            <?php if (!empty($tgl_pnga)): ?>

                                                <div class="persetujuan-asuransi text-center" <?= ($pr_asuransi->num_rows() > 0) ? 'hidden' : '' ?>>
                                                    <p class="mt-2"><mark>Belum ada data Persetujuan Asuransi, silahkan tambahkan data apabila Data Persetujuan Asuransi sudah terbit.</mark></p>
                                                    <button class="btn btn-primary" id="tambah_data_persetujuan" type="button"><i class="fa fa-plus-circle mr-2"></i> Tambah Data Persetujuan</button>
                                                </div>
                                                
                                                <div class="row det_persetujuan_as" <?= ($pr_asuransi->num_rows() > 0) ? '' : 'hidden' ?>>
                                                    <?php $pra = $pr_asuransi->row_array() ?>
                                                    <div class="col-md-12">
                                                        <table class="table table-light table-hover mt-3">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="25%" class="font-weight-bold">Nomor Persetujuan</td>
                                                                    <td id="nomor_persetujuan_t">: <?= $pra['nomor_persetujuan'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%" class="font-weight-bold">Tanggal Persetujuan</td>
                                                                    <td id="tgl_persetujuan_t">: <?= ($pra['tgl_persetujuan'] == null) ? '' : date('d-M-Y', strtotime($pra['tgl_persetujuan'])) ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="25%" class="font-weight-bold">Nilai Premi</td>
                                                                    <td id="nilai_premi_t">: <?= ($pra['nilai_premi'] == null) ? '' : number_format($pra['nilai_premi'],'0','.','.') ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <button class="btn btn-success btn-sm float-right" id="edit_data_persetujuan" type="button"><i class="fa fa-pencil mr-2"></i>Edit</button>
                                                    </div>
                                                </div>

                                            <?php else: ?>

                                                <div class="text-center">
                                                    <p class="mt-2"><mark>Dokumen Pengantar Asuransi Belum Terbit. Harap lengkapi dahulu dokumen persyaratan <a href="<?= base_url("kredit/kredit_non_konsumtif/tampil_dokumen_persyaratan/$id_permohonan") ?>">disini</a>.</mark></p>
                                                </div>

                                            <?php endif; ?>

                                            

                                        </div>
                                        <div class="tab-pane fade" id="bank-garansi" role="tabpanel" aria-labelledby="bank-garansi-tab">
                                            <input type="hidden" name="jml_data_bg" id="jml_data_bg" value="<?= $b_garansi->num_rows() ?>">
                                            
                                            <div class="bank-garansi text-center" <?= ($b_garansi->num_rows() > 0) ? 'hidden' : '' ?>>

                                                <p class="mt-2">
                                                    <mark id="ket_bg" <?= ($pr_asuransi->num_rows() == 0) ? 'hidden' : ''?>>Belum ada data Bank Garansi, silahkan tambahkan data apabila Data Bank Garansi sudah terbit.</mark>
                                                    <mark id="ket_bg2" <?= ($pr_asuransi->num_rows() == 0) ? '' : 'hidden'?>>Harap isi dahulu data Persetujuan Asuransi !</mark>
                                                </p>

                                                <button class="btn btn-primary" id="tambah_data_bank_garansi" type="button" <?= ($pr_asuransi->num_rows() == 0) ? 'hidden' : ''?>><i class="fa fa-plus-circle mr-2"></i> Tambah Data Bank Garansi</button>
                                            </div>

                                            <div class="row det_bank_garansi" <?= ($b_garansi->num_rows() > 0) ? '' : 'hidden' ?>>
                                                <?php $b_gar = $b_garansi->row_array() ?>
                                                <div class="col-md-12">
                                                    <table class="table table-light table-hover mt-3">
                                                        <tbody>
                                                            <tr>
                                                                <td width="25%" class="font-weight-bold">Nomor Bank Garansi</td>
                                                                <td id="no_bg_t">: <?= $b_gar['no_bg'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="25%" class="font-weight-bold">Tanggal Bank Garansi</td>
                                                                <td id="tgl_bg_t">: <?= ($b_gar['tgl_bg'] == null) ? '' : date('d-M-Y', strtotime($b_gar['tgl_bg'])) ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <button class="btn btn-success btn-sm float-right" id="edit_data_bg" type="button"><i class="fa fa-pencil mr-2"></i>Edit</button>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="bukti-bayar-premi" role="tabpanel" aria-labelledby="bukti-bayar-premi-tab">

                                            <div class="bukti_byr_premi text-center" <?= (!empty($tgl_byr_premi)) ? 'hidden' : '' ?>>
                                                <p class="mt-2" >
                                                    <mark id="ket_bayar_premi" <?= ($b_garansi->num_rows() == 0) ? 'hidden' : '' ?>>Belum ada Bukti Bank Premi, silahkan tambahkan data apabila Bukti Bayar Premi sudah terbit.</mark>
                                                    <mark id="ket_bayar_premi2" <?= ($b_garansi->num_rows() == 0) ? '' : 'hidden' ?>>Harap Isi dahulu data Bank Garansi.</mark>
                                                </p>

                                                <button class="btn btn-primary" id="tambah_bukti_bayar_premi" type="button" <?= ($b_garansi->num_rows() == 0) ? 'hidden' : '' ?>><i class="fa fa-plus-circle mr-2"></i> Tambah Bukti Bayar Premi</button>
                                            </div>

                                            <div class="row det_bukti_byr_premi" <?= (!empty($tgl_byr_premi)) ? '' : 'hidden' ?>>
                                                <div class="col-md-12">
                                                    <table class="table table-light table-hover mt-3">
                                                        <tbody>
                                                            <tr>
                                                                <td width="25%" class="font-weight-bold">Nama Dokumen</td>
                                                                <td id="nm_bukti_premi">: <?= base64_decode($tgl_byr_premi['dokumen']) ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <button class="btn btn-success btn-sm float-right" id="edit_data_byr_premi" type="button"><i class="fa fa-pencil mr-2"></i>Edit</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <!-- SmartWizard html -->
                                    <div id="smartwizard">
                                        <ul>

                                            <li style="margin-right: 20px; margin-left: 60px;" class="nav-item done" hidden>
                                            <small class="text-success">Tanggal</small><a href="#step-1" class="tab mt-2"><i class="fa fa-check"></i><br /><small style="font-size: 12px">Permohonan Jaminan</small></a></li>

                                            <?php if ($status_mhn == 1): 
                                                $step_aktif_1   = 'active';   
                                                $text_1         = 'text-info'; 
                                                $fa_1           = 'fa fa-check';
                                            ?>
                                                
                                            <?php elseif ($status_mhn > 1): 
                                                $step_aktif_1   = 'done';
                                                $text_1         = 'text-success'; 
                                                $fa_1           = 'fa fa-check';
                                            ?>

                                            <?php else : 
                                               $step_aktif_1   = '';
                                               $text_1         = 'text-white'; 
                                               $fa_1           = 'fa fa-times';     
                                            ?>
                                                
                                            <?php endif; ?>

                                            <li style="margin-right: 30px; margin-left: 100px;" id="step_aktif_1" class="nav-item <?= $step_aktif_1 ?>">
                                            <small id="text_1" class="<?= $text_1 ?>"><?= ($per_jaminan['add_time'] == '') ? '01-03-2020' : date("d-M-Y", strtotime($per_jaminan['add_time'])) ?></small>
                                            <a href="#step-1" class="tab mt-2 mb-3"><i id="fa_1" class="<?= $fa_1 ?>"></i><br />
                                            <small style="font-size: 12px">Permohonan Jaminan</small></a></li>

                                            <?php if ($status_mhn == 2): 
                                                $step_aktif_2   = 'active';   
                                                $text_2         = 'text-info'; 
                                                $fa_2           = 'fa fa-check';
                                            ?>
                                                
                                            <?php elseif ($status_mhn > 1): 
                                                $step_aktif_2   = 'done';
                                                $text_2         = 'text-success'; 
                                                $fa_2           = 'fa fa-check';
                                            ?>

                                            <?php else : 
                                               $step_aktif_2   = '';
                                               $text_2         = 'text-white'; 
                                               $fa_2           = 'fa fa-times';     
                                            ?>
                                                
                                            <?php endif; ?>

                                            <li style="margin-right: 40px;" id="step_aktif_2" class="nav-item <?= $step_aktif_2 ?>">
                                            <small id="text_2" class="<?= $text_2 ?>"><?= ($tgl_pnga['tgl_terbit'] == '') ? '01-03-2020' : date("d-M-Y", strtotime($tgl_pnga['tgl_terbit'])) ?></small>
                                            <a href="#step-2" class="tab mt-2 mb-3"><i id="fa_2" class="<?= $fa_2 ?>"></i><br />
                                            <small style="font-size: 12px">Pengantar Asuransi</small></a></li>

                                            <?php if ($status_mhn == 3): 
                                                $step_aktif_3   = 'active';   
                                                $text_3         = 'text-info'; 
                                                $fa_3           = 'fa fa-check';
                                            ?>
                                                
                                            <?php elseif ($status_mhn > 3): 
                                                $step_aktif_3   = 'done';
                                                $text_3         = 'text-success'; 
                                                $fa_3           = 'fa fa-check';
                                            ?>

                                            <?php else : 
                                               $step_aktif_3   = '';
                                               $text_3         = 'text-white'; 
                                               $fa_3           = 'fa fa-times';     
                                            ?>
                                                
                                            <?php endif; ?>

                                            <li style="margin-right: 40px;" id="step_aktif_3" class="nav-item <?= $step_aktif_3 ?>">
                                            <small id="text_3" class="<?= $text_3 ?>"><?= ($tgl_pja['tgl_persetujuan'] == '') ? '01-03-2020' : date("d-M-Y", strtotime($tgl_pja['tgl_persetujuan'])) ?></small>
                                            <a href="#step-3" class="tab mt-2 mb-3"><i id="fa_3" class="<?= $fa_3 ?>"></i><br />
                                            <small style="font-size: 12px">Persetujuan Asuransi</small></a></li>

                                            <?php if ($status_mhn == 4): 
                                                $step_aktif_4   = 'active';   
                                                $text_4         = 'text-info'; 
                                                $fa_4           = 'fa fa-check';
                                            ?>
                                                
                                            <?php elseif ($status_mhn > 4): 
                                                $step_aktif_4   = 'done';
                                                $text_4         = 'text-success'; 
                                                $fa_4           = 'fa fa-check';
                                            ?>

                                            <?php else : 
                                               $step_aktif_4   = '';
                                               $text_4         = 'text-white'; 
                                               $fa_4           = 'fa fa-times';     
                                            ?>
                                                
                                            <?php endif; ?>

                                            <li style="margin-right: 40px;" id="step_aktif_4" class="nav-item <?= $step_aktif_4 ?>">
                                            <small id="text_4" class="<?= $text_4 ?>"><?= ($tgl_pgb['tgl_terbit'] == '') ? '01-03-2020' : date("d-M-Y", strtotime($tgl_pgb['tgl_terbit'])) ?></small>
                                            <a href="#step-4" class="tab mt-2 mb-3"><i id="fa_4" class="<?= $fa_4 ?>"></i><br />
                                            <small style="font-size: 12px">Pengantar Bank</small></a></li>

                                            <?php if ($status_mhn == 5): 
                                                $step_aktif_5   = 'active';   
                                                $text_5         = 'text-info'; 
                                                $fa_5           = 'fa fa-check';
                                            ?>
                                                
                                            <?php elseif ($status_mhn > 5): 
                                                $step_aktif_5   = 'done';
                                                $text_5         = 'text-success'; 
                                                $fa_5           = 'fa fa-check';
                                            ?>

                                            <?php else : 
                                               $step_aktif_5   = '';
                                               $text_5         = 'text-white'; 
                                               $fa_5           = 'fa fa-times';     
                                            ?>
                                                
                                            <?php endif; ?>

                                            <li style="margin-right: 40px;" id="step_aktif_5" class="nav-item <?= $step_aktif_5 ?>">
                                            <small id="text_5" class="<?= $text_5 ?>"><?= ($tgl_bg['tgl_bg'] == '') ? '01-03-2020' : date("d-M-Y", strtotime($tgl_bg['tgl_bg'])) ?></small>
                                            <a href="#step-5" class="tab mt-2 mb-3"><i id="fa_5" class="<?= $fa_5 ?>"></i><br />
                                            <small style="font-size: 12px">Bank Garansi</small></a></li>

                                            <?php if ($status_mhn == 6): 
                                                $step_aktif_6   = 'active';   
                                                $text_6         = 'text-info'; 
                                                $fa_6           = 'fa fa-check';
                                            ?>
                                                
                                            <?php elseif ($status_mhn > 6): 
                                                $step_aktif_6   = 'done';
                                                $text_6         = 'text-success'; 
                                                $fa_6           = 'fa fa-check';
                                            ?>

                                            <?php else : 
                                               $step_aktif_6   = '';
                                               $text_6         = 'text-white'; 
                                               $fa_6           = 'fa fa-times';     
                                            ?>
                                                
                                            <?php endif; ?>

                                            <li style="margin-right: 40px;" id="step_aktif_6" class="nav-item <?= $step_aktif_6 ?>">
                                            <small id="text_6" class="<?= $text_6 ?>"><?= ($tgl_byr_premi['add_time'] == '') ? '01-03-2020' : date("d-M-Y", strtotime($tgl_byr_premi['add_time'])) ?></small>
                                            <a href="#step-6" class="tab mt-2 mb-3"><i id="fa_6" class="<?= $fa_6 ?>"></i><br />
                                            <small style="font-size: 12px">Bukti Bayar Premi</small></a></li>

                                            <?php if ($status_mhn == 7): 
                                                $step_aktif_7   = 'active';   
                                                $text_7         = 'text-info'; 
                                                $fa_7           = 'fa fa-check';
                                            ?>
                                                
                                            <?php elseif ($status_mhn > 7): 
                                                $step_aktif_7   = 'done';
                                                $text_7         = 'text-success'; 
                                                $fa_7           = 'fa fa-check';
                                            ?>

                                            <?php else : 
                                               $step_aktif_7   = '';
                                               $text_7         = 'text-white'; 
                                               $fa_7           = 'fa fa-times';     
                                            ?>
                                                
                                            <?php endif; ?>

                                            <li style="margin-right: 40px;" id="step_aktif_7" class="nav-item <?= $step_aktif_7 ?>">
                                            <small id="text_7" class="<?= $text_7 ?>"><?= ($tgl_sp['add_time'] == '') ? '01-03-2020' : date("d-M-Y", strtotime($tgl_sp['add_time'])) ?></small>
                                            <a href="#step-7" class="tab mt-2 mb-3"><i id="fa_7" class="<?= $fa_7 ?>"></i><br />
                                            <small style="font-size: 12px">Penagihan Komisi</small></a></li>

                                            <?php if ($status_mhn == 8): 
                                                $step_aktif_8   = 'active';   
                                                $text_8         = 'text-info'; 
                                                $fa_8           = 'fa fa-check';
                                            ?>
                                                
                                            <?php elseif ($status_mhn > 8): 
                                                $step_aktif_8   = 'done';
                                                $text_8         = 'text-success'; 
                                                $fa_8           = 'fa fa-check';
                                            ?>

                                            <?php else : 
                                               $step_aktif_8   = '';
                                               $text_8         = 'text-white'; 
                                               $fa_8           = 'fa fa-times';     
                                            ?>
                                                
                                            <?php endif; ?>

                                            <li style="margin-right: 40px;" id="step_aktif_8" class="nav-item <?= $step_aktif_8 ?>">
                                            <small id="text_8" class="<?= $text_8 ?>"><?= ($tgl_sls['tgl_bayar'] == '') ? '01-03-2020' : date("d-M-Y", strtotime($tgl_sls['tgl_bayar'])) ?></small>
                                            <a href="#step-8" class="tab mt-2 mb-3"><i id="fa_8" class="<?= $fa_8 ?>"></i><br />
                                            <small style="font-size: 12px">Selesai</small></a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body table-responsive">

                                    <table class="table table-bordered table-hover" id="tabel_dokumen" width="100%" cellspacing="0">
                                        <thead class="bg-success">
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Nama Dokumen</th>
                                                <th>Tanggal Terbit</th>
                                                <th>Dokumen</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- modal tambah data persetujuan -->
<div id="modal_tambah_data_persetujuan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title text-dark" id="judul_modal">Tambah Data Persetujuan Asuransi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            
            <div class="modal-body">

                <form id="form_persetujuan_asuransi" autocomplete="off">

                    <input type="hidden" id="aksi_simpan" name="aksi_simpan" value="buat">
                    <input type="hidden" id="id_permohonan" name="id_permohonan" value="<?= $id_permohonan ?>">
                    <input type="hidden" name="id_persetujuan_asuransi" id="id_persetujuan_asuransi">
                    <input type="hidden" name="id_dokumen" id="id_dokumen">
                    <input type="hidden" name="id_kelengkapan" id="id_kelengkapan">
                    
                    <div class="row d-flex justify-content-center mt-3 mb-2">
                        <div class="col-md-10 mb-3 fm_no_dokumen">
                            <div class="row">
                                <label class="col-md-4 control-label col-form-label">Nomor Persetujuan</label>
                                <div class="col-md-8">
                                    <input type="text" id="nomor_persetujuan" name="nomor_persetujuan" class="form-control" placeholder="Masukkan Nomor Persetujuan">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10 mb-3 fm_tgl_berakhir">

                            <div class="row">
                                <label class="col-md-4 control-label col-form-label">Tanggal Persetujuan</label>
                                <div class="col-md-8">
                                <input type="text" class="form-control datepicker2" id="tgl_persetujuan" name="tgl_persetujuan" placeholder="Masukkan Tanggal Persetujuan" readonly>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-10 mb-3">

                            <div class="row">
                                <label class="col-md-4 control-label col-form-label">Nilai Premi</label>
                                <div class="col-md-8">
                                <input type="text" class="form-control separator" id="premi" name="premi" placeholder="Masukkan Nilai Premi">
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-10 mb-3 fm_dokumen">
                            <div class="row">
                                <label class="col-md-4 control-label col-form-label">Dokumen IP/KONTRA</label>
                                <div class="col-md-8">
                                    
                                    <input type="file" name="dokumen" id="dokumen" accept="application/pdf" class="form-control mb-2">
                                    <mark id="ket_upload">Upload file bertipe .pdf !</mark>

                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success" id="simpan_persetujuan_asuransi">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- modal tambah data bank garansi -->
<div id="modal_tambah_data_bank_garansi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title text-dark" id="judul_modal2">Tambah Data Bank Garansi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            
            <div class="modal-body">

                <form id="form_bank_garansi" autocomplete="off">

                    <input type="hidden" id="aksi_simpan2" name="aksi_simpan" value="buat">
                    <input type="hidden" id="id_permohonan2" name="id_permohonan" value="<?= $id_permohonan ?>">
                    <input type="hidden" name="id_bg" id="id_bg">
                    <input type="hidden" name="id_dokumen" id="id_dokumen2">
                    <input type="hidden" name="id_kelengkapan" id="id_kelengkapan2">
                    
                    <div class="row d-flex justify-content-center mt-3 mb-2">
                        <div class="col-md-10 mb-3 fm_no_dokumen">
                            <div class="row">
                                <label class="col-md-4 control-label col-form-label">Nomor Bank Garansi</label>
                                <div class="col-md-8">
                                    <input type="text" id="no_bg" name="no_bg" class="form-control" placeholder="Masukkan Nomor Bank Garansi">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10 mb-3 fm_tgl_berakhir">
                            <div class="row">
                                <label class="col-md-4 control-label col-form-label">Tanggal Bank Garansi</label>
                                <div class="col-md-8">
                                <input type="text" class="form-control datepicker2" id="tgl_bg" name="tgl_bg" placeholder="Masukkan Tanggal Bank Garansi" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10 mb-3 fm_dokumen">
                            <div class="row">
                                <label class="col-md-4 control-label col-form-label">Dokumen IP/KONTRA</label>
                                <div class="col-md-8">
                                    
                                    <input type="file" name="dokumen" id="dokumen2" accept="application/pdf" class="form-control mb-2">
                                    <mark id="ket_upload">Upload file bertipe .pdf !</mark>

                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success" id="simpan_data_bank_garansi">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- modal tambah bukti bayar premi -->
<div id="modal_tambah_bukti_byr_premi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title text-dark" id="judul_modal3">Tambah Bukti Bayar Premi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            
            <div class="modal-body">

                <form id="form_bukti_bayar_premi" autocomplete="off">

                    <input type="hidden" id="aksi_simpan3" name="aksi_simpan" value="buat">
                    <input type="hidden" id="id_permohonan3" name="id_permohonan" value="<?= $id_permohonan ?>">
                    <input type="hidden" name="id_bg" id="id_bg">
                    <input type="hidden" name="id_dokumen" id="id_dokumen3">
                    <input type="hidden" name="id_kelengkapan" id="id_kelengkapan3">
                    
                    <div class="row d-flex justify-content-center mt-3 mb-2">
                        <div class="col-md-10 mb-3 fm_dokumen">
                            <div class="row">
                                <label class="col-md-4 control-label col-form-label">Bukti Bayar Premi</label>
                                <div class="col-md-8">
                                    
                                    <input type="file" name="dokumen" id="dokumen3" accept="application/pdf" class="form-control mb-2">
                                    <mark id="ket_upload">Upload file bertipe .pdf !</mark>

                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success" id="simpan_bukti_bayar_premi">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        // 24-03-2020

            // menampilkan data dokumen
            var tabel_dokumen  = $('#tabel_dokumen').DataTable({
                "processing"    : true,
                "ajax"          : "<?= base_url("kredit/kredit_non_konsumtif/tampil_data_dokumen/$id_permohonan") ?>",
                stateSave       : true,
                "order"         : [],
                "paging"        : false,
                "info"          : false,
                "columnDefs"     : [{
                    "targets"       : [3],
                    "orderable"     : false
                }, {
                    "targets"       : [2],
                    "className"     : "text-center"
                }]
            })

            // menampilkan modal tambah persetujuan asuransi
            $('#tambah_data_persetujuan').on('click', function () {
                $('#modal_tambah_data_persetujuan').modal('show');

                $('#judul_modal').text('Tambah Data Persetujuan Asuransi');
                $('#aksi_simpan').val('buat');
            })

            // menampilkan modal tambah bank garansi
            $('#tambah_data_bank_garansi').on('click', function () {
                $('#modal_tambah_data_bank_garansi').modal('show');

                $('#judul_modal2').text('Tambah Data Bank Garansi');
                $('#aksi_simpan2').val('buat');
            })

            // menampilkan modal tambah_bukti_bayar_premi
            $('#tambah_bukti_bayar_premi').on('click', function () {
                $('#modal_tambah_bukti_byr_premi').modal('show');

                $('#judul_modal3').text('Tambah Bukti Bayar Premi');
                $('#aksi_simpan3').val('buat');
            })
        
            // aksi simpan_persetujuan_asuransi
            $('#simpan_persetujuan_asuransi').on('click', function () {

                var im_form = document.querySelector("#form_persetujuan_asuransi");

                var form = new FormData(im_form);

                if ($('#nomor_persetujuan').val() == '') {
                    swal({
                        title               : 'Peringatan',
                        text                : 'Nomor Persetujuan harus terisi',
                        buttonsStyling      : false,
                        confirmButtonClass  : "btn btn-info",
                        type                : 'error',
                        showConfirmButton   : false,
                        timer               : 1000
                    }); 

                    return false;

                } else if ($('#tgl_persetujuan').val() == '') {
                    swal({
                        title               : 'Peringatan',
                        text                : 'Tanggal Persetujuan harus terisi',
                        buttonsStyling      : false,
                        confirmButtonClass  : "btn btn-info",
                        type                : 'error',
                        showConfirmButton   : false,
                        timer               : 1000
                    }); 

                    return false;

                } else {

                    $.ajax({
                        url         : "<?= base_url('Kredit/kredit_non_konsumtif/simpan_data_persetujuan_asuransi') ?>",
                        method      : "POST",
                        data        : form,
                        processData : false,
                        contentType : false,
                        cache       : false,
                        async       : false,
                        dataType    : "JSON",
                        success     : function (data) {

                            if (data.hasil == 0) {
                                
                                swal({
                                    title               : 'Upload Berkas',
                                    text                : 'Data Tidak Berhasil Diupload',
                                    buttonsStyling      : false,
                                    confirmButtonClass  : "btn btn-danger",
                                    type                : 'error',
                                    showConfirmButton   : false,
                                    timer               : 1000
                                }); 

                                return false;

                            } else if (data.hasil == 'berhasil') {

                                swal({
                                    title               : 'Berhasil',
                                    text                : 'Data Berhasil Disimpan',
                                    buttonsStyling      : false,
                                    confirmButtonClass  : "btn btn-success",
                                    type                : 'success',
                                    showConfirmButton   : false,
                                    timer               : 1000
                                }); 

                                $('#nomor_persetujuan').val('');
                                $('#tgl_persetujuan').val('');
                                $('#dokumen').val('');

                                $('#modal_tambah_data_persetujuan').modal('hide');
                                $('.persetujuan-asuransi').attr('hidden', true);
                                $('.det_persetujuan_as').removeAttr('hidden');
                                $('#nomor_persetujuan_t').text(': '+data.no_persetujuan);
                                $('#nilai_premi_t').text(': '+data.nilai_premi);

                                var tgl_pr = data.tgl_persetujuan;

                                if (tgl_pr == null) {
                                    $("#tgl_persetujuan_t").text('');
                                } else {
                                    var tgl = $.datepicker.formatDate('dd-M-yy', new Date(tgl_pr));

                                    $("#tgl_persetujuan_t").text(": "+tgl);
                                }

                                $('#aksi_simpan').val('ubah');
                                $('#id_persetujuan_asuransi').val(data.id_persetujuan_asuransi);
                                $('#id_dokumen').val(data.id_dokumen);

                                $('#tambah_data_bank_garansi').removeAttr('hidden');
                                $('#ket_bg2').attr('hidden', true);
                                $('#ket_bg').removeAttr('hidden');

                                tabel_dokumen.ajax.reload(null, false);

                                // status done - active
                                $('#step_aktif_1, #step_aktif_2, #step_aktif_3').removeClass('done active');
                                $('#step_aktif_1, #step_aktif_2, #step_aktif_3').addClass('done');

                                // text success - info
                                $('#text_1, #text_2, #text_3').removeClass('text-white text-info');
                                $('#text_1, #text_2, #text_3').addClass('text-success');

                                // logo
                                $('#fa_1, #fa_2, #fa_3, #fa_4').removeClass('fa fa-times');
                                $('#fa_1, #fa_2, #fa_3, #fa_4').addClass('fa fa-check');

                                // status done - active
                                $('#step_aktif_4').removeClass('done active');
                                $('#step_aktif_4').addClass('active');

                                // text success - info
                                $('#text_4').removeClass('text-white text-success');
                                $('#text_4').addClass('text-info');

                                $('#text_3').text(data.tgl_terbit_pa);
                                $('#text_4').text(data.tgl_terbit_pb);

                            }

                        },
                        error       : function(xhr, status, error) {
                            var err = eval("(" + xhr.responseText + ")");
                            alert(err.Message);
                        }

                    })

                    return false;
                }

            })

            // aksi simpan_data_bank_garansi
            $('#simpan_data_bank_garansi').on('click', function () {

                var im_form = document.querySelector("#form_bank_garansi");

                var form = new FormData(im_form);

                if ($('#no_bg').val() == '') {
                    swal({
                        title               : 'Peringatan',
                        text                : 'Nomor Bank Garansi harus terisi',
                        buttonsStyling      : false,
                        confirmButtonClass  : "btn btn-info",
                        type                : 'error',
                        showConfirmButton   : false,
                        timer               : 1000
                    }); 

                    return false;
                    
                } else if ($('#tgl_bg').val() == '') {
                    swal({
                        title               : 'Peringatan',
                        text                : 'Tanggal Bank Garansi harus terisi',
                        buttonsStyling      : false,
                        confirmButtonClass  : "btn btn-info",
                        type                : 'error',
                        showConfirmButton   : false,
                        timer               : 1000
                    }); 

                    return false;

                } else {

                    $.ajax({
                        url         : "<?= base_url('Kredit/kredit_non_konsumtif/simpan_data_bank_garansi') ?>",
                        method      : "POST",
                        data        : form,
                        processData : false,
                        contentType : false,
                        cache       : false,
                        async       : false,
                        dataType    : "JSON",
                        success     : function (data) {

                            if (data.hasil == 0) {
                                swal({
                                    title               : 'Upload Berkas',
                                    text                : 'Data Tidak Berhasil Diupload',
                                    buttonsStyling      : false,
                                    confirmButtonClass  : "btn btn-danger",
                                    type                : 'error',
                                    showConfirmButton   : false,
                                    timer               : 1000
                                }); 

                                return false;
                            } else if (data.hasil == 'berhasil') {

                                swal({
                                    title               : 'Berhasil',
                                    text                : 'Data Berhasil Disimpan',
                                    buttonsStyling      : false,
                                    confirmButtonClass  : "btn btn-success",
                                    type                : 'success',
                                    showConfirmButton   : false,
                                    timer               : 1000
                                }); 

                                $('#ket_bayar_premi').removeAttr('hidden');
                                $('#ket_bayar_premi2').attr('hidden', true);
                                $('#tambah_bukti_bayar_premi').removeAttr('hidden');
                                
                                $('#no_bg').val('');
                                $('#tgl_bg').val('');
                                $('#dokumen2').val('');

                                $('#modal_tambah_data_bank_garansi').modal('hide');
                                $('.bank-garansi').attr('hidden', true);
                                $('.det_bank_garansi').removeAttr('hidden');
                                $('#no_bg_t').text(': '+data.no_bg);

                                var tgl_pr = data.tgl_bg;

                                if (tgl_pr == null) {
                                    $("#tgl_bg_t").text('');
                                } else {
                                    var tgl = $.datepicker.formatDate('dd-M-yy', new Date(tgl_pr));

                                    $("#tgl_bg_t").text(": "+tgl);
                                }

                                $('#aksi_simpan2').val('ubah');
                                $('#id_bg').val(data.id_bg);
                                $('#id_dokumen2').val(data.id_dokumen);

                                tabel_dokumen.ajax.reload(null, false);

                                // status done - active
                                $('#step_aktif_1, #step_aktif_2, #step_aktif_3, #step_aktif_4').removeClass('done active');
                                $('#step_aktif_1, #step_aktif_2, #step_aktif_3, #step_aktif_4').addClass('done');

                                // text success - info
                                $('#text_1, #text_2, #text_3, #text_4').removeClass('text-white text-info');
                                $('#text_1, #text_2, #text_3, #text_4').addClass('text-success');

                                // logo
                                $('#fa_1, #fa_2, #fa_3, #fa_4, #fa_5').removeClass('fa fa-times');
                                $('#fa_1, #fa_2, #fa_3, #fa_4, #fa_5').addClass('fa fa-check');


                                // status done - active
                                $('#step_aktif_5').removeClass('done active');
                                $('#step_aktif_5').addClass('active');

                                // text success - info
                                $('#text_5').removeClass('text-white text-success');
                                $('#text_5').addClass('text-info');

                                $('#text_5').text(data.tgl_bg);
                            }

                        },
                        error       : function(xhr, status, error) {
                            var err = eval("(" + xhr.responseText + ")");
                            alert(err.Message);
                        }

                    })

                    return false;

                }

            })

            // aksi simpan_data_bank_garansi
            $('#simpan_bukti_bayar_premi').on('click', function () {

                var im_form = document.querySelector("#form_bukti_bayar_premi");

                var form = new FormData(im_form);

                if ($('#dokumen3').val() == '') {
                    swal({
                        title               : 'Peringatan',
                        text                : 'Dokumen harus terisi',
                        buttonsStyling      : false,
                        confirmButtonClass  : "btn btn-info",
                        type                : 'error',
                        showConfirmButton   : false,
                        timer               : 1000
                    }); 

                    return false;
                    
                }  else {

                    $.ajax({
                        url         : "<?= base_url('Kredit/kredit_non_konsumtif/simpan_data_bukti_premi') ?>",
                        method      : "POST",
                        data        : form,
                        processData : false,
                        contentType : false,
                        cache       : false,
                        async       : false,
                        dataType    : "JSON",
                        success     : function (data) {

                            if (data.hasil == 0) {
                                swal({
                                    title               : 'Upload Berkas',
                                    text                : 'Data Tidak Berhasil Diupload',
                                    buttonsStyling      : false,
                                    confirmButtonClass  : "btn btn-danger",
                                    type                : 'error',
                                    showConfirmButton   : false,
                                    timer               : 1000
                                }); 

                                return false;
                            } else if (data.hasil == 'berhasil') {

                                swal({
                                    title               : 'Berhasil',
                                    text                : 'Data Berhasil Disimpan',
                                    buttonsStyling      : false,
                                    confirmButtonClass  : "btn btn-success",
                                    type                : 'success',
                                    showConfirmButton   : false,
                                    timer               : 1000
                                }); 
                                
                                $('#dokumen3').val('');

                                $('#modal_tambah_bukti_byr_premi').modal('hide');
                                $('.bukti_byr_premi').attr('hidden', true);
                                $('.det_bukti_byr_premi').removeAttr('hidden');
                                $('#nm_bukti_premi').text(': '+data.dokumen);

                                $('#aksi_simpan3').val('ubah');
                                $('#id_kelengkapan3').val(data.id_kelengkapan);

                                tabel_dokumen.ajax.reload(null, false);

                                // status done - active
                                $('#step_aktif_1, #step_aktif_2, #step_aktif_3, #step_aktif_4, #step_aktif_5').removeClass('done active');
                                $('#step_aktif_1, #step_aktif_2, #step_aktif_3, #step_aktif_4, #step_aktif_5').addClass('done');

                                // text success - info
                                $('#text_1, #text_2, #text_3, #text_4, #text_5').removeClass('text-white text-info');
                                $('#text_1, #text_2, #text_3, #text_4, #text_5').addClass('text-success');

                                // logo
                                $('#fa_1, #fa_2, #fa_3, #fa_4, #fa_5, #fa_6').removeClass('fa fa-times');
                                $('#fa_1, #fa_2, #fa_3, #fa_4, #fa_5, #fa_6').addClass('fa fa-check');


                                // status done - active
                                $('#step_aktif_6').removeClass('done active');
                                $('#step_aktif_6').addClass('active');

                                // text success - info
                                $('#text_6').removeClass('text-white text-success');
                                $('#text_6').addClass('text-info');

                                $('#text_6').text(data.tgl_terbit);
                            }

                        },
                        error       : function(xhr, status, error) {
                            var err = eval("(" + xhr.responseText + ")");
                            alert(err.Message);
                        }

                    })

                    return false;

                }

            })

            // aksi edit persetujuan
            $('#edit_data_persetujuan').on('click', function () {

                var id_permohonan = $('#id_permohonan').val();
                
                $.ajax({
                    url         : "<?= base_url('kredit/kredit_non_konsumtif/ambil_data_persetujuan_asuransi') ?>",
                    method      : "POST",
                    beforeSend  : function () {
                        swal({
                            title   : 'Menunggu',
                            html    : 'Memproses Data',
                            onOpen  : () => {
                                swal.showLoading();
                            }
                        })
                    },
                    data        : {id_permohonan:id_permohonan},
                    dataType    : "JSON",
                    success     : function (data) {

                        console.log(data[0].id_dokumen);

                        swal.close();

                        $('#modal_tambah_data_persetujuan').modal('show');

                        $('#judul_modal').text('Ubah Data Persetujuan Asuransi');

                        $('#nomor_persetujuan').val(data.nomor_persetujuan);

                        var tgl_pr = data.tgl_persetujuan;

                        if (tgl_pr == null) {
                            $("#tgl_persetujuan").val('');
                        } else {
                            var tgl = $.datepicker.formatDate('dd-M-yy', new Date(tgl_pr));

                            $("#tgl_persetujuan").datepicker("setDate", new Date(tgl));
                        }

                        $('#id_persetujuan_asuransi').val(data.id_persetujuan_asuransi);
                        $('#aksi_simpan').val('ubah');
                        $('#id_dokumen').val(data[0].id_dokumen);
                        $('#id_kelengkapan').val(data[0].id_kelengkapan);

                    },
                    error       : function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(err.Message);
                    }

                })

                return false;

            })

            // aksi edit bank garansi
            $('#edit_data_bg').on('click', function () {

                var id_permohonan = $('#id_permohonan2').val();

                $.ajax({
                    url         : "<?= base_url('kredit/kredit_non_konsumtif/ambil_data_bank_garansi') ?>",
                    method      : "POST",
                    beforeSend  : function () {
                        swal({
                            title   : 'Menunggu',
                            html    : 'Memproses Data',
                            onOpen  : () => {
                                swal.showLoading();
                            }
                        })
                    },
                    data        : {id_permohonan:id_permohonan},
                    dataType    : "JSON",
                    success     : function (data) {

                        swal.close();

                        $('#modal_tambah_data_bank_garansi').modal('show');

                        $('#judul_modal2').text('Ubah Data Bank garansi');

                        $('#no_bg').val(data.no_bg);

                        var tgl_bg = data.tgl_bg;

                        if (tgl_bg == null) {
                            $("#tgl_bg").val('');
                        } else {
                            var tgl = $.datepicker.formatDate('dd-M-yy', new Date(tgl_bg));

                            $("#tgl_bg").datepicker("setDate", new Date(tgl));
                        }
                        $('#id_bg').val(data.id_bg);
                        $('#aksi_simpan2').val('ubah');
                        $('#id_dokumen2').val(data[0].id_dokumen);
                        $('#id_kelengkapan2').val(data[0].id_kelengkapan);

                    },
                    error       : function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(err.Message);
                    }

                })

                return false;

            })

            // aksi edit bukti bayar premi
            $('#edit_data_byr_premi').on('click', function () {

                var id_permohonan = $('#id_permohonan3').val();

                $.ajax({
                    url         : "<?= base_url('kredit/kredit_non_konsumtif/ambil_data_bukti_byr_premi') ?>",
                    method      : "POST",
                    beforeSend  : function () {
                        swal({
                            title   : 'Menunggu',
                            html    : 'Memproses Data',
                            onOpen  : () => {
                                swal.showLoading();
                            }
                        })
                    },
                    data        : {id_permohonan:id_permohonan},
                    dataType    : "JSON",
                    success     : function (data) {

                        swal.close();

                        $('#modal_tambah_bukti_byr_premi').modal('show');

                        $('#judul_modal3').text('Ubah Data Bukti Bayar Premi');

                        $('#aksi_simpan3').val('ubah');
                        $('#id_kelengkapan3').val(data.id_kelengkapan);

                    },
                    error       : function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(err.Message);
                    }

                })

                return false;

            })

        // Akhir 24-03-2020

    })
</script>