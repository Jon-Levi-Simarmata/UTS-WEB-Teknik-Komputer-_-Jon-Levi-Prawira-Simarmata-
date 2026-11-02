<?php $v = $item ?? ['name'=>'','category'=>'','price'=>'','stock'=>'','description'=>'']; ?>
<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label">Nama Produk</label>
        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($v['name']) ?>" required>
    </div>
    <div class="col-md-4">
        <label class="form-label">Kategori</label>
        <input type="text" name="category" class="form-control" list="cats" value="<?= htmlspecialchars($v['category']) ?>" required>
        <datalist id="cats">
            <option>Smartphone</option><option>Laptop</option><option>Aksesoris</option>
            <option>Audio</option><option>Wearable</option><option>Gaming</option>
        </datalist>
    </div>
    <div class="col-md-6">
        <label class="form-label">Harga (Rp)</label>
        <input type="number" name="price" min="0" step="1" class="form-control" value="<?= htmlspecialchars($v['price']) ?>" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Stok</label>
        <input type="number" name="stock" min="0" class="form-control" value="<?= htmlspecialchars($v['stock']) ?>" required>
    </div>
    <div class="col-12">
        <label class="form-label">Deskripsi</label>
        <textarea name="description" rows="3" class="form-control"><?= htmlspecialchars($v['description']) ?></textarea>
    </div>
</div>
