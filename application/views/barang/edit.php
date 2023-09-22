<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Edit Data Barang</h1>
        </div>

        <div class="section-body">
            <form action="<?= base_url() . 'barang/editData' ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Barang</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kode Jenis</label>
                                    <input type="hidden" name="kd_barang" class="form-control" value="<?= $barang->kd_barang ?>">
                                    <select class="form-control" name="kd_jenis" data-live-search="true" required>
                                        <option value="">Pilih Kode Jenis</option>
                                        <?php foreach ($jenis_barang as $jb) : ?>
                                            <option value="<?= $jb->kd_jenis ?>" <?= $jb->kd_jenis == $barang->kd_jenis ? 'selected' : '' ?>>
                                                <?= $jb->nama_jenis ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" value="<?= $barang->nama_barang ?>">
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <img src="<?= base_url('assets/images/' . $barang->gambar) ?>" alt="" width="200" height="100">
                                <input type="file" class="form-control" name="gambar">
                                <input type="hidden" class="form-control" name="gambarLama" value="<?= $barang->gambar ?>">
                            </div>
                            <div class="form-group">
                                <label>Satuan</label>
                                <input type="text" class="form-control" name="satuan" value="<?= $barang->satuan ?>">
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                <a href="<?= base_url('barang') ?>" class="btn btn-dark">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>