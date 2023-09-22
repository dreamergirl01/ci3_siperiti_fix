<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Stok Barang</h1>
        </div>

        <div class="section-body">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <?php if ($_SESSION['level'] == 'admin') { ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class=" card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>nama Barang</th>
                                                    <th>Jumlah Stok</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($stokBarang as $sb) : ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $sb->nama_barang ?></td>
                                                        <td><?= $sb->stok ?></td>
                                                        <td>
                                                            <a onclick="return  confirm('Apakah Anda Yakin Ingin Hapus Data?')" <?= anchor('stokBarang/hapus/' . $sb->kd_barang, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></a>
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
                                <div class="card-header">
                                    <div class=" card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table-1">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>nama Barang</th>
                                                        <th>Jumlah Stok</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1;
                                                    foreach ($stokBarang as $sb) : ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $sb->nama_barang ?></td>
                                                            <td><?= $sb->stok ?></td>
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