<?php if ($userdata->id_level == '4') { ?>
<div class="container-fluid">
<table id="bg" class="table table-striped border-success" style="width:100%">
        <thead class="bg-success text-white">
            <tr>
                <th style="width:30px;">No</th>
                <th>Nama Asuransi</th>
                <th>Cabang Asuransi</th>
                <th>No PPK</th>
                <th>Tgl PPK</th>
                <th width="30px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $this->db->select('*');
        $this->db->from('bank_garansi');
        $this->db->join('asuransi', 'asuransi.id_asuransi = bank_garansi.id_asuransi', 'left');
        $this->db->join('cabang_asuransi', 'cabang_asuransi.id_cabang_asuransi = bank_garansi.id_cabang_asuransi', 'left');
        $this->db->order_by('tgl_ppk');
        $query = $this->db->get()->result();
        $i = 1;
        foreach($query as $row) {
        ?>   
        <?php 
        $this->db->select('*');
        $this->db->from('bank_garansi');
        $this->db->join('asuransi', 'asuransi.id_asuransi = bank_garansi.id_asuransi', 'left');
        $this->db->join('cabang_asuransi', 'cabang_asuransi.id_cabang_asuransi = bank_garansi.id_cabang_asuransi', 'left');
        $this->db->join('bank', 'bank.id_bank = bank_garansi.id_bank', 'left');
        $this->db->where('id_bg', $row->id_bg);
        $query_detil = $this->db->get();
        ?>
          <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row->nama_asuransi; ?></td>
            <td><?php echo $row->nama_cabang; ?></td>
            <td><?php echo $row->no_ppk ?></td>
            <td><?php echo date('d-m-Y', strtotime($row->tgl_ppk)); ?></td>
            <td>
              <a href="#" class="btn btn-success" data-toggle="modal" data-target="#keterangan<?php echo $row->id_bg;?>">
                <i class="fa fa-info-circle"></i>
              </a>
              <div class="modal fade" id="keterangan<?php echo $row->id_bg;?>" tabindex="-1" data-backdrop="false" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="background: rgba(0, 0, 0, 0.5);">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">
                        <i class="fa fa-info-circle"></i> Detail Bank Garansi
                      </h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <table class="table table-hover ket">
                        <?php foreach($query_detil->result() as $ket) { ?>
                        <tr>
                          <td width="20%">Nama Asuransi</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo $ket->nama_asuransi; ?></td>
                        </tr>
                        <tr>
                          <td width="20%">Cabang Asuransi</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo $ket->nama_cabang; ?></td>
                        </tr>
                        <tr>
                          <td width="20%">No Regis</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo $ket->no_regis; ?></td>
                        </tr>
                        <tr>
                          <td width="20%">Tgl Regis</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo $ket->tgl_regis ? date('d-m-Y', strtotime($ket->tgl_regis)) : null ?></td>
                        </tr>
                        <tr>
                          <td width="20%">No Surat Permohonan</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo $ket->no_srt_permohonan; ?></td>
                        </tr>
                        <tr>
                          <td width="20%">Tgl Surat Permohonan</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo $ket->tgl_srt_permohonan ? date('d-m-Y', strtotime($ket->tgl_srt_permohonan)) : null ?></td>
                        </tr>
                        <tr>
                          <td width="20%">No PPK</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo $ket->no_ppk; ?></td>
                        </tr>
                        <tr>
                          <td width="20%">Tanggal PPK</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo $ket->tgl_ppk ? date('d-m-Y', strtotime($ket->tgl_ppk)) : null ?></td>
                        </tr>
                        <tr>
                          <td width="20%">Bank</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo $ket->nama_bank; ?></td>
                        </tr>
                        <tr>
                          <td width="20%">Pembawa Bisnis</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo $ket->sumber_bisnis; ?></td>
                        </tr>
                        <tr>
                          <td width="20%">Nama Prinsipal</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo $ket->principal; ?></td>
                        </tr>
                        <tr>
                          <td width="20%">Alamat Prinsipal</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo $ket->alamat_principal; ?></td>
                        </tr>
                        <tr>
                          <td width="20%">No Surat Bank</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo $ket->no_surat; ?></td>
                        </tr>
                        <tr>
                          <td width="20%">Tanggal Surat</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo $ket->tgl_surat ? date('d-m-Y', strtotime($ket->tgl_surat)) : null ?></td>
                        </tr>
                        <tr>
                          <td width="20%">Jenis BG</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo $ket->jenis_bg; ?></td>
                        </tr>
                        <tr>
                          <td width="20%">Tanggal Awal</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo $ket->tgl_awal ? date('d-m-Y', strtotime($ket->tgl_awal)) : null ?></td>
                        </tr>
                        <tr>
                          <td width="20%">Tanggal Akhir</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo $ket->tgl_akhir ? date('d-m-Y', strtotime($ket->tgl_akhir)) : null ?></td>
                        </tr>
                        <tr>
                          <td width="20%">Nilai Jaminan</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo number_format($ket->nilai_jaminan); ?></td>
                        </tr>
                        <tr>
                          <td width="20%">Nama Obligee</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo $ket->nama_obligee; ?></td>
                        </tr>
                        <tr>
                          <td width="20%">Alamat Obligee</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo $ket->alamat_obligee; ?></td>
                        </tr>
                        <tr>
                          <td width="20%">Nama Pekerjaan</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo $ket->nama_pekerjaan; ?></td>
                        </tr>
                        <tr>
                          <td width="20%">Nilai Kontrak</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo number_format($ket->nilai_kontrak); ?></td>
                        </tr>
                        <tr>
                          <td width="20%">Nilai Premi</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo number_format($ket->nilai_premi); ?></td>
                        </tr>
                        <tr>
                          <td width="20%">Premi Asuransi</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo number_format($ket->premi_asuransi); ?></td>
                        </tr>
                        <tr>
                          <td width="20%">Premi Bank</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo number_format($ket->premi_bank); ?></td>
                        </tr>
                        <tr>
                          <td width="20%">Potensi Komisi</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo number_format($ket->potensi_komisi); ?></td>
                        </tr>
                        <tr>
                          <td width="20%">No BG</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo $ket->no_bg; ?></td>
                        </tr>
                        <tr>
                          <td width="20%">Tgl BG</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo $ket->tgl_bg ? date('d-m-Y', strtotime($ket->tgl_bg)) : null ?></td>
                        </tr>
                        <tr>
                          <td width="20%">Ket BG</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo $ket->ket_bg; ?></td>
                        </tr>
                        <tr>
                          <td width="20%">Bukti Bayar</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo $ket->bukti_bayar; ?></td>
                        </tr>
                        <tr>
                          <td width="20%">No Surat Tagih</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo $ket->no_surat_tagih; ?></td>
                        </tr>
                        <tr>
                          <td width="20%">Tgl Surat Tagih</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo $ket->tgl_surat_tagih ? date('d-m-Y', strtotime($ket->tgl_surat_tagih)) : null ?></td>
                        </tr>
                        <tr>
                          <td width="20%">Tgl Masuk Tagih</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo $ket->tgl_masuk_tagih ? date('d-m-Y', strtotime($ket->tgl_masuk_tagih)) : null ?></td>
                        </tr>
                        <tr>
                          <td width="20%">Ket</td>
                          <td width="1%">:</td> 
                          <td style="text-align: left;"><?php echo $ket->ket; ?></td>
                        </tr>
                        <?php } ?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>       
        <?php } ?>      
        </tbody>
    </table>
</div>
<?php } else { ?>
<!-- Nav tabs -->

<ul class="container-fluid nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active text-success" data-toggle="tab" href="#home"><i class="fa fa-table"></i> Tabel</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-success" data-toggle="tab" href="#menu1" onclick="hideButtonbg()"><i class="fa fa-plus"> Tambah</i></a>
  </li>
  <li class="nav-item">
    <!-- <a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a> -->
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active container-fluid" id="home">
    <div class="container-fluid">
<!-- <button type="button" class="btn btn-outline-success mb-2" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i> Tambah
</button> -->
<a href="<?php echo base_url('Kredit/Kredit_non_konsumtif/export_bg') ?>" class="btn btn-outline-primary mb-2 mt-4" ><i class="fa fa-download"></i> Export Excel
</a><br>

<table id="bg" class="table table-striped border-success" style="width:100%">
        <thead class="bg-success text-white">
            <tr>
                <th style="width:30px;">No</th>
                <th>Nama Asuransi</th>
                <th>Cabang Asuransi</th>
                <th>No PPK</th>
                <th>Tgl PPK</th>
                <th width="170px;">Aksi</th>
            </tr>
        </thead>
        <tbody id="show_data_bg">          
        </tbody>
    </table>
     <!--MODAL HAPUS-->
        <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content panel-warning">
                    <form class="form-horizontal">
                    <div class="modal-body text-center">
                                           
                            <input type="hidden" name="id_bg" id="id" value="">
                            <img class="img-responsive" src="<?php echo base_url()?>assets/img/warning.png"  style="width:100px; height:100px;margin-bottom: 30px; ">
                            <h5>Yakin Ingin Menghapus Data Ini?</h5>
                            <button type="button" class="btn btn-danger  btn-lg" data-dismiss="modal">Tutup</button>
                            <button class="btn_hapus btn btn-info btn-lg flo ml-2" id="btn_hapus_bg">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

<!--     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalDetail">
          Launch demo modal
        </button> -->
     <div class="modal fade" id="Modal-detail" tabindex="1" data-backdrop="false" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-info-circle"></i> Detail Bank Garansi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <table class="table table-hover">
                <tr>
                  <td width="100px;">Nama Asuransi</td>
                  <td>:</td>
                  <td><p name="nama_asr_detail"></p></td>
                </tr>
                <tr>
                  <td width="100px;">Cabang Asuransi</td>
                  <td>:</td>
                  <td><p name="cb_as_detail"></p></td>
                </tr>
                <tr>
                  <td width="100px;">No Regis</td>
                  <td>:</td>
                  <td><p name="no_regis_detail"></p></td>
                </tr>
                <tr>
                  <td width="100px;">Tgl Regis</td>
                  <td>:</td>
                  <td><p name="tgl_regis_detail"></p></td>
                </tr>
                <tr>
                  <td width="100px;">No Surat Permohonan</td>
                  <td>:</td>
                  <td><p name="no_srt_perm_detail"></p></td>
                </tr>
                <tr>
                  <td width="100px;">Tgl Surat Permohonan</td>
                  <td>:</td>
                  <td><p name="tgl_srt_perm_detail"></p></td>
                </tr>
                  <tr>
                  <td nowrap>No PPK</td>
                  <td>:</td>
                  <td><p name="no_ppk_detail" ></p></td>
                </tr>
                  <tr>
                  <td nowrap>Tanggal PPK</td>
                  <td>:</td>
                  <td><p name="tgl_ppk_detail"></p></td>
                </tr>
                  <tr>
                  <td nowrap>Bank</td>
                  <td>:</td>
                  <td><p name="nama_bank_detail"></p></td>
                </tr>
                  <tr>
                  <td nowrap>Pembawa Bisnis</td>
                  <td>:</td>
                  <td><p name="sumber_bisnis_detail" ></p></td>
                </tr>
                  <tr>
                  <td nowrap>Nama Prinsipal</td>
                  <td>:</td>
                  <td><p name="principal_detail" ></p></td>
                </tr>
                <tr>
                  <td nowrap>Alamat Prinsipal</td>
                  <td>:</td>
                  <td><p name="alamat_principal_detail" ></p></td>
                </tr>
                  <tr>
                  <td nowrap>No Surat Bank</td>
                  <td>:</td>
                  <td><p name="no_surat_detail" ></p></td>
                </tr>
                <tr>
                  <td nowrap>Tanggal Surat</td>
                  <td>:</td>
                  <td><p name="tgl_surat_detail" ></p></td>
                </tr>
                  <tr>
                  <td nowrap>Jenis BG</td>
                  <td>:</td>
                  <td><p name="jenis_bg_detail" ></p></td>
                </tr>
                <tr>
                  <td nowrap>Tanggal Awal</td>
                  <td>:</td>
                  <td><p name="tgl_awal_detail" ></p></td>
                </tr>
                <tr>
                  <td nowrap>Tanggal akhir</td>
                  <td>:</td>
                  <td><p name="tgl_akhir_detail" ></p></td>
                </tr>
                  <tr>
                  <td nowrap>Nilai Jaminan</td>
                  <td>:</td>
                  <td><p name="n_jaminan_detail" ></p></td>
                </tr>
                 <tr>
                  <td nowrap>Nama Obligee</td>
                  <td>:</td>
                  <td><p name="na_obligee_detail"></p></td>
                </tr>
                 <tr>
                  <td nowrap>Alamat Obligee</td>
                  <td>:</td>
                  <td><p name="al_obligee_detail"></p></td>
                </tr>
                  <tr>
                  <td nowrap>Nama Pekerjaan</td>
                  <td>:</td>
                  <td><p name="n_pekerjaan_detail"></p></td>
                </tr>
                <tr>
                  <td nowrap>Nilai Kontrak</td>
                  <td>:</td>
                  <td><p name="n_kontrak_detail"></p></td>
                </tr>
                  <tr>
                  <td nowrap>Nilai Premi</td>
                  <td>:</td>
                  <td><p name="n_premi_detail"></p></td>
                </tr>
                <tr>
                  <td nowrap>Premi Asuransi</td>
                  <td>:</td>
                  <td><p name="p_asuransi_detail"></p></td>
                </tr>
                <tr>
                  <td nowrap>Premi Bank</td>
                  <td>:</td>
                  <td><p name="p_bank_detail"></p></td>
                </tr>
                 <tr>
                  <td nowrap>Potensi Komisi</td>
                  <td>:</td>
                  <td><p name="p_komisi_detail" ></p></td>
                </tr>
                 <tr>
                  <td nowrap>No BG</td>
                  <td>:</td>
                  <td nowrap><p name="no_bg_detail"></p></td>
                </tr>
                 <tr>
                  <td nowrap>Tgl BG</td>
                  <td>:</td>
                  <td><p name="tgl_bg_detail"></p></td>
                </tr>
                <tr>
                  <td nowrap>Ket BG</td>
                  <td>:</td>
                  <td><p name="ket_bg_detail"></td>
                </tr>
                 <tr>
                  <td nowrap>Bukti Bayar</td>
                  <td>:</td>
                  <td nowrap><p name="bk_bayar_detail"></td>
                </tr>
                 <tr>
                  <td nowrap>No Surat Tagih</td>
                  <td>:</td>
                  <td><p name="no_s_tagih_detail"></td>
                </tr>
                 <tr>
                  <td nowrap>Tgl Surat Tagih</td>
                  <td>:</td>
                  <td><p name="tgl_s_tagih_detail"></td>
                </tr>
                 <tr>
                  <td nowrap>Tgl Masuk Tagih</td>
                  <td>:</td>
                  <td><p name="tgl_m_tagih_detail"></td>
                </tr>
                 <tr>
                  <td>Ket</td>
                  <td>:</td>
                  <td><p name="keterangan_detail"></td>
                </tr>
              </table>
          </div>
        </div>
      </div>
    </div>
<!-- end modal -->

</div>
  </div>
  <div class="tab-pane container" id="menu1">
  <style type="text/css">
  input,select,textarea{margin-top: 10px;}
  </style>
  <form>
    <input type="hidden" name="id_bg" id="id_bg">
    <div class="form-row">
<!--kolom 1-->
      <div class="col-md-6 ">
        
        <select name="nama_asr" id="nama_asr" class="form-control" required="required">
          <option disabled="disabled" selected="selected">-- Pilih Asuransi --</option>
            <?php foreach ($data_asuransi as $asr) {?>
          <option value="<?php echo $asr->id_asuransi;?>"><?php echo $asr->nama_asuransi ?></option>
            <?php } ?>
        </select>
        <select name="cb_as" id="cb_as" class="form-control" required="required">
          <option value="">-- Pilih Cabang Asuransi --</option>
            <?php foreach ($data_cabang as $cb) {?>
          <option value="<?php echo $cb->id_cabang_asuransi;?>" data-chained="<?php echo $cb->id_asuransi ?>"><?php echo $cb->nama_cabang ?></option>
            <?php } ?>
        </select>
        <select name="nama_bank" id="nama_bank" class="form-control" required="required">
            <?php foreach ($data_bank as $bank) {?>
          <option value="<?php echo $bank->id_bank;?>"><?php echo $bank->nama_bank ?></option>
            <?php } ?>
        </select>
        <input type="text" class="form-control" name="no_regis" id="no_regis" placeholder="Nomor Registrasi">
        <input  class="form-control datepicker" name="tgl_regis" id="tgl_regis" placeholder="Tanggal Registrasi">
        <input type="text" class="form-control" name="no_srt_perm" id="no_srt_perm" placeholder="Nomor Surat Permohonan">
        <input  class="form-control datepicker" name="tgl_srt_perm" id="tgl_srt_perm" placeholder="Tanggal Surat Permohonan">
        <input type="text" class="form-control" name="no_ppk" id="no_ppk" placeholder="No IP">
        <input  class="form-control datepicker" name="tgl_ppk" id="tgl_ppk" placeholder="Tanggal IP" >
        <input type="text" class="form-control" name="sumber_bis" id="sumber_bis" placeholder="Sumber Bisnis">
        <input type="text" class="form-control" name="nama_pri" id="nama_pri" placeholder="Nama Principal">
        <textarea class="form-control" name="alamat_pri" id="alamat_pri" placeholder="Alamat Principal"></textarea>
        <input type="text" class="form-control" name="no_surat" id="no_surat" placeholder="No Surat">         
        <input  class="form-control datepicker" name="tgl_surat" id="tgl_surat" placeholder="Tanggal Surat">
        <select name="jenis_bg" id="jenis_bg" class="form-control" required="required">
          <?php foreach ($data_jenis_bg as $jenis_bg) {?>
          <option value="<?php echo $jenis_bg->id_jenis_bg;?>"><?php echo $jenis_bg->jenis_bg ?></option>
          <?php } ?>
        </select>
        <div class="input-group mb-3">
          <input class="form-control datepicker" name="tgl_awal" id="tgl_awal" placeholder="Tgl Awal">
        <div class="input-group-prepend">
          <span class="input-group-text mt-2" id="basic-addon1" style="height:45px;">s/d</span>
        </div>
        <input class="form-control datepicker" name="tgl_akhir" id="tgl_akhir" placeholder="Tgl Akhir" aria-describedby="basic-addon1">
        </div>
        <input type="text" class="form-control numb" name="n_jaminan" id="n_jaminan" placeholder="Nilai Jaminan">
    </div>

        <!--kolom 2-->
        <div class="col-md-6">
        <textarea class="form-control" name="na_obligee" id="na_obligee" placeholder="Nama Oblige"></textarea>
        <textarea class="form-control" name="al_obligee" id="al_obligee" placeholder="Alamat Oblige"></textarea>
        <textarea class="form-control" name="n_pekerjaan" id="n_pekerjaan" placeholder="Nama Pekerjaan"></textarea>
        <input type="text" class="form-control numb5" name="n_kontrak" id="n_kontrak" placeholder="Nilai Kontrak">
      

        <input type="text" class="form-control numb1" name="n_premi" id="n_premi" placeholder="Nilai Premi">
        <input type="text" class="form-control numb2" name="p_asuransi" id="p_asuransi" placeholder="Premi Asuransi">
        <input type="text" class="form-control numb3" name="p_bank" id="p_bank" placeholder="Premi Bank">
        <input type="text" class="form-control numb4" name="p_komisi" id="p_komisi" placeholder="Potensi Komisi">
        <input type="text" class="form-control" name="no_bg" id="no_bg" placeholder="No BG">
        <input  class="form-control datepicker" name="tgl_bg" id="tgl_bg" placeholder="Tanggal BG">
        <input type="text" class="form-control" name="ket_bg" id="ket_bg" placeholder="Keterangan BG">
        <input type="text" class="form-control" name="bk_bayar" id="bk_bayar" placeholder="Bukti Bayar">
        <input type="text" class="form-control" name="no_s_tagih" id="no_s_tagih" placeholder="No Surat Tagih">
        <input  class="form-control datepicker" name="tgl_s_tagih" id="tgl_s_tagih" placeholder="Tanggal Surat Tagih">
        <input  class="form-control datepicker" name="tgl_m_tagih" id="tgl_m_tagih" placeholder="Tanggal Masuk Tagih">
        <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan">
        
      </div>
    </div>
    <button class="btn btn-primary mt-2 mb-4" id="btn_simpan_bg" type="button">Simpan</button>
    <button class="btn btn-success mt-2 mb-4" id="btn_update_bg" type="button">Update</button>
  </form>
</div>
  <!-- <div class="tab-pane container" id="menu2">...</div> -->
</div>
<?php } ?>


