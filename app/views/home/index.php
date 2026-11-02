<?php $title = 'Beranda'; require __DIR__ . '/../layouts/header.php'; ?>
<nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= BASE_URL ?>/"><i class="bi bi-shop"></i> My Store</a>
        <div class="ms-auto">
            <?php if (!empty($_SESSION['admin'])): ?>
                <a class="btn btn-sm btn-outline-light" href="<?= BASE_URL ?>/admin/dashboard">Dashboard</a>
            <?php else: ?>
                <a class="btn btn-sm btn-outline-light" href="<?= BASE_URL ?>/auth/login"><i class="bi bi-person-lock"></i> Login Admin</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<div class="hero text-center text-white py-5">
    <h1 class="fw-bold">Selamat Datang di My Store</h1>
    <p class="mb-4">Toko gadget &amp; elektronik terlengkap</p>
    <form class="container" style="max-width:480px" method="get" action="<?= BASE_URL ?>/">
        <div class="input-group">
            <input type="text" name="q" value="<?= htmlspecialchars($keyword) ?>" class="form-control" placeholder="Cari produk / kategori...">
            <button class="btn btn-warning"><i class="bi bi-search"></i></button>
        </div>
    </form>
</div>

<div class="container py-4">
    <div class="row g-3">
        <?php foreach ($products as $p): ?>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-img-top product-thumb d-flex align-items-center justify-content-center">
                        <i class="bi bi-box-seam fs-1 text-secondary"></i>
                    </div>
                    <div class="card-body">
                        <span class="badge bg-primary mb-2"><?= htmlspecialchars($p['category']) ?></span>
                        <h6 class="card-title"><?= htmlspecialchars($p['name']) ?></h6>
                        <p class="small text-muted"><?= htmlspecialchars($p['description']) ?></p>
                    </div>
                    <div class="card-footer bg-white">
                        <strong class="text-success">Rp <?= number_format($p['price'], 0, ',', '.') ?></strong>
                        <small class="d-block text-muted">Stok: <?= $p['stock'] ?></small>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <?php if (!$products): ?>
            <p class="text-center text-muted">Produk tidak ditemukan.</p>
        <?php endif; ?>
    </div>
</div>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
