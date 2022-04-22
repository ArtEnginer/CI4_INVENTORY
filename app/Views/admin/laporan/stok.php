<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('admin/layout/fungsi') ?>

<?= $this->include('admin/laporan/redirectUI') ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row ">
                    <form action="<?= base_url('laporan/print_stok_periode') ?>" method="post" _blank>
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
                        <div class="form-group ">
                            <button type="submit" class="btn btn-primary">
                                <!-- icon print out -->
                                <i class="fas fa-print"></i>
                                Cetak
                            </button>
                        </div>
                    </form>
                </div>





                <table id="dataTable1" class="table table-bordered table-hover table-striped mt-3">
                    <thead align="center">
                        <tr>
                            <td style="width: 70px;">No.</td>
                            <td style="width: 100px;">ID</td>
                            <td>Nama Barang</td>
                            <td style="width: 200px;">Stok</td>
                            <td style="width: 80px;">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 + (25 * ($currentPage - 1));
                        foreach ($barang as $data) : ?>
                            <tr align="center">
                                <td><?= $i++ ?></td>
                                <td><?= $data['id_barang'] ?></td>
                                <td align="left"><?= $data['nm_barang'] ?></td>
                                <td><?= ribuan($data['stok']) . ' ' . $data['satuan'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#lihat<?= $data['id_barang']; ?>">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <a href="<?= base_url('item/edit/' . $data['id_barang']) ?>" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <i>Menampilkan 25 data per halaman.</i>
                <div class="float-right">
                    <?= $pager->links('barang', 'paging'); ?>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>