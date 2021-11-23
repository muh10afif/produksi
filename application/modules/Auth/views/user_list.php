<?php if ($userdata->id_level == '1') { ?>
<div class="container">
<button type="button" class="btn btn-outline-success mb-2" id="btnTambah"><i class="fa fa-plus"></i> Tambah
</button>
	<table class="table table-bordered" id="pengguna" style="width:100%;">
		<thead style="text-align: center;">
      <th style="width:40px;">No</th>
			<th>Nama</th>
			<th>NIK</th>
			<th>Level</th>
			<th>Aksi</th>
		</thead>
		<tbody id="show_data"></tbody>		
	</table>
</div>

<!-- Modal Tambah User-->
<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="ModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
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
    <?php if ($userdata->id_level == '4') {?>
<div class="container">
  <table class="table table-bordered" id="pengguna" style="width:100%;">
    <thead style="text-align: center;">
      <th style="width:40px;">No</th>
      <th>Nama</th>
      <th>NIK</th>
      <th>Level</th>
    </thead>
    <tbody>
      <?php 
      $query = $this->db->get('pengguna')->result(); 
      $i = 1;
      foreach($query as $row) {
      ?>
      <tr>
        <td><?= $i++ ?></td>
        <td><?= $row->nama_lengkap ?></td>
        <td><?= $row->username ?></td>
        <td><?= $row->level ?></td>
      </tr>
      <?php } ?>
    </tbody>    
  </table>
</div>
    <?php } ?>

