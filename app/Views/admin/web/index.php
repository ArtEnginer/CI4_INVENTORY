<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('admin/layout/fungsi') ?>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <p>
                    <a href="<?= base_url('settings/edit') ?>" class="btn btn-success"><i class="fas fa-pencil-alt"></i> Edit</a>
                </p>
                <!-- show image -->
                <div class="row">
                    <div class="col-md-4">
                        <!-- card header and body -->
                        <div class="card ">
                            <div class="card-body">


                                <img src="<?= base_url('assets/img/upload/' . $web['logo']) ?>" alt="<?= $web['logo'] ?>" class="img-thumbnail">
                            </div>
                            <div class="card-footer">
                                Logo Website
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <h3>Identitas Website</h3>
                        <table class="table table-striped" style="width: 100%">
                            <tr>
                                <th>Nama Website</th>
                                <td><?= $web['nm_web'] ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <!-- atribut css if long text then wrap text -->



                                <td class="text-wrap"><?= $web['alamat'] ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?= $web['email'] ?></td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td><?= $web['telp'] ?></td>
                            </tr>
                            <tr>
                                <th>Pengaturan Stok Minimal</th>
                                <td><?= $web['min_stok'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>