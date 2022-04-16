<?= $this->extend('homepage/layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('admin/layout/fungsi') ?>
<div class="mt-8">

    <?= $this->include('admin/dashboard/stok') ?>
    
</div>

<?= $this->endSection(); ?>