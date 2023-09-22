      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Form Tambah Data User</h1>
              </div>

              <div class="section-body">

                  <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
                          <div class="card">
                              <div class="card-header">
                                  <h4>User</h4>
                              </div>
                              <div class="card-body">
                                  <form action="<?= base_url() . 'user/tambah_data' ?>" method="post" enctype="multipart/form-data">
                                      <div class="form-group">
                                          <label>Username</label>
                                          <input type="text" class="form-control" name="username" required>
                                      </div>
                                      <div class="form-group">
                                          <label>Password</label>
                                          <input type="text" class="form-control" name="password" required>
                                      </div>
                                      <div class="form-group">
                                          <label>Nama</label>
                                          <input type="text" class="form-control" name="nama" required>
                                      </div>
                                      <div class="form-group">
                                          <label>Alamat</label>
                                          <input type="text" class="form-control" name="alamat" required>
                                      </div>
                                      <div class="form-group">
                                          <label>Email</label>
                                          <input type="email" class="form-control" name="email" required>
                                      </div>
                                      <div class="form-group">
                                          <label>No Hp</label>
                                          <input type="text" class="form-control" name="no_hp" required>
                                      </div>
                                      <div class="form-group">
                                          <label>Gambar</label>
                                          <input type="file" class="form-control" name="gambar_profil" required>
                                      </div>
                                      <div class="form-group">
                                          <label>Level</label>
                                          <!-- <input type="text" class="form-control" name="kondisi" required> -->
                                          <select name="level" id="" class="form-control">
                                            <option value="">Silahkan Pilih Level</option>
                                            <option value="super admin">Super Admin</option>
                                            <option value="admin">Admin</option>
                                            <option value="client">Client</option>
                                          </select>
                                      </div>
                                      <div class="card-footer text-right">
                                          <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                          <a href="<?= base_url('user') ?>" class="btn btn-dark">Kembali</a>
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