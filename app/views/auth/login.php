<?php $title = 'Login Admin'; $bodyClass = 'login-page'; require __DIR__ . '/../layouts/header.php'; ?>
<div class="container d-flex justify-content-center align-items-center" style="min-height:90vh">
    <div class="card shadow-lg border-0" style="width:100%;max-width:400px">
        <div class="card-body p-4">
            <div class="text-center mb-4">
                <i class="bi bi-shop-window fs-1 text-primary"></i>
                <h4 class="fw-bold mt-2">My Store</h4>
                <p class="text-muted mb-0">Login Admin</p>
            </div>
            <form method="post" action="<?= BASE_URL ?>/auth/process">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" name="username" class="form-control" required autofocus>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                </div>
                <button class="btn btn-primary w-100">Masuk</button>
                <a href="<?= BASE_URL ?>/" class="btn btn-link w-100 mt-2">&larr; Kembali ke toko</a>
            </form>
        </div>
    </div>
</div>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
