<?php $uri = $_GET['url'] ?? ''; ?>
<nav class="navbar navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= BASE_URL ?>/admin/dashboard"><i class="bi bi-shop"></i> My Store Admin</a>
        <span class="text-white-50 small d-none d-md-block">Halo, <?= htmlspecialchars($_SESSION['admin']['name']) ?></span>
    </div>
</nav>
<div class="container-fluid">
<div class="row">
    <aside class="col-md-2 bg-light border-end min-vh-100 p-3">
        <ul class="nav nav-pills flex-column gap-1">
            <li><a class="nav-link <?= str_starts_with($uri, 'admin') ? 'active' : 'text-dark' ?>" href="<?= BASE_URL ?>/admin/dashboard"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
            <li><a class="nav-link <?= str_starts_with($uri, 'product') ? 'active' : 'text-dark' ?>" href="<?= BASE_URL ?>/product"><i class="bi bi-box-seam"></i> Produk</a></li>
            <li><a class="nav-link text-dark" href="<?= BASE_URL ?>/" target="_blank"><i class="bi bi-globe"></i> Lihat Toko</a></li>
            <li><a class="nav-link text-danger" href="<?= BASE_URL ?>/auth/logout"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
        </ul>
    </aside>
    <main class="col-md-10 p-4">
