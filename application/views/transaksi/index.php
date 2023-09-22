<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Transaksi</h1>
        </div>

        <div class="section-body">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <?php if ($_SESSION['level'] == 'admin') : ?>
                            <div class="card-header">
                                <a href="<?= base_url('transaksi/tambah') ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Data</a>
                            </div>
                            <form action="<?= base_url('transaksi/index') ?>" method="post" id="myForm" class="ml-5">
                                <td>Tanggal awal</td>
                                <td><input type="date" name="dari" id="" required></td>
                                <td>Tanggal akhir</td>
                                <td><input type="date" name="sampai" id="" required></td> <br><br>
                                <td>
                                    <button type="submit" name="filter" class="btn btn-success">Filter</button>
                                    <button type="submit" onclick="cetak()" class="btn btn-danger"><i class="fa fa-print"></i>Print</button>
                                </td>
                            </form> <br>
                        <?php endif; ?>
                        <script>
                            function cetak() {
                                $('#myForm').attr('action', '<?= base_url('transaksi/print') ?>');
                                $('#myForm').attr('target', '_blank');
                                $('#myForm').submit();

                            }
                        </script>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kd Transaksi</th>
                                            <th>Nama</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Pinjam</th>
                                            <th>Status</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <?php if ($_SESSION['level'] == 'admin') : ?>
                                                <th>Aksi</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($transaksi as $ts) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $ts->kd_transaksi ?></td>
                                                <td><?= $ts->nama ?></td>
                                                <td><?= $ts->nama_barang ?></td>
                                                <td><?= $ts->jumlah_pinjam ?></td>
                                                <td><?= $ts->status ?></td>
                                                <td><?= $ts->tanggal_pinjam ?></td>
                                                <td><?= $ts->tanggal_kembali ?></td>
                                                <td>
                                                    <?php if ($_SESSION['level'] == 'admin') : ?>
                                                        <?php if ($ts->status == 'Dipinjam') : ?>
                                                            <a onclick="return  confirm('Apakah Anda Yakin Ingin Mengembalikan Barang Ini?')" <?= anchor('transaksi/edit/' . $ts->kd_transaksi, '<div class="btn btn-success btn-sm"><i class="fa fa-edit"></i></div>') ?></a>
                                                            <?php endif; ?>

                                                            <a onclick="return  confirm('Apakah Anda Yakin Ingin Hapus Data?')" <?= anchor('transaksi/hapus/' . $ts->kd_transaksi, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></a>
                                                            <?php endif; ?>
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