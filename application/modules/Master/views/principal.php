<div class="container">
  <button class="btn btn-outline-success mb-2" id="btnTambah"><i class="fa fa-plus"></i> Tambah</button>
    <table class="table table-bordered bg-light tabel1" id="tbPrincipal" width="100%" cellspacing="0">
      <thead class="bg-success text-white">
        <tr>
          <th>No.</th>
          <th>Nama Principal</th>
          <th>PIC 1</th>
          <th>PIC 2</th>
          <th>No Akta Principal</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody id="show_data"></tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modal-addLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-addLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>

          

<script type="text/javascript" charset="utf-8">
  var PAGE = '<?= $Page ?>';
</script>