      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Form Tambah Barang Masuk</h1>
              </div>

              <div class="section-body">

                  <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
                          <div class="card">
                              <div class="card-header">
                                  <h4>Data Barang Masuk</h4>
                              </div>
                              <div class="card-body">
                                  <form action="<?= base_url() . 'barangMasuk/tambahData' ?>" method="post" enctype="multipart/form-data">
                                      <div class="form-group">
                                          <label>Nama Barang</label>
                                          <select class="form-control" name="kd_barang" data-live-search="true" required>
                                              <option value="">Pilih Nama Barang</option>
                                              <?php foreach ($barang as $br) : ?>
                                                  <option value="<?= $br->kd_barang ?>"><?= $br->nama_barang ?></option>
                                              <?php endforeach ?>
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label>Tanggal Masuk</label>
                                          <input type="date" class="form-control" name="tanggal_masuk" required>
                                      </div>
                                      <div class="form-group">
                                          <label>Jumlah</label>
                                          <input type="number" class="form-control" name="jumlah_masuk" required>
                                      </div>
                                      <div class="card-footer text-right">
                                          <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                          <a href="<?= base_url('barangMasuk') ?>" class="btn btn-dark">Kembali</a>
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