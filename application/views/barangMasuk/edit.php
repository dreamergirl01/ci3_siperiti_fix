<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Edit Barang Masuk</h1>
    </div>

    <div class="section-body">
      <form action="<?= base_url() . 'barangMasuk/editData' ?>" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
              <div class="card-header">
                <h4>Data Barang</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="hidden" name="kd_masuk" class="form-control" value="<?= $barangMasuk->kd_masuk ?>">
                  <select class="form-control" name="kd_barang" data-live-search="true" required>
                    <option value="">Pilih Nama Barang</option>
                    <?php foreach ($barang as $br) : ?>
                      <option value="<?= $br->kd_barang ?>" <?= $br->kd_barang == $barangMasuk->kd_barang ? 'selected' : '' ?>>
                        <?= $br->nama_barang ?>
                      </option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Tanggal Masuk</label>
                  <input type="date" class="form-control" name="tanggal_masuk" value="<?= $barangMasuk->tanggal_masuk ?>">
                </div>
                <div class="form-group">
                  <label>Jumlah</label>
                  <input type="number" class="form-control" name="jumlah_masuk" value="<?= $barangMasuk->jumlah_masuk ?>">
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary mr-1" type="submit">Submit</button>
                  <a href="<?= base_url('barangMasuk') ?>" class="btn btn-dark">Kembali</a>
                </div>
              </div>
            </div>
          </div>
      </form>
    </div>
  </section>
</div>