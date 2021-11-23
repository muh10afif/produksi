<?php if ($userdata->id_level == '1') { ?>
<div class="container">

    <div class="form-inline">
  <div class="form-group mb-2">
    <input type="text" class="form-control required" id="jenis_bg" style="width:400px;" name="jenis_bg" placeholder="Jenis BG" autocomplete="off" required>
  </div>
  <button class="btn btn-success mb-2 ml-2 " id="btn_simpan_jenis_bg">Simpan</button>
</div>

<hr class="border-success" style="margin-top: 10px;">
<table id="tbl_jenis_bg" class="table table-bordered border-success" style="width:100%">
        <thead class="bg-success text-white">
            <tr>
                 <th style="width:30px;">No</th>
                <th>Jenis BG</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="show_data_jenis_bg"></tbody>
    </table>

        <!-- Modal Edit-->
    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-edit"></i> Edit Jenis BG</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <input type="hidden" name="id_jenis_bg_edit" id="id_jenis_bg">
                <div class="form-row">
                  <div class="col-md-12 ">
                    <label for="validationServer01">Jenis BG</label>
                  <input type="text" class="form-control" name="jenis_bg_edit" id="jenis_bg2" placeholder="Nama Jenis BG">
                  </div>
                  
                </div>
          </div>
          <div class="modal-footer">
             <button class="btn btn-primary mt-2" id="btn_update_jenis_bg" type="submit">Update</button>
              </form>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <?php if ($userdata->id_level == '4') { ?>
    <div class="container">
      <table id="tbl_jenis_bg" class="table table-bordered border-success" style="width:100%">
        <thead class="bg-success text-white">
          <tr>
            <th style="width:30px;">No</th>
            <th>Jenis BG</th>
          </tr>
        </thead>
        <tbody>
        <?php 
         
        $i = 1;
        foreach($query as $row) {
        ?>      
          <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $row->jenis_bg ?></td>
          </tr>    
        <?php } ?>          
        </tbody>
      </table>
    </div>
    <?php } ?>

<script type="text/javascript" charset="utf-8">
  var id_pengguna = '<?= $userdata->id_pengguna ?>';
</script>