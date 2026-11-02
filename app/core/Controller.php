<?php
class Controller
{
    protected function model(string $name)
    {
        require_once __DIR__ . '/../models/' . $name . '.php';
        return new $name();
    }

    protected function view(string $view, array $data = []): void
    {
        extract($data);
        require __DIR__ . '/../views/' . $view . '.php';
    }

    protected function redirect(string $path): void
    {
        header('Location: ' . BASE_URL . '/' . ltrim($path, '/'));
        exit;
    }

    protected function requireAdmin(): void
    {
        if (empty($_SESSION['admin'])) {
            $_SESSION['flash'] = ['type' => 'warning', 'msg' => 'Silakan login terlebih dahulu.'];
            $this->redirect('auth/login');
        }
    }
}
