<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Laporan Transaksi</h1>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" border="2">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Nama</th>
                                                <th>Jumlah</th>
                                                <th>Status</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Tanggal Kembali</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($transaksi as $ts) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $ts->nama_barang ?></td>
                                                    <td><?= $ts->nama ?></td>
                                                    <td><?= $ts->jumlah_pinjam ?></td>
                                                    <td><?= $ts->status ?></td>
                                                    <td><?= $ts->tanggal_pinjam ?></td>
                                                    <td><?= $ts->tanggal_kembali ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                    <script type="text/javascript">
                                        window.print();
                                    </script>
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