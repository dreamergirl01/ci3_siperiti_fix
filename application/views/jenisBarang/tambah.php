      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Form Tambah Data Jenis</h1>
              </div>

              <div class="section-body">

                  <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
                          <div class="card">
                              <div class="card-header">
                                  <h4>Jenis Barang</h4>
                              </div>
                              <div class="card-body">
                                  <form action="<?= base_url() . 'jenisBarang/tambah_data' ?>" method="post" enctype="multipart/form-data">
                                      <div class="form-group">
                                          <label>Nama Jenis</label>
                                          <input type="text" class="form-control" name="nama_jenis" required>
                                      </div>
                                      <div class="card-footer text-right">
                                          <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                          <a href="<?= base_url('jenisBarang') ?>" class="btn btn-dark">Kembali</a>
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