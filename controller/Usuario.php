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
            $this->template->layout("Home.php", ["usuario" => $usuario]);
        } else {
            session_destroy();
            header("Location: home#erro");
        }
    }

    public function redirect()
    {
        session_start();
        if (isset($_SESSION["usuario"])) {
            $this->template->layout("Home.php", ["usuario" => $_SESSION["usuario"]]);
        }
        else {
            session_destroy();
            header("Location: home");
        }
    }
}
