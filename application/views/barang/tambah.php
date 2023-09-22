      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Form Tambah Data Barang</h1>
              </div>

              <div class="section-body">

                  <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
                          <div class="card">
                              <div class="card-header">
                                  <h4>Data Barang</h4>
                              </div>
                              <div class="card-body">
                                  <form action="<?= base_url() . 'barang/tambahData' ?>" method="post" enctype="multipart/form-data">
                                      <div class="form-group">
                                          <!-- <div class="form-group">
                                              <label>Kode Barang</label>
                                              <input type="text" class="form-control"  required>
                                          </div> -->
                                          <label>Nama Jenis</label>
                                          <select class="form-control" name="kd_jenis" data-live-search="true" required>
                                              <option value="">Pilih Nama Jenis</option>
                                              <?php foreach ($jenis_barang as $jb) : ?>
                                                  <option value="<?= $jb->kd_jenis   ?>"><?= $jb->nama_jenis ?></option>
                                              <?php endforeach ?>
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label>Nama Barang</label>
                                          <input type="text" class="form-control" name="nama_barang" required>
                                      </div>
                                      <div class="form-group">
                                          <label>Gambar Barang</label>
                                          <input type="file" class="form-control" name="gambar" required>
                                      </div>
                                      <div class="form-group">
                                          <label>Satuan</label>
                                          <input type="text" class="form-control" name="satuan" required>
                                      </div>
                                      <div class="card-footer text-right">
                                          <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                          <a href="<?= base_url('barang') ?>" class="btn btn-dark">Kembali</a>
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