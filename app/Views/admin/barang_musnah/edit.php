<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('musnah/update/' . $barangMusnah['id_barang_musnah']) ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-group row">
                        <label for="id_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <select name="id_barang" id="id_barang" class="form-control">
                                <option value="">Pilih Barang</option>
                                <?php foreach ($barang as $data) : ?>
                                    <!-- if value is not empty -->
                                    <?php if ($data['id_barang'] == $barangMusnah['id_barang']) : ?>
                                        <option value="<?= $data['id_barang'] ?>" selected><?= $data['nm_barang'] ?></option>
                                    <?php else : ?>
                                        <option value="<?= $data['id_barang'] ?>"><?= $data['nm_barang'] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('id_barang'); ?>
                            </div>
                        </div>
                    </div>

                    <!-- jumlah -->
                    <div class="form-group row">
                        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" id="jumlah" name="jumlah" value="<?= $barangMusnah['jumlah']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('jumlah'); ?>
                            </div>
                        </div>
                    </div>

                    <!-- kode barang -->
                    <div class="form-group row">
                        <label for="kode_barang" class="col-sm-2 col-form-label">Kode Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('kode_barang')) ? 'is-invalid' : ''; ?>" id="kode_barang" name="kode_barang" value="<?= $barangMusnah['kode_barang']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('kode_barang'); ?>
                            </div>
                        </div>
                    </div>

                    <!-- keterangan -->
                    <div class="form-group row">
                        <label for="keterangan" class="col-sm-2 col-form-label">keterangan Barang</label>
                        <div class="col-sm-10">
                            <select class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan">
                                <option value="">-- Pilih keterangan --</option>
                                
                                <option value="2" <?= ($barangMusnah['keterangan'] == 2) ? 'selected' : ''; ?>>Dijual</option>
                                <option value="1" <?= ($barangMusnah['keterangan'] == 1) ? 'selected' : ''; ?>>Barang Rusak</option>
                                <option value="0" <?= ($barangMusnah['keterangan'] == 0) ? 'selected' : ''; ?>>Tidak Layak Pakai</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('keterangan'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="float-right">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>