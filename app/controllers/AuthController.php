<?php
class AuthController extends Controller
{
    public function login()
    {
        if (!empty($_SESSION['admin'])) {
            $this->redirect('admin/dashboard');
        }
        $this->view('auth/login');
    }

    public function process()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('auth/login');
        }

        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        $user = $this->model('User')->findByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            session_regenerate_id(true);
            $_SESSION['admin'] = ['id' => $user['id'], 'name' => $user['name'], 'username' => $user['username']];
            $this->redirect('admin/dashboard');
        }

        $_SESSION['flash'] = ['type' => 'danger', 'msg' => 'Username atau password salah!'];
        $this->redirect('auth/login');
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        session_start();
        $_SESSION['flash'] = ['type' => 'success', 'msg' => 'Anda berhasil logout.'];
        $this->redirect('auth/login');
    }
}
