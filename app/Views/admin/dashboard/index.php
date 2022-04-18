<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('admin/layout/fungsi') ?>

<?= $this->include('admin/layout/notifikasi') ?>

<?= $this->include('admin/dashboard/stok') ?>
<div class="row mt-3">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="h3 mb-0">Data Barang Kurang dari <b>Stok Minimal <?= $web['min_stok'] ?></b> </h5>
            </div>
            <div class="card-body">
                <?php if (empty($minimal)) { ?>
                    Nothing to worry!
                <?php } else { ?>
                    <table id="dataTable1" class="table table-hover table-striped">
                        <thead align="center">
                            <td>Nama Barang</td>
                            <td style="width: 120px;">ID</td>
                            <td style="width: 150px;">Stok</td>
                        </thead>
                        <tbody>
                            <?php foreach ($minimal as $data) : ?>
                                <tr align="center">
                                    <td align="left"><?= $data['nm_barang'] ?></td>
                                    <td><?= $data['id_barang'] ?></td>
                                    <td><?= $data['stok'] . ' ' . $data['satuan'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>