                  <!-- Chart JS -->
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

                  <!-- Main Content -->
                  <div class="main-content">
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                    <section class="section">
                      <div class="section-header">
                        <h1>Dashboard</h1>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                          <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                              <i class="far fa-user"></i>
                            </div>

                            <div class="card-wrap">
                              <a href="<?= base_url('barangMasuk/index') ?>"></a>
                              <div class="card-header">
                                <h4> Total Barang Masuk</h4>
                              </div>
                              <div class="card-body">
                                <?= $barangMasuk->totalBarangMasuk ?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                          <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                              <i class="far fa-newspaper"></i>
                            </div>
                            <div class="card-wrap">
                              <div class="card-header">
                                <h4>Total Barang Keluar</h4>
                              </div>
                              <div class="card-body">
                                <?= $barangKeluar->totalBarangKeluar ?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                          <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                              <i class="far fa-file"></i>
                            </div>
                            <div class="card-wrap">
                              <div class="card-header">
                                <h4>Total Transaksi</h4>
                              </div>
                              <div class="card-body">
                                <?= $transaksi->totalTransaksi ?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                          <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                              <i class="fas fa-circle"></i>
                            </div>
                            <div class="card-wrap">
                              <div class="card-header">
                                <h4>Total User</h4>
                              </div>
                              <div class="card-body">
                                <?= $user->totalUser ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                          <div class="card">
                            <div class="card-header">
                              <h4>Statistics</h4>
                              <div class="card-header-action">
                                <div class="btn-group">
                                  <a href="#" class="btn btn-primary">Week</a>
                                  <a href="#" class="btn">Month</a>
                                </div>
                              </div>
                            </div>
                            <div class="card-header">
                              <h3>Grafik Barang Masuk Tahun : <?= $thn ?></h3>
                            </div>
                            <div class="card-body">
                              <canvas id="myChart2" height="182"></canvas>

                              <script>
                                const ctx = document.getElementById('myChart2').getContext('2d');
                                const myChart2 = new Chart(ctx, {
                                  type: 'bar',
                                  data: {
                                    labels: <?= json_encode($bulan) ?>,
                                    datasets: [{
                                      label: '#barang',
                                      data: <?= json_encode($barang_masuk) ?>,
                                      backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(255, 159, 64, 0.2)',
                                        'rgba(255, 99, 132, 0.2)',
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
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)',
                                      ],
                                      borderWidth: 4
                                    }]
                                  },
                                  options: {
                                    scales: {
                                      y: {
                                        beginAtZero: true
                                      }
                                    }
                                  }
                                });
                              </script>

                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>

                  <?php
                  if ($this->session->flashdata('success')) : ?>
                    <script>
                      Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: '<?= $this->session->flashdata("success") ?>',
                        showConfirmButton: false,
                        timer: 1500
                      })
                    </script>
                  <?php elseif ($this->session->flashdata('error')) : ?>
                    <script>
                      Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: '<?= $this->session->flashdata("error") ?>',
                        showConfirmButton: false,
                        timer: 1500
                      })
                    </script>
                  <?php endif; ?>