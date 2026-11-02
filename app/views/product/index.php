<?php $title = 'Data Produk'; require __DIR__ . '/../layouts/header.php'; require __DIR__ . '/../layouts/admin_nav.php'; ?>
<div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
    <h3 class="mb-0">Data Produk</h3>
    <a href="<?= BASE_URL ?>/product/create" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Produk</a>
</div>

<form class="mb-3" method="get" action="<?= BASE_URL ?>/product">
    <div class="input-group" style="max-width:400px">
        <input type="text" name="q" class="form-control" placeholder="Cari nama / kategori..." value="<?= htmlspecialchars($keyword) ?>">
        <button class="btn btn-outline-secondary"><i class="bi bi-search"></i></button>
    </div>
</form>

<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle mb-0">
            <thead class="table-dark">
                <tr><th>#</th><th>Nama</th><th>Kategori</th><th>Harga</th><th>Stok</th><th class="text-center">Aksi</th></tr>
            </thead>
            <tbody>
            <?php foreach ($products as $i => $p): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= htmlspecialchars($p['name']) ?></td>
                    <td><span class="badge bg-secondary"><?= htmlspecialchars($p['category']) ?></span></td>
                    <td>Rp <?= number_format($p['price'], 0, ',', '.') ?></td>
                    <td><?= $p['stock'] ?></td>
                    <td class="text-center text-nowrap">
                        <a href="<?= BASE_URL ?>/product/edit/<?= $p['id'] ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                        <form method="post" action="<?= BASE_URL ?>/product/delete/<?= $p['id'] ?>" class="d-inline"
                              onsubmit="return confirm('Hapus produk &quot;<?= htmlspecialchars($p['name'], ENT_QUOTES) ?>&quot;?')">
                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if (!$products): ?>
                <tr><td colspan="6" class="text-center text-muted py-4">Belum ada data produk.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require __DIR__ . '/../layouts/admin_end.php'; require __DIR__ . '/../layouts/footer.php'; ?>
