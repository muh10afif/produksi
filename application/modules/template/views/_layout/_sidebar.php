<div class="sidebar">
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item has-treeview ">
        <a href="<?= base_url() ?>" class="nav-link <?= ($Menu == "Dashboard") ? 'active' : ''; ?>">
          <i class="nav-icon fa fa-dashboard"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>

       <li class="nav-item has-treeview " <?= ($userdata->id_level == '2')? 'hidden' : ''; ?>>
        <a href="<?= base_url()?>Auth/data_pengguna" class="nav-link <?= ($Menu == "Registrasi") ? 'active' : ''; ?>">
          <i class="nav-icon ion ion-person-add"></i>
          <?php if ($userdata->id_level == '1') { ?>
          <p>
            Registrasi User
          </p>
          <?php } else { ?>
          <p>
            Data User
          </p>
          <?php } ?>
        </a>

      </li>
      
      <li class="nav-item has-treeview <?= ($Menu == "Master") ? 'menu-open' : ''; ?>" <?= ($userdata->id_level == '2') ? 'hidden' : ''; ?>>
        
        <a href="#" class="nav-link <?= ($Menu == "Master") ? 'active' : ''; ?>">
          <i class="nav-icon fa fa-database"></i>
          <p>
            Master Data
            <i class="right fa fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview ">
          <li class="nav-item">
            <a href="<?= base_url('Master/Asuransi') ?>" class="nav-link  <?= ($Page == "Asuransi") ? 'active' : ''; ?>">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Asuransi</p>
            </a>
          </li>
        </ul>
         <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('Master/Cabang_asuransi') ?>" class="nav-link <?= ($Page == "Cabang Asuransi") ? 'active' : ''; ?>">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Cabang Asuransi</p>
            </a>
          </li>
        </ul>
         <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('Master/Jenis_kredit') ?>" class="nav-link <?= ($Page == "Jenis Kredit") ? 'active' : ''; ?>">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Jenis Kredit</p>
            </a>
          </li>
        </ul>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('Master/Bank') ?>" class="nav-link <?= ($Page == "Bank") ? 'active' : ''; ?>">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Bank</p>
            </a>
          </li>
        </ul>
         <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('Master/Jenis_bg') ?>" class="nav-link <?= ($Page == "Jenis BG") ? 'active' : ''; ?>">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Jenis BG</p>
            </a>
          </li>
        </ul>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('Master/Cabang_bank') ?>" class="nav-link <?= ($Page == "Cabang Bank") ? 'active' : ''; ?>">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Cabang Bank</p>
            </a>
          </li>
        </ul>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('Master/Principal') ?>" class="nav-link <?= ($Page == "Principal") ? 'active' : ''; ?>">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Principal</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item has-treeview <?= ($Menu == "Kredit Konsumtif") ? 'menu-open' : ''; ?>" >
        
        <a href="#" class="nav-link <?= ($Menu == "Kredit Konsumtif") ? 'active' : ''; ?>">
          <i class="nav-icon fa fa-credit-card"></i>
          <p>
            Kredit Konsumtif
            <i class="right fa fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview ">
          <li class="nav-item">
            <a href="<?= base_url('Kredit/Kredit_konsumtif') ?>" class="nav-link  <?= ($Page == "Transaksi CAC") ? 'active' : ''; ?>">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Transaksi CAC</p>
            </a>
          </li>
        </ul>
        <ul class="nav nav-treeview" <?= ($userdata->id_level == '4') ? 'hidden' : ''; ?>>
          <li class="nav-item">
            <a href="<?= base_url('Kredit/Kredit_konsumtif/pelaporan') ?>" class="nav-link <?= ($Page == "Pelaporan") ? 'active' : ''; ?>">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Pelaporan</p>
            </a>
          </li>
        </ul> 
      </li>

      <li class="nav-item has-treeview <?= ($Menu == "Kredit Non Konsumtif") ? 'menu-open' : ''; ?>" >
        
        <a href="#" class="nav-link <?= ($Menu == "Kredit Non Konsumtif") ? 'active' : ''; ?>">
          <i class="nav-icon fa fa-credit-card-alt"></i>
          <p>
            Kredit Non Konsumtif
            <i class="right fa fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview ">
          <li class="nav-item">
            <a href="<?= base_url('Kredit/Kredit_non_konsumtif/') ?>" class="nav-link  <?= ($Page == "Bank Garansi") ? 'active' : ''; ?>">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Bank Garansi</p>
            </a>
          </li>
        </ul>
         <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('Kredit/Kredit_non_konsumtif/cbc') ?>" class="nav-link <?= ($Page == "Case By Case") ? 'active' : ''; ?>">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Case By Case</p>
            </a>
          </li>
        </ul>
         <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('Kredit/Kredit_non_konsumtif/asum') ?>" class="nav-link <?= ($Page == "ASUM") ? 'active' : ''; ?>">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>ASUM</p>
            </a>
          </li>
        </ul>
      </li>
        
<!-- 
      <li class="nav-item">
        <a href="pages/widgets.html" class="nav-link">
          <i class="nav-icon fa fa-th"></i>
          <p>
            Widgets
            <span class="right badge badge-danger">New</span>
          </p>
        </a>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-pie-chart"></i>
          <p>
            Charts
            <i class="right fa fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="pages/charts/chartjs.html" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>ChartJS</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/charts/flot.html" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Flot</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/charts/inline.html" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Inline</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-tree"></i>
          <p>
            UI Elements
            <i class="fa fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="pages/UI/general.html" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>General</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/UI/icons.html" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Icons</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/UI/buttons.html" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Buttons</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/UI/sliders.html" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Sliders</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-edit"></i>
          <p>
            Forms
            <i class="fa fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="pages/forms/general.html" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>General Elements</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/forms/advanced.html" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Advanced Elements</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/forms/editors.html" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Editors</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-table"></i>
          <p>
            Tables
            <i class="fa fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="pages/tables/simple.html" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Simple Tables</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/tables/data.html" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Data Tables</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-header">EXAMPLES</li>
      <li class="nav-item">
        <a href="pages/calendar.html" class="nav-link">
          <i class="nav-icon fa fa-calendar"></i>
          <p>
            Calendar
            <span class="badge badge-info right">2</span>
          </p>
        </a>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-envelope-o"></i>
          <p>
            Mailbox
            <i class="fa fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="pages/mailbox/mailbox.html" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Inbox</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/mailbox/compose.html" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Compose</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/mailbox/read-mail.html" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Read</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-book"></i>
          <p>
            Pages
            <i class="fa fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="pages/examples/invoice.html" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Invoice</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/examples/profile.html" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Profile</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/examples/login.html" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Login</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/examples/register.html" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Register</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/examples/lockscreen.html" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Lockscreen</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-plus-square-o"></i>
          <p>
            Extras
            <i class="fa fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="pages/examples/404.html" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Error 404</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/examples/500.html" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Error 500</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/examples/blank.html" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Blank Page</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="starter.html" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Starter Page</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-header">MISCELLANEOUS</li>
      <li class="nav-item">
        <a href="https://adminlte.io/docs" class="nav-link">
          <i class="nav-icon fa fa-file"></i>
          <p>Documentation</p>
        </a>
      </li>
      <li class="nav-header">LABELS</li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-circle-o text-danger"></i>
          <p class="text">Important</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-circle-o text-warning"></i>
          <p>Warning</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-circle-o text-info"></i>
          <p>Informational</p>
        </a>
      </li> -->

    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
    <!-- /.sidebar -->
  </aside>