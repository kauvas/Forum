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
        if (count($usuario) > 0) {
            //Login bem-sucedido
            session_start();
            $_SESSION["usuario"] = $usuario[0]['usuario'];
            $this->template->layout("Home.php", ["usuario" => $usuario]);
        } else {
            header("Location: home#erro");
        }
    }
}
