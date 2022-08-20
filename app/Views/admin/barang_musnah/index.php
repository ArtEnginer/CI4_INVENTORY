<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('admin/layout/fungsi') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- <form action="" method="post">
                    <?= csrf_field(); ?>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Pencarian" name="keyword" value="<?= $keyword; ?>" autocomplete="off">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                        </div>
                    </div>
                </form> -->

                <p>
                    <!-- kembali -->
                    <a href="<?= base_url('/item') ?>" class="btn btn-secondary"><i class="fas fa-undo"></i> Back</a>
                    <a href="<?= base_url('/musnah/add') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
                   
                </p>
                <table id="dataTable1" class="table table-bordered table-hover table-striped">
                    <thead align="center">
                        <tr>
                            <th>No.</th>
                            <th>ID Barang</th>
                            <th>Jumlah</th>
                            <th>Kode Barang</th>
                            <th>keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 + (25 * ($currentPage - 1));
                        foreach ($barangMusnah as $data) : ?>
                            <tr align="center">
                                <td><?= $i++ ?></td>
                                <td><?= $data['id_barang'] ?></td>
                                <td><?= ribuan($data['jumlah'])?></td>
                                <td><?= $data['kode_barang'] ?></td>
                                <td><?= $data['keterangan'] == 2 ? 'Dijual' : ($data['keterangan'] == 1 ? 'Rusak' : 'Tidak Layak Pakai') ?></td>
                              
                                <td>
                                    <!-- <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#lihat>">
                                        <i class="fas fa-eye"></i>
                                    </button> -->
                                    <a href="<?= base_url('/musnah/edit/' . $data['id_barang_musnah']) ?>" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="<?= base_url('/musnah/delete/' . $data['id_barang_musnah']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
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