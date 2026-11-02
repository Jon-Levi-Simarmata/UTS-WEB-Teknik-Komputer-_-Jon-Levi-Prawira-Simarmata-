<?php
class AdminController extends Controller
{
    public function __construct()
    {
        $this->requireAdmin();
    }

    public function index()
    {
        $this->redirect('admin/dashboard');
    }

    public function dashboard()
    {
        $productModel = $this->model('Product');
        $this->view('admin/dashboard', [
            'stats'  => $productModel->stats(),
            'latest' => array_slice($productModel->all(), 0, 5),
        ]);
    }
}
