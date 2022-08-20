<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('item/update/' . $barang['id_barang']) ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-group row">
                        <label for="nm_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('nm_barang')) ? 'is-invalid' : ''; ?>" id="nm_barang" name="nm_barang" value="<?= (old('nm_barang')) ? old('nm_barang') : $barang['nm_barang'] ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nm_barang'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('satuan')) ? 'is-invalid' : ''; ?>" id="satuan" name="satuan" value="<?= (old('satuan')) ? old('satuan') : $barang['satuan'] ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('satuan'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="spek" class="col-sm-2 col-form-label">Spesifikasi</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" id="spek" name="spek"><?= (old('spek')) ? old('spek') : $barang['spek'] ?></textarea>
                        </div>
                    </div>
                    <!-- Status Barang -->
                    <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select class="form-control <?= ($validation->hasError('status')) ? 'is-invalid' : ''; ?>" id="status" name="status">
                                <option value="">-- Pilih Status --</option>
                                <option value="1" <?= ($barang['status'] == 1) ? 'selected' : '' ?>>Barang Habis Pakai</option>
                                <option value="0" <?= ($barang['status'] == 0) ? 'selected' : '' ?>>Tidak Habis Pakai</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('status'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="float-right">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>