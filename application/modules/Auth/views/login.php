<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aplikasi Pelaporan Produksi | Log in</title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/img/favicon.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/font-awesome/css/font-awesome.min.css">

    <style type="text/css">
    html,body {
      height: 100%;
    }

    #yellow {
      height: 100%;
      background: #07ab4b;
    }
    </style> 
  </head>
  <body >

   <div class="container-fluid h-100">
  <div class="row justify-content-center h-100">

    <div class="col-8 d-none d-md-block  text-center" id="yellow">
      <img class="img-responsive" src="<?php echo base_url('assets/img/ssm.png') ?>" style="width:250px;padding-top: 18%">
      <h2 class="text-white" style="">Aplikasi Pelaporan Produksi</h2>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center mt-5">
      <img class="img-responsive d-md-none  " src="<?php echo base_url('assets/img/ssm.png') ?>" style="width:80px;margin-bottom: 10px;">
      <h4 class="text-success">Silahkan Login</h4>
      <div class="container mt-5 text-center">
        <?php echo $this->session->flashdata('error_msg'); ?>
    <form method="POST" action="<?php echo base_url('Auth/Auth/login') ?>">
 <div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text"><i class="fa fa-user">  </i></div>
    </div>
    <input type="text" class="form-control" name="username" placeholder="Username">
  </div>
   <div class="input-group mb-2 mr-sm-2">
    <div class="input-group-prepend">
      <div class="input-group-text"><i class="fa fa-unlock-alt"></i></div>
    </div>
    <input type="password" class="form-control " name="password" placeholder="Password">
  </div>

  <button type="submit" class="btn btn-success float-right">LOGIN</button>
</form>
      </div>
    </div>
  </div>
</div>

    <!-- /.login-box -->

    <!-- jQuery 2.2.3 -->
   <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- iCheck -->
    <!-- <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script> -->
    <!-- <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script> -->
  </body>
</html>
