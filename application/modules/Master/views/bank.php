<?php if ($userdata->id_level == '1') { ?>
<div class="container">

    <div class="form-inline">
  <div class="form-group mb-2">
    <input type="text" class="form-control required" id="nama_bank" style="width:400px;" name="nama_bank" placeholder="Bank" autocomplete="off">
  </div>
  <button type="submit" class="btn btn-success mb-2 ml-2 " id="btn_simpan_bank">Simpan</button>
</div>

<hr class="border-success" style="margin-top: 10px;">
<table id="bank" class="table table-bordered border-success" style="width:100%">
        <thead class="bg-success text-white">
            <tr>
                 <th style="width:30px;">No</th>
                <th>Nama Bank</th>
                <th>Aksi</th>
                
            </tr>
        </thead>
        <tbody id="show_data_bank">          
        </tbody>
    </table>

        <!-- Modal Edit-->
    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-edit"></i> Edit Bank</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body"></div>
          <div class="modal-footer">
             <button class="btn btn-primary mt-2" id="btn_update_bank" type="submit">Update</button>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <?php if ($userdata->id_level == '4') { ?>
    <div class="container">
      <table id="bank" class="table table-bordered border-success" style="width:100%">
        <thead class="bg-success text-white">
            <tr>
                <th style="width:30px;">No</th>
                <th>Nama Bank</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $query = $this->db->get('bank')->result(); 
        $i = 1;
        foreach($query as $row) {
        ?>      
          <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $row->nama_bank ?></td>
          </tr>    
        <?php } ?>          
        </tbody>
      </table>
    </div>
    <?php } ?>

<script type="text/javascript" charset="utf-8">
  var id_pengguna = '<?= $userdata->id_pengguna ?>';
</script>