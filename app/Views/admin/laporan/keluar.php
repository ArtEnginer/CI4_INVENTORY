<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('admin/layout/fungsi') ?>

<?= $this->include('admin/laporan/redirectUI') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row ">
                    <form action="<?= base_url('laporan/print_keluar_periode') ?>" method="post" _blank>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tanggal Awal</label>
                                    <input type="date" name="tanggal_awal" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tanggal Akhir</label>
                                    <input type="date" name="tanggal_akhir" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group end-0">
                            <button type="submit" class="btn btn-primary"> <i class="fas fa-print"></i>Cetak</button>
                        </div>
                    </form>
                </div>


                <table id="dataTable1" class="table table-bordered table-hover table-striped table-valign-middle">
                    <thead align="center">
                        <tr>
                            <td style="width: 70px;">No.</td>
                            <td style="width: 100px;">ID</td>
                            <td style="width: 120px;">Tanggal Keluar</td>
                            <td>Keterangan</td>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 + (25 * ($currentPage - 1));
                        foreach ($keluar as $data) : ?>
                            <tr align="center">
                                <td><?= $i++ ?></td>
                                <td><?= $data['id_keluar'] ?></td>
                                <td><?= tanggal($data['tanggal']) ?></td>
                                <td align="left"><?= nl2br($data['keterangan']) ?></td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <i>Menampilkan 25 data per halaman.</i>
                <div class="float-right">
                    <?= $pager->links('export', 'paging'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>