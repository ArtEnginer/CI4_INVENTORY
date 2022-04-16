<div class="row ">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="h3 mb-0">Stok Barang</b> </h5>
            </div>
            <div class="card-body">

                <table id="dataTable1" class="table table-bordered table-hover table-striped">
                    <thead align="center">
                        <tr>
                            <td style="width: 70px;">No.</td>
                            <td style="width: 100px;">ID</td>
                            <td>Nama Barang</td>
                            <td style="width: 200px;">Stok</td>
                            
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
