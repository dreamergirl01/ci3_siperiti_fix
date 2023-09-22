      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Form Transaksi</h1>
              </div>

              <div class="section-body">

                  <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
                          <div class="card">
                              <div class="card-header">
                                  <h4>Transaksi</h4>
                              </div>
                              <div class="card-body">
                                  <form action="<?= base_url() . 'transaksi/tambahData' ?>" method="post" enctype="multipart/form-data">
                                      <div class="form-group">
                                          <label>Nama Barang</label>
                                          <select name="kd_barang" id="" class="form-control" data-live-search="true" required>
                                              <option value="">Pilih Nama Barang</option>
                                              <?php foreach ($stokBarang as $sb) : ?>
                                                  <option value="<?= $sb->kd_barang ?>"><?= $sb->nama_barang ?></option>
                                              <?php endforeach ?>
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label>Nama</label>
                                          <select name="username" id="" class="form-control" data-live-search="true" required>
                                              <option value="">Pilih Nama</option>
                                              <?php foreach ($user as $us) : ?>
                                                  <option value="<?= $us->username ?>"><?=  $us->nama ?></option>
                                              <?php endforeach ?>
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label>Jumlah Pinjam</label>
                                          <input type="number" class="form-control" name="jumlah_pinjam" required>
                                      </div>
                                      <div class="form-group">
                                          <label>Tanggal Pinjam</label>
                                          <input type="date" class="form-control" name="tanggal_pinjam" required>
                                      </div>
                                      <div class="card-footer text-right">
                                          <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                          <a href="<?= base_url('transaksi') ?>" class="btn btn-dark">Kembali</a>
                                          <!-- <button class="btn btn-secondary" type="reset">Reset</button> -->
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
      </div>
      </section>
      </div>