<!DOCTYPE html>
<html>
  <head>
    <title><?= ($Page) ? $Page.' | ' : '' ?>Produksi</title>
    <!-- meta -->
    <?= @$_meta; ?>

    <!-- css --> 
    <?= @$_css; ?>

    <!-- jQuery 2.2.3 -->
    <!-- <script src="<?= base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script> -->
    <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
  </head>

  <body class="hold-transition sidebar-mini sidebar-collapse">
    <!-- <?php if (!isset($userdata)) {redirect('Auth/Auth/login','refresh');} ?> -->
    <div class="wrapper">
      <!-- header -->
      <?= @$_nav; ?> 
      <!-- header -->
      <?= @$_header; ?> <!-- nav -->
      
      <!-- sidebar -->
      <?= @$_sidebar; ?>
      
      <!-- content -->
      <?= @$_content; ?> <!-- headerContent --><!-- mainContent -->
    
    <script type="text/javascript" charset="utf-8">
      var PAGE = "<?= $Page?>";
    </script>

      <!-- footer -->
      <?= @$_footer; ?>
    
      <div class="control-sidebar-bg"></div>
    </div>

    <!-- js -->
    <?= @$_js; ?>
  </body>

</html>