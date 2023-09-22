<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>User</h1>
        </div>

        <div class="section-body">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url('user/tambah') ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Email</th>
                                            <th>No.Hp</th>
                                            <th>Gambar</th>
                                            <th>Level</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($user as $us) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $us->username ?></td>
                                                <td><?= $us->password ?></td>
                                                <td><?= $us->nama ?></td>
                                                <td><?= $us->alamat ?></td>
                                                <td><?= $us->email ?></td>
                                                <td><?= $us->no_hp ?></td>
                                                <td><img src="<?= base_url('assets/images/' . $us->gambar_profil) ?>" width="100" height="50"></td>
                                                <td><?= $us->level ?></td>
                                                <td>
                                                    <?= anchor('user/edit/' . $us->username, '<div class="btn btn-success btn-sm"><i class="fa fa-edit"></i></div>') ?>
                                                    <a onclick="return  confirm('Apakah Anda Yakin Ingin Hapus Data?')" <?= anchor('user/hapus/' . $us->username, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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