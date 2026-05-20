<?php

namespace Backend\App\Controller;

use Backend\database\UserModel;
use Backend\support\Session;

final class User
{
private function session(): Session
    {
        return new Session();
    }
    private function view(string $template, array $data = []): void
    {
        // Usa diretamente a constante CONF_VIEW_WEB que foi declarada via define()
        // Se o PHP reclamar que não existe, usamos o BASE_DIR para garantir o caminho absoluto
        $basePath = BASE_DIR . '/frontend/web';

        // Monta o caminho exato do ficheiro PHP da View
        $viewPath = $basePath . '/' . ltrim($template, '/') . '.php';

        if (!file_exists($viewPath)) {
            http_response_code(500);
            echo "<h1>Erro de Sistema</h1><p>A View não foi encontrada no caminho: <strong>{$viewPath}</strong></p>";
            return;
        }

        extract($data, EXTR_SKIP);
        require $viewPath;
    }

    public function index()
    {
        // Se o formulário foi submetido
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->processRegister();
        } else {
            // Mostrar formulário (já está na view)
            $this->view('register', ["pageTitle" => "CARPOOL | Criar conta"]);
        }
    }
    public function processRegister()
    {
        $password = $_POST['password'] ?? '';
        $confirm  = $_POST['confirm_password'] ?? '';

        $errors = [];

        if ($password !== $confirm) {
            $errors[] = "As palavras-passe não coincidem.";
        }

        if (!empty($errors)) {
            // COMENTE O REDIRECIONAMENTO E COLOQUE ISSO:
            echo "Erro local no controlador:<br>";
            var_dump($errors);
            exit;
        }

        $userModel = new UserModel();
        $userId = $userModel->register($_POST);

        if ($userId) {
            setFlash('success', 'Conta criada com sucesso!');
            redirect('login');
        } else {
            // COMENTE O REDIRECIONAMENTO E COLOQUE ISSO:
            echo "Erro interno vindo do UserModel:<br>";
            var_dump($userModel->fail());
            exit;
        }
    }
   // ====================== LOGIN ======================

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->processLogin();
        } else {
            $this->view('login',["pageTitle"=>"CARPOOL | Entrar",'showForgetLink' => $this->session()->loginAttempts() >= 3]);
        }
    }

    private function processLogin()
    {
        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        $errors = [];

        // Validações básicas
        if (empty($email)) {
            $errors[] = "O campo email é obrigatório.";
        }

        if (empty($password)) {
            $errors[] = "O campo palavra-passe é obrigatório.";
        }

        if (!empty($errors)) {
            setFlash('errors', $errors);
            redirect('login');
            return;
        }
         $userModel=new UserModel();
        // Autenticação
        $user = $userModel->authenticate($email, $password);
        // Reset do contador após login bem-sucedido
        $this->session()->resetLoginAttempts();
     
        if ($user) {
            // Login bem-sucedido
            $this->createUserSession($user);

            setFlash('success', 'Bem-vindo de volta, ' . $user['name'] . '!');
            if ($user['role']==="Passageiro") {
               redirect('/'); 
            }elseif($user['role']==="Motorista"){
                redirect('painel-controle'); 
            }elseif($user['role']==="Admin"){
                redirect("/dasboard-motorista");
            }
        } else {
            // Falha no login
            setFlash('errors', ['Email ou palavra-passe incorretos.']);
            redirect('login');
        }
    }

    /**
     * Cria a sessão do utilizador após login bem-sucedido
     */
    private function createUserSession(array $user): void
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['user_id']   = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email']= $user['email'];
        $_SESSION['user_role'] = $user['role'] ?? 'passenger';

        // Regenera o ID da sessão por segurança
        session_regenerate_id(true);
    }

    /**
     * Logout
     */
    public function logout()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        // Destrói todas as variáveis de sessão
        $_SESSION = [];

        // Destrói o cookie da sessão
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(), 
                '', 
                time() - 42000,
                $params["path"], 
                $params["domain"], 
                $params["secure"], 
                $params["httponly"]
            );
        }

        session_destroy();

        setFlash('success', 'Sessão terminada com sucesso.');
        redirect('login');
    }
}
