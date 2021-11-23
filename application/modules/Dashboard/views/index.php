<div class="container-fluid">

  <!-- Info boxes -->
  <div class="row">
    <div class="col-md-3 col-sm-6 col-12">
      <a href="<?= base_url('master/Asuransi') ?>" class="info-box bg-info shadow" style="text-decoration: none; color: inherit;">
        <span class="info-box-icon"><i class="fa fa-building-o"></i></span>

        <div class="info-box-content">
          <span class="info-box-text text-right"><h5>Asuransi</h5></span>
          <span class="info-box-number text-right"><h5><?= $jml_asuransi ?></h5></span>
        </div>
        <!-- /.info-box-content -->
      </a>
      <!-- /.info-box -->
    </div>

    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">

      <a href="<?= base_url('master/Cabang_asuransi') ?>" class="info-box bg-danger mb-3 shadow" style="text-decoration: none; color: inherit;">
        <span class="info-box-icon"><i class="fa fa-dot-circle-o"></i></span>

        <div class="info-box-content">
          <span class="info-box-text text-right"><h5>Cabang Asuransi</h5></span>
          <span class="info-box-number text-right"><h5><?= $jml_cb_asuransi ?></h5></span>
        </div>
        <!-- /.info-box-content -->
      </a>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">

      <a href="<?= base_url('master/Bank') ?>" class="info-box bg-success mb-3 shadow" style="text-decoration: none; color: inherit;">
        <span class="info-box-icon"><i class="fa fa-university"></i></span>

        <div class="info-box-content">
          <span class="info-box-text text-right"><h5>Bank</h5></span>
          <span class="info-box-number text-right"><h5><?= $jml_bank ?></h5></span>
        </div>
        <!-- /.info-box-content -->
      </a>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">

      <a href="<?= base_url('master/Cabang_bank') ?>" class="info-box bg-warning mb-3 shadow" style="text-decoration: none; color: inherit;">
        <span class="info-box-icon"><i class="fa fa-tasks"></i></span>

        <div class="info-box-content">
          <span class="info-box-text text-right"><h5>Cabang Bank</h5></span>
          <span class="info-box-number text-right"><h5><?= $jml_cb_bank ?></h5></span>
        </div>
        <!-- /.info-box-content -->
      </a>

      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <div class="row mt-3 mb-3">
    <div class="col-md-5">
      <hr style="border: 1.2px solid black; margin-top: 25px;">
    </div>
    <div class="col-md-2 text-center">
      <b><span class="mt-1">Produk Utama</span></b><br>
      <b><h4 class="mt-2">BANK GARANSI</h4></b>
    </div>
    <div class="col-md-5">
      <hr style="border: 1.2px solid black; margin-top: 25px;">
    </div>
  </div>

    <!-- filter -->
      <div class="row">
        <div class="col-md-12">
          <div class="card shadow">
            <div class="card-body">
              <div class="form-group">
                  <div class="row">
                      <div class="col-md-2 offset-md-2 text-center">
                          <span class="font-weight-bold">Periode</span>
                      </div>
                      <div class="col-md-5">
                          <div class="input-daterange input-group">
                              <input type="text" class="form-control datepicker2 text-center" name="start" id="start" placeholder="Awal Periode" readonly required>
                              <div class="input-group-append">
                                  <span class="input-group-text bg-primary b-0 text-white">s / d</span>
                              </div>
                              <input type="text" class="form-control datepicker2 text-center" name="end" id="end" placeholder="Akhir Periode" readonly required>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
              <button class="btn btn-sm btn-success mr-2" id="tampilkan" type="button"><i class="fa fa-filter mr-2"></i>Tampilkan</button>
              <button class="btn btn-sm btn-dark" id="reset" type="button"><i class="fa fa-refresh mr-2"></i>Reset</button>
            </div>
          </div>
        </div>
      </div>
    <!-- Akhir Filter -->

  <div class="dashboard">
    <!-- jenis status permohonan -->
      <!-- Info boxes -->
      <div class="row mt-3">
        <div class="col-12 col-sm-6 col-md-4">

          <div class="info-box shadow">
            <span class="info-box-icon bg-info elevation-1"><i class="fa fa-wpforms"></i></span>
            <div class="info-box-content">
              <span class="info-box-text text-right"><h5>Permohonan Jaminan</h5></span>
              <span class="info-box-number text-right">
              <h2><?= $jml_permohonan_jaminan ?></h2>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-12 col-sm-6 col-md-4">

          <div class="info-box mb-3 shadow">
            <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-credit-card"></i></span>
            <div class="info-box-content">
              <span class="info-box-text text-right"><h5>Pengantar Asuransi</h5></span>
              <span class="info-box-number text-right">
              <h2><?= $jml_pengantar_asuransi ?></h2>
              </span>
            </div>
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-4">

          <div class="info-box mb-3 shadow">
            <span class="info-box-icon bg-success elevation-1"><i class="fa fa-handshake-o "></i></span>
            <div class="info-box-content">
              <span class="info-box-text text-right"><h5>Persetujuan Asuransi</h5></span>
              <span class="info-box-number text-right">
              <h2><?= $jml_persetujuan_asuransi ?></h2>
              </span>
            </div>
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-12 col-sm-6 col-md-4">

          <div class="info-box mb-3 shadow">
            <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-paper-plane"></i></span>
            <div class="info-box-content">
              <span class="info-box-text text-right"><h5>Pengantar Bank</h5></span>
              <span class="info-box-number text-right">
              <h2><?= $jml_pengantar_bank ?></h2>
              </span>
            </div>
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-4">

          <div class="info-box mb-3 shadow">
            <span class="info-box-icon bg-success elevation-1"><i class="fa fa-university"></i></span>
            <div class="info-box-content">
              <span class="info-box-text text-right"><h5>Bank Garansi</h5></span>
              <span class="info-box-number text-right">
              <h2><?= $jml_bank_garansi ?></h2>
              </span>
            </div>
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-12 col-sm-6 col-md-4">

          <div class="info-box mb-3 shadow">
            <span class="info-box-icon bg-dark elevation-1"><i class="fa fa-files-o"></i></span>
            <div class="info-box-content">
              <span class="info-box-text text-right"><h5>Bukti Bayar Premi</h5></span>
              <span class="info-box-number text-right">
              <h2><?= $jml_bukti_byr_premi ?></h2>
              </span>
            </div>
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-12 col-sm-6 col-md-4">

          <div class="info-box mb-3 shadow" style="text-decoration: none; color: inherit;">
            <span class="info-box-icon bg-primary elevation-1"><i class="fa fa-money"></i></span>
            <div class="info-box-content">
              <span class="info-box-text text-right"><h5>Penagihan Komisi</h5></span>
              <span class="info-box-number text-right">
              <h2><?= $jml_penagihan_komisi ?></h2>
              </span>
            </div>
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-12 col-sm-6 col-md-4">
          <hr style="border: 1.2px solid black; margin-top: 50px;">
        </div>
        <!-- /.col -->

        <div class="col-12 col-sm-6 col-md-4">

          <div class="info-box mb-3 shadow">
            <span class="info-box-icon bg-primary elevation-1"><i class="fa fa-flag-checkered "></i></span>
            <div class="info-box-content">
              <span class="info-box-text text-right"><h5>Selesai</h5></span>
              <span class="info-box-number text-right">
              <h2><?= $jml_selesai ?></h2>
              </span>
            </div>
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- grafik status permohonan -->
        <div class="col-md-12 mt-2">
            <div class="card shadow">
                <div class="card-header bg-success">
                    <h3 class="card-title mb-0">Rekap Alur Bank Garansi</h3>
                </div>

                <div class="card-body table-responsive">
                    <canvas id="myChart_rekap_alur_bg" width="40" height="10"></canvas>
                </div>

            </div>
        </div>

        <!-- grafik rekap akumulasi -->
        <div class="col-md-12 mt-2">
            <div class="card shadow">
                <div class="card-header bg-success">
                    <h3 class="card-title mb-0">Rekap Akumulasi Nilai Kontak, Nilai Jaminan, dan Nilai Komisi</h3>
                </div>

                <div class="card-body table-responsive">
                    <canvas id="myChart_rekap_akumulasi_nilai" width="40" height="15"></canvas>
                </div>

            </div>
        </div>
        
      </div>
      <!-- /.row -->
    <!-- Akhir jenis status permohonan -->
  </div>

  <div class="dashboard_filter" style="display: none;">

  </div>

</div><!-- /.container-fluid -->

<?php 

  foreach ($alur_bg as $a) {
    $nama_status[]  = ucwords(strtolower($a->status_permohonan));
    $jml_status[]   = $a->jml_rekap_alur;
  }

  // lima bulan terakhir 
  foreach ($lima_bulan as $b) {
    $bulan[]  = $b->bulan;
  }

  // nilai kontrak
  foreach ($nilai_kontrak as $b) {
    $nilai_kontrak2[] = $b->jml_nilai_kontrak;
  }

  // nilai jaminan
  foreach ($nilai_jaminan as $b) {
    $nilai_jaminan2[] = $b->jml_nilai_jaminan;
  }

  // nilai komisi
  foreach ($nilai_komisi as $b) {
    $nilai_komisi2[] = $b->jml_nilai_komisi;
  }

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script> 

<script>

  $(document).ready(function () {
    
    // reset data
    $('#reset').on('click', function () {
      $("#start").datepicker("setDate", '');
      $("#end").datepicker("setDate", '');

      $('.dashboard').slideDown(300);
      $('.dashboard_filter').slideUp(300);
    })

    // tampilkan data
    $('#tampilkan').on('click', function () {
    
      var tgl_awal    = $('#start').val();
      var tgl_akhir   = $('#end').val();

      console.log(tgl_awal);

      if (tgl_awal == '') {
        swal({
            title               : "Peringatan",
            text                : 'Tanggal Awal Harus Terisi',
            buttonsStyling      : false,
            confirmButtonClass  : "btn btn-warning",
            type                : 'warning',
            showConfirmButton   : false,
            timer               : 1000
        });
      } else if (tgl_akhir == '') {
        swal({
              title               : "Peringatan",
              text                : 'Tanggal Akhir Harus Terisi',
              buttonsStyling      : false,
              confirmButtonClass  : "btn btn-warning",
              type                : 'warning',
              showConfirmButton   : false,
              timer               : 1000
          });
      } else {

        $.ajax({
            url     : "Dashboard/menampilkan_filter_dashboard",
            type    : "POST",
            beforeSend  : function () {
                swal({
                    title   : 'Menunggu',
                    html    : 'Memproses data',
                    onOpen  : () => {
                        swal.showLoading();
                    }
                })
            },
            data    : {tgl_awal:tgl_awal, tgl_akhir:tgl_akhir},
            success : function (data) { 

                swal.close();

                $('.dashboard').slideUp(300);
                $('.dashboard_filter').slideDown(300);
                $('.dashboard_filter').html(data);

            }
        })

        return false;
      }
    })

  })

</script>

<script>
  var rekap_alur_bg         = document.getElementById('myChart_rekap_alur_bg').getContext('2d');
  var rekap_akumulasi_nilai = document.getElementById('myChart_rekap_akumulasi_nilai').getContext('2d');

  // diagram rekap alur bank garansi
  var myChart_rekap_alur_bg = new Chart(rekap_alur_bg, {
      type: 'line',
      data: {
          labels: <?= json_encode($nama_status) ?>,
          datasets: [{
              label: 'Total',
              data: <?= json_encode($jml_status) ?>,
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'

              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                    beginAtZero: true,
                    userCallback: function(label, index, labels) {
                        // when the floored value is the same as the value we have a whole number
                        if (Math.floor(label) === label) {
                            return label;
                        }
                    } 
                  }
              }],
              xAxes: [{
                  ticks: {
                      callback: function(label) {
                          if (/\s/.test(label)) {
                              return label.split(" ");
                          }else{
                              return label;
                          }              
                      }
                  }
              }]
          },
          legend: {
              display: false
          }
      }
  });

  // diagram rekap akumuliasi nilai kontrak
  var myChart_rekap_akumulasi_nilai = new Chart(rekap_akumulasi_nilai, {
    type: 'bar',
    data: {
        labels: <?= json_encode($bulan) ?>,
        datasets: [{
            label: 'Nilai Kontrak',
            data: <?= json_encode($nilai_kontrak2) ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        }, {
            label: 'Nilai Jaminan',
            data: <?= json_encode($nilai_jaminan2) ?>,
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)'
                
            ],
            borderColor: [
            'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
        }, {
            label: 'Nilai Komisi',
            data: <?= json_encode($nilai_komisi2) ?>,
            backgroundColor: [
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 206, 86, 0.2)'
                
            ],
            borderColor: [
                'rgba(255, 206, 86, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    userCallback: function(label, index, labels) {
                      // when the floored value is the same as the value we have a whole number
                      if (Math.floor(label) === label) {

                          // Convert the number to a string and splite the string every 3 charaters from the end
                          label = label.toString();
                          label = label.split(/(?=(?:...)*$)/);

                          // Convert the array to a string and format the output
                          label = label.join('.');
                          return label;
                      }
                    }
                }
            }],
            xAxes: [{
                ticks: {
                    callback: function(label) {
                        if (/\s/.test(label)) {
                            return label.split(" ");
                        }else{
                            return label;
                        }              
                    }
                }
            }]
        },
        tooltips: {
          callbacks: {
              label: function(tooltipItem, data) {
                  return "Rp. " + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                      return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "." + c : c;
                  });
              }
          }
      }
    }
  });

</script>

