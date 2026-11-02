<?php $title = 'Dashboard'; require __DIR__ . '/../layouts/header.php'; require __DIR__ . '/../layouts/admin_nav.php'; ?>
<h3 class="mb-4">Dashboard</h3>
<div class="row g-3 mb-4">
    <?php
    $cards = [
        ['Total Produk',   $stats['total'],                                  'bi-box-seam',  'primary'],
        ['Total Stok',     $stats['total_stock'],                            'bi-stack',     'success'],
        ['Kategori',       $stats['categories'],                             'bi-tags',      'warning'],
        ['Nilai Aset',     'Rp ' . number_format($stats['asset'], 0, ',', '.'), 'bi-cash-coin', 'danger'],
    ];
    foreach ($cards as [$label, $val, $icon, $color]): ?>
        <div class="col-6 col-lg-3">
            <div class="card text-bg-<?= $color ?> shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div><div class="small"><?= $label ?></div><div class="fs-4 fw-bold"><?= $val ?></div></div>
                    <i class="bi <?= $icon ?> fs-1 opacity-50"></i>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <strong>5 Produk Terbaru</strong>
        <a href="<?= BASE_URL ?>/product/create" class="btn btn-sm btn-primary"><i class="bi bi-plus-lg"></i> Tambah Produk</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-light"><tr><th>Nama</th><th>Kategori</th><th>Harga</th><th>Stok</th></tr></thead>
            <tbody>
            <?php foreach ($latest as $p): ?>
                <tr>
                    <td><?= htmlspecialchars($p['name']) ?></td>
                    <td><?= htmlspecialchars($p['category']) ?></td>
                    <td>Rp <?= number_format($p['price'], 0, ',', '.') ?></td>
                    <td><?= $p['stock'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require __DIR__ . '/../layouts/admin_end.php'; require __DIR__ . '/../layouts/footer.php'; ?>
