      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Profile</h1>
          </div>
          <div class="section-body">
            <h2 class="section-title">Hi, <?= $_SESSION['nama'] ?> </h2>
            <p class="section-lead">
              Ubah Informasi Kamu dihalaman ini!
            </p>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                  <form method="post" action="<?= base_url() . 'profil/update' ?>" class="needs-validation" novalidate="" enctype="multipart/form-data">
                    <div class="card-header">
                      <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="form-group col-md-7 col-12">
                          <label>Nama</label>
                          <input type="hidden" name="username" class="form-control" value="<?= $user->username ?>">
                          <input type="text" class="form-control" name="nama" value="<?= $user->nama ?>" required="">
                          <div class="invalid-feedback">
                            Please fill in the email
                          </div>
                        </div>
                        <div class="form-group col-md-5 col-12">
                          <label>Alamat</label>
                          <input type="text" class="form-control" name="alamat" value="<?= $user->alamat ?>">
                        </div>
                        <div class="form-group col-md-5 col-12">
                          <label>Email</label>
                          <input type="email" class="form-control" name="email" value="<?= $user->email ?>">
                        </div>
                        <div class="form-group col-md-5 col-12">
                          <label>No.hp</label>
                          <input type="tel" class="form-control" name="no_hp" value="<?= $user->no_hp ?>">
                        </div>
                        <div class="form-group col-md-5 col-12">
                          <label>Gambar</label>
                          <img src="<?= base_url('assets/images/' . $user->gambar_profil) ?>" alt="" width="200" height="100">
                          <input type="file" class="form-control" name="gambar_profil">
                          <input type="hidden" class="form-control" name="gambarLama" value="<?= $user->gambar_profil ?>">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-12 col-12">
                          <label>Ganti Password</label>
                          <input type="text" class="form-control" name="password">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group mb-0 col-12">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="remember" class="custom-control-input" id="newsletter">
                            <label class="custom-control-label" for="newsletter">Subscribe to newsletter</label>
                            <div class="text-muted form-text">
                              You will get new information about products, offers and promotions
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>