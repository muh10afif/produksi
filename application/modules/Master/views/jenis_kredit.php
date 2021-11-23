<?php if ($userdata->id_level == '1') { ?>
<div class="container">

  <div class="form-inline">
    <div class="form-group mb-2">
      <input type="text" class="form-control required" id="jenis_kredit" style="width:400px;" name="jenis_kredit" placeholder="Jenis Kredit" required>
    </div>
    <button type="submit" class="btn btn-success mb-2 ml-2 " id="btn_simpan_jk">Simpan</button>
  </div>

<hr class="border-success" style="margin-top: 10px;">
<table id="j_kredit" class="table table-bordered border-success" style="width:100%">
        <thead class="bg-success text-white">
            <tr>
                 <th style="width:30px;">No</th>
                <th>Jenis Kredit</th>
                <th>Aksi</th>
                
            </tr>
        </thead>
        <tbody id="show_data_jk"></tbody>
    </table>

 <!--MODAL HAPUS-->
        <!-- <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content panel-warning">
                    <form class="form-horizontal">
                    <div class="modal-body text-center">
                                           
                            <input type="hidden" name="id_jenis_kredit" id="id" value="">
                            <img class="img-responsive" src="<?php echo base_url()?>assets/img/warning.png"  style="width:100px; height:100px;margin-bottom: 30px; ">
                            <h5>Yakin Ingin Menghapus Data Ini?</h5>
                            <button type="button" class="btn btn-danger  btn-lg" data-dismiss="modal">Tutup</button>
                            <button class="btn_hapus btn btn-info btn-lg flo ml-2" id="btn_hapus_jk">Hapus</button>
              
                        
                    </div>
                    </form>
                </div>
            </div>
        </div> -->
        <!--END MODAL HAPUS-->

        <!-- Modal Edit User-->
    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-edit"></i> Edit Asuransi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body"></div>
          <div class="modal-footer">
             <button class="btn btn-primary mt-2" id="btn_update_jk">Update</button>
          </div>
        </div>
      </div>
    </div>


    <?php } ?>
    <?php if ($userdata->id_level == '4') { ?>
    <div class="container">
      <table id="j_kredit" class="table table-bordered border-success" style="width:100%">
        <thead class="bg-success text-white">
            <tr>
                <th style="width:30px;">No</th>
                <th>Jenis Kredit</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $query = $this->db->get('jenis_kredit')->result(); 
        $i = 1;
        foreach($query as $row) {
        ?>      
          <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $row->jenis_kredit ?></td>
          </tr>    
        <?php } ?>      
        </tbody>
      </table>
    </div>
    <?php } ?>


<script type="text/javascript" charset="utf-8">
  var id_pengguna = '<?= $userdata->id_pengguna ?>';
</script>