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
                    <canvas id="myChart_rekap_alur_bg2" width="40" height="10"></canvas>
                </div>

            </div>
        </div>

        <!-- grafik rekap akumulasi -->
        <div class="col-md-12 mt-2">
            <div class="card shadow">
                <div class="card-header bg-success">
                    <h3 class="card-title mb-0">Rekap Akumulasi Nilai Kontak, Nilai Jaminan, dan Kontrak</h3>
                </div>

                <div class="card-body table-responsive">
                    <canvas id="myChart_rekap_akumulasi_nilai2" width="40" height="15"></canvas>
                </div>

            </div>
        </div>
        
      </div>
      <!-- /.row -->
    <!-- Akhir jenis status permohonan -->

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
  var rekap_alur_bg         = document.getElementById('myChart_rekap_alur_bg2').getContext('2d');
  var rekap_akumulasi_nilai = document.getElementById('myChart_rekap_akumulasi_nilai2').getContext('2d');

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