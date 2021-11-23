<nav class="main-header navbar navbar-expand bg-success navbar-light border-bottom sidebar-collapse">
    <!-- Left navbar links -->
     <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul> 

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
       <img style="width: 35%;height: 35%" src="<?= base_url()?>/assets/img/kata.png" class="img-responsive" alt="Image">
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <p class="user-panel"><img class="img-circle elevation-2 " src="<?= base_url() ?>/assets/img/avatar04.png" alt=""> <b><?= ucfirst($userdata->nama_lengkap) ?></b></p>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="<?= base_url('Auth/Auth/logout');?>" class="dropdown-item btn btn-primary" ><p class="text-dark"><i class="fa fa-sign-out"></i>LOGOUT</p>
          </a>
        </div>
      </li>
    </ul>
  </nav>