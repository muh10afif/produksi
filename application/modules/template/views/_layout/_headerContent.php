<div class="content-header bg-white">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-success"><?php if ($Menu != 'Dashboard'){echo "Data ";} ?>
       <?= $Page ?></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">

          <?php
          if (isset($breadcrumb)) {
            foreach ($breadcrumb as $bd) {
              echo $bd;
            }
          }else{ ?>
            <li class="breadcrumb-item"><a href="#" class="text-success"><?= $Menu ?></a></li>
            <li class="breadcrumb-item active"><?= $Page ?></li>
        <?php } ?>
        </ol>
      </div>
    </div>
  </div>
 </div>