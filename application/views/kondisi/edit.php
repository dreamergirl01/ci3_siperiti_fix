<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Edit Kondisi Barang</h1>
    </div>

    <div class="section-body">
      <form action="<?= base_url() . 'kondisi/editData' ?>" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
              <div class="card-header">
                <h4>Kondisi Barang</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Kondisi Barang</label>
                  <input type="hidden" name="kd_kondisi" class="form-control" value="<?= $kondisi->kd_kondisi ?>">
                  <input type="text" class="form-control" name="kondisi" value="<?= $kondisi->kondisi ?>">
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary mr-1" type="submit">Submit</button>
                  <a href="<?= base_url('kondisi') ?>" class="btn btn-dark">Kembali</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
</div>