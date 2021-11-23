<?php if ($userdata->id_level == '4') { ?>
<div class="container-fluid">
  <table id="tr_cac" class=" table table-bordered border-success" style="width:100%">
    <thead class="bg-success text-white">
        <tr>
            <th style="width:30px;">No</th>
            <th>Asuransi</th>
            <th>Cabang Asuransi</th>
            <th>Bank</th>
            <th>Periode</th>
            <th>Plafond</th>
            <th>NOA</th>
            <th>Premi</th>
        </tr>
    </thead>
    <tbody>
    <?php 
        $this->db->select('tr_cac.*,asuransi.*,cabang_asuransi.*,bank.*');
        $this->db->from('tr_cac');
        $this->db->join('asuransi', 'asuransi.id_asuransi = tr_cac.id_asuransi', 'left');
        $this->db->join('cabang_asuransi', 'cabang_asuransi.id_cabang_asuransi = tr_cac.id_cabang_asuransi', 'left');
        $this->db->join('bank', 'bank.id_bank = tr_cac.id_bank', 'left');
        $this->db->order_by('tr_cac.waktu', 'desc');
        $query = $this->db->get()->result();
        $i = 1;
        foreach($query as $row) {
        ?>   
          <tr>
            <td><?= $i++ ?></td>
            <td><?= $row->nama_asuransi ?></td>
            <td><?= $row->nama_cabang ?></td>
            <td><?= $row->nama_bank ?></td>
            <td><?= date('d-m-Y', strtotime($row->waktu)) ?></td>
            <td>Rp. <?= number_format($row->plafond,'0',',','.') ?></td>
            <td><?= $row->noa ?></td>
            <td>Rp. <?= number_format($row->premi,'0',',','.') ?></td>
          </tr>       
        <?php } ?>          
    </tbody>
  </table>
</div>

<?php } else { ?>

<div class="container-fluid">
  <button type="button" class="btn btn-outline-success mb-2" id="btnTambah"><i class="fa fa-plus"></i> Tambah
</button>
<table id="tr_cac" class=" table table-bordered border-success" style="width:100%">
        <thead class="bg-success text-white">
            <tr>
                <th style="width:30px;">No</th>
                <th>Asuransi</th>
                <th>Cabang Asuransi</th>
                <th>Bank</th>
                <th>Periode</th>
                <th>Plafond</th>
                <th>NOA</th>
                <th>Premi</th>
                <th>Aksi</th>
                
            </tr>
        </thead>
        <tbody id="show_data_trcac">          
        </tbody>
    </table>

<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="ModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>
    <?php } ?> 
    
    
<script type="text/javascript" charset="utf-8">
  var id_pengguna = '<?= $userdata->id_pengguna ?>';
  var data_asuransi = <?= json_encode($data_asuransi) ?>;
  var data_cabang = <?= json_encode($data_cabang) ?>;
  var data_bank = <?= json_encode($data_bank) ?>;
</script>