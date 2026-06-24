<?php

namespace service;

use dao\mysql\UsuarioDAO;

class UsuarioService extends UsuarioDAO
{
    public function registrar($nome, $usuario, $email, $senha)
    {
        return parent::registrar($nome, $usuario, $email, $senha);
    }
    public function getID($email)
    {
        return parent::getID($email);
    }
    public function login($email, $senha)
    {
        return parent::login($email, $senha);
    }
    public function atualizarContaEmail($usuario_id, $email)
    {
        return parent::atualizarContaEmail($usuario_id, $email);
    }
    public function atualizarContaSenha($usuario_id, $senha)
    {
        return parent::atualizarContaSenha($usuario_id, $senha);
    }
    public function deletarConta($usuario_id)
    {
        return parent::deletarConta($usuario_id);
    }
}
