<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Barang</h1>
        </div>

        <div class="section-body">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url('detail/tambah') ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Detail</th>
                                            <th>Nama Barang</th>
                                            <th>Kondisi Barang</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal Pemeriksaan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($detail as $dt) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $dt->kd_detail ?></td>
                                                <td><?= $dt->nama_barang ?></td>
                                                <td><?= $dt->kondisi ?></td>
                                                <td><?= $dt->jumlah_barang ?></td>
                                                <td><?= $dt->tanggal_pemeriksaan ?></td>
                                                <td>
                                                    <a onclick="return  confirm('Apakah Anda Yakin Ingin Hapus Data?')" <?= anchor('detail/hapus/' . $dt->kd_detail, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></a>
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