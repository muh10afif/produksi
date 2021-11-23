<?php if ($userdata->id_level == '4') { ?>
<div class="container-fluid">
  <table id="tbl_asum" class="table table-striped border-success" style="width:100%">
    <thead class="bg-success text-white">
        <tr>
            <th style="width:30px;">No</th>
            <th>Tertanggung</th>
            <th>No Polis</th>
            <th>Tanggal Polis</th>
            <th>Premi</th>
            <th>Komisi</th>
            <th>Keterangan</th>
            <th width="30px;">Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $query = $this->db->get('asum')->result(); 
    $i = 1;
    foreach($query as $row) {
    $this->db->select('*');
    $this->db->from('asum');
    $this->db->where('id_asum', $row->id_asum);
    $query_detail = $this->db->get()->result();
    ?>  
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row->tertanggung; ?></td>
        <td><?php echo $row->no_polis; ?></td>
        <td><?php echo $row->tgl_polis ?></td>
        <td>Rp.<?php echo number_format($row->premi); ?></td>
        <td>Rp.<?php echo number_format($row->komisi); ?></td>
        <td><?php echo $row->keterangan; ?></td>
        <td>
          <a href="#" class="btn btn-success" data-toggle="modal" data-target="#keterangan<?php echo $row->id_asum;?>">
            <i class="fa fa-info-circle"></i>
          </a>
          <div class="modal fade" id="keterangan<?php echo $row->id_asum;?>" tabindex="-1" data-backdrop="false" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="background: rgba(0, 0, 0, 0.5);">
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
                  <table class="table table-hover">
                    <?php foreach($query_detail as $ket) { ?>
                    <tr>
                      <td width="40%">Tertanggung</td>
                      <td width="10%">:</td>
                      <td><?php echo $ket->tertanggung ?></td>
                    </tr>
                    <tr>
                      <td width="40%">Produk</td>
                      <td width="10%">:</td>
                      <td><?php echo $ket->produk ?></td>
                    </tr>
                     <tr>
                      <td width="40%">No Polis</td>
                      <td width="10%">:</td>
                      <td><?php echo $ket->no_polis ?></td>
                    </tr>
                     <tr>
                      <td width="40%">Tgl Polis</td>
                      <td width="10%">:</td>
                      <td><?php echo $ket->tgl_polis ? date('d-m-Y', strtotime($ket->tgl_polis)) : null ?></td>
                    </tr>
                     <tr>
                      <td width="40%">Premi</td>
                      <td width="10%">:</td>
                      <td><?php echo number_format($ket->premi) ?></td>
                    </tr>
                     <tr>
                      <td width="40%">Surat Penagihan</td>
                      <td width="10%">:</td>
                      <td><?php echo $ket->no_surat_penagihan ?></td>
                    </tr>
                    <tr>
                      <td width="40%">Tanggal Penagihan</td>
                      <td width="10%">:</td>
                      <td><?php echo $ket->tgl_penagihan ? date('d-m-Y', strtotime($ket->tgl_penagihan)) : null ?></td>
                    </tr>
                    <tr>
                      <td width="40%">Komisi</td>
                      <td width="10%">:</td>
                      <td><?php echo number_format($ket->komisi) ?></td>
                    </tr>
                    <tr>
                      <td width="40%">Keterangan</td>
                      <td width="10%">:</td>
                      <td><?php echo $ket->keterangan ?></td>
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
<div class="container-fluid">
<button type="button" class="btn btn-outline-success mb-2" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus"></i> Tambah
</button>
<a href="<?php echo base_url('Kredit/Kredit_non_konsumtif/export_asum') ?>" class="btn btn-outline-primary mb-2" ><i class="fa fa-download"></i> Export Excel
</a>

<hr class="border-success" style="margin-top: 10px;">
<table id="tbl_asum" class="table table-striped border-success" style="width:100%">
        <thead class="bg-success text-white">
            <tr>
                <th style="width:30px;">No</th>
                <th>Tertanggung</th>
                <th>No Polis</th>
                <th>Tanggal Polis</th>
                <th>Premi</th>
                <th>Komisi</th>
                <th>Keterangan</th>
                <th width="170px;">Aksi</th>
            </tr>
        </thead>
        <tbody id="show_data_asum">          
        </tbody>
    </table>

    <!-- MODAL ADD -->
  <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-plus"></i> Tambah Data Cash By Cash</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <div class="form-row">
        <label for="validationServer01">Tertanggung</label>
        <input type="text" class="form-control" id="tertanggung" placeholder="Tertanggung">
        <label for="validationServer01">Produk</label>
        <input type="text" class="form-control" id="produk" placeholder="Produk">

        <label for="validationServer01">No Polis</label>
        <input type="text" class="form-control" id="no_polis" placeholder="No Polis">

        <label for="validationServer01">Tanggal Polis</label>
        <input type="text" class="form-control datepicker" id="tgl_polis" placeholder="Tanggal Polis">

        <label for="validationServer01">Premi</label>
        <input type="text" class="form-control numb" id="premi" placeholder="Premi">

        <label for="validationServer01">No Surat Penagihan</label>
        <input type="text" class="form-control" id="no_s_penagihan" placeholder="No Surat Penagihan">

        <label for="validationServer01">Tanggal Pengihan</label>
        <input type="text" class="form-control datepicker" id="tgl_penagihan" placeholder="Tanggal Pengaihan">
        <label for="validationServer01">Komisi</label>
        <input type="text" class="form-control numb1" id="komisi" placeholder="Komisi">

        <label for="validationServer01">Keterangan</label>
        <input type="text" class="form-control " id="keterangan" placeholder="Keterangan">
        </div>
    </div>
        <div class="modal-footer">
          <button class="btn btn-primary mt-2" id="btn_simpan_asum">Simpan</button>
        </div>
    </div>
  </div>
</div>

    <?php } ?>


