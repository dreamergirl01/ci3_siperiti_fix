<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Edit User</h1>
        </div>

        <div class="section-body">
            <form action="<?= base_url() . 'user/editData' ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>User</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="hidden" name="username" class="form-control" value="<?= $user->username ?>">
                                    <input type="text" class="form-control" name="password" value="<?= $user->password ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="nama" value="<?= $user->nama ?>">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" name="alamat" value="<?= $user->alamat ?>">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" value="<?= $user->email ?>">
                                </div>
                                <div class="form-group">
                                    <label>No.Hp</label>
                                    <input type="text" class="form-control" name="no_hp" value="<?= $user->no_hp ?>">
                                </div>
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <img src="<?= base_url('assets/images/' . $user->gambar_profil) ?>" alt="" width="200" height="100">
                                    <input type="file" class="form-control" name="gambar_profil">
                                    <input type="hidden" class="form-control input-default" name="gambar_lama" value="<?= $user->gambar_profil ?>">
                                </div>
                                <div class="form-group">
                                    <label>Level</label>
                                    <select name="level" id="" class="form-control" value="<?= $user->username ?>" <?= $user->username == $user->level ? 'selected' : '' ?>" required>
                                        <option value="admin" <?= $user->level == 'super admin' ? 'selected' : '' ?>>Super Admin</option>
                                        <option value="admin" <?= $user->level == 'admin' ? 'selected' : '' ?>>Admin</option>
                                        <option value="client" <?= $user->level == 'client' ? 'selected' : '' ?>>Client</option>
                                    </select>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                    <a href="<?= base_url('user') ?>" class="btn btn-dark">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>