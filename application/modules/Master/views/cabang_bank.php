<?php if ($userdata->id_level == '1') { ?>
<div class="container">

  <button type="button" class="btn btn-outline-success mb-2" id="btnTambah"><i class="fa fa-plus"></i> Tambah
</button>

<hr class="border-success" style="margin-top: 10px;">
<table id="tbl_cabang_bank" class="table table-bordered border-success" style="width:100%">
        <thead class="bg-success text-white">
            <tr>
                <th style="width:30px;">No</th>
                <th>Bank</th>
                <th>Nama Cabang Bank</th>
                <th>Aksi</th>
                
            </tr>
        </thead>
        <tbody id="show_data_cabang_bank">          
        </tbody>
    </table>

<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
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
      <table id="tbl_cabang_bank" class="table table-bordered border-success" style="width:100%">
        <thead class="bg-success text-white">
          <tr>
              <th style="width:30px;">No</th>
              <th>Bank</th>
              <th>Nama Cabang Bank</th>
          </tr>
        </thead>
        <tbody>  
        <?php 
        $this->db->select('bank.*,cabang_bank.*');
        $this->db->from('cabang_bank');
        $this->db->join('bank', 'bank.id_bank = cabang_bank.id_bank', 'left');
        $query = $this->db->get()->result();
        $i = 1;
        foreach($query as $row) {
        ?>   
          <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $row->nama_bank ?></td>
            <td><?php echo $row->cabang_bank ?></td>
          </tr>       
        <?php } ?>        
        </tbody>
      </table>
    </div>
    <?php } 
    $cabang_bank = $this->db->get('bank')->result();?>

<script type="text/javascript" charset="utf-8">
  var id_pengguna = '<?= $userdata->id_pengguna ?>';
  var cabang_bank = <?= json_encode($cabang_bank) ?>;
</script>