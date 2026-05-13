<?php

namespace service;

use dao\mysql\UsuarioDAO;

class UsuarioService extends UsuarioDAO
{
    public function registrar($nome, $usuario, $email, $senha)
    {
        return parent::registrar($nome, $usuario, $email, $senha);
    }

    public function login($email, $senha)
    {
        return parent::login($email, $senha);
    }

    public function getPosts()
    {
        return parent::getPosts();
    }
}

