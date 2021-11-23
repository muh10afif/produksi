<?php if ($userdata->id_level == '1') { ?>

<div class="container">
	<button type="button" class="btn btn-outline-success mb-2" id="btnTambah"><i class="fa fa-plus"></i> Tambah</button>
<table id="cb_asuransi" class=" table table-bordered border-success" style="width:100%">
        <thead class="bg-success text-white">
            <tr>
              <th style="width:30px;">No</th>
            	<th>Asuransi</th>
              <th>Nama Cabang</th>
              <th>Alamat</th>
              <th>Telepon</th>
              <th>Email</th>
              <th width="100px;">Aksi</th>
            </tr>
        </thead>
        <tbody id="show_data"></tbody>
    </table>

<!-- Modal Tambah User-->
<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="ModalTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
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
    <?php if ($userdata->id_level == '4') { ?>
    <div class="container">
      <table id="cb_asuransi" class=" table table-bordered border-success" style="width:100%">
        <thead class="bg-success text-white">
          <tr>
            <th style="width:30px;">No</th>
            <th>Asuransi</th>
            <th>Nama Cabang</th>
            <th>Alamat</th>
            <th>Telfon</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        $this->db->select('asuransi.*,cabang_asuransi.*');
        $this->db->from('cabang_asuransi');
        $this->db->join('asuransi', 'asuransi.id_asuransi = cabang_asuransi.id_asuransi', 'left');
        $query = $this->db->get()->result();
        $i = 1;
        foreach($query as $row) {
        ?>   
          <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $row->nama_asuransi ?></td>
            <td><?php echo $row->nama_cabang ?></td>
            <td><?php echo $row->alamat ?></td>
            <td><?php echo $row->telfon ?></td>
            <td><?php echo $row->email ?></td>
          </tr>       
        <?php } ?>
        </tbody>
      </table>
      </div>
      <?php } ?>


<script type="text/javascript" charset="utf-8">
  var id_pengguna = '<?= $userdata->id_pengguna ?>';
  var data_asuransi = <?= json_encode($data_asuransi); ?>
</script>