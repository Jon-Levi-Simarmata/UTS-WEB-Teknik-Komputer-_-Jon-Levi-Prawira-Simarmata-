<?php
class HomeController extends Controller
{
    public function index()
    {
        $keyword  = trim($_GET['q'] ?? '');
        $products = $this->model('Product')->all($keyword);
        $this->view('home/index', ['products' => $products, 'keyword' => $keyword]);
    }
}
