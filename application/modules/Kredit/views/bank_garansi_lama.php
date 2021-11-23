

<div id="tampil" class="collapse show">
  <div class="card p-2">
    <div class="container-fluid">
      <button class="btn btn-outline-success mb-2 mt-4" id="btnTambah"><i class="fa fa-plus"></i> Tambah Data</button>
      <a href="<?php echo base_url('Kredit/Kredit_non_konsumtif/export_bg') ?>" class="btn btn-outline-primary mb-2 mt-4" ><i class="fa fa-download"></i> Export Excel</a>
      <table id="bg" class="table table-striped border-success" style="width:100%">
        <thead class="bg-success text-white">
          <tr>
            <th style="width:30px;">No</th>
            <th>Principal</th>
            <th>Obligee</th>
            <th>Nomor Permohonan</th>
            <th>Asuransi</th>
            <th>Bank</th>
            <th>No PPK</th>
            <th>Tgl PPK</th>
            <th>Status</th>
            <th>Aksi</th>
            <th>Penagihan Komisi</th>
          </tr>
        </thead>
        <tbody id="show_data_bg"></tbody>
      </table>
    </div>
  </div>
</div>

<div class="collapse" id="tambah">
  <ul class="container-fluid nav nav-tabs">
    <li class="nav-item principalLi">
      <a class="nav-link active text-success btn_data_principal" data-toggle="tab" href="#nav_data_principal">Data Principal</a>
    </li>
    <li class="nav-item permohonanLi">
      <a class="nav-link text-success btn_data_permohonan" data-toggle="tab" href="#nav_data_permohonan">Data Permohonan</a>
    </li>
    <li class="nav-item legalitasLi">
      <a class="nav-link text-success btn_legalitas" data-toggle="tab" href="#nav_legalitas">Legalitas</a>
    </li>
  </ul>

  <div class="tab-content my-4 mx-3">

    <!-- NAV 1 START -->
    <div class="tab-pane active container-fluid" id="nav_data_principal">
      <div class="form-group row">
        <div class="col-3">
          <label for="nama_principal" class="col-form-label">Nama Principal</label>
        </div>
        <div class="col addPrincipal">
          <div class="row">
            <div class="col">
              <select class="form-control form-control-sm" id="pilihPrincipal"></select>
            </div>
            <div class="col-0 mr-3">
              <button class="btn btn-sm rounded-circle btn-success" id="buatPrincipal"><i class="fa fa-plus"></i></button>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-3">
          <label for="alamat_principal" class="col-form-label">Alamat Principal</label>
        </div>
        <div class="col">
          <textarea class="form-control form-control-sm" id="alamat_principal"></textarea>
          <div class="invalid-feedback" id="_erAlamat_principal"></div>
        </div>
      </div>
        <hr>
      <div class="form-group row">
        <div class="col-3">
          <label for="nama_PIC1_principal" class="col-form-label">Nama PIC 1 Principal</label>
        </div>
        <div class="col">
          <input type="text" class="form-control form-control-sm" id="nama_PIC1_principal">
          <div class="invalid-feedback" id="_erPIC1"></div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-3">
          <label for="jabatan_PIC1_principal" class="col-form-label">Jabatan PIC 1 Principal</label>
        </div>
        <div class="col">
          <input type="text" class="form-control form-control-sm" id="jabatan_PIC1_principal">
          <div class="invalid-feedback" id="_erJabatan_PIC1"></div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-3">
          <label for="nik_PIC1_principal" class="col-form-label">NIK PIC 1 Principal</label>
        </div>
        <div class="col">
          <input type="number" class="form-control form-control-sm" id="nik_PIC1_principal">
          <div class="invalid-feedback" id="_erNik_PIC1"></div>
        </div>
      </div>
        <hr>
      <div class="form-group row">
        <div class="col-3">
          <label for="nama_PIC2_principal" class="col-form-label">Nama PIC 2 Principal</label>
        </div>
        <div class="col">
          <input type="text" class="form-control form-control-sm" id="nama_PIC2_principal">
          <div class="invalid-feedback" id="_erPIC2"></div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-3">
          <label for="jabatan_PIC2_principal" class="col-form-label">Jabatan PIC 2 Principal</label>
        </div>
        <div class="col">
          <input type="text" class="form-control form-control-sm" id="jabatan_PIC2_principal">
          <div class="invalid-feedback" id="_erJabatan_PIC2"></div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-3">
          <label for="nik_PIC2_principal" class="col-form-label">NIK PIC 2 Principal</label>
        </div>
        <div class="col">
          <input type="number" class="form-control form-control-sm" id="nik_PIC2_principal">
          <div class="invalid-feedback" id="_erNik_PIC2"></div>
        </div>
      </div>
        <hr>
      <div class="form-group row">
        <div class="col-3">
          <label for="akta_principal" class="col-form-label">Akta Principal</label>
        </div>
        <div class="col">
          <input type="text" class="form-control form-control-sm" id="akta_principal">
          <div class="invalid-feedback" id="_erAkta_principal"></div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-3">
          <label for="nomor_akta_principal" class="col-form-label">Nomor Akta Principal</label>
        </div>
        <div class="col">
          <input type="number" class="form-control form-control-sm" id="nomor_akta_principal">
          <div class="invalid-feedback" id="_erNomor_akta_principal"></div>
        </div>
      </div>
    </div>
<!-- NAV 1 END -->

<!-- NAV 2 START -->
    <div class="tab-pane container-fluid" id="nav_data_permohonan">
      <div class="form-group row">
        <div class="col-3">
          <label for="nomor_registrasi_permohonan" class="col-form-label">Nomor Registrasi</label>
        </div>
        <div class="col">
          <input type="text" class="form-control form-control-sm" id="nomor_registrasi_permohonan">
          <div class="invalid-feedback" id="_erNomor_reg"></div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-3">
          <label for="tanggal_registrasi_permohonan" class="col-form-label">Tanggal Registrasi</label>
        </div>
        <div class="col">
          <input type="text" class="form-control form-control-sm datepicker" id="tanggal_registrasi_permohonan">
          <div class="invalid-feedback" id="_erTgl_reg"></div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-3">
          <label for="nomor_surat_permohonan" class="col-form-label">Nomor Surat Permohonan</label>
        </div>
        <div class="col">
          <input type="text" class="form-control form-control-sm" id="nomor_surat_permohonan">
          <div class="invalid-feedback" id="_erNo_surat_reg"></div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-3">
          <label for="tanggal_surat_permohonan" class="col-form-label">Tanggal Surat Permohonan</label>
        </div>
        <div class="col">
          <input type="text" class="form-control form-control-sm datepicker" id="tanggal_surat_permohonan">
          <div class="invalid-feedback" id="_erTgl_surat_reg"></div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-3">
          <label for="nomor_surat_undangan" class="col-form-label">Nomor Surat Undangan</label>
        </div>
        <div class="col">
          <input type="number" class="form-control form-control-sm" id="nomor_surat_undangan">
          <div class="invalid-feedback" id="_erNo_surat_undangan"></div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-3">
          <label for="tanggal_surat_undangan" class="col-form-label">Tanggal Surat Undangan</label>
        </div>
        <div class="col">
          <input type="text" class="form-control form-control-sm datepicker" id="tanggal_surat_undangan">
          <div class="invalid-feedback" id="_erTgl_surat_undangan"></div>
        </div>
      </div>
        <hr>
      <div class="form-group row">
        <div class="col-3">
          <label for="asuransi_permohonan" class="col-form-label">Asuransi</label>
        </div>
        <div class="col">
          <select class="form-control form-control-sm" id="asuransi_permohonan"></select>
          <div class="invalid-feedback" id="_erAsuransi"></div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-3">
          <label for="cabang_asuransi_permohonan" class="col-form-label">Cabang Asuransi</label>
        </div>
        <div class="col">
          <select  class="form-control form-control-sm" id="cabang_asuransi_permohonan"></select>
          <div class="invalid-feedback" id="_erCabang_asuransi"></div>
        </div>
      </div>
        <hr>
      <div class="form-group row">
        <div class="col-3">
          <label for="bank_permohonan" class="col-form-label">Bank</label>
        </div>
        <div class="col">
          <select  class="form-control form-control-sm" id="bank_permohonan"></select>
          <div class="invalid-feedback" id="_erBank_permohonan"></div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-3">
          <label for="cabang_bank_permohonan" class="col-form-label">Cabang Bank</label>
        </div>
        <div class="col">
          <select  class="form-control form-control-sm" id="cabang_bank_permohonan"></select>
          <div class="invalid-feedback" id="_erCabang_bank_permohonan"></div>
        </div>
      </div>
        <hr>
      <div class="form-group row">
        <div class="col-3">
          <label for="nama_oblige" class="col-form-label">Nama Oblige</label>
        </div>
        <div class="col">
          <input type="text" class="form-control form-control-sm" id="nama_oblige">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-3">
          <label for="alamat_oblige" class="col-form-label">Alamat Oblige</label>
          <div class="invalid-feedback" id="_erNama_oblige"></div>
        </div>
        <div class="col">
          <textarea class="form-control form-control-sm" id="alamat_oblige"></textarea>
          <div class="invalid-feedback" id="_erAlamat_oblige"></div>
        </div>
      </div>
        <hr>
      <div class="form-group row">
        <div class="col-3">
          <label for="nama_pekerjaan" class="col-form-label">Nama Pekerjaan</label>
        </div>
        <div class="col">
          <input type="text" class="form-control form-control-sm" id="nama_pekerjaan">
          <div class="invalid-feedback" id="_erNama_pekerjaan"></div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-3">
          <label for="nilai_kontrak" class="col-form-label">Nilai Kontrak</label>
        </div>
        <div class="col">
          <input type="text" class="form-control form-control-sm" id="nilai_kontrak">
          <div class="invalid-feedback" id="_erNilai_kontrak"></div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-3">
          <label for="nilai_jaminan" class="col-form-label">Nilai Jaminan</label>
        </div>
        <div class="col">
          <input type="text" class="form-control form-control-sm" id="nilai_jaminan">
          <div class="invalid-feedback" id="_erNilai_jaminan"></div>
        </div>
      </div>
    </div>
<!-- NAV 2 END -->
    
<!-- NAV 3 START -->
    <div class="tab-pane container-fluid" id="nav_legalitas">
      <div class="form-group row">
        <div class="col-3">
          <label for="nama_notaris" class="col-form-label">Nama Notaris</label>
        </div>
        <div class="col">
          <input type="text" class="form-control form-control-sm" id="nama_notaris">
          <div class="invalid-feedback" id="_erNama_notaris"></div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-3">
          <label for="alamat_notaris" class="col-form-label">Alamat Notaris</label>
        </div>
        <div class="col">
          <textarea class="form-control form-control-sm" id="alamat_notaris"></textarea>
          <div class="invalid-feedback" id="_erAlamat_notaris"></div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-3">
          <label for="nomor_ktp" class="col-form-label">Nomor KTP</label>
        </div>
        <div class="col">
          <input type="number" class="form-control form-control-sm" id="nomor_ktp">
          <div class="invalid-feedback" id="_erNo_ktp"></div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-3">
          <label for="pengadilan" class="col-form-label">Pengadilan</label>
        </div>
        <div class="col">
          <input type="text" class="form-control form-control-sm" id="pengadilan">
          <div class="invalid-feedback" id="_erPengadilan"></div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-3">
          <label for="alamat_pengadilan" class="col-form-label">Alamat Pengadilan</label>
        </div>
        <div class="col">
          <textarea class="form-control form-control-sm" id="alamat_pengadilan"></textarea>
          <div class="invalid-feedback" id="_erAlamat_pengadilan"></div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-3">
          <label for="pasal" class="col-form-label">Pasal</label>
        </div>
        <div class="col">
          <input type="text" class="form-control form-control-sm" id="pasal">
          <div class="invalid-feedback" id="_erPasal"></div>
        </div>
      </div>
    </div>
<!-- NAV 3 END -->
  </div>
  <div class="text-right m-4">
    <button class="btn btn-danger" id="btnClose">Batal</button>
    <button class="btn btn-success" id="btnSimpan">Simpan</button>
  </div>
</div>

<div id="dokumen" class="collapse">

</div>

<div class="collapse" id="detail">
  <ul class="container-fluid nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active text-success btn_detail_data_principal" data-toggle="tab" href="#nav_detail_data_principal">Data Principal</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-success btn_detail_data_permohonan" data-toggle="tab" href="#nav_detail_data_permohonan">Data Permohonan</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-success btn_detail_legalitas" data-toggle="tab" href="#nav_detail_legalitas">Legalitas</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-success btn_detail_persetujuan_asuransi" data-toggle="tab" href="#nav_detail_persetujuan_asuransi">Persetujuan Asuransi</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-success btn_detail_bank_garansi" data-toggle="tab" href="#nav_detail_bank_garansi">Bank Garansi</a>
    </li>
  </ul>

  <div class="tab-content my-4 mx-3">
    <div class="tab-pane active container-fluid" id="nav_detail_data_principal">
      <table class="table table-hover">
        <tr>
          <td >Nama Principal</td>
          <td >:</td>
          <td ><p id="nama_principal_detail"></p></td>
        </tr>
        <tr>
          <td >Alamat Principal</td>
          <td >:</td>
          <td ><p id="alamat_principal_detail"></p></td>
        </tr>
        <tr>
          <td >Nama PIC 1 Principal</td>
          <td >:</td>
          <td ><p id="nama_pic1_detail"></p></td>
        </tr>
        <tr>
          <td >Jabatan PIC 1 Principal</td>
          <td >:</td>
          <td ><p id="jabatan_pic1_detail"></p></td>
        </tr>
        <tr>
          <td >NIK PIC 1 Principal</td>
          <td >:</td>
          <td ><p id="nik_pic1_detail"></p></td>
        </tr>
        <tr>
          <td >Nama PIC 2 Principal</td>
          <td >:</td>
          <td ><p id="nama_pic2_detail"></p></td>
        </tr>
        <tr>
          <td >Jabatan PIC 2 Principal</td>
          <td >:</td>
          <td ><p id="jabatan_pic2_detail"></p></td>
        </tr>
        <tr>
          <td >NIK PIC 2 Principal</td>
          <td >:</td>
          <td ><p id="nik_pic2_detail"></p></td>
        </tr>
        <tr>
          <td >Akta Principal</td>
          <td >:</td>
          <td ><p id="akta_principal_detail"></p></td>
        </tr>
        <tr>
          <td >Nomor Akta Principal</td>
          <td >:</td>
          <td ><p id="nomor_akta_principal_detail"></p></td>
        </tr>
      </table>
    </div>

    <div class="tab-pane container-fluid" id="nav_detail_data_permohonan">
      <table class="table table-hover">
        <tr>
          <td >Nomor Registrasi</td>
          <td >:</td>
          <td ><p id="nomor_registrasi_detail"></p></td>

          <td >Bank</td>
          <td >:</td>
          <td ><p id="bank_detail"></p></td>
        </tr>
        <tr>
          <td >Tanggal Registrasi</td>
          <td >:</td>
          <td ><p id="tanggal_registrasi_detail"></p></td>

          <td >Cabang Bank</td>
          <td >:</td>
          <td ><p id="cabang_bank_detail"></p></td>
        </tr>
        <tr>
          <td >Nomor Surat Permohonan</td>
          <td >:</td>
          <td ><p id="nomor_surat_permohonan_detail"></p></td>
        
          <td >Nama Oblige</td>
          <td >:</td>
          <td ><p id="nama_oblige_detail"></p></td>
        </tr>
        <tr>
          <td >Tanggal Surat Permohonan</td>
          <td >:</td>
          <td ><p id="tanggal_surat_permohonan_detail"></p></td>
        
          <td >Alamat Oblige</td>
          <td >:</td>
          <td ><p id="alamat_oblige_detail"></p></td>
        </tr>
        <tr>
          <td >Nomor Surat Undangan</td>
          <td >:</td>
          <td ><p id="nomor_surat_undangan_detail"></p></td>

          <td >Nama Pekerjaan</td>
          <td >:</td>
          <td ><p id="nama_pekerjaan_detail"></p></td>
        </tr>
        <tr>
          <td >Tanggal Surat Undangan</td>
          <td >:</td>
          <td ><p id="tanggal_surat_undangan_detail"></p></td>
        
          <td >Nilai Kontrak</td>
          <td >:</td>
          <td ><p id="nilai_kontrak_detail"></p></td>
        </tr>
        <tr>
          <td >Asuransi</td>
          <td >:</td>
          <td ><p id="asuransi_detail"></p></td>
        
          <td >Nilai Jaminan</td>
          <td >:</td>
          <td ><p id="nilai_jaminan_detail"></p></td>
        </tr>
        <tr>
          <td >Cabang Asuransi</td>
          <td >:</td>
          <td ><p id="cabang_asuransi_detail"></p></td>
        </tr>
      </table>
    </div>

    <div class="tab-pane container-fluid" id="nav_detail_legalitas">
      <table class="table table-hover">
        <tr>
          <td >Nama Notaris</td>
          <td >:</td>
          <td ><p id="nama_notaris_detail"></p></td>
        </tr>
        <tr>
          <td >Alamat Notaris</td>
          <td >:</td>
          <td ><p id="alamat_notaris_detail"></p></td>
        </tr>
        <tr>
          <td >No KTP</td>
          <td >:</td>
          <td ><p id="no_ktp_detail"></p></td>
        </tr>
        <tr>
          <td >Pengadilan</td>
          <td >:</td>
          <td ><p id="pengadilan_detail"></p></td>
        </tr>
        <tr>
          <td >Alamat Pengadilan</td>
          <td >:</td>
          <td ><p id="alamat_pengadilan_detail"></p></td>
        </tr>
        <tr>
          <td >Pasal</td>
          <td >:</td>
          <td ><p id="pasal_detail"></p></td>
        </tr>
      </table>
    </div>

    <div class="tab-pane container-fluid" id="nav_detail_persetujuan_asuransi">
      <button class="btn btn-primary" id="tambahPersetujuan"><i class="fa fa-plus"></i> Tambah Data Persetujuan</button>
      <p class="mt-2">Belum ada data persetujuan asuransi, silahkan tambahkan data apabila persetujuan asuransi sudah terbit</p>
    </div>

    <div class="tab-pane container-fluid" id="nav_detail_bank_garansi">
      <button class="btn btn-primary" id="tambahBankGaransi"><i class="fa fa-plus"></i> Tambah Data Persetujuan</button>
      <p class="mt-2">Belum ada data bank garansi, silahkan tambahkan data apabila bank garansi sudah terbit</p>
    </div>

  </div>

  <div class="card m-4 p-3">
    <!-- <div class="mb-5" id="proses" style="width: 970px; margin: 0 auto"></div> -->
    <!-- multistep form -->
  <div class="container1">
    <ul class="progressbar1">
      <li class="active">Permohonan Jaminan</li>
      <li>Pengantar Asuransi</li>
      <li>Persetujuan Asuransi</li>
      <li>Pengantar Bank</li>
      <li class="active">Bank Garansi</li>
      <li class="active">Penagihan Komisi</li>
    </ul>
  </div>

    <table id="tbDetailBG" class="table table-bordered border-success mt-5" style="width:100%">
      <thead class="bg-success text-white">
        <tr>
          <th style="width:30px;">No</th>
          <th>Nama Dokumen</th>
          <th>Tanggal Terbit</th>
          <th>Dokumen</th>
        </tr>
      </thead>
    <tbody id="show_data_cbc">          
    </tbody>
  </table>
  </div>
</div>


<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>

<script type="text/javascript" charset="utf-8">
  var id_pengguna = '<?= $userdata->id_pengguna ?>';
</script>