<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Barang Masuk</h1>
        </div>

        <div class="section-body">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <?php if($_SESSION['level'] == 'super admin') { ?>
                <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Barang Masuk</th>
                                            <th>Nama Barang</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Jumlah Barang Masuk</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($barangMasuk as $bm) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $bm->kd_masuk ?></td>
                                                <td><?= $bm->nama_barang ?></td>
                                                <td><?= $bm->tanggal_masuk ?></td>
                                                <td><?= $bm->jumlah_masuk?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }elseif($_SESSION['level'] == 'admin') { ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url('barangMasuk/tambah') ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Barang Masuk</th>
                                            <th>Nama Barang</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Jumlah Barang Masuk</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($barangMasuk as $bm) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $bm->kd_masuk ?></td>
                                                <td><?= $bm->nama_barang ?></td>
                                                <td><?= $bm->tanggal_masuk ?></td>
                                                <td><?= $bm->jumlah_masuk?></td>
                                                <td>
                                                    <?= anchor('barangMasuk/edit/' . $bm->kd_masuk, '<div class="btn btn-success btn-sm"><i class="fa fa-edit"></i></div>') ?>
                                                    <a onclick="return  confirm('Apakah Anda Yakin Ingin Hapus Data?')" <?= anchor('barangMasuk/hapus/' . $bm->kd_masuk, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></a>
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