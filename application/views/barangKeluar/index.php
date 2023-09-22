<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Barang Keluar</h1>
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
                                                <th>Kode Keluar</th>
                                                <th>Nama Barang</th>
                                                <th>Keterangan</th>
                                                <th>Tanggal Keluar</th>
                                                <th>Jumlah Keluar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($barangKeluar as $bk) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $bk->kd_keluar ?></td>
                                                    <td><?= $bk->nama_barang ?></td>
                                                    <td><?= $bk->keterangan ?></td>
                                                    <td><?= $bk->tanggal_keluar ?></td>
                                                    <td><?= $bk->jumlah_keluar ?></td>
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
                                <a href="<?= base_url('barangKeluar/tambah') ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Keluar</th>
                                                <th>Nama Barang</th>
                                                <th>Keterangan</th>
                                                <th>Tanggal Keluar</th>
                                                <th>Jumlah Keluar</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($barangKeluar as $bk) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $bk->kd_keluar ?></td>
                                                    <td><?= $bk->nama_barang ?></td>
                                                    <td><?= $bk->keterangan ?></td>
                                                    <td><?= $bk->tanggal_keluar ?></td>
                                                    <td><?= $bk->jumlah_keluar ?></td>
                                                    <td>
                                                        <?= anchor('barangKeluar/edit/' . $bk->kd_keluar, '<div class="btn btn-success btn-sm"><i class="fa fa-edit"></i></div>') ?>
                                                        <a onclick="return  confirm('Apakah Anda Yakin Ingin Hapus Data?')" <?= anchor('barangKeluar/hapus/' . $bk->kd_keluar, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></a>
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