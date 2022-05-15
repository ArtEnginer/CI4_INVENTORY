<div class="container-fluid text-center">
    <!-- flash data -->
    <?= session()->getFlashdata('message'); ?>
    <div class="row gap-2">
        <div class="col-3 ">

            <a class="btn btn-primary" href="<?= base_url('report/masuk') ?>"> Barang Masuk</a>

        </div>
        <div class="col-3 ">

            <a class="btn btn-primary" href="<?= base_url('report/keluar') ?>"> Barang Keluar</a>

        </div>
        <div class="col-3 ">

            <a class="btn btn-primary" href="<?= base_url('report/stok') ?>"> Stok Barang</a>

        </div>
    </div>


</div>