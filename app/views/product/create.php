<?php $title = 'Tambah Produk'; require __DIR__ . '/../layouts/header.php'; require __DIR__ . '/../layouts/admin_nav.php'; ?>
<h3 class="mb-3">Tambah Produk Baru</h3>
<div class="card shadow-sm"><div class="card-body">
    <form method="post" action="<?= BASE_URL ?>/product/store">
        <?php require __DIR__ . '/_form.php'; ?>
        <div class="mt-4">
            <button class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
            <a href="<?= BASE_URL ?>/product" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div></div>
<?php require __DIR__ . '/../layouts/admin_end.php'; require __DIR__ . '/../layouts/footer.php'; ?>
