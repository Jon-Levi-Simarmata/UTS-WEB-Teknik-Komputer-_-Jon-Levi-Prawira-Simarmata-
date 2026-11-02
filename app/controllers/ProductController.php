<?php
// CRUD Produk (khusus admin)
class ProductController extends Controller
{
    private $product;

    public function __construct()
    {
        $this->requireAdmin();
        $this->product = $this->model('Product');
    }

    public function index()
    {
        $keyword = trim($_GET['q'] ?? '');
        $this->view('product/index', [
            'products' => $this->product->all($keyword),
            'keyword'  => $keyword,
        ]);
    }

    public function create()
    {
        $this->view('product/create');
    }

    public function store()
    {
        $this->mustPost();
        [$data, $error] = $this->validated();
        if ($error) {
            $this->flash('danger', $error);
            $this->redirect('product/create');
        }
        $this->product->create($data);
        $this->flash('success', 'Produk baru berhasil ditambahkan.');
        $this->redirect('product');
    }

    public function edit($id = 0)
    {
        $item = $this->product->find((int)$id);
        if (!$item) {
            $this->flash('danger', 'Produk tidak ditemukan.');
            $this->redirect('product');
        }
        $this->view('product/edit', ['item' => $item]);
    }

    public function update($id = 0)
    {
        $this->mustPost();
        [$data, $error] = $this->validated();
        if ($error) {
            $this->flash('danger', $error);
            $this->redirect('product/edit/' . (int)$id);
        }
        $this->product->update((int)$id, $data);
        $this->flash('success', 'Produk berhasil diperbarui.');
        $this->redirect('product');
    }

    public function delete($id = 0)
    {
        $this->mustPost();
        $this->product->delete((int)$id);
        $this->flash('success', 'Produk berhasil dihapus.');
        $this->redirect('product');
    }

    // ---------- helper ----------
    private function mustPost(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('product');
        }
    }

    private function flash(string $type, string $msg): void
    {
        $_SESSION['flash'] = ['type' => $type, 'msg' => $msg];
    }

    private function validated(): array
    {
        $name     = trim($_POST['name'] ?? '');
        $category = trim($_POST['category'] ?? '');
        $price    = $_POST['price'] ?? '';
        $stock    = $_POST['stock'] ?? '';
        $desc     = trim($_POST['description'] ?? '');

        if ($name === '' || $category === '' || $price === '' || $stock === '') {
            return [null, 'Nama, kategori, harga, dan stok wajib diisi.'];
        }
        if (!is_numeric($price) || $price < 0 || !ctype_digit((string)$stock)) {
            return [null, 'Harga dan stok harus berupa angka yang valid.'];
        }
        return [[
            'name' => $name, 'category' => $category,
            'price' => (float)$price, 'stock' => (int)$stock, 'description' => $desc,
        ], null];
    }
}
