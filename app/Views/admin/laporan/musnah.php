<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('admin/layout/fungsi') ?>
<?= $this->include('admin/laporan/redirectUI') ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row ">

                    <a href="<?= base_url('laporan/print_musnah_periode') ?>" class="btn btn-primary">
                        <i class="fas fa-print"></i>
                        Cetak
                    </a>
                </div>


                <table id="dataTable1" class="table table-bordered table-hover table-striped table-valign-middle">
                    <thead align="center">
                        <tr>
                            <th>No.</th>
                            <th>ID Barang</th>
                            <th>Jumlah</th>
                            <th>Kode Barang</th>
                            <th>keterangan</th>
                            <th>Tanggal Input</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 + (25 * ($currentPage - 1));
                        foreach ($barangMusnah as $data) : ?>
                            <tr align="center">
                                <td><?= $i++; ?></td>
                                <td><?= $data['id_barang']; ?></td>
                                <td><?= $data['jumlah']; ?></td>
                                <td><?= $data['kode_barang']; ?></td>
                                <td><?= $data['keterangan']; ?></td>
                                <td><?= $data['created_at']; ?></td>
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