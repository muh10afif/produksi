<style>
    input[type="checkbox"] {
        zoom: 1.4;
    }
</style>
<div class="container-fluid">
    <div class="row f_awal">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <button type="button" class="btn btn-success mr-3" id="btnTambah"><i class="fa fa-plus mr-2"></i> Tambah Data</button>
                    <a href="<?php echo base_url('Kredit/Kredit_non_konsumtif/unduh_excel_bank_garansi') ?>" class="btn btn-primary" ><i class="fa fa-download mr-2"></i> Export Excel</a>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover" id="tabel_bank_garansi" width="100%" cellspacing="0">
                        <thead class="bg-success">
                            <tr>
                                <th width="5%">No</th>
                                <th>Principal</th>
                                <th>Obligee</th>
                                <th>Nomor Permohonan</th>
                                <th>Asuransi</th>
                                <th>Bank</th>
                                <th>Status</th>
                                <th width="10%">Aksi</th>
                                <th>Penagihan Komisi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row f_tambah_data" style="display: none;">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <button class="btn btn-sm btn-success float-right" id="kembali_awal" type="button"><i class="fa fa-arrow-left mr-2"></i>Kembali</button>
                    <h5 id="judul">Tambah Data Permohonan</h5>
                </div>
                <div class="card-body">
                    <input type="hidden" class="aksi_simpan" name="aksi_simpan" value="buat">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-success card-outline card-tabs">
                                <div class="card-header p-0 pt-1 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Data Principal</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link data_permohonan" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Data Permohonan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Data Notaris</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-two-tabContent">
                                        <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                                            <form id="form-principal">
                                                <input type="hidden" class="id_permohonan" name="id_permohonan">
                                                <input type="hidden" class="aksi_simpan" id="aksi_simpan_principal" name="aksi_simpan" value="buat">
                                                <input type="hidden" name="id_principal_1" id="id_principal_1">
                                                <div class="form-group row">
                                                    <div class="col-3">
                                                    <label for="nama_principal" class="col-form-label">Nama Principal</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="row list_principal">
                                                            <div class="col">
                                                                <select class="form-control select2" id="pilihPrincipal2" style="width: 100%;">
                                                                    <option value="a">-- Pilih Principal --</option>
                                                                    <?php foreach ($principal as $p): ?>
                                                                        <option value="<?= $p['id_principal'] ?>"><?= $p['nama_principal'] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-0 mr-3">
                                                                <button type="button" class="btn btn-sm rounded-circle btn-success" id="buatPrincipal" data-toggle="tooltip" data-placement="top" title="Tekan untuk tambah data principal, apabila data tidak ada pada list principal"><i class="fa fa-plus"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="addPrincipal" hidden>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input type="text" name="nama_principal" class="form-control" id="nama_principal" placeholder="Masukkan Nama Principal">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="detail-principal">

                                                    <div class="form-group row">
                                                        <div class="col-3">
                                                        <label for="alamat_principal" class="col-form-label">Alamat Principal</label>
                                                        </div>
                                                        <div class="col">
                                                        <textarea class="form-control form-control-sm" name="alamat_principal1" id="alamat_principal" readonly></textarea>
                                                        <div class="invalid-feedback" id="_erAlamat_principal"></div>
                                                        </div>
                                                    </div>
                                                        <hr>
                                                    <div class="form-group row">
                                                        <div class="col-3">
                                                        <label for="nama_PIC1_principal" class="col-form-label">Nama Pengurus 1 Principal</label>
                                                        </div>
                                                        <div class="col">
                                                        <input type="text" class="form-control form-control-sm" name="pic11" id="nama_PIC1_principal" readonly>
                                                        <div class="invalid-feedback" id="_erPIC1"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-3">
                                                        <label for="jabatan_PIC1_principal" class="col-form-label">Jabatan Pengurus 1 Principal</label>
                                                        </div>
                                                        <div class="col">
                                                        <input type="text" class="form-control form-control-sm" name="jabatan_pic11" id="jabatan_PIC1_principal" readonly>
                                                        <div class="invalid-feedback" id="_erJabatan_PIC1"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-3">
                                                        <label for="nik_PIC1_principal" class="col-form-label">NIK Pengurus 1 Principal</label>
                                                        </div>
                                                        <div class="col">
                                                        <input type="number" class="form-control form-control-sm" name="nik_pic11" id="nik_PIC1_principal" readonly>
                                                        <div class="invalid-feedback" id="_erNik_PIC1"></div>
                                                        </div>
                                                    </div>
                                                        <hr>
                                                    <div class="form-group row">
                                                        <div class="col-3">
                                                        <label for="nama_PIC2_principal" class="col-form-label">Nama Pengurus 2 Principal</label>
                                                        </div>
                                                        <div class="col">
                                                        <input type="text" class="form-control form-control-sm" name="pic21" id="nama_PIC2_principal" readonly>
                                                        <div class="invalid-feedback" id="_erPIC2"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-3">
                                                        <label for="jabatan_PIC2_principal" class="col-form-label">Jabatan Pengurus 2 Principal</label>
                                                        </div>
                                                        <div class="col">
                                                        <input type="text" class="form-control form-control-sm" name="jabatan_pic21" id="jabatan_PIC2_principal" readonly>
                                                        <div class="invalid-feedback" id="_erJabatan_PIC2"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-3">
                                                        <label for="nik_PIC2_principal" class="col-form-label">NIK Pengurus 2 Principal</label>
                                                        </div>
                                                        <div class="col">
                                                        <input type="text" class="form-control form-control-sm" name="nik_pic21" id="nik_PIC2_principal" readonly>
                                                        <div class="invalid-feedback" id="_erNik_PIC2"></div>
                                                        </div>
                                                    </div>
                                                        <hr>
                                                    <div class="form-group row">
                                                        <div class="col-3">
                                                        <label for="akta_principal" class="col-form-label">Akta Principal</label>
                                                        </div>
                                                        <div class="col">
                                                        <input type="text" class="form-control form-control-sm" name="akta_principal1" id="akta_principal1" readonly>
                                                        <div class="invalid-feedback" id="_erAkta_principal"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-3">
                                                        <label for="nomor_akta_principal" class="col-form-label">Nomor Akta Principal</label>
                                                        </div>
                                                        <div class="col">
                                                        <input type="text" class="form-control form-control-sm" name="nomor_akta_principal1" id="nomor_akta_principal1" readonly>
                                                        <div class="invalid-feedback" id="_erNomor_akta_principal"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-3">
                                                        <label for="nomor_akta_principal" class="col-form-label">Tanggal Akta Principal</label>
                                                        </div>
                                                        <div class="col">
                                                        <input type="text" class="form-control form-control-sm" name="tgl_akta_principal" id="tgl_akta_principal1" readonly>
                                                        <div class="invalid-feedback" id="_erNomor_akta_principal"></div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="d-flex justify-content-end simpan-detail">
                                                        <button class="btn btn-sm btn-dark mr-2" id="batal_principal" type="button">Reset</button>
                                                        <button class="btn btn-sm btn-success" id="simpan_principal" type="button">Simpan</button>
                                                    </div>
                                                </div>

                                                <div class="buat_principal" hidden>

                                                    <div class="form-group row">
                                                        <div class="col-3">
                                                        <label for="alamat_principal" class="col-form-label">Alamat Principal</label>
                                                        </div>
                                                        <div class="col">
                                                        <textarea class="form-control form-control-sm" name="alamat_principal" id="alamat_principal2" placeholder="Masukkan Alamat Principal"></textarea>
                                                        <div class="invalid-feedback" id="_erAlamat_principal"></div>
                                                        </div>
                                                    </div>
                                                        <hr>
                                                    <div class="form-group row">
                                                        <div class="col-3">
                                                        <label for="nama_PIC1_principal" class="col-form-label">Nama Pengurus 1 Principal</label>
                                                        </div>
                                                        <div class="col">
                                                        <input type="text" class="form-control form-control-sm" name="pic1" id="nama_PIC1_principal2" placeholder="Masukkan Nama Pengurus 1">
                                                        <div class="invalid-feedback" id="_erPIC1"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-3">
                                                        <label for="jabatan_PIC1_principal" class="col-form-label">Jabatan Pengurus 1 Principal</label>
                                                        </div>
                                                        <div class="col">
                                                        <input type="text" class="form-control form-control-sm" name="jabatan_pic1" id="jabatan_PIC1_principal2" placeholder="Masukkan Jabatan Pengurus 1">
                                                        <div class="invalid-feedback" id="_erJabatan_PIC1"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-3">
                                                        <label for="nik_PIC1_principal" class="col-form-label">NIK Pengurus 1 Principal</label>
                                                        </div>
                                                        <div class="col">
                                                        <input type="number" class="form-control form-control-sm" name="nik_pic1" id="nik_PIC1_principal2" placeholder="Masukkan NIK Pengurus 1">
                                                        <div class="invalid-feedback" id="_erNik_PIC1"></div>
                                                        </div>
                                                    </div>
                                                        <hr>
                                                    <div class="form-group row">
                                                        <div class="col-3">
                                                        <label for="nama_PIC2_principal" class="col-form-label">Nama Pengurus 2 Principal</label>
                                                        </div>
                                                        <div class="col">
                                                        <input type="text" class="form-control form-control-sm" name="pic2" id="nama_PIC2_principal2" placeholder="Masukkan Nama Pengurus 2">
                                                        <div class="invalid-feedback" id="_erPIC2"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-3">
                                                        <label for="jabatan_PIC2_principal" class="col-form-label">Jabatan Pengurus 2 Principal</label>
                                                        </div>
                                                        <div class="col">
                                                        <input type="text" class="form-control form-control-sm" name="jabatan_pic2" id="jabatan_PIC2_principal2" placeholder="Masukkan Jabatan Pengurus 2">
                                                        <div class="invalid-feedback" id="_erJabatan_PIC2"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-3">
                                                        <label for="nik_PIC2_principal" class="col-form-label">NIK Pengurus 2 Principal</label>
                                                        </div>
                                                        <div class="col">
                                                        <input type="number" class="form-control form-control-sm" name="nik_pic2" id="nik_PIC2_principal2" placeholder="Masukkan NIK Pengurus 2">
                                                        <div class="invalid-feedback" id="_erNik_PIC2"></div>
                                                        </div>
                                                    </div>
                                                        <hr>
                                                    <div class="form-group row">
                                                        <div class="col-3">
                                                        <label for="akta_principal" class="col-form-label">Akta Principal</label>
                                                        </div>
                                                        <div class="col">
                                                        <select name="akta_principal" class="form-control select2" id="akta_principal" style="width: 100%;">
                                                            <option value="a">-- Pilih Akta Principal --</option>
                                                            <option value="Akta Pendirian">Akta Pendirian</option>
                                                            <option value="Akta Perubahan">Akta Perubahan</option>
                                                        </select>
                                                        <div class="invalid-feedback" id="_erAkta_principal"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-3">
                                                        <label for="nomor_akta_principal" class="col-form-label">Nomor Akta Principal</label>
                                                        </div>
                                                        <div class="col">
                                                        <input type="text" class="form-control form-control-sm" name="nomor_akta_principal" id="nomor_akta_principal2" placeholder="Masukkan Nomor Akta Principal">
                                                        <div class="invalid-feedback" id="_erNomor_akta_principal"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-3">
                                                        <label for="nomor_akta_principal" class="col-form-label">Tanggal Akta Principal</label>
                                                        </div>
                                                        <div class="col">
                                                        <input type="text" class="form-control form-control-sm datepicker2" name="tgl_akta_principal" placeholder="Masukkan Tanggal Principal" id="tgl_akta_principal">
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="d-flex justify-content-end simpan_detail2">
                                                        <button class="btn btn-sm btn-dark mr-2" id="batal_principal2" type="button">Reset</button>
                                                        <button class="btn btn-sm btn-success" id="simpan_principal2" type="button">Simpan</button>
                                                    </div>
                                                </div>
                                            
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">

                                            <form id="form-permohonan" autocomplete="off">
                                                <input type="hidden" class="id_permohonan" name="id_permohonan">
                                                <input type="hidden" class="aksi_simpan" id="aksi_simpan_permohonan" name="aksi_simpan" value="buat">
                                                <input type="hidden" class="id_cabang_asuransi">
                                                <input type="hidden" class="id_cabang_bank">
                                        
                                                <div class="form-group row">
                                                    <div class="col-3">
                                                    <label for="nomor_registrasi_permohonan" class="col-form-label">Nomor Registrasi</label>
                                                    </div>
                                                    <div class="col">
                                                    <input type="text" class="form-control form-control-sm" name="nomor_registrasi" id="nomor_registrasi_permohonan" readonly>
                                                    <div class="invalid-feedback" id="_erNomor_reg"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-3">
                                                    <label for="tanggal_registrasi_permohonan" class="col-form-label">Tanggal Registrasi</label>
                                                    </div>
                                                    <div class="col">
                                                    <input type="text" class="form-control form-control-sm" name="tgl_registrasi" id="tanggal_registrasi_permohonan" value="<?= date("d-M-Y", now('Asia/Jakarta')) ?>" readonly>
                                                    <div class="invalid-feedback" id="_erTgl_reg"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-3">
                                                    <label for="nomor_surat_permohonan" class="col-form-label">Nomor Surat Permohonan</label>
                                                    </div>
                                                    <div class="col">
                                                    <input type="text" class="form-control form-control-sm" id="nomor_surat_permohonan" name="nomor_surat_permohonan" placeholder="Masukkan Nomor Surat Permohonan">
                                                    <div class="invalid-feedback" id="_erNo_surat_reg"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-3">
                                                    <label for="tanggal_surat_permohonan" class="col-form-label">Tanggal Surat Permohonan</label>
                                                    </div>
                                                    <div class="col">
                                                    <input type="text" class="form-control form-control-sm datepicker2" name="tgl_surat_permohonan" id="tanggal_surat_permohonan" placeholder="Masukkan Tanggal Surat Permohonan">
                                                    <div class="invalid-feedback" id="_erTgl_surat_reg"></div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group row">
                                                    <div class="col-3">
                                                    <label for="asuransi_permohonan" class="col-form-label">Jenis Jaminan</label>
                                                    </div>
                                                    <div class="col">
                                                        <select class="form-control form-control-sm select2" id="jenis_jaminan" name="jenis_jaminan" style="width: 100%;">
                                                            <option value="a">-- Pilih Jenis Jaminan --</option>
                                                            <?php foreach ($jenis_bg as $p): ?>
                                                                <option value="<?= $p['id_jenis_bg'] ?>"><?= $p['jenis_bg'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row f_nomor_surat" style="display: none;">
                                                    <div class="col-3">
                                                        <label for="nomor_surat_undangan" class="col-form-label" id="judul_no_jaminan">Nomor Surat Undangan</label>
                                                        </div>
                                                        <div class="col">
                                                        <input type="text" class="form-control form-control-sm" name="no_surat_undangan" id="nomor_surat_undangan" placeholder="Masukkan Nomor Surat Undangan">
                                                        <div class="invalid-feedback" id="_erNo_surat_undangan"></div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row f_tgl_surat" style="display: none;">
                                                    <div class="col-3">
                                                        <label for="tanggal_surat_undangan" class="col-form-label" id="judul_tgl_jaminan">Tanggal Surat Undangan</label>
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" class="form-control form-control-sm datepicker2" name="tgl_surat_undangan" id="tanggal_surat_undangan" placeholder="Masukkan Tanggal Surat Undangan">
                                                        <div class="invalid-feedback" id="_erTgl_surat_undangan"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-3">
                                                        <label for="tgl_terbit_jaminan" class="col-form-label">Tanggal Terbit Jaminan</label>
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" class="form-control form-control-sm datepicker2" name="tgl_terbit_jaminan" id="tgl_terbit_jaminan" placeholder="Masukkan Tanggal Terbit Jaminan">
                                                        <div class="invalid-feedback" id=""></div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group row">
                                                    <div class="col-3">
                                                    <label for="asuransi_permohonan" class="col-form-label">Asuransi</label>
                                                    </div>
                                                    <div class="col">
                                                        <select class="form-control form-control-sm select2" id="asuransi_permohonan" name="asuransi" style="width: 100%;">
                                                            <option value="a">-- Pilih Asuransi --</option>
                                                            <?php foreach ($data_asuransi as $p): ?>
                                                                <option value="<?= $p['id_asuransi'] ?>"><?= $p['nama_asuransi'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="invalid-feedback" id="_erAsuransi"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-3">
                                                    <label for="cabang_asuransi_permohonan" class="col-form-label">Cabang Asuransi</label>
                                                    </div>
                                                    <div class="col">
                                                    <select  class="form-control form-control-sm select2" id="cabang_asuransi_permohonan" name="id_cabang_asuransi" style="width: 100%;"></select>
                                                    <div class="invalid-feedback" id="_erCabang_asuransi"></div>
                                                    </div>
                                                </div>
                                                    <hr>
                                                <div class="form-group row">
                                                    <div class="col-3">
                                                    <label for="bank_permohonan" class="col-form-label">Bank</label>
                                                    </div>
                                                    <div class="col">
                                                    <select  class="form-control form-control-sm select2" id="bank_permohonan" name="bank" style="width: 100%;">
                                                        <option value="a">-- Pilih Bank --</option>
                                                        <?php foreach ($data_bank as $p): ?>
                                                            <option value="<?= $p['id_bank'] ?>"><?= $p['nama_bank'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="invalid-feedback" id="_erBank_permohonan"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-3">
                                                    <label for="cabang_bank_permohonan" class="col-form-label">Cabang Bank</label>
                                                    </div>
                                                    <div class="col">
                                                    <select  class="form-control form-control-sm select2" name="id_cabang_bank" id="cabang_bank_permohonan" style="width: 100%;"></select>
                                                    <div class="invalid-feedback" id="_erCabang_bank_permohonan"></div>
                                                    </div>
                                                </div>
                                                    <hr>
                                                <div class="form-group row">
                                                    <div class="col-3">
                                                    <label for="nama_oblige" class="col-form-label">Nama Oblige</label>
                                                    </div>
                                                    <div class="col">
                                                    <textarea class="form-control form-control-sm" name="nama_oblige" id="nama_oblige" cols="30" rows="3" placeholder="Masukkan Nama Oblige"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-3">
                                                    <label for="alamat_oblige" class="col-form-label">Alamat Oblige</label>
                                                    <div class="invalid-feedback" id="_erNama_oblige"></div>
                                                    </div>
                                                    <div class="col">
                                                    <textarea class="form-control form-control-sm" name="alamat_oblige" id="alamat_oblige" cols="30" rows="3" placeholder="Masukkan Alamat Oblige"></textarea>
                                                    <div class="invalid-feedback" id="_erAlamat_oblige"></div>
                                                    </div>
                                                </div>
                                                    <hr>
                                                <div class="form-group row">
                                                    <div class="col-3">
                                                    <label for="nama_pekerjaan" class="col-form-label">Nama Pekerjaan</label>
                                                    </div>
                                                    <div class="col">
                                                        <textarea class="form-control form-control-sm" name="nama_pekerjaan" id="nama_pekerjaan" placeholder="Masukkan Nama Pekerjaan" cols="30" rows="3"></textarea>
                                                        <div class="invalid-feedback" id="_erNama_pekerjaan"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-3">
                                                    <label for="nilai_kontrak" class="col-form-label">Nilai Kontrak</label>
                                                    </div>
                                                    <div class="col">
                                                    <input type="text" class="form-control form-control-sm separator" name="nilai_kontrak" id="nilai_kontrak" placeholder="Masukkan Nilai Kontrak">
                                                    <div class="invalid-feedback" id="_erNilai_kontrak"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-3">
                                                    <label for="nilai_jaminan" class="col-form-label">Nilai Jaminan</label>
                                                    </div>
                                                    <div class="col">
                                                    <input type="text" class="form-control form-control-sm separator" name="nilai_jaminan" id="nilai_jaminan" placeholder="Masukkan Nilai Jaminan">
                                                    <div class="invalid-feedback" id="_erNilai_jaminan"></div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group row">
                                                    <div class="col-3">
                                                    <label for="tanggal_surat_undangan" class="col-form-label">Jangka Waktu Awal</label>
                                                    </div>
                                                    <div class="col">
                                                    <input type="text" class="form-control form-control-sm datepicker2" name="jangka_waktu_awal" id="jangka_waktu_awal" placeholder="Masukkan Jangka Waktu Awal">
                                                    <div class="invalid-feedback" id="_erTgl_surat_undangan"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-3">
                                                        <label for="tanggal_surat_undangan" class="col-form-label">Jangka Waktu Akhir</label>
                                                        </div>
                                                        <div class="col">
                                                        <input type="text" class="form-control form-control-sm datepicker2" name="jangka_waktu_akhir" id="jangka_waktu_akhir" placeholder="Masukkan Jangka Waktu Akhir">
                                                        <div class="invalid-feedback" id="_erTgl_surat_undangan"></div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-end btn_permohonan">
                                                    <button class="btn btn-sm btn-dark mr-2" id="batal_data_permohonan" type="button">Reset</button>
                                                    <button class="btn btn-sm btn-success" id="simpan_data_permohonan" type="button">Simpan</button>
                                                </div>

                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">

                                            <form id="form-legalitas" autocomplete="off">
                                                <input type="hidden" class="id_permohonan" name="id_permohonan">
                                                <input type="hidden" class="aksi_simpan" id="aksi_simpan_legalitas" name="aksi_simpan" value="buat">
                                            
                                                <div class="form-group row">
                                                    <div class="col-3">
                                                    <label for="nama_notaris" class="col-form-label">Nama Notaris</label>
                                                    </div>
                                                    <div class="col">
                                                    <input type="text" class="form-control form-control-sm" name="nama_notaris" placeholder="Masukkan Nama Notaris" id="nama_notaris">
                                                    <div class="invalid-feedback" id="_erNama_notaris"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-3">
                                                    <label for="alamat_notaris" class="col-form-label">Alamat Notaris</label>
                                                    </div>
                                                    <div class="col">
                                                    <textarea class="form-control form-control-sm" name="alamat_notaris" placeholder="Masukkan Alamat Notaris" id="alamat_notaris"></textarea>
                                                    <div class="invalid-feedback" id="_erAlamat_notaris"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-3">
                                                    <label for="nomor_ktp" class="col-form-label">Nomor KTP</label>
                                                    </div>
                                                    <div class="col">
                                                    <input type="number" class="form-control form-control-sm" name="no_ktp" placeholder="Masukkan Nomor KTP" id="nomor_ktp">
                                                    <div class="invalid-feedback" id="_erNo_ktp"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-3">
                                                    <label for="pengadilan" class="col-form-label">Pengadilan</label>
                                                    </div>
                                                    <div class="col">
                                                    <input type="text" class="form-control form-control-sm" name="pengadilan" placeholder="Masukkan Nama Pengadilan" id="pengadilan">
                                                    <div class="invalid-feedback" id="_erPengadilan"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-3">
                                                    <label for="alamat_pengadilan" class="col-form-label">Alamat Pengadilan</label>
                                                    </div>
                                                    <div class="col">
                                                    <textarea class="form-control form-control-sm" placeholder="Masukkan Alamat Pengadilan" name="alamat_pengadilan" id="alamat_pengadilan"></textarea>
                                                    <div class="invalid-feedback" id="_erAlamat_pengadilan"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-3">
                                                    <label for="pasal" class="col-form-label">Pasal</label>
                                                    </div>
                                                    <div class="col">
                                                    <input type="text" class="form-control form-control-sm" placeholder="Masukkan Pasal" name="pasal" id="pasal">
                                                    <div class="invalid-feedback" id="_erPasal"></div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-end btn_legalitas">
                                                    <button class="btn btn-sm btn-dark mr-2" id="batal_data_legalitas" type="button">Reset</button>
                                                    <button class="btn btn-sm btn-success" id="simpan_data_legalitas" type="button">Simpan</button>
                                                </div>
                                            </form>
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

    <div class="list_kelengkapan_penagihan" style="display: none;">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <input type="hidden" class="id_permohonan" id="id_permohonan">
                    <div class="card-header">
                        <button type="button" class="btn btn-success btn-sm float-right" id="kembali_awal1"><i class="fa fa-arrow-left mr-2"></i> Kembali</button>
                        <h5>Penagihan Komisi</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover tabel_dok_penagihan" width="100%" cellspacing="0">
                            <thead class="bg-success">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama Dokumen</th>
                                    <th>Lihat Dokumen</th>
                                    <th>Kelengkapan Data</th>
                                    <th>Validasi Dokumen</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer f_simpan_pk">
                        <div class="row baris_simpan_penagihan">
                            <div class="col-md-8">
                                <mark>*Surat penagihan akan otomatis generate setelah kelengkapan dan validasi data terpenuhi secara keseluruhan.</mark>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-sm btn-success float-right" type="button" id="simpan_penagihan_komisi"><i class="fa fa-check-square-o mr-2"></i>Simpan dan Lanjutkan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 det_penagihan" style="display: none;">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <p class="font-weight-bold">Surat Penagihan Komisi Terbit Pada Tanggal <span id="tgl_terbit_penagihan"></span></p>
                            </div>
                            <div class="col-md-4">
                                <form action="<?= base_url('kredit/kredit_non_konsumtif/download_dokumen') ?>" method="post">
                                    <input type="hidden" name="dokumen" id="dokumen_penagihan">
                                    <input type="hidden" name="id_permohonan" class="id_permohonan" id="id_permohonan_penagihan">
                                    <button class="btn btn-sm btn-primary float-right" type="submit"><i class="fa fa-download mr-2"></i>Unduh Surat Penagihan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row belum_bayar">
                            <div class="col-md-8">
                                <p><mark>Belum ada data pembayaran komisi, tambahkan data pembayaran jika komisi sudah dibayar.</mark></p>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-sm btn-primary float-right" id="bayar_komisi"><i class="fa fa-plus-square mr-2"></i>Tambah Data Pembayaran Komisi</button>
                            </div>
                        </div>
                        <!-- setalah pembayaran -->
                        <div class="row setelah_bayar" style="display: none;">
                            <div class="col-md-8">
                                <p><b>Data Pembayaran Komisi Pada Tanggal <span id="tanggal_bayar_komisi"></span></b><br>
                                Nominal dibayarkan: Rp. <span id="nominal_bayar"></span>
                                </p>
                            </div>
                            <div class="col-md-4">
                                <form action="<?= base_url('kredit/kredit_non_konsumtif/download_unduh_bukti') ?>" method="post">
                                    <input type="hidden" name="unduh_bukti" id="unduh_bukti">
                                    <button class="btn btn-sm btn-primary float-right" type="submit"><i class="fa fa-download mr-2"></i>Unduh Bukti</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- modal pembayaran komisi -->
<div id="modal_bayar_komisi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title text-dark" id="judul_modal">Tambah Data Pembayaran Komisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            
            <div class="modal-body">

                <form id="form_bayar_komisi" autocomplete="off">
                    <input type="hidden" name="id_permohonan" class="id_permohonan" id="id_permohonan">
                    <input type="hidden" name="id_bayar_komisi" id="id_bayar_komisi">
                    
                    <div class="row d-flex justify-content-center mt-3 mb-2">
                        <div class="col-md-10 mb-3">
                            <div class="row">
                                <label class="col-md-4 control-label col-form-label">Komisi Dibayar</label>
                                <div class="col-md-8">
                                    <input type="text" id="komisi_dibayar" name="komisi_dibayar" class="form-control separator" placeholder="Masukkan Komisi Dibayar">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10 mb-3">

                            <div class="row">
                                <label class="col-md-4 control-label col-form-label">Tanggal Pembayaran</label>
                                <div class="col-md-8">
                                <input type="text" class="form-control datepicker2" id="tgl_bayar" name="tgl_bayar" placeholder="Masukkan Tanggal Pembayaran" readonly>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-10 mb-3">
                            <div class="row">
                                <label class="col-md-4 control-label col-form-label">Upload Bukti Pembayaran</label>
                                <div class="col-md-8">
                                    
                                    <input type="file" name="dokumen" id="dokumen" accept="image/jpeg, image/jpg, image/png, application/pdf" class="form-control mb-2">
                                    <mark id="ket_upload">Upload file bertipe .pdf atau image !</mark>

                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success" id="simpan_bayar_komisi">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function () {

        // menampilkan data bank garansi
        var tabel_bank_garansi = $('#tabel_bank_garansi').DataTable({
            "processing"        : true,
            "serverSide"        : true,
            "order"             : [],
            "ajax"              : {
                "url"   : "<?= base_url("Kredit/kredit_non_konsumtif/tampil_bank_garansi") ?>",
                "type"  : "POST"
            },
            "columnDefs"        : [{
                "targets"   : [0,7,8],
                "orderable" : false
            }]
        })

        // aksi tambah data
        $('#btnTambah').on('click', function () {

            $('.aksi_simpan').val('buat');

            $.ajax({
                url         : "<?= base_url('kredit/kredit_non_konsumtif/ambil_nomor_register') ?>",
                type        : "POST",
                dataType    : "JSON",
                success     : function (data) {
                    swal.close();

                    $('.f_awal').slideUp('fast');
                    $('.f_tambah_data').slideDown(300);

                    // $('.f_tambah_data').removeAttr('hidden');
                    // $('.f_awal').attr('hidden', true);
                    $('#form-principal').trigger('reset');
                    $('.list_principal').removeAttr('hidden');
                    $('.addPrincipal').attr('hidden', true);
                    $('.detail-principal').removeAttr('hidden');
                    $('.buat_principal').attr('hidden', true);
                    $('#pilihPrincipal2').select2('val', 'a');
                    $('.simpan-detail').removeAttr('hidden');
                    $('#pilihPrincipal2').removeAttr('disabled');
                    $('#buatPrincipal').removeAttr('hidden');
                    $('.id_permohonan').val('');
                    $('.btn_permohonan').removeAttr('hidden');
                    $('#form-permohonan').trigger('reset');
                    $('#form-legalitas').trigger('reset');
                    $('.btn_legalitas').removeAttr('hidden');
                    $('.aksi_simpan').val('buat');
                    $('#judul').text('Tambah Data Permohonan');

                    $('.id_permohonan').val('');
                    $('.id_cabang_asuransi').val('');
                    $('.id_cabang_bank').val('');

                    $('#asuransi_permohonan').select2('val', 'a');
                    $('#bank_permohonan').select2('val', 'a');
                    $('#jenis_jaminan').select2('val', 'a');

                    $('#tgl_registrasi').val(data.tgl_regis);
                    $('#nomor_registrasi_permohonan').val(data.no_regis);
                    
                }
            })

            return false;
        })

        // aksi kembali
        $('#kembali_awal').on('click', function () {

            $('.f_tambah_data').slideUp('fast');
            $('.f_awal').slideDown(300);

            tabel_bank_garansi.ajax.reload(null, false);
        })

        // 20-03-2020

            $('#buatPrincipal').on('click', function () {
                $('.list_principal').attr('hidden', true);
                $('.addPrincipal').removeAttr('hidden');
                $('.detail-principal').attr('hidden', true);
                $('.buat_principal').removeAttr('hidden');
            })

            // aksi bila pilih prinsipal
            $('#pilihPrincipal2').on('change', function () {

                var id_principal = $(this).val(); 

                var id_p_2 = $('#id_principal_1').val();

                if (id_principal == 'a') {

                    // $('#form-principal').trigger('reset');

                    $('#form-principal').find('input, select, textarea').not(".id_permohonan, .aksi_simpan").val('');
                    
                } else {
                
                    $.ajax({
                      url         : "<?= base_url('Kredit/kredit_non_konsumtif/tampil_detail_principal') ?>",
                      method      : "POST",
                      data        : {id_principal:id_principal, id_principal_2:id_p_2},
                      dataType    : "JSON",
                      success     : function (data) {
                        swal.close();

                        console.log(data.nama_principal);

                        // $('.detail-principal').removeAttr('hidden');
                        $('#alamat_principal').val(data.alamat_principal);
                        $('#nama_PIC1_principal').val(data.pic1);
                        $('#jabatan_PIC1_principal').val(data.jabatan_pic1);
                        $('#nik_PIC1_principal').val(data.nik_pic1);
                        $('#nama_PIC2_principal').val(data.pic2);
                        $('#jabatan_PIC2_principal').val(data.jabatan_pic2);
                        $('#nik_PIC2_principal').val(data.nik_pic2);
                        $('#akta_principal1').val(data.akta_principal);
                        $('#nomor_akta_principal1').val(data.nomor_akta_principal);

                        if (data.tgl_akta_principal != null) {
                            var tgl = $.datepicker.formatDate('dd-M-yy', new Date(data.tgl_akta_principal));

                            $('#tgl_akta_principal1').val(tgl); 
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

            // aksi button simpan id principal
            $('#simpan_principal').on('click', function () {

                var id              = $('#pilihPrincipal2').val();
                var aksi_simpan     = $('#aksi_simpan_principal').val();
                var id_permohonan   = $('.id_permohonan').val();

                console.log(aksi_simpan);

                if (id == null) {
                    swal({
                        title               : "Peringatan",
                        text                : 'Principal harus terisi!',
                        buttonsStyling      : false,
                        confirmButtonClass  : "btn btn-warning",
                        type                : 'warning',
                        showConfirmButton   : false,
                        timer               : 1000
                    });
                } else {

                    swal({
                        title       : 'Konfirmasi',
                        text        : 'Yakin akan kirim data',
                        type        : 'warning',

                        buttonsStyling      : false,
                        confirmButtonClass  : "btn btn-info",
                        cancelButtonClass   : "btn btn-danger mr-3",

                        showCancelButton    : true,
                        confirmButtonText   : 'Kirim Data',
                        confirmButtonColor  : '#d33',
                        cancelButtonColor   : '#3085d6',
                        cancelButtonText    : 'Batal',
                        reverseButtons      : true
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url         : "<?= base_url('Kredit/kredit_non_konsumtif/simpan_principal/simpan') ?>",
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
                                data        : {id_principal:id, aksi_simpan:aksi_simpan, id_permohonan:id_permohonan},
                                dataType    : "JSON",
                                success     : function (data) {

                                    swal({
                                        title               : "Berhasil",
                                        text                : 'Data berhasil disimpan',
                                        buttonsStyling      : false,
                                        confirmButtonClass  : "btn btn-success",
                                        type                : 'success',
                                        showConfirmButton   : false,
                                        timer               : 1000
                                    });

                                    $('.id_permohonan').val(data.id_permohonan);
                                    
                                    // $('#aksi_simpan_principal').val('ubah');

                                    var aksi_simpan = $('#aksi_simpan_principal').val();

                                    console.log(aksi_simpan);

                                    if (aksi_simpan == 'buat') {
                                        $('.simpan-detail').attr('hidden', true);
                                        $('#pilihPrincipal2').attr('disabled', true);
                                        $('#buatPrincipal').attr('hidden', true);
                                    } else {
                                        $('.simpan-detail').removeAttr('hidden');
                                    }

                                    $('.nav-tabs a[href="#custom-tabs-two-profile"]').tab('show');
                                    
                                },
                                error       : function(xhr, status, error) {
                                    var err = eval("(" + xhr.responseText + ")");
                                    alert(err.Message);
                                }

                            })

                            return false;
                        } else if (result.dismiss === swal.DismissReason.cancel) {

                            swal({
                                    title               : 'Batal',
                                    text                : 'Anda membatalkan simpan principal',
                                    buttonsStyling      : false,
                                    confirmButtonClass  : "btn btn-info",
                                    type                : 'error'
                                }); 
                        }
                    })
                   
                }
                
            })

            // chained
            $('#asuransi_permohonan').on('change', function () {
                var id_asuransi = $(this).val();

                console.log(id_asuransi);

                $.ajax({
                    url         : "<?= base_url('kredit/kredit_non_konsumtif/ambil_cabang_asuransi') ?>",
                    type        : "POST",
                    beforeSend 	: function (e) {
                        if (e && e.overrideMimeType) {
                            e.overrideMimeType("application/json;charshet=UTF-8");
                        }				
                    },
                    data        : {id_asuransi:id_asuransi},
                    dataType    : "JSON",
                    success     : function (data) {
                        $('#cabang_asuransi_permohonan').html(data.cabang_asuransi);

                        var id_cabang_asuransi = $('.id_cabang_asuransi').val();

                        if (id_cabang_asuransi != null) {
                            $('#cabang_asuransi_permohonan').select2('val', id_cabang_asuransi);
                        }
                        
                    },
                    error 		: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                })
            })

            $('#bank_permohonan').on('change', function () {
                var id_bank = $(this).val();    

                $.ajax({
                    url         : "<?= base_url('kredit/kredit_non_konsumtif/ambil_cabang_bank') ?>",
                    type        : "POST",
                    beforeSend 	: function (e) {
                        if (e && e.overrideMimeType) {
                            e.overrideMimeType("application/json;charshet=UTF-8");
                        }				
                    },
                    data        : {id_bank:id_bank},
                    dataType    : "JSON",
                    success     : function (data) {
                        $('#cabang_bank_permohonan').html(data.cabang_bank);

                        var id_cabang_bank = $('.id_cabang_bank').val();

                        if (id_cabang_bank != null) {
                            $('#cabang_bank_permohonan').select2('val', id_cabang_bank);
                        }
                        
                    },
                    error 		: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                })
            })

            // mengambil nomor registrasi
            $('.data_permohonan2').on('click', function () {

                console.log('masukk');

                var aksi_simpan = $('#aksi_simpan_permohonan').val();
                
                $.ajax({
                    url         : "<?= base_url('kredit/kredit_non_konsumtif/ambil_nomor_register') ?>",
                    type        : "POST",
                    beforeSend 	: function (e) {
                        if (e && e.overrideMimeType) {
                            e.overrideMimeType("application/json;charshet=UTF-8");
                        }				
                    },
                    dataType    : "JSON",
                    success     : function (data) {

                        if (aksi_simpan == 'buat') {
                            $('#nomor_registrasi_permohonan').val(data.no_regis);
                            $('#tgl_registrasi').val(data.tgl_regis);
                        }
                        
                    },
                    error 		: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                })

            })

            // aksi simpan principal yg baru
            $('#simpan_principal2').on('click', function () {

                var form = $('#form-principal').serialize();

                swal({
                    title       : 'Konfirmasi',
                    text        : 'Yakin akan kirim data',
                    type        : 'warning',

                    buttonsStyling      : false,
                    confirmButtonClass  : "btn btn-info",
                    cancelButtonClass   : "btn btn-danger mr-3",

                    showCancelButton    : true,
                    confirmButtonText   : 'Kirim Data',
                    confirmButtonColor  : '#d33',
                    cancelButtonColor   : '#3085d6',
                    cancelButtonText    : 'Batal',
                    reverseButtons      : true
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url         : "<?= base_url('Kredit/kredit_non_konsumtif/simpan_principal/buat') ?>",
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
                            data        : form,
                            dataType    : "JSON",
                            success     : function (data) {

                                swal({
                                    title               : "Berhasil",
                                    text                : 'Data berhasil disimpan',
                                    buttonsStyling      : false,
                                    confirmButtonClass  : "btn btn-success",
                                    type                : 'success',
                                    showConfirmButton   : false,
                                    timer               : 1000
                                });

                                $('.id_permohonan').val(data.id_permohonan);
                               
                                // $('#pilihPrincipal2').attr('disabled', true);
                                // $('#buatPrincipal').attr('hidden', true);
                                // $('#aksi_simpan_principal').val('ubah');

                                var aksi_simpan = $('#aksi_simpan_principal').val();

                                if (aksi_simpan == 'buat') {
                                    $('.simpan_detail2').attr('hidden', true);
                                } else {
                                    $('.simpan_detail2').removeAttr('hidden');
                                }

                                $('#id_principal_1').val(data.id_principal);

                                $('.nav-tabs a[href="#custom-tabs-two-profile"]').tab('show');
                                
                            },
                            error       : function(xhr, status, error) {
                                var err = eval("(" + xhr.responseText + ")");
                                alert(err.Message);
                            }

                        })

                        return false;
                    } else if (result.dismiss === swal.DismissReason.cancel) {

                        swal({
                                title               : 'Batal',
                                text                : 'Anda membatalkan simpan principal',
                                buttonsStyling      : false,
                                confirmButtonClass  : "btn btn-info",
                                type                : 'error'
                            }); 
                    }
                })
                
            })

            // aksi simpan data permohonan
            $('#simpan_data_permohonan').on('click', function () {
                var form        = $('#form-permohonan').serialize();

                swal({
                    title       : 'Konfirmasi',
                    text        : 'Yakin akan kirim data',
                    type        : 'warning',

                    buttonsStyling      : false,
                    confirmButtonClass  : "btn btn-info",
                    cancelButtonClass   : "btn btn-danger mr-3",

                    showCancelButton    : true,
                    confirmButtonText   : 'Kirim Data',
                    confirmButtonColor  : '#d33',
                    cancelButtonColor   : '#3085d6',
                    cancelButtonText    : 'Batal',
                    reverseButtons      : true
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url         : "<?= base_url('Kredit/kredit_non_konsumtif/simpan_permohonan') ?>",
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
                            data        : form,
                            dataType    : "JSON",
                            success     : function (data) {

                                swal({
                                    title               : "Berhasil",
                                    text                : 'Data berhasil disimpan',
                                    buttonsStyling      : false,
                                    confirmButtonClass  : "btn btn-success",
                                    type                : 'success',
                                    showConfirmButton   : false,
                                    timer               : 1000
                                });
                                
                                $('.id_permohonan').val(data.id_permohonan);

                                var aksi_simpan = $('#aksi_simpan_permohonan').val();

                                if (aksi_simpan == 'buat') {
                                    $('.btn_permohonan').attr('hidden', true);
                                } else {
                                    $('.btn_permohonan').removeAttr('hidden');
                                }

                                $('.nav-tabs a[href="#custom-tabs-two-messages"]').tab('show');
                            },
                            error       : function(xhr, status, error) {
                                var err = eval("(" + xhr.responseText + ")");
                                alert(err.Message);
                            }

                        })

                        return false;
                    } else if (result.dismiss === swal.DismissReason.cancel) {

                        swal({
                                title               : 'Batal',
                                text                : 'Anda membatalkan simpan permohonan',
                                buttonsStyling      : false,
                                confirmButtonClass  : "btn btn-info",
                                type                : 'error'
                            }); 
                    }
                })
            })

            // aksi simpan data legalitas
            $('#simpan_data_legalitas').on('click', function () {
                var form        = $('#form-legalitas').serialize();

                swal({
                    title       : 'Konfirmasi',
                    text        : 'Yakin akan kirim data',
                    type        : 'warning',

                    buttonsStyling      : false,
                    confirmButtonClass  : "btn btn-info",
                    cancelButtonClass   : "btn btn-danger mr-3",

                    showCancelButton    : true,
                    confirmButtonText   : 'Kirim Data',
                    confirmButtonColor  : '#d33',
                    cancelButtonColor   : '#3085d6',
                    cancelButtonText    : 'Batal',
                    reverseButtons      : true
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url         : "<?= base_url('Kredit/kredit_non_konsumtif/simpan_legalitas') ?>",
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
                            data        : form,
                            dataType    : "JSON",
                            success     : function (data) {

                                swal({
                                    title               : "Berhasil",
                                    text                : 'Data berhasil disimpan',
                                    buttonsStyling      : false,
                                    confirmButtonClass  : "btn btn-success",
                                    type                : 'success',
                                    showConfirmButton   : false,
                                    timer               : 1000
                                });
                                
                                $('.id_permohonan').val(data.id_permohonan);
                                
                                var aksi_simpan = $('#aksi_simpan_permohonan').val();

                                if (aksi_simpan == 'buat') {
                                    $('.btn_legalitas').attr('hidden', true);
                                } else {
                                    $('.btn_legalitas').removeAttr('hidden');
                                }
                            },
                            error       : function(xhr, status, error) {
                                var err = eval("(" + xhr.responseText + ")");
                                alert(err.Message);
                            }

                        })

                        return false;
                    } else if (result.dismiss === swal.DismissReason.cancel) {

                        swal({
                                title               : 'Batal',
                                text                : 'Anda membatalkan simpan data legalitas',
                                buttonsStyling      : false,
                                confirmButtonClass  : "btn btn-info",
                                type                : 'error'
                            }); 
                    }
                })
            })

        // Akhir 20-03-2020

        // 22-03-2020

            // aksi batal principal 2
            $('#batal_principal2').on('click', function () {
                $('.addPrincipal').attr('hidden', true);
                $('.list_principal').removeAttr('hidden');
                $('.detail-principal').removeAttr('hidden');
                $('.buat_principal').attr('hidden', true);
                $('#pilihPrincipal2').select2('val', 'a');
            })

            // aksi batal principal 
            $('#batal_principal').on('click', function () {
                $('#pilihPrincipal2').select2('val', 'a');
            })

            // aksi batal permohonan
            $('#batal_data_permohonan').on('click', function () {

                var id_permohonan = $('.id_permohonan').val();
                var no_regis      = $('#nomor_registrasi_permohonan').val();

                $.ajax({
                    url         : "<?= base_url('kredit/kredit_non_konsumtif/ambil_nomor_register') ?>",
                    type        : "POST",
                    beforeSend 	: function (e) {
                        if (e && e.overrideMimeType) {
                            e.overrideMimeType("application/json;charshet=UTF-8");
                        }				
                    },
                    data        : {id_permohonan:id_permohonan, no_regis:no_regis},
                    dataType    : "JSON",
                    success     : function (data) {

                        // $('#form-permohonan').trigger('reset');

                        console.log(data.cek_no_regis);

                        $('#form-permohonan').find('input, select, textarea').not(".id_permohonan, .aksi_simpan, .id_cabang_asuransi, .id_cabang_bank, #nomor_registrasi_permohonan, #tanggal_registrasi_permohonan").val('');

                        $('#asuransi_permohonan').select2('val', 'a');
                        $('#bank_permohonan').select2('val', 'a');
                        $('#jenis_jaminan').select2('val', 'a');

                        $("#cabang_asuransi_permohonan").empty().trigger('change');
                        $("#cabang_bank_permohonan").empty().trigger('change');

                        if (data.ada_no_regis == 0) {
                            $('#nomor_registrasi_permohonan').val(data.no_regis);
                            $('#tanggal_registrasi_permohonan').val(data.tgl_regis);
                        }
                        
                    },
                    error 		: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                })
            })

            // aksi batal legalitas
            $('#batal_data_legalitas').on('click', function () {
                // $('#form-legalitas').trigger('reset');

                $('#form-legalitas').find('input, select, textarea').not(".id_permohonan, .aksi_simpan").val('');
            })

            // aksi edit permohonan bank garansi
            $('#tabel_bank_garansi').on('click', '.edit-permohonan', function () {
                var id_permohonan = $(this).data('id');

                var id_principal  = $('#id_principal_1').val();

                $('#pilihPrincipal2').select2('val', id_principal);

                console.log(id_permohonan);

                $('.id_permohonan').val(id_permohonan);

                $('.aksi_simpan').val('ubah');

                $.ajax({
                    url         : "<?= base_url('kredit/kredit_non_konsumtif/tampil_data_edit_permohonan') ?>",
                    type        : "POST",
                    data        : {id_permohonan:id_permohonan},
                    dataType    : "JSON",
                    success     : function (data) {
                        swal.close();

                        console.log(data.id_principal+ 'ad');

                        $('#aksi_simpan_permohonan').val('ubah');

                        $('.f_awal').slideUp('fast');
                        $('.f_tambah_data').slideDown(300);

                        $('#judul').text('Ubah Data Permohonan');

                        // data principal
                            if (data.id_principal == null) {
                                $('#pilihPrincipal2').select2('val', 'a');
                            } else {
                                $('#pilihPrincipal2').val(data.id_principal).trigger('change');
                            }

                            $('.simpan-detail').removeAttr('hidden');
                            $('#pilihPrincipal2').removeAttr('disabled');
                            $('.buat_principal').attr('hidden', true);
                            $('#buatPrincipal').removeAttr('hidden');

                            $('.list_principal').removeAttr('hidden');
                            $('.addPrincipal').attr('hidden', true);
                            $('.detail-principal').removeAttr('hidden');

                        // data permohonan
                            $('.btn_permohonan').removeAttr('hidden');

                            if (data[0].cek_no_regis == null) {
                                $('#nomor_registrasi_permohonan').val(data[0].no_regis);
                            } else {
                                $('#nomor_registrasi_permohonan').val(data.nomor_registrasi);
                            }

                            var tgl_reg = data.tgl_registrasi;

                            if (tgl_reg == null) {
                                $("#tanggal_registrasi_permohonan").val(data[0].tgl_regis);
                            } else {
                                var tgl = $.datepicker.formatDate('dd-M-yy', new Date(tgl_reg));

                                $("#tanggal_registrasi_permohonan").val(tgl);
                            }

                            var tgl_srp = data.tgl_surat_permohonan;

                            if (tgl_srp == null) {
                                $("#tanggal_surat_permohonan").val('');
                            } else {
                                var tgl = $.datepicker.formatDate('dd-M-yy', new Date(tgl_srp));

                                $("#tanggal_surat_permohonan").datepicker("setDate", new Date(tgl));
                            }

                            var tgl_sru = data.tgl_surat_undangan;

                            if (tgl_sru == null) {
                                $("#tanggal_surat_undangan").val('');
                            } else {
                                var tgl = $.datepicker.formatDate('dd-M-yy', new Date(tgl_sru));

                                $("#tanggal_surat_undangan").datepicker("setDate", new Date(tgl));
                            }

                            var tgl_jwa = data.jangka_waktu_awal;

                            if (tgl_jwa == null) {
                                $("#jangka_waktu_awal").val('');
                            } else {
                                var tgl_a = $.datepicker.formatDate('dd-M-yy', new Date(tgl_jwa));

                                $("#jangka_waktu_awal").datepicker("setDate", new Date(tgl_a));
                            }

                            var tgl_jwk = data.jangka_waktu_akhir;

                            if (tgl_jwk == null) {
                                $("#jangka_waktu_akhir").val('');
                            } else {
                                var tgl_k = $.datepicker.formatDate('dd-M-yy', new Date(tgl_jwk));

                                $("#jangka_waktu_akhir").datepicker("setDate", new Date(tgl_k));
                            }

                            console.log('a '+data.id_cabang_bank);
                            
                            $('#nomor_surat_permohonan').val(data.nomor_surat_permohonan);
                            $('#nomor_surat_undangan').val(data.no_surat_undangan);
                            $('#asuransi_permohonan').select2('val', data.id_asuransi == null ? 'a' : data.id_asuransi);
                            $(".id_cabang_asuransi").val(data.id_cabang_asuransi);
                            $('#bank_permohonan').select2('val', data.id_bank == null ? 'a' : data.id_bank);
                            $('.id_cabang_bank').val(data.id_cabang_bank);
                            $('#nama_oblige').val(data.nama_oblige);
                            $('#alamat_oblige').val(data.alamat_oblige);
                            $('#nama_pekerjaan').val(data.nama_pekerjaan);
                            $('#nilai_kontrak').val(data.nilai_kontrak);
                            $('#nilai_jaminan').val(data.nilai_jaminan);
                            $('#jenis_jaminan').select2('val', data.id_jenis_bg);

                            if (data.id_jenis_bg != null) {
                                $('.f_tgl_surat').fadeIn(300);
                                $('.f_nomor_surat').fadeIn(300);
                            } else {
                                $('.f_tgl_surat').fadeOut(300);
                                $('.f_nomor_surat').fadeOut(300);
                            }

                        // data legalitas
                            $('.btn_legalitas').removeAttr('hidden');

                            $('#nama_notaris').val(data.nama_notaris);
                            $('#alamat_notaris').val(data.alamat_notaris);
                            $('#nomor_ktp').val(data.no_ktp);
                            $('#pengadilan').val(data.pengadilan);
                            $('#alamat_pengadilan').val(data.alamat_pengadilan);
                            $('#pasal').val(data.pasal);

                    },
                    error 		: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                })

                return false;
            })

        // Akhir 22-03-2020

        // 23-03-2020

            // aksi hapus permohonan bank garansi
            $('#tabel_bank_garansi').on('click', '.hapus-permohonan', function () {
                
                var id_permohonan = $(this).data('id');

                swal({
                    title       : 'Konfirmasi',
                    text        : 'Yakin akan hapus data',
                    type        : 'warning',

                    buttonsStyling      : false,
                    confirmButtonClass  : "btn btn-info",
                    cancelButtonClass   : "btn btn-danger mr-3",

                    showCancelButton    : true,
                    confirmButtonText   : 'Kirim Data',
                    confirmButtonColor  : '#d33',
                    cancelButtonColor   : '#3085d6',
                    cancelButtonText    : 'Batal',
                    reverseButtons      : true
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url         : "<?= base_url('kredit/kredit_non_konsumtif/hapus_permohonan_bg') ?>",
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

                                tabel_bank_garansi.ajax.reload(null, false);

                                swal({
                                    title               : 'Berhasil',
                                    text                : 'Data Berhasil Dihapus',
                                    buttonsStyling      : false,
                                    confirmButtonClass  : "btn btn-success",
                                    type                : 'success',
                                    showConfirmButton   : false,
                                    timer               : 1000
                                }); 
                                
                            },
                            error       : function(xhr, status, error) {
                                var err = eval("(" + xhr.responseText + ")");
                                alert(err.Message);
                            }

                        })

                        return false;
                    } else if (result.dismiss === swal.DismissReason.cancel) {

                        swal({
                            title               : 'Batal',
                            text                : 'Anda Membatalkan Hapus Permohonan Bank Garansi',
                            buttonsStyling      : false,
                            confirmButtonClass  : "btn btn-info",
                            type                : 'error',
                            showConfirmButton   : false,
                            timer               : 1000
                        }); 
                    }
                })

            })

        // Akhir 23-03-2020

        // 29-03-2020

            // menampilkan penagihan komisi 
            $('#tabel_bank_garansi').on('click', '.penagihan-komisi', function () {
                
                var id_permohonan = $(this).data('id');

                console.log(id_permohonan);

                // menampilkan data dokumen penagihan komisi
                var tabel_dok_penagihan  = $('.tabel_dok_penagihan').DataTable({
                    "processing"    : true,
                    "ajax"          : "<?= base_url("kredit/kredit_non_konsumtif/tampil_dok_penagihan/") ?>"+id_permohonan,
                    stateSave       : true,
                    "order"         : [[ 2, 'asc' ]],
                    "paging"        : false,
                    "info"          : false,
                    "searching"     : false,
                    "columnDefs"     : [{
                        "targets"       : [2,3,4],
                        "orderable"     : false
                    }, {
                        "targets"       : [2,3,4],
                        "className"     : "text-center"
                    }],
                    "bDestroy": true
                });

                $.ajax({
                    url     : "cek_kelengkapan_penagihan",
                    type    : "POST",
                    data    : {id_permohonan:id_permohonan},
                    dataType: "JSON",
                    success : function (data) {
                        
                        tabel_dok_penagihan.ajax.reload(null, false);

                        $('.id_permohonan').val(id_permohonan);

                        $('.f_awal').slideUp('fast');
                        $('.list_kelengkapan_penagihan').slideDown(300);

                        if (data.cek_data_kdp == 0) {
                            $('.f_simpan_pk').attr('hidden', true);
                        } else {
                            $('.f_simpan_pk').removeAttr('hidden');
                        }
                        
                        if (data.jml_kelengkapan == 4 && data.jml_valid == 4) {
                            $('.f_simpan_pk').attr('hidden', true);
                            $('.det_penagihan').fadeIn('fast');
                            $('#tgl_terbit_penagihan').text(data.tgl_terbit);
                            $('#dokumen_penagihan').val(data.dokumen_penagihan);
                        } else {
                            $('.det_penagihan').fadeOut('fast');
                        }

                        if (data.cek_bayar_komisi == 0) {
                            $('.belum_bayar').removeAttr('hidden');
                        } else {
                            $('.belum_bayar').attr('hidden', true);
                            $('.setelah_bayar').slideDown('fast');
                            $('#tanggal_bayar_komisi').text(data.tgl_bayar_komisi);
                            $('#nominal_bayar').text(data.nominal_bayar);
                            $('#unduh_bukti').val(data.bukti_bayar);
                            // $('#dokumen_penagihan').val(data.dokumen_penagihan);
                            // $('#dokumen_penagihan').val(6);
                            $('#id_permohonan_penagihan').val(id_permohonan);
                            
                        }



                        $('#id_bayar_komisi').val(data.id_bayar_komisi);

                        console.log(data.id_bayar_komisi);

                    }
                })

                
            })

            // simpan penagihan komisi
            $('#simpan_penagihan_komisi').on('click', function () {
                
                var kelengkapan = $('input[name="kelengkapan[]"]:checked').map(function () {
                    return $(this).attr('id_kel');
                }).get();

                var valid       = $('input[name="valid[]"]:checked').map(function () {
                    return $(this).attr('id_kel');
                }).get();

                var id_permohonan = $('.id_permohonan').val();

                console.log(valid.length);

                var jml_kl = kelengkapan.length;
                var jml_vl = valid.length;

                // menampilkan data dokumen penagihan komisi
                var tabel_dok_penagihan  = $('.tabel_dok_penagihan').DataTable({
                    "processing"    : true,
                    "ajax"          : "<?= base_url("kredit/kredit_non_konsumtif/tampil_dok_penagihan/") ?>"+id_permohonan,
                    stateSave       : true,
                    "order"         : [[ 2, 'asc' ]],
                    "paging"        : false,
                    "info"          : false,
                    "searching"     : false,
                    "columnDefs"     : [{
                        "targets"       : [2,3,4],
                        "orderable"     : false
                    }, {
                        "targets"       : [2,3,4],
                        "className"     : "text-center"
                    }],
                    "bDestroy": true
                });

                swal({
                    title       : 'Konfirmasi',
                    text        : 'Yakin akan simpan data',
                    type        : 'warning',

                    buttonsStyling      : false,
                    confirmButtonClass  : "btn btn-info",
                    cancelButtonClass   : "btn btn-danger mr-3",

                    showCancelButton    : true,
                    confirmButtonText   : 'Kirim Data',
                    confirmButtonColor  : '#d33',
                    cancelButtonColor   : '#3085d6',
                    cancelButtonText    : 'Batal',
                    reverseButtons      : true
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url         : "simpan_kel_penagihan_komisi",
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
                            data        : {kelengkapan:kelengkapan, valid:valid, id_permohonan:id_permohonan, jml_kelengkapan:jml_kl, jml_valid:jml_vl},
                            dataType    : "JSON",
                            success     : function (data) {

                                swal({
                                    title               : 'Berhasil',
                                    text                : 'Data Berhasil Disimpan',
                                    buttonsStyling      : false,
                                    confirmButtonClass  : "btn btn-success",
                                    type                : 'success',
                                    showConfirmButton   : false,
                                    timer               : 1000
                                }); 

                                tabel_dok_penagihan.ajax.reload(null, false);

                                if (jml_kl == 4 && jml_vl == 4) {
                                    $('.f_simpan_pk').attr('hidden', true);
                                    $('.det_penagihan').fadeIn('slow');
                                    $('#tgl_terbit_penagihan').text(data.tgl_terbit);
                                    $('#id_permohonan_penagihan').val(id_permohonan);
                                    $('#dokumen_penagihan').val(data.dokumen_penagihan);
                                }

                                
                            },
                            error       : function(xhr, status, error) {
                                var err = eval("(" + xhr.responseText + ")");
                                alert(err.Message);
                            }

                        })

                        return false;
                    } else if (result.dismiss === swal.DismissReason.cancel) {

                        swal({
                            title               : 'Batal',
                            text                : 'Anda Membatalkan Simpan Kelengkapan Dokumen Penagihan',
                            buttonsStyling      : false,
                            confirmButtonClass  : "btn btn-info",
                            type                : 'error',
                            showConfirmButton   : false,
                            timer               : 1000
                        }); 
                    }
                })

            })

            // aksi bila checkbox kelengkapan di checklis
            $('.tabel_dok_penagihan').on('click', '.kelengkapan', function () {

                var id = $(this).data('id');

                if($('#kelengkapan'+id).is(':checked')) {
                    $('.valid'+id).removeAttr('hidden');
                    $('.valid'+id).prop('checked', false); 
                } else {
                    $('.valid'+id).attr('hidden', true);
                    $('.valid'+id).prop('checked', false);
                }

            })

            // button kembali ke awal
            $('#kembali_awal1').on('click', function () {
                $('.list_kelengkapan_penagihan').slideUp('fast');
                $('.f_awal').slideDown(300);

                tabel_bank_garansi.ajax.reload(null, false);
            })

        // Akhir 29-03-2020

        // 30-03-2020

            // aksi muncul form pembayaran komisi
            $('#bayar_komisi').on('click', function () {
                $('#form_bayar_komisi').find('input, select, textarea').not("#id_bayar_komisi").val('');
                $('#modal_bayar_komisi').modal('show');

                var id = $('.id_permohonan').val();

                $('.id_permohonan').val(id);
            })

            // aksi simpan bayar komisi
            $('#simpan_bayar_komisi').on('click', function () {
                
                var im_form = document.querySelector("#form_bayar_komisi");

                var form = new FormData(im_form);

                if ($('#komisi_dibayar').val() == '') {
                    swal({
                        title               : 'Peringatan',
                        text                : 'Komisi Dibayarkan harus terisi',
                        buttonsStyling      : false,
                        confirmButtonClass  : "btn btn-info",
                        type                : 'error',
                        showConfirmButton   : false,
                        timer               : 1000
                    }); 

                    return false;
                    
                } else if ($('#tgl_bayar').val() == '') {
                    swal({
                        title               : 'Peringatan',
                        text                : 'Tanggal Bayar harus terisi',
                        buttonsStyling      : false,
                        confirmButtonClass  : "btn btn-info",
                        type                : 'error',
                        showConfirmButton   : false,
                        timer               : 1000
                    }); 

                    return false;

                } else if ($('#dokumen').val() == '') {
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

                } else {

                    $.ajax({
                        url         : "simpan_data_bayar_komisi",
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

                                $('#modal_bayar_komisi').modal('hide');
                                $('.setelah_bayar').fadeIn('slow');
                                $('#tanggal_bayar_komisi').text(data.tgl_bayar_komisi);
                                $('#nominal_bayar').text(data.nominal_bayar);
                                $('.belum_bayar').attr('hidden', true);
                                $('#unduh_bukti').val(data.bukti_bayar);

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

        // Akhir 30-03-2020

        // 03-04-2020

            // aksi bila jenis jaminan dipilih
            $('#jenis_jaminan').on('change', function () {
                var isi = $(this).val();

                if (isi != 'a') {
                    $('.f_tgl_surat').fadeIn(300);
                    $('.f_nomor_surat').fadeIn(300);

                    if (isi == 1) {
                        $('#judul_no_jaminan').text('Nomor Surat Undangan');
                        $('#nomor_surat_undangan').attr('placeholder', 'Masukkan Nomor Surat Undangan');

                        $('#judul_tgl_jaminan').text('Tanggal Surat Undangan');
                        $('#tanggal_surat_undangan').attr('placeholder', 'Masukkan Tanggal Surat Undangan');
                    } else if (isi == 2) {
                        $('#judul_no_jaminan').text('Nomor Surat Perintah Kerja');
                        $('#nomor_surat_undangan').attr('placeholder', 'Masukkan Nomor Surat Perintah Kerja');

                        $('#judul_tgl_jaminan').text('Tanggal Surat Perintah Kerja');
                        $('#tanggal_surat_undangan').attr('placeholder', 'Masuk Tanggal Surat Perintah Kerja');
                    } else if (isi == 3) {
                        $('#judul_no_jaminan').text('Nomor Kontrak Kerja Lengkap');
                        $('#nomor_surat_undangan').attr('placeholder', 'Masukkan Nomor Kontrak Kerja Lengkap');

                        $('#judul_tgl_jaminan').text('Tanggal Kontrak Kerja Lengkap');
                        $('#tanggal_surat_undangan').attr('placeholder', 'Masuk Tanggal Kontrak Kerja Lengkap');
                    } else if (isi == 4) {
                        $('#judul_no_jaminan').text('Nomor Berita Acara Serah Terima');
                        $('#nomor_surat_undangan').attr('placeholder', 'Masukkan Tanggal Berita Acara Serah Terima');

                        $('#judul_tgl_jaminan').text('Tanggal Berita Acara Serah Terima');
                        $('#tanggal_surat_undangan').attr('placeholder', 'Masuk Tanggal Berita Acara Serah Terima');
                    }
                    
                } else {
                    $('.f_tgl_surat').fadeOut(300);
                    $('.f_nomor_surat').fadeOut(300);
                }
            })

        // Akhir 03-04-2020
        
    })

</script>