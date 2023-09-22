<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Barang</h1>
        </div>

        <div class="section-body">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <?php if ($_SESSION['level'] == 'super admin') { ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Jenis</th>
                                                <th>Nama Barang</th>
                                                <th>Gambar Barang</th>
                                                <th>Satuan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($barang as $br) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $br->nama_jenis ?></td>
                                                    <td><?= $br->nama_barang ?></td>
                                                    <td>
                                                        <img alt="image" src="<?= base_url('assets/images/' . $br->gambar) ?>" width="200" height="100">
                                                    </td>
                                                    <td><?= $br->satuan ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } elseif ($_SESSION['level'] == 'admin') { ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="<?= base_url('barang/tambah') ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Jenis</th>
                                                <th>Nama Barang</th>
                                                <th>Gambar Barang</th>
                                                <th>Satuan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($barang as $br) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $br->kd_barang ?></td>
                                                    <td><?= $br->nama_jenis ?></td>
                                                    <td><?= $br->nama_barang ?></td>
                                                    <td>
                                                        <img alt="image" src="<?= base_url('assets/images/' . $br->gambar) ?>" width="200" height="100">
                                                    </td>
                                                    <td><?= $br->satuan ?></td>
                                                    <td>
                                                        <?= anchor('barang/edit/' . $br->kd_barang, '<div class="btn btn-success btn-sm"><i class="fa fa-edit"></i></div>') ?>
                                                        <a onclick="return  confirm('Apakah Anda Yakin Ingin Hapus Data?')" <?= anchor('barang/hapus/' . $br->kd_barang, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></a>
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
            <?php } else { ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Jenis</th>
                                                <th>Nama Barang</th>
                                                <th>Gambar Barang</th>
                                                <th>Satuan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($barang as $br) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $br->nama_jenis ?></td>
                                                    <td><?= $br->nama_barang ?></td>
                                                    <td>
                                                        <img alt="image" src="<?= base_url('assets/images/' . $br->gambar) ?>" width="200" height="100">
                                                    </td>
                                                    <td><?= $br->satuan ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
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