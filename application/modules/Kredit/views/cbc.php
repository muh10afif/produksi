<?php if ($userdata->id_level == '4') { ?>
<div class="container-fluid">
<table id="cbc" class="table table-bordered border-success" style="width:100%">
        <thead class="bg-success text-white">
            <tr>
                <th style="width:30px;">No</th>
                <th>Nama Asuransi</th>
                <th>No SSM</th>
                <th>Tgl SSM</th>
                <th width="30px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $this->db->select('*');
        $this->db->from('cbc');
        $this->db->join('asuransi', 'asuransi.id_asuransi = cbc.id_asuransi', 'left');
        $this->db->order_by('tgl_tagih_sm');
        $query = $this->db->get()->result();
        $i = 1;
        foreach($query as $row) {
        $this->db->select('*');
        $this->db->from('cbc');
        $this->db->join('asuransi', 'asuransi.id_asuransi = cbc.id_asuransi', 'left');
        $this->db->join('bank', 'bank.id_bank = cbc.id_bank', 'left');
        $this->db->where('id_cbc', $row->id_cbc);
        $query_detail = $this->db->get()->result();
        ?>   
          <tr>
            <td><?= $i++ ?></td>
            <td><?= $row->nama_asuransi ?></td>
            <td><?= $row->surat_tagih_sm ?></td>
            <td><?= date('d-m-Y', strtotime($row->tgl_tagih_sm)) ?></td>
            <td>
              <a href="#" class="btn btn-success" data-toggle="modal" data-target="#keterangan<?= $row->id_cbc;?>">
                <i class="fa fa-info-circle"></i>
              </a>
              <div class="modal fade" id="keterangan<?= $row->id_cbc;?>" tabindex="-1" data-backdrop="false" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="background: rgba(0, 0, 0, 0.5);">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">
                        <i class="fa fa-info-circle"></i> Detail Cash by Cash
                      </h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <table class="table table-hover table-borderless">
                        <?php foreach($query_detail as $ket) { ?>
                        <tr>
                          <td width="50%">Nama Asuransi</td>
                          <td width="1%">:</td>
                          <td><?= $ket->nama_asuransi ?></td>
                        </tr>
                        <tr>
                          <td width="50%">No Surat Pengantar SSM</td>
                          <td width="1%">:</td>
                          <td><?= $ket->surat_tagih_sm ?></td>
                        </tr>
                        <tr>
                          <td width="50%">Tanggal Surat SSM</td>
                          <td width="1%">:</td>
                          <td><?= $ket->tgl_tagih_sm ? date('d-m-Y', strtotime($ket->tgl_tagih_sm)) : null ?></td>
                        </tr>
                        <tr>
                          <td width="50%">Bank</td>
                          <td width="1%">:</td>
                          <td><?= $ket->nama_bank ?></td>
                        </tr>
                        <tr>
                          <td width="50%">Pembawa Bisnis</td>
                          <td width="1%">:</td>
                          <td><?= $ket->pembawa_bisnis ?></td>
                        </tr>
                        <tr>
                          <td width="50%">Nama Prinsipal</td>
                          <td width="1%">:</td>
                          <td><?= $ket->principal ?></td>
                        </tr>
                        <tr>
                          <td width="50%">No Surat Bank</td>
                          <td width="1%">:</td>
                          <td><?= $ket->no_surat_bank ?></td>
                        </tr>
                        <tr>
                          <td width="50%">Tanggal Surat</td>
                          <td width="1%">:</td>
                          <td><?= $ket->tgl_surat_bank ? date('d-m-Y', strtotime($ket->tgl_surat_bank)) : null ?></td>
                        </tr>
                        <tr>
                          <td width="50%">Nilai Pertanggungan</td>
                          <td width="1%">:</td>
                          <td><?= number_format($ket->nilai_pertanggungan) ?></td>
                        </tr>
                        <tr>
                          <td width="50%">Nilai Premi</td>
                          <td width="1%">:</td>
                          <td><?= number_format($ket->nilai_premi) ?></td>
                        </tr>
                        <tr>
                          <td width="50%">Potensi Komisi</td>
                          <td width="1%">:</td>
                          <td><?= number_format($ket->potensi_komisi) ?></td>
                        </tr>
                        <tr>
                          <td width="50%">No NPP</td>
                          <td width="1%">:</td>
                          <td><?= $ket->no_npp ?></td>
                        </tr>
                        <tr>
                          <td width="50%">Tanggal NPP</td>
                          <td width="1%">:</td>
                          <td><?= $ket->tgl_npp ? date('d-m-Y', strtotime($ket->tgl_npp)) : null ?></td>
                        </tr>
                        <tr>
                          <td width="50%">Bukti Bayar Premi</td>
                          <td width="1%">:</td>
                          <td><?= $ket->bb_premi ?></td>
                        </tr>
                        <tr>
                          <td width="50%">No Polis</td>
                          <td width="1%">:</td>
                          <td><?= $ket->no_polis ?></td>
                        </tr>
                        <tr>
                          <td width="50%">Tgl Polis</td>
                          <td width="1%">:</td>
                          <td><?= $ket->tgl_polis ? date('d-m-Y', strtotime($ket->tgl_polis)) : null ?></td>
                        </tr>
                        <tr>
                          <td width="50%">Surat Penagihan</td>
                          <td width="1%">:</td>
                          <td><?= $ket->no_surat_tagih ?></td>
                        </tr>
                        <tr>
                          <td width="50%">Tanggal Surat Penagihan</td>
                          <td width="1%">:</td>
                          <td><?= $ket->tgl_surat_tagih ? date('d-m-Y', strtotime($ket->tgl_surat_tagih)) : null ?></td>
                        </tr>
                        <tr>
                          <td width="50%">Jumlah Tagihan</td>
                          <td width="1%">:</td>
                          <td><?= number_format($ket->jumlah_tagih) ?></td>
                        </tr>
                        <tr>
                          <td width="50%">Tanggal Masuk Penagihan</td>
                          <td width="1%">:</td>
                          <td><?= $ket->tanggal_masuk_tagih ? date('d-m-Y', strtotime($ket->tanggal_masuk_tagih)) : null ?></td>
                        </tr>
                        <tr>
                          <td width="50%">Keterangan</td>
                          <td width="1%">:</td>
                          <td><?= $ket->ket ?></td>
                        </tr>
                        <tr>
                          <td width="50%">Bukti Bayar</td>
                          <td width="1%">:</td>
                          <td><?= $ket->bukti_bayar ?></td>
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
<ul class="container-fluid nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active text-success btnHome" data-toggle="tab" href="#home"><i class="fa fa-table"></i> Tabel</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-success" data-toggle="tab" href="#tambah"><i class="fa fa-plus"> Tambah</i></a>
  </li>
</ul>

<div class="tab-content">
  <div class="tab-pane active container-fluid" id="home">
    <div class="container-fluid">
<a href="<?= base_url('Kredit/Kredit_non_konsumtif/export_cbc') ?>" class="btn btn-outline-primary mb-2 mt-2" ><i class="fa fa-download"></i> Export Excel
</a>

<hr class="border-success" style="margin-top: 10px;">
  <table id="cbc" class="table table-bordered border-success" style="width:100%">
    <thead class="bg-success text-white">
      <tr>
        <th style="width:30px;">No</th>
        <th>Nama Asuransi</th>
        <th>No SSM</th>
        <th>Tgl SSM</th>
        <th width="170px;">Aksi</th>
      </tr>
    </thead>
    <tbody id="show_data_cbc">          
    </tbody>
  </table>
</div>
</div>

<!-- Detail -->
     <div class="modal fade" id="Modal-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-info-circle"></i> Detail Cash By Cash</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <table class="table table-hover">
                <tr>
                  <td>Nama Asuransi</td>
                  <td>:</td>
                  <td><p id="nama_asr_detail"></p></td>
                </tr>
                  <tr>
                  <td>No Surat Pengantar SSM</td>
                  <td>:</td>
                  <td><p id="no_ssm_detail" ></p></td>
                </tr>
                  <tr>
                  <td>Tanggal Surat SSM</td>
                  <td>:</td>
                  <td><p id="tgl_ssm_detail" ></p></td>
                </tr>
                  <tr>
                  <td>Bank</td>
                  <td>:</td>
                  <td><p id="nama_bank_detail"></p></td>
                </tr>
                  <tr>
                  <td>Pembawa Bisnis</td>
                  <td>:</td>
                  <td><p id="sumber_bis_detail" ></p></td>
                </tr>
                  <tr>
                  <td>Nama Prinsipal</td>
                  <td>:</td>
                  <td><p id="nama_pri_detail" ></p></td>
                </tr>
                  <tr>
                  <td>No Surat Bank</td>
                  <td>:</td>
                  <td><p id="no_surat_detail" ></p></td>
                </tr>
                <tr>
                  <td>Tanggal Surat</td>
                  <td>:</td>
                  <td><p id="tgl_surat_detail" ></p></td>
                </tr>
                  <tr>
                  <td>Nilai Pertanggungan</td>
                  <td>:</td>
                  <td><p id="nilai_per_detail" ></p></td>
                </tr>
                  <tr>
                  <td>Nilai Premi</td>
                  <td>:</td>
                  <td><p id="nilai_pre_detail" ></p></td>
                </tr>
                  <tr>
                  <td>Potensi Komisi</td>
                  <td>:</td>
                  <td><p id="pot_komisi_detail" ></p></td>
                </tr>
                  <tr>
                  <td>No NPP</td>
                  <td>:</td>
                  <td><p id="no_npp_detail"></p></td>
                </tr>
                  <tr>
                  <td>Tanggal NPP</td>
                  <td>:</td>
                  <td><p id="tgl_npp_detail"></p></td>
                </tr>
                 <tr>
                  <td>Bukti Bayar Premi</td>
                  <td>:</td>
                  <td><p id="bb_premi_detail"></p></td>
                </tr>
                 <tr>
                  <td>No Polis</td>
                  <td>:</td>
                  <td><p id="no_polis_detail"></p></td>
                </tr>
                 <tr>
                  <td>Tgl Polis</td>
                  <td>:</td>
                  <td><p id="tgl_polis_detail"></p></td>
                </tr>
                  <tr>
                  <td>Surat Penagihan</td>
                  <td>:</td>
                  <td><p id="srt_penagihan_detail"></p></td>
                </tr>
                <tr>
                  <td>Tanggal Surat Penagihan</td>
                  <td>:</td>
                  <td><p id="tgl_s_pen_detail"></p></td>
                </tr>
                <tr>
                  <td>Jumlah Tagihan</td>
                  <td>:</td>
                  <td><p id="jml_tagihan_detail"></p></td>
                </tr>
                 <tr>
                  <td>Tanggal Masuk Tagihan</td>
                  <td>:</td>
                  <td><p id="tgl_masuk_tagih_detail"></p></td>
                </tr>
                 <tr>
                  <td>Keterangan</td>
                  <td>:</td>
                  <td><p id="keterangan_detail"></p></td>
                </tr>
                <tr>
                  <td>Bukti Bayar</td>
                  <td>:</td>
                  <td><p id="bukti_byr_detail" ></p></td>
                </tr>
              </table>
          </div>
        </div>
      </div>
    </div>

  <div class="tab-pane container-fluid mt-3" id="tambah">
    <input type="hidden" id="id_cbc">
      <div class="form-row">
        <div class="col-md-4">                
          <select id="nama_asr" class="form-control m-2"></select>
          <select id="nama_bank" class="form-control m-2"></select>
          <input type="text" class="form-control m-2" id="no_ssm" placeholder="No SSM">
          <div class="input-group m-2">
            <input type="text" class="form-control datepicker" placeholder="Tanggal Registrasi" aria-label="Tanggal Registrasi" aria-describedby="calender" id="tgl_ssm">
            <div class="input-group-append">
              <label class="input-group-text" id="calender" for="tgl_ssm"><i class="fa fa-calendar"></i></label>
            </div>
          </div>
          <input type="text" class="form-control m-2" id="sumber_bis" placeholder="Sumber Bisnis">
          <input type="text" class="form-control m-2" id="nama_pri" placeholder="Nama Principal">
          <input type="text" class="form-control m-2" id="no_surat" placeholder="No Surat">
          <div class="input-group m-2">
            <input type="text" class="form-control datepicker" placeholder="Tanggal Surat" aria-label="Tanggal Surat" aria-describedby="calender" id="tgl_surat">
            <div class="input-group-append">
              <label class="input-group-text" id="calender" for="tgl_surat"><i class="fa fa-calendar"></i></label>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <input type="text" class="form-control m-2 numb" id="nilai_per" placeholder="Nilai Pertangungan">
          <input type="text" class="form-control m-2 numb1" id="nilai_pre" placeholder="Nilai Premi"> 
          <input type="text" class="form-control m-2 numb2" id="pot_komisi" placeholder="Potensi Komisi">
          <input type="text" class="form-control m-2" id="no_npp" placeholder="No NPP">
          <div class="input-group m-2">
            <input type="text" class="form-control datepicker" placeholder="Tanggal NPP" aria-label="Tanggal NPP" aria-describedby="calender" id="tgl_npp">
            <div class="input-group-append">
              <label class="input-group-text" id="calender" for="tgl_npp"><i class="fa fa-calendar"></i></label>
            </div>
          </div>
          <input type="text" class="form-control m-2" id="bb_premi" placeholder="Bukti Bayar Premi">
          <input type="text" class="form-control m-2" id="no_polis" placeholder="No Polis">
          <div class="input-group m-2">
            <input type="text" class="form-control datepicker" placeholder="Tanggal Polis" aria-label="Tanggal Polis" aria-describedby="calender" id="tgl_polis">
            <div class="input-group-append">
              <label class="input-group-text" id="calender" for="tgl_polis"><i class="fa fa-calendar"></i></label>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <input type="text" class="form-control m-2" id="srt_penagihan" placeholder="Surat Penagihan">
          <div class="input-group m-2">
            <input type="text" class="form-control datepicker" placeholder="Tanggal Surat Penagihan" aria-label="Tanggal Surat Penagihan" aria-describedby="calender" id="tgl_s_pen">
            <div class="input-group-append">
              <label class="input-group-text" id="calender" for="tgl_s_pen"><i class="fa fa-calendar"></i></label>
            </div>
          </div>
          <input type="text" class="form-control m-2 numb3" id="jml_tagihan" placeholder="Jumlah Tagihan" >
          <div class="input-group m-2">
            <input type="text" class="form-control datepicker" placeholder="Tanggal Masuk Tagihan" aria-label="Tanggal Masuk Tagihan" aria-describedby="calender" id="tgl_masuk_tagih">
            <div class="input-group-append">
              <label class="input-group-text" id="calender" for="tgl_masuk_tagih"><i class="fa fa-calendar"></i></label>
            </div>
          </div>
          <input type="text" class="form-control m-2" id="keterangan" placeholder="Keterangan">
          <input type="text" class="form-control m-2" id="bukti_byr" placeholder="Bukti Bayar">
        </div>
      </div>
      <div class="tombol_group m-2">
        <button class="btn btn-primary mt-2" id="btn_simpan_cbc">Simpan</button>
      </div>
  </div>
</div>
<?php } ?>

<script type="text/javascript" charset="utf-8">
  var data_asuransi = <?= json_encode($data_asuransi)?>;
  var data_bank = <?= json_encode($data_bank)?>;
</script>