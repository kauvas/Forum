<?php

namespace controller;

use service\UsuarioService;
use template\UsuarioTemp;
use template\Itemplate;

class Usuario
{
    private Itemplate $template;
    public function __construct()
    {
        $this->template = new UsuarioTemp();
    }

    public function registrar()
    {
        $service = new UsuarioService();
        $nome = $_POST['nome'];
        $usuario = $_POST['usuario'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $service->registrar($nome, $usuario, $email, $senha);
        //$_SESSION["usuario"] = $usuario[0]['usuario'];
        //$_SESSION["id_usuario"] = $usuario[0]['id'];
        $_SESSION["logado"] = true;
        header("Location: home");
    }

    public function login()
    {
        $service = new UsuarioService();
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $usuario = $service->login($email, $senha);
        session_start();
        if (count($usuario) > 0 || $_SESSION["usuario"] !== null) {
            //Login bem-sucedido
            $_SESSION["usuario"] = $usuario[0]['usuario'];
            $_SESSION["id_usuario"] = $usuario[0]['id'];
            $_SESSION["logado"] = true;

            header("Location: home");
        } else {
            session_destroy();
            header("Location: home#erro");
        }
    }

    public function atualizarConta()
    {
        /*
        echo $_POST['email'];
        echo '<br>';
        echo $_POST['nova_senha'];
        if (empty($_POST['nova_senha'])) {
            echo "nada";
        }
        echo '<br>';
        echo $_POST['id_usuario'];
        */

        $service = new UsuarioService();
        $email = $_POST['email'];
        $senha = $_POST['nova_senha'];
        $usuario_id = $_POST['usuario_id'];

        if (!empty($email)) {
            $service->atualizarContaEmail($usuario_id, $email);
        }

        if (!empty($senha)) {
            $service->atualizarContaSenha($usuario_id, $senha);
        }

        header("Location: perfil?id=$usuario_id");
    }

    public function deletarConta()
    {
        $service = new UsuarioService();
        $id = $_GET['usuario_id'];
        $service->deletarConta($id);
        header("Location: limpa");
    }
}
